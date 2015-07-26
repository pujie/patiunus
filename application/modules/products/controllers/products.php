<?php
class Products extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function get(){
		$params = $this->input->post();
		$obj = new Product();
		$obj->where('id',$params['id'])->get();
		echo '{"id":"'.$obj->id.'","name":"'.$obj->name.'","img":"'.$obj->img.'"}';
	}
	function getall(){
		$objs = new Product();
		$objs->get(1,10);
		$arr =array();
		foreach($objs as $obj){
			array_push($arr,'{"id":"'.$obj->id.'","name":"'.$obj->name.'","img":"'.$obj->img.'"}');
		}
		echo "[".implode(",",$arr) . "]";

	}
	function index(){
		echo 'test';
	}
	function remove(){
		$params = $this->input->post();
		$obj = new Product();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
		return $obj->check_last_query();
	}
	function save(){
		$params = $this->input->post();
		$obj = new Product();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function update(){
		$params = $this->input->post();
		$obj = new Product();
		$obj->where('id',$params['id'])->update($params);
		echo $obj->check_last_query();
	}
}
