<?php
class Categories extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function get(){
		$params = $this->input->post();
		$obj = new Category();
		$obj->where('id',$params['id'])->get();
		echo '{"id":"'.$obj->id.'","name":"'.$obj->name.'","image":"'.$obj->image.'","isgallery":"'.$obj->isgallery.'","isnewrelease":"'.$obj->isnewrelease.'","istop":"'.$obj->isnewrelease.'","sellingprice":"'.$obj->sellingprice.'","alterprice":"'.$obj->alterprice.'","active":"'.$obj->active.'"}';
	}
	function getall(){
		$objs = new Category();
		$objs->get(1,10);
		$arr =array();
		foreach($objs as $obj){
			array_push($arr,'{"id":"'.$obj->id.'","name":"'.$obj->name.'","image":"'.$obj->image.'"}');
		}
		echo "[".implode(",",$arr) . "]";

	}
	function update(){
		$params = $this->input->post();
		$obj = new Category();
		$obj->where('id',$params['id'])->update($params);
		echo $obj->check_last_query();
	}
	function remove(){
		$params = $this->input->post();
		$obj = new Category();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
		return $obj->check_last_query();
	}
	function save(){
		$params = $this->input->post();
		$obj = new Category();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
}
