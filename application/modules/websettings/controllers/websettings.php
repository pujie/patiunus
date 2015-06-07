<?php
class Websettings extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function save(){
		$params = $this->input->post();
		$obj = new Websetting();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}	
	function websetting_getRow(){
		$params = $this->input->post();
		$obj = new Websetting();
		$obj->where('id',$params['id'])->get();
		echo '{"webtitle":"'.$obj->webtitle.'","headertype":"'.$obj->headertype.'","shownewproducts":"'.$obj->shownewproducts.'","isdefault":"'.$obj->isdefault.'"}';
	}
	function update(){
		$params = $this->input->post();
		$obj = new Websetting(); 
		$obj->where('id',$params['id'])->update($params);
		echo $obj->check_last_query();
	}
}
