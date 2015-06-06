<?php if(!defined('BASEPATH')) exit ('No direct access script allowed');
class Padiauth{
	public function __construct(){
		$this->CI = & get_instance();
	}
	public function change_password_user_by_email($password, $email){
		$query = $this->CI->db->select('id,username')
		->get_where('users',array('email'=>$email));
		if($query->num_rows() !== 1){
			return false;
		}
		$id = $query->row('id');
		$salt = sha1(random_string('alnum',32));
		$password = sha1($password.$salt);
		$this->CI->db->where('id',$id)
		->set(array('password'=>$password,'salt'=>$salt))
		->update('users');
	}
	public function create_custom_user($username, $password, $email, $group){
		$query = $this->CI->db->where('username',$username)
		->or_where('email',$email)
		->get('users');
		if($query->num_rows() !==0){
			return false;
		}
		$salt = sha1(random_string('alnum',32));
		$password = sha1($password.$salt);
		$data = array(
			'username'=>$username,
			'password'=>$password,
			'email'=>$email,
			'group_id'=>$group,
			'username'=>$username,
		);
		$this->CI->db->insert('users',$data);
		return $this->CI->db->insert_id();
	}
	public function is_logged_in(){
		if(!$this->CI->session->userdata('id')){
			return false;
		}
		return true;
	}
	public function log_in($username,$password){
		$query = $this->CI->db->select('id, username, email, password, salt')->where('username',$username)->get('users');
		if($query->num_rows()!==1){
			return false;
		}
		if(sha1($password.$query->row('salt'))==$query->row('password')){
			$data = array(
				'id'=>$query->row('id'),
				'username'=>$query->row('username'),
				'salt'=>$query->row('salt'),
				'email'=>$query->row('email'),
			);
			$this->CI->session->set_userdata($data);
			return $query->row('id');
		}
		return false;
	}
	public function logout($redirect){
		$this->CI->session->sess_destroy();
		redirect($redirect);
	}
}
