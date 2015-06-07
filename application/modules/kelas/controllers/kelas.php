<?php
class Kelas extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
		
	function splitsegment($n){
		$uri = $this->uri->segment($n);
		$array = explode("-", $uri);
		$out = array();
		$out['id']=array_shift($array);
		$out['text'] = implode("-",$array);
		return $out;
	}
	
	function index(){
		$idsegment = $this->splitsegment(2);
		$data = array(
		'title'=>$idsegment[1],
		'objs'=>Kelas::populate($idsegment[0]),
		);
		$this->load->view('kelas',$data);
	}
	
	function lists(){
		$idsegment = $this->splitsegment(3);
		$data = array(
		'title'=>$idsegment['text'],
		'objs'=>Kelas::populate(),
		);
		$this->load->view('lists',$data);
	}
	
	function nama(){
		$idsegment = $this->splitsegment(3);
		$data = array(
		'title'=>$idsegment['text'],
		'objs'=>Kelas::populate(),
		);
		$this->load->view('kelas',$data);
	}	
}
