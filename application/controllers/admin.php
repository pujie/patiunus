<?php
class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Kelas/dmkelas');
	}
	
	function index(){
		redirect(base_url().'admin/login');
	}
	
	/*start of blogs*/
	function blogs(){
		$this->check_login();
		$data = array('objs'=>Blog::populate());
		$this->load->view('admin/blogs',$data);
	}
	
	function blog_add(){
		$this->check_login();
		$this->load->view('admin/blog_add');
	}
	
	function blog_edit(){
		$this->check_login();
		$id = $this->uri->segment(3);
		$data = array('obj'=>Blog::getblog($id));
		$this->load->view('admin/blog_edit',$data);
	}
	
	function blog_edit_handler(){
		$this->check_login();
		$params = $this->input->post();
		if(isset($params['save'])){
			Blog::edit($params);
		}
		redirect('admin/blogs');
	}
	
	function blog_handler(){
		$this->check_login();
		$params = $this->input->post();
		if(isset($params['save'])){
			Blog::add($params);
		}
		redirect('admin/blogs');
	}

	function blog_remove(){
		$this->check_login();
		$id = $this->uri->segment(3);
		Blog::set_active($id,'0');
		redirect(base_url() . 'admin/blogs');
	}

	function blog_upload_tmp(){
		$this->check_login();
		$uploaddir = './media/blogs/'; 
		$file = $uploaddir . basename($_FILES['uploadfile']['name']); 
		 
		if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
			echo "success"; 
		} else {
			echo "error";
		}		
	}
	/*end of blogs*/

	/*start of categories*/
	function categories(){
		$this->check_login();
		$segment = $this->uri->segment(3);
		$config['base_url'] = '<?php echo base_url();?>admin/categories';
		$config['total_rows'] = Category::getamount();	
		$config['per_page'] = 8;

		$this->pagination->initialize($config); 
		$data = array(
		'objs'=>Category::populate(),
		'files'=>get_filenames('./assets/categories',FALSE)
		);
		$this->load->view('admin/produk',$data);
		
	}
	
	function category_add(){
		$this->check_login();
		$this->load->view('admin/category_add');
	}
	
	function category_edit(){
		$this->check_login();
		$id = $this->uri->segment(3);
		$data = array('obj'=>Category::getcategory($id));
		$this->load->view('admin/category_edit',$data);
	}
	
	function category_edit_handler(){
		$this->check_login();
		$params = $this->input->post();
		if(isset($params['save'])){
			Category::edit($params);
		}
		redirect('admin/categories');
	}
	
	function category_handler(){
		$this->check_login();
		$params = $this->input->post();
		if(isset($params['save'])){
			Category::add($params);
		}
		redirect('admin/categories');
	}

	function category_remove(){
		$this->check_login();
		$id = $this->uri->segment(3);
		Category::set_active($id,'0');
		redirect(base_url() . 'admin/categories');
	}

	function category_upload_tmp(){
		$this->check_login();
		$uploaddir = './media/products/'; 
		$file = $uploaddir . basename($_FILES['uploadfile']['name']); 
		 
		if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
			echo "success"; 
		} else {
			echo "error";
		}		
	}
	/*end of categories*/

	


	/*start of kelas*/
	
	function kelases(){
		$this->check_login();
		$data = array('objs'=>Dmkelas::populate(0,25));
		$this->load->view('admin/kelases',$data);
	}
	
	function kelas_add(){
		$this->check_login();
		$this->load->view('admin/kelas_add');
	}
	
	function kelas_edit(){
		$this->check_login();
		$id = $this->uri->segment(3);
		$data = array('obj'=>Dmkelas::getkelas($id));
		$this->load->view('admin/kelas_edit',$data);
	}
	
	function kelas_edit_handler(){
		$this->check_login();
		$params = $this->input->post();
		if(isset($params['save'])){
			Dmkelas::edit($params);
		}
		redirect('admin/kelases');
	}
	
	function kelas_handler(){
		$this->check_login();
		$params = $this->input->post();
		if(isset($params['save'])){
			Dmkelas::add($params);
		}
		redirect('admin/kelases');
	}

	function kelas_remove(){
		$this->check_login();
		$id = $this->uri->segment(3);
		Dmkelas::set_active($id,'0');
		redirect(base_url() . 'admin/kelases');
	}

	function kelas_upload_tmp(){
		$this->check_login();
		$uploaddir = './media/kelas/'; 
		$file = $uploaddir . basename($_FILES['uploadfile']['name']); 
		 
		if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
			echo "success"; 
		} else {
			echo "error";
		}		
	}
	
	/*end of kelas*/

	
	/*start of motives*/
	
	function motives(){
		$this->check_login();
		$data = array('objs'=>Motive::populatelimit(0,76));
		$this->load->view('admin/motives',$data);
	}
	
	function motive_add(){
		$this->check_login();
		$this->load->view('admin/motive_add');
	}
	
	function motive_edit(){
		$this->check_login();
		$id = $this->uri->segment(3);
		$data = array('obj'=>Motive::getmotive($id));
		$this->load->view('admin/motive_edit',$data);
	}
	
	function motive_edit_handler(){
		$this->check_login();
		$params = $this->input->post();
		if(isset($params['save'])){
			Motive::edit($params);
		}
		redirect('admin/motives');
	}
	
	function motive_handler(){
		$this->check_login();
		$params = $this->input->post();
		if(isset($params['save'])){
			Motive::add($params);
		}
		redirect('admin/motives');
	}

	function motive_remove(){
		$this->check_login();
		$id = $this->uri->segment(3);
		Motive::set_active($id,'0');
		redirect(base_url() . 'admin/motives');
	}

	function motive_upload_tmp(){
		$this->check_login();
		$uploaddir = './assets/img/motives/'; 
		$file = $uploaddir . basename($_FILES['uploadfile']['name']); 
		 
		if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
			echo "success"; 
		} else {
			echo "error";
		}		
	}
	
	/*end of motives*/
	
	

	/*start of packaging*/
	
	function packagings(){
		$this->check_login();
		$data = array('objs'=>Packaging::populate(0,25));
		$this->load->view('admin/packagings',$data);
	}
	
	function packaging_add(){
		$this->check_login();
		$this->load->view('admin/packaging_add');
	}
	
	function packaging_edit(){
		$this->check_login();
		$id = $this->uri->segment(3);
		$data = array('obj'=>Packaging::getpackaging($id));
		$this->load->view('admin/packaging_edit',$data);
	}
	
	function packaging_edit_handler(){
		$this->check_login();
		$params = $this->input->post();
		if(isset($params['save'])){
			Packaging::edit($params);
		}
		redirect('admin/packagings');
	}
	
	function packaging_handler(){
		$this->check_login();
		$params = $this->input->post();
		if(isset($params['save'])){
			Packaging::add($params);
		}
		redirect('admin/packagings');
	}

	function packaging_remove(){
		$this->check_login();
		$id = $this->uri->segment(3);
		Packaging::set_active($id,'0');
		redirect(base_url() . 'admin/packagings');
	}

	function packaging_upload_tmp(){
		$this->check_login();
		$uploaddir = './media/packaging/'; 
		$file = $uploaddir . basename($_FILES['uploadfile']['name']); 
		 
		if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
			echo "success"; 
		} else {
			echo "error";
		}		
	}
	
	/*end of packagings*/
	
	/*start of users*/
	function users(){
		$this->check_login();
		$data = array('objs'=>user::populate());
		$this->load->view('admin/users',$data);
	}
	
	function user_add(){
		$this->check_login();
		$this->load->view('admin/user_add');
	}
	
	function user_edit(){
		$this->check_login();
		$id = $this->uri->segment(3);
		$data = array('obj'=>User::getuser($id));
		$this->load->view('admin/user_edit',$data);
	}
	
	function user_edit_handler(){
		$this->check_login();
		$params = $this->input->post();
		if(isset($params['save'])){
			user::edit($params);
		}
		redirect('admin/users');
	}
	
	function user_handler(){
		$this->check_login();
		$params = $this->input->post();
		if(isset($params['save'])){
			user::add($params);
		}
		redirect('admin/users');
	}

	function user_remove(){
//		$this->check_login();
//		$this->load->view('admin/user_remove');
		$params = $this->input->post();
		$obj = new User();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
	}

	function user_upload_tmp(){
		$this->check_login();
		$uploaddir = './media/users/'; 
		$file = $uploaddir . basename($_FILES['uploadfile']['name']); 
		 
		if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
			echo "success"; 
		} else {
			echo "error";
		}		
	}
	/*end of users*/
	function login(){
		$this->load->view('admin/login');
	}
	
	function logout(){
		$this->padiauth->logout(base_url() . 'admin/login');
	}
	
	function login_handler(){
		$params = $this->input->post();
		if($this->padiauth->log_in($params['user'],$params['password'])){
			redirect(base_url() . 'admin/categories');
		}else{
			redirect(base_url() . 'admin/login/fail');
		}
	}

	function change_password(){
		$params = $this->input->post();
		$this->padiauth->change_password_user_by_email($params['password'],$params['email']);
	}
	
	function check_login(){
		if(!$this->padiauth->is_logged_in()){
			redirect(base_url() . 'admin/login');
		}
	}
	
	function create_cuser(){
		$this->padiauth->create_custom_user('mafaaza','mafaaza','mafaaza@najma.web.id','admin');
	}
	
	function changepassword(){
		if(!$this->padiauth->change_password_user_by_email('najiyah','najiyah@najma.web.id')){
			echo "email not valid";
		}else{
			echo "change password success";
		}
	}

	function upload_image($uploaddir){
		//$uploaddir = './media/clients/';
		$file = $uploaddir . basename($_FILES['uploadfile']['name']);

		if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {
		  echo "success";
		} else {
			echo "error";
		}
	}

	function upload_tmp(){
		$uploaddir = './media/tmp/'; 
		$file = $uploaddir . basename($_FILES['uploadfile']['name']); 
		 
		if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
			echo "success"; 
		} else {
			echo "error";
		}		
	}
	function websetting(){
		$this->check_login();
		$objs = new Websetting();
		$objs->get();
		$data = array('objs'=>$objs);
		$this->load->view('admin/websetting',$data);		
	}
}
