<?php
class Users extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	
	function check_login(){
		if(!$this->padiauth->is_logged_in()){
			redirect(base_url() . 'admin/login');
		}
	}

	function show_user_management(){
		$uri = $this->uri->uri_to_assoc();
		$users = new User();
		$page_conf = $this->common->get_simple_pagination_conf('users');
		$total = $users->count(); 	
		$users->get();
		$page_conf['total_rows'] = $total;
		$this->pagination->initialize($page_conf);		
		$data = array(
			'view_data'=>'user_management','users'=>$users,'total'=>$total
		);
		$this->load->view('main/index',$data);
	}
	
	function entry_user(){
		$this->check_login();
		$uri = $this->uri->uri_to_assoc();
		$data = array(
			'view_data'=>'entry_user','groups' => Group::get_groups(),'alert'=>''
		);
		switch($uri['type']){
			case 'add':
				$data['id'] = '';
				$data['name'] = '';
				$data['email'] = '';
				$data['password'] = '';
				$data['group'] = '1';
				$data['type'] = 'add';
				$data['aktif'] = TRUE;
				break;
			case 'edit':
				$user = new User();
				$user->where('id',$uri['id'])->get();
				$data['id'] = $user->id;
				$data['name'] = $user->username;
				$data['group'] = $user->group_id;
				$data['email'] = $user->email;
				$data['password'] = $user->password;
				$data['type'] = 'edit';
				$data['aktif'] = ($user->status=='1')?TRUE:FALSE;
				$data['members'] = $user->user;
				break;
		}
		$this->load->view('index',$data);
	}
	
	function entry_user_handler(){
		$this->check_login();
		$params = $this->input->post();
		if(isset($params['save_x'])){
			$aktif = (isset($params['aktif']))?'1':'0';
			$user = new User();
			switch ($params['type']){
				case 'add':
					$this->padiauth->create_custom_user($params['username'],$params['password'],$params['email'],$params['group']);
					$this->access_log->insert_log('Create user ' . $params['username'] . '(' . $params['email'] . ')');
					redirect(base_url() . 'index.php/back_end/show_user_management/page');
					break;
				case 'edit':
					$user->where('id',$params['id'])->update(array(
						'username'=>$params['username'],
						'email'=>$params['email'],
						'group_id'=>$params['group'],
						'status'=>$params['aktif']));
					$this->access_log->insert_log('Edit User ' . $params['username'] . '(' . $params['email'] . ')');
					if($params['password']!=''){
						$user = new User();
						$user->where('id',$params['id'])->get();
						if($params['password']==$params['password2']){
							$this->padiauth->change_password_user($params['password'],$params['id'],$user->salt);
							$this->access_log->insert_log('Change password ' . $params['username'] . '(' . $params['email'] . ')');
							redirect(base_url() . 'index.php/back_end/show_user_management/page');
						}
						else 
						{
							$groups = new Group();
							$groups->get();
							$data = array(
							'view_data'=>'entry_user','groups'=>$groups->get_groups(),'alert'=>'Password not match',
							'type'=>'edit','id'=>$user->id,'name'=>$user->username,'email'=>$user->email,'group'=>$user->group,
							'aktif'=>($user->status=='1')?TRUE:FALSE
							);
							$this->access_log->insert_log('Error change password ' . $params['username'] . '(' . $params['email'] . ')');
							$this->load->view('index',$data);
						}
					}
					else 
					{
						redirect(base_url() . 'index.php/back_end/show_user_management/page');
					}
					break;
			}
		}
		if(isset($params['hapus_member'])){
			$user = new User();
			$user->where('id',$params['id'])->get();
			foreach ($params['member_id'] as $member_id){
				echo $member_id;
				$member = new User();
				$member->where('id',$member_id)->get();
				$user->delete_user($member);
				echo $member->username;
			}
			redirect(base_url() . 'index.php/back_end/entry_user/type/edit/id/' . $params['id']);
		}

		if(isset($params['advanced_preference'])){
			redirect(base_url() . 'index.php/back_end/advanced_user_preferences/id/' . $params['id']);	
		}
		
		if(isset($params['cancel_x'])){
			redirect(base_url() . 'index.php/back_end/show_user_management/page');
		}
	}
	
	function advanced_user_preferences(){
		$this->check_login();
		$uri = $this->uri->uri_to_assoc();
		$modules = new Module();
		$modules->get();
		$data = array(
		'view_data'=>'advanced_user_preferences',
		'modules'=>$modules,'user_id'=>$uri['id'],
		'user_preferences' => User::get_user_preferences($uri['id']),
		);
		$this->load->view('index',$data);
	}
	
	function advanced_user_preference_handler(){
		$params = $this->input->post();
		$modules = new Module();
		$modules->get();
		foreach ($modules as $module){
			if(isset($params['c'][$module->id])){
				User::set_preference($params['user_id'],$module->id,'c','1');
			}else{
				User::set_preference($params['user_id'],$module->id,'c','0');
			}
			if(isset($params['r'][$module->id])){
				User::set_preference($params['user_id'],$module->id,'r','1');
			}else{
				User::set_preference($params['user_id'],$module->id,'r','0');
			}
			if(isset($params['u'][$module->id])){
				User::set_preference($params['user_id'],$module->id,'u','1');
			}else{
				User::set_preference($params['user_id'],$module->id,'u','0');
			}
			if(isset($params['d'][$module->id])){
				User::set_preference($params['user_id'],$module->id,'d','1');
			}else{
				User::set_preference($params['user_id'],$module->id,'d','0');
			}
		}
		$this->access_log->insert_log('Change user preference (' . $params['username'] . ')');
		redirect(base_url() . 'index.php/back_end/entry_user/type/edit/id/' . $params['user_id']);
	}
	
	function get_menuclass($menu){
		if($menu==$this->uri->segment(2)){
			return 'selected';
		}
		return '';
	}
	
	function user_handler(){
		$this->check_login();
		$params = $this->input->post();
		if(isset($params['btn_cari'])){
			$user_data = array('usr_src'=>$params['cari']);
			$this->session->set_userdata($user_data);
			redirect(base_url() . 'index.php/back_end/show_user_management/page');
		}
		if(isset($params['remove_x'])){
			if(isset($params['id'])){
				$data['view_data'] = 'confirmation';
				$items = implode(',',$params['id']);
				$data['action'] = base_url() . 'index.php/back_end/user_execute';
				$data['query'] = 'delete from users where id in (' . $items . ')'; 
				$data['message'] = 'Apakah akan menghapus item no ' . $items . ' ?';
				$this->load->view('index',$data);
			}
		}
	}
	
	function user_execute(){
		$this->check_login();
		$params = $this->input->post();
		if(isset($params['yes'])){
			$this->access_log->insert_log('Delete users (' . $params['query'] . ')');
			$execute = $this->db->query($params['query']);
		}
		redirect(base_url() . 'index.php/back_end/show_user_management/page');
	}
	function usersave(){
		$params = $this->input->post();
		$this->padiauth->create_custom_user($params['username'],$params['password'],$params['email'],$params['group']);
	}
	function user_getRow(){
		$params = $this->input->post();
		$obj = new User();
		$obj->where('id',$params['id'])->get();
		echo '{"username":"'.$obj->username.'","email":"'.$obj->email.'"}';
	}

	function change_password(){
		$params = $this->input->post();
		$this->padiauth->change_password_user_by_email($params['password'],$params['email']);
	}

	function update(){
		$params = $this->input->post();
		$obj = new User(); 
		$obj->where('id',$params['id'])->update($params);
		echo $obj->check_last_query();
	}
}
