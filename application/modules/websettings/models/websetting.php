<?php
class Websetting extends DataMapper{
	var $has_one = array('group');
	function __construct(){
		parent::__construct();
	}
	function add($params){
		$obj = new Websetting();
		foreach($params as $key=>$val){
			if($key!='save'){
				$obj->$key = $val;
			}
		}
		$obj->save();
	}
	
	function edit($params){
		$obj = new Websetting();
		unset($params['save']);
		$obj->where('id',$params['id'])->update($params);
	}
	
	function getuser($id){
		$obj = new Websetting();
		$obj->where('id',$id)->get();
		return $obj;
	}
	
	function populate(){
		$obj = new Websetting();
		$obj->get();
		return $obj;
	}	
}
