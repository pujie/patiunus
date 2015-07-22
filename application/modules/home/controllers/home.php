<?php
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	
	function contact(){
		$data = array('kelases'=>Dmkelas::populate(0,25));
		$this->load->view('contact',$data);
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
	function getnewrelease(){
		$products = new Category();
		$products->where('ctype','1')->get();
		$arr = array();
		foreach($products as $product){
			array_push($arr,'{"name":"'.$product->name.'","sellingprice":"'.$product->sellingprice.'","image":"'.$product->image.'"}');
		}
		echo '['.implode(",",$arr).']';		
	}
	function getvideo(){
		 $path = base_url() . 'media/tvc.mp4';
		 if (file_exists($path)){
			$size=filesize($path);
			$fm=@fopen($path,'rb');
			if(!$fm) {
			// You can also redirect here
				header ("HTTP/1.0 404 Not Found");
				die();
			}
			 $begin=0;
			 $end=$size;
			 if(isset($_SERVER['HTTP_RANGE'])) {
			 if(preg_match('/bytes=\h*(\d+)-(\d*)[\D.*]?/i',   
			 $_SERVER['HTTP_RANGE'],$matches)){
			 $begin=intval($matches[0]);
			 if(!empty($matches[1])) {
			 $end=intval($matches[1]);
			 }
		 }
		 }
		 if($begin>0||$end<$size)
		 header('HTTP/1.0 206 Partial Content');
		 else
		 header('HTTP/1.0 200 OK');
		 header("Content-Type: video/mp4");
		 header('Accept-Ranges: bytes');
		 header('Content-Length:'.($end-$begin));
		 header("Content-Disposition: inline;");
		 header("Content-Range: bytes $begin-$end/$size");
		 header("Content-Transfer-Encoding: binary\n");
		 header('Connection: close');
		 $cur=$begin;
		 fseek($fm,$begin,0);
		 while(!feof($fm)&&$cur<$end&&(connection_status()==0))
		 { print fread($fm,min(1024*16,$end-$cur));
		 $cur+=1024*16;
		 usleep(1000);
		 }
		 die();
		 }
 
	}
}
