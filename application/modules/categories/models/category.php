<?php
class Category extends DataMapper{
	var $has_many = array(
		'member'=>array('class'=>'category','other_field'=>'category'),
		'category'=>array('class'=>'category','other_field'=>'member')
	);
	function __construct(){
		parent::__construct();
	}
	
	function populatekelas(){
		$obj = new Category();
		$obj->where_in('category_id',null)->get();
		return $obj;
	}
	
	function populateparents(){
		$obj = new Category();
		$obj->where('category_id',null)->where('istop','1')->where('active','1')->get();
		return $obj;
	}
	
	function getamount(){
		$obj = new Category();
		$obj->get();
		return $obj->result_count();
	}
	
	function getpackagings(){
		$obj = new Category();
		$obj->where('istop','0')->get();
		return $obj;
	}

	function getparent($id){
		$obj = new Category();
		$obj->where('id',$id)->where('active','1')->get();
		return $obj->category;
	}
	
	function getparents($id){
		$obj = new Category();
		$obj->where('id',$id)->where('active','1')->get();
		return $obj->category->member;
	}
	
	function getproduct($id){
		$obj = new Category();
		$obj->where_related('category','id',$id)->get();
		return $obj;
	}
	
	function getnewreleases(){
		$obj = new Category();
		$obj->where('isnewrelease','1')->get();
		return $obj;
	}

/*
 * from admin
 * */

	function populate(){
		$obj = new Category();
		$obj->get(20,0);
		return $obj;
	}
	function populatelimit($segment,$offset){
		$obj = new Category();
		$obj->get($offset,$segment);
		return $obj;
	}

	function add($params){
		$obj = new Category();
		foreach($params as $key=>$val){
			if($key!='save'){
				$obj->$key = $val;
			}
		}
		$obj->save();
	}
	
	function edit($params){
		$obj = new Category();
		unset($params['save']);
		$obj->where('id',$params['id'])->update($params);
	}
	
	function getcategory($id){
		$obj = new Category();
		$obj->where('id',$id)->get();
		return $obj;
	}
	
	function set_active($id,$active){
		$obj = new Category();
		$obj->where('id',$id)->update(array('active'=>'0'));
	}

}
