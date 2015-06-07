<?php
class Group extends DataMapper{
	var $has_many = array('user','group_preference');
	function __construct(){
		parent::__construct();
	}
	
	function get_groups(){
		$groups = new Group();
		$groups->get();
		$out = array();
		foreach ($groups as $group){
			$out[$group->id] = $group->name;
		}
		return $out;
	}
}
