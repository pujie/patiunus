<?php
class Commodities extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function get(){
		$params = $this->input->post();
		$obj = new Commodity();
		$obj->where('id',$params['id'])->get();
		echo '{"id":"'.$obj->id.'","name":"'.$obj->name.'","image":"'.$obj->image.'"}';
	}
	function getall(){
		$objs = new Commodity();
		$objs->get(1,10);
		$arr =array();
		foreach($objs as $obj){
			array_push($arr,'{"id":"'.$obj->id.'","name":"'.$obj->name.'","img":"'.$obj->img.'"}');
		}
		echo "[".implode(",",$arr) . "]";

	}
	function getcategories(){
		$params = $this->input->post();
		$objs = new Commodity();
		$objs->where('ctype','0')->get();
		$out = array();
		$arr = array();
		foreach($objs as $obj){
			array_push($arr,'{"name":"'.$obj->name.'"}');
		}
		echo '['.implode(',',$arr).']';
	}
	function remove(){
		$params = $this->input->post();
		$obj = new Commodity();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
		return $obj->check_last_query();
	}
	function save(){
		$params = $this->input->post();
		$obj = new Commodity();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function update(){
		$params = $this->input->post();
		$obj = new Commodity();
		$obj->where('id',$params['id'])->update($params);
		echo $obj->check_last_query();
	}
}
