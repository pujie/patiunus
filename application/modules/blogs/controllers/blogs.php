<?php
class Blogs extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	
	function getjson(){
		$id = $this->uri->segment(3);
		$obj = Blog::getblog($id);
		echo '{"id":"'.$obj->id.'","subject":"'.$obj->subject.'"}';
	}
	
	function index(){
		
	}
	
	function show(){
		$id = $this->uri->segment(3);
		$data = array('obj'=>Blog::getblog($id));
		$this->load->view('blog',$data);
	} 
}