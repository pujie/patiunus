<?php
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function index(){
		$product = new Category();
		$product->where('ctype','1')->get();
		$websetting = new Websetting();
		$websetting->where("isdefault","1")->get();
		$data = array(
			'products'=>$product,
			'websetting'=>$websetting
		);
		$this->load->view('home',$data);
	}
	function allgetproducts(){
		$segment = $this->uri->segment(4);
		$offset = $this->uri->segment(3);
		$products = new Category();
		$products->where('ctype','1')->get($segment,$offset);
		$arr = array();
		foreach($products as $product){
			array_push($arr,'{"name":"'.$product->name.'","sellingprice":"'.$product->sellingprice.'","alterprice":"'.$product->alterprice.'","image":"'.$product->image.'"}');
		}
		echo '['.implode(",",$arr).']';
	}
	function getproducts(){
		$segment = $this->uri->segment(4);
		$offset = $this->uri->segment(3);
		$products = new Category();
		$products->where('ctype','1')->get($segment,$offset);
		$arr = array();
		foreach($products as $product){
			array_push($arr,'{"name":"'.$product->name.'","sellingprice":"'.$product->sellingprice.'","alterprice":"'.$product->alterprice.'","image":"'.$product->image.'"}');
		}
		echo '['.implode(",",$arr).']';
	}
}
