<?php
class Common {

	var $obj;
	
	function daysbetween($start,$end){
		
		$date1 = explode('/',$start);
		$date2 = explode('/',$end);
		$dttm1 = date_create($date1[2]. '-' . $date1[1] . '-' . $date1[0]);
		$dttm2 = date_create($date2[2]. '-' . $date2[1] . '-' . $date2[0]);
		$diff = date_diff($dttm1,$dttm2);
		$tgl = $date1[0];
		$startdate = date("Y-m-d",mktime(0,0,0,$date1[1],$tgl,$date1[2]));
		$out = array();
		for($i=0;$i<=$diff->format("%a");$i++){
			$tmpdate = date("Y-m-d",mktime(0,0,0,$date1[1],$tgl+$i,$date1[2]));
			array_push($out, $tmpdate);
		}
		return $out;
	}
	
	function differenceInTimes($start, $end) {
	    if (strtotime($start)>strtotime($end)) {
	        //start date is later then end date
	        //end date is next day
	        $s = new DateTime($start);
	        $e = new DateTime($end);
	    } else {
	        //start date is earlier then end date
	        //same day
	        $s = new DateTime($start);
	        $e = new DateTime($end);
	    }
	
	    return date_diff($s, $e);
	}	

	function humanizetime($mytime){
	if($mytime->d==0){
		if($mytime->h==0){
			if($mytime->i<=30){
				return "< 30 menit";
			}else{
				return "30 menit - 1 jam";
			}
		}elseif($mytime->h==1){
			if($mytime->i==0){
				return "30 menit - 1 jam";
			}else{
				return "1 jam - 4 jam";
			}
		}elseif($mytime->h<=4){
				return "1 jam - 4 jam";
		}elseif($mytime->h<=23){
			return "4 jam - 24 jam";
		}
	}else{
		return "> 24 jam";
	}
	}
	
	function differenceInTimescopy($start, $end) {
	    if (strtotime($start)>strtotime($end)) {
	        //start date is later then end date
	        //end date is next day
	        $s = new DateTime('2000-01-01 '.$start);
	        $e = new DateTime('2000-01-02 '.$end);
	    } else {
	        //start date is earlier then end date
	        //same day
	        $s = new DateTime('2000-01-01 '.$start);
	        $e = new DateTime('2000-01-01 '.$end);
	    }
	
	    return date_diff($s, $e);
	}	
	
	function __construct(){
		$this->obj = & get_instance();
	}
	
	function check_is_install_folder_exist(){
		if(get_dir_file_info('./application/modules/install')){
			return true;
		}
		else 
		{
			return false;
		}
	}
	
	function remove_single_quote($string){
		return str_replace("'","''",$string);
	}
	
	function show_single_quote($string){
		return str_replace("''","'",$string);	
	}
	
	function thousand_separator($number=''){
		if($number==''){
		return '0.00';
		}
		$out='';
		$exploded = explode(".",$number);
		$k=0;
		for($c=strlen($exploded[0]);$c>=0;$c--){
			$out = substr($exploded[0],$c,1) . $out;
			if(($k%3==0) && ($k!=strlen($exploded[0]))&&($k!=0)){
				$out = ',' . $out;
			}
			$k++;
		}
		if(!empty($exploded[1])){
			$out.='.' . $exploded[1];
		}
		else 
		{
			$out.='.00';
		}
		return $out;
	}
	
	function de_decimalize($value){
		$output=$value;
		return str_replace(',','',$output);
	}
	
	function decimalize($value){
		return $value;
	}
	
	function sql_to_human_datetime($datetime){
		$datetimearray = explode(' ', $datetime);
		$date_array = explode('-',$datetimearray[0]);
		$output = $date_array[2] . '/' . $date_array[1] . '/' . $date_array[0] . ' ' . $datetimearray[1];
		return $output;
	}
	
	function sql_to_human_date($date,$separator='/'){
		$date_array = explode('-',$date);
		$output = $date_array[2] . $separator . $date_array[1] . $separator . $date_array[0];
		return $output;
	}
	
	function human_to_sql_date($date){
		$date_array = explode('/', $date);
		$output = $date_array[2] . '-' . $date_array[1] . '-' . $date_array[0];
		return $output;
	}
	
	function longhuman_to_sql_date($date){
		$longdate = explode(' ', $date);
		$date_array = explode('/', $longdate[0]);
		$output = $date_array[2] . '-' . $date_array[1] . '-' . $date_array[0] . ' ' . $longdate[1];
		return $output;
	}
	
	function longhuman_to_datepart($date){
		$longdate = explode(' ', $date);
		$date_array = explode('/', $longdate[0]);
		$time_array = explode(':', $longdate[1]);
		$output['year'] = $date_array[2];
		$output['month'] = $date_array[1];
		$output['day'] = $date_array[0];
		$output['hour'] = $time_array[2];
		$output['minute'] = $time_array[1];
		$output['second'] = $time_array[0];
		return $output;
	}
	
	function human_to_datepart($date){
		$date_array = explode('/', $date);
		echo 'Date : ' . $date;
		$output['year'] = $date_array[2];
		$output['month'] = $date_array[1];
		$output['day'] = $date_array[0];
		return $output;
		
	}
	
	function longsql_to_datepart($date){
		if ($date == NULL){
			$out['year'] = '';
			$out['month'] = '';
			$out['day'] = '';
			$out['hour'] = '';
			$out['minute'] = '';
			$out['second'] = '';
		}else{
			$array = explode(' ',$date);
			$datestring = explode('-',$array[0]);
			$out['year'] = $datestring[0];
			$out['month'] = $datestring[1];
			$out['day'] = $datestring[2];
			$timestring = explode(':', $array[1]);
			$out['hour'] = $timestring[0];
			$out['minute'] = $timestring[1];
			$out['second'] = $timestring[2];
		}
		return $out;
	}
	
	function longsql_to_human_date($date,$separator='/'){
		$date_array = explode(' ',$date);
		$array = explode('-',$date_array[0]);
		return $array[2] . $separator . $array[1] . $separator . $array[0];
	}
	
	function check_login(){
		if (!$this->obj->auth->is_logged_in()){
			redirect(base_url() . 'index.php/back_end/login');
		}
	}
	
	/*
	 * I 'VE MOVED THIS FUNCTION BELOW FROM BACK_END/CONTROLLERS/BACK_END.PHP 16 JAN 13
	 * */
	public function check_authentication(){
		if(!$this->auth->is_logged_in()){
			redirect(base_url() . 'index.php/back_end/login');
		}
		$user = new User();
		$user->where('id',$this->session->userdata['id'])->get();
		$user_info['username'] = $user->username;
		$user_info['group'] = $user->group->name;
		$this->user_info = $user_info;
	}
	
	/*
	 * I 'VE MOVED THIS FUNCTION BELOW FROM BACK_END/CONTROLLERS/BACK_END.PHP 16 JAN 13
	 * */
	function get_preferences(){
		if($this->auth->is_logged_in()){
			$this->preference = User::get_user_preferences($this->session->userdata['id']);
		}
	}

	/*
	 * I 'VE MOVED THIS FUNCTION BELOW FROM BACK_END/CONTROLLERS/BACK_END.PHP 16 JAN 13
	 * */
	function get_web_settings(){
		$out = array();
		$web_settings = new Web_setting();
		$web_settings->get();
		$out['theme'] = $web_settings->theme;
		$out['language'] = $web_settings->language;
		$out['footer_text'] = $web_settings->footer_text;
		return $out;
	}
	
	function give_dash($str){
		return str_ireplace(' ', '-', $str);
	}
	
	function check_messages(){
		$message = new Internal_message();
		$message->where('recipient',$this->session->userdata['id'])->or_where('recipient_group',User::get_group_id($this->session->userdata['id']))->where('hasread','0')->get();
		return $message->result_count();
	}
	
	function show_object($class,$view_data,$pagination,$column='name'){
		Common::check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$page_conf = $this->common->get_simple_pagination_conf($pagination);
		$obj = $class;
		
		$total = $obj->count();
		$segment = ($uri['page']=='')?0:$uri['page'];
		$obj->order_by($column,'asc')->get($page_conf['per_page'],$segment);
		$page_conf['total_rows'] = $total;
		$per_page = $page_conf['per_page'];
		$this->pagination->initialize($page_conf);
		$data = array(
			'view_data'=>$view_data,'segment'=>$segment,
			'objs'=>$obj,'total'=>$total,
			'page'=>($segment/$per_page)+1,
			'page_count'=>ceil($total/$per_page),'uri'=>$uri,'alertcount'=>Common::check_messages(),
		);
		$this->load->view('common/backendindex',$data);
		
	}
	
	function send_mail($recipient,$subject,$message){
		$config['smtp_host']='202.6.233.16';
		$config['smtp_port']='25';
		$config['protocol']='smtp';
		$config['mailtype']='html';
		$this->obj->email->initialize($config);
		$this->obj->email->from('puji@padi.net.id');
		$this->obj->email->to($recipient);
		$this->obj->email->subject($subject);
		$this->obj->email->message($message);
		$this->obj->email->send();
	}
	
	function get_years_array(){
		$out_array = array();
		for($c=2011;$c<=2022;$c++){
			for($x=strlen($c);$x<2;$x++){
				$c='0' . $c;
			}
			$out_array[$c] = $c;
		}
		return $out_array;
		
	}
	
	function get_months_array(){
		$out_array = array();
		for($c=1;$c<=12;$c++){
			for($x=strlen($c);$x<2;$x++){
				$c='0' . $c;
			}
			$out_array[$c] = $c;
		}
		return $out_array;
		
	}
	
	function get_hours_array(){
		$out_array = array();
		for($c=1;$c<=24;$c++){
			for($x=strlen($c);$x<2;$x++){
				$c='0' . $c;
			}
			$out_array[$c] = $c;
		}
		return $out_array;
	}
	
	function get_minutes_array($interfal=5){
		$out_array = array();
		$c=0;
		while ($c<60) {
			$c+=$interfal;
			for($x=strlen($c);$x<2;$x++){
				$c='0' . $c;
			}
			$out_array[$c]=$c;
		}
		return $out_array;
	}
	
	
	function get_month_name($month_index = '1'){
		switch ($month_index){
			case '1':
				$out = 'january';
				break;
			case '2':
				$out = 'february';
				break;
			case '3':
				$out = 'march';
				break;
			case '4':
				$out = 'april';
				break;
			case '5':
				$out = 'may';
				break;
			case '6':
				$out = 'june';
				break;
			case '7':
				$out = 'july';
				break;
			case '8':
				$out = 'august';
				break;
			case '9':
				$out = 'september';
				break;
			case '10':
				$out = 'october';
				break;
			case '11':
				$out = 'november';
				break;
			case '12':
				$out = 'december';
				break;
		}
		return $out;
	}
	
	function validate_url($key_array,$valid_url){
		$uri = $this->obj->uri->uri_to_assoc();
		$keys = array_keys($uri); 
		if($keys!=$key_array){
			redirect($valid_url);
		}
	}
	
	function unset_session(){
		$search_data = array(
		'property_type'=>'',
		'transaction_type'=>'',
		'min_price'=>'',
		'max_price'=>'',
		'alamat'=>'',
		'key'=>'',
		'city_parts'=>'',
		'lt'=>'',
		'lt_val'=>'',
		'lb'=>'',
		'lb_val'=>'',
		'key'=>'',
		'tingkat'=>'',
		'tingkat_val'=>'',
		'bedroom'=>'',
		'bedroom_val'=>'',
		'bathroom'=>'',
		'bathroom_val'=>'',
		'listrik'=>'',
		'listrik_val'=>'',
		'water_providers'=>'',
		'directions'=>'',
		'documents'=>'',
		);
		$this->obj->session->unset_userdata($search_data);
	}

	function get_property_data(){
		$out = array(
		'property_type'=>(isset($this->obj->session->userdata['property_type']))?$this->obj->session->userdata['property_type']:'Semua',
		'transaction_type'=>(isset($this->obj->session->userdata['transaction_type']))?$this->obj->session->userdata['transaction_type']:'Semua',
		'min_price'=>(isset($this->obj->session->userdata['min_price']))?$this->obj->session->userdata['min_price']:'0',
		'max_price'=>(isset($this->obj->session->userdata['max_price']))?$this->obj->session->userdata['max_price']:'0',
		'alamat'=>(isset($this->obj->session->userdata['alamat']))?$this->obj->session->userdata['alamat']:'',
		'key'=>(isset($this->obj->session->userdata['key']))?$this->obj->session->userdata['key']:'',
		'city'=>(isset($this->obj->session->userdata['city']))?$this->obj->session->userdata['city']:'',
		'city_part'=>(isset($this->obj->session->userdata['city_part']))?$this->obj->session->userdata['city_part']:'Semua',
		'lt'=>(isset($this->obj->session->userdata['lt']))?$this->obj->session->userdata['lt']:'>=',
		'lt_val'=>(isset($this->obj->session->userdata['lt_val']))?(($this->obj->session->userdata['lt_val']=='')?'0':$this->obj->session->userdata['lt_val']):'0',
		'lb'=>(isset($this->obj->session->userdata['lb_val']))?$this->obj->session->userdata['lb']:'>=',
		'lb_val'=>(isset($this->obj->session->userdata['lb_val']))?(($this->obj->session->userdata['lb_val']=='')?'0':$this->obj->session->userdata['lb_val']):'0',
		'key'=>(isset($this->obj->session->userdata['key']))?$this->obj->session->userdata['key']:'',
		'tingkat'=>(isset($this->obj->session->userdata['tingkat']))?$this->obj->session->userdata['tingkat']:'>=',
		'tingkat_val'=>(isset($this->obj->session->userdata['tingkat_val']))?$this->obj->session->userdata['tingkat_val']:'0',
		'bedroom'=>(isset($this->obj->session->userdata['bedroom']))?$this->obj->session->userdata['bedroom']:'>=',
		'bedroom_val'=>(isset($this->obj->session->userdata['bedroom_val']))?$this->obj->session->userdata['bedroom_val']:'0',
		'bathroom'=>(isset($this->obj->session->userdata['bathroom']))?$this->obj->session->userdata['bathroom']:'>=',
		'bathroom_val'=>(isset($this->obj->session->userdata['bathroom_val']))?$this->obj->session->userdata['bathroom_val']:'0',
		'listrik'=>(isset($this->obj->session->userdata['listrik']))?$this->obj->session->userdata['listrik']:'>=',
		'listrik_val'=>(isset($this->obj->session->userdata['listrik_val']))?$this->obj->session->userdata['listrik_val']:'0',
		'water_provider'=>(isset($this->obj->session->userdata['water_provider']))?$this->obj->session->userdata['water_provider']:'Semua',
		'directions'=>(isset($this->obj->session->userdata['directions']))?$this->obj->session->userdata['directions']:'Semua',
		'document'=>(isset($this->obj->session->userdata['document']))?$this->obj->session->userdata['document']:'Semua',
		'order1'=>' TGLMULAI ',
		'order2'=>'KOTA',
		'order3'=>'STATUS',
		'order1_value'=>'desc',
		'order2_value'=>'asc',
		'order3_value'=>'asc',
		'filter'=>(isset($this->obj->session->userdata['filter']))?$this->obj->session->userdata['filter']:'TGLMULAI',
		'metode-filter'=>(isset($this->obj->session->userdata['metode-filter']))?$this->obj->session->userdata['metode-filter']:'desc',
		);
		return $out;
	}
	
	function get_common_pagination_conf($base_url,$uri_segment,$per_page,$row_count){
		$pagination_conf['base_url'] = $base_url;
		$pagination_conf['per_page'] = $per_page;
		$pagination_conf['total_rows'] = $row_count;
		$pagination_conf['uri_segment'] = $uri_segment;
		$pagination_conf['cur_tag_open'] = ' | <strong>';
		$pagination_conf['cur_tag_close'] = '</strong> ';
		$pagination_conf['num_tag_open'] = ' | ';
		$pagination_conf['next_tag_open'] = ' | ';
		$pagination_conf['last_tag_open'] = ' | ';
		$pagination_conf['first_tag_close'] = ' | ';
		$pagination_conf['next_link'] = $this->obj->lang->line('next');
		$pagination_conf['prev_link'] = $this->obj->lang->line('prev');
		$pagination_conf['first_link'] = $this->obj->lang->line('first');
		$pagination_conf['last_link'] = $this->obj->lang->line('last');
		return $pagination_conf;
	}
	
	function get_simple_pagination_conf($module_name){
		$app_setting = new App_setting();
		$app_setting->where('module_name',$module_name)->get();
		$pagination_conf['base_url'] = base_url() . $app_setting->default_url;
		$pagination_conf['per_page'] = $app_setting->per_page;
		$pagination_conf['uri_segment'] = $app_setting->page_segment;
		$pagination_conf['cur_tag_open'] = ' | ';
		$pagination_conf['cur_tag_close'] = '</strong> ';
		$pagination_conf['num_tag_open'] = ' | ';
		$pagination_conf['next_tag_open'] = ' | ';
		$pagination_conf['last_tag_open'] = ' | ';
		$pagination_conf['first_tag_close'] = ' | ';
		$pagination_conf['next_link'] = $this->obj->lang->line('next');
		$pagination_conf['prev_link'] = $this->obj->lang->line('prev');
		$pagination_conf['first_link'] = $this->obj->lang->line('first');
		$pagination_conf['last_link'] = $this->obj->lang->line('last');
		return $pagination_conf;
	}
	
	function get_metode_filter(){
		$out = array('asc'=>'Ascending','desc'=>'Descending');
		return $out;
	}
	
	function get_filter(){
		$out = array('TGLMULAI'=>'Tanggal Update','HARGA'=>'Harga','KOTA'=>'Kota','LB'=>'Luas Bangunan');
		return $out;
	}

	function datestring1(){
		return  "Year: %Y Month: %m Day: %d - %h:%i %a";
	}
	
	function send_internal_message($params){
		$message = new Internal_message();
		$message->message_type = $params['message_type'];
		$message->obj_id = $params['obj_id'];
		$message->recipient = $params['recipient'];
		$message->recipient_group = $params['recipient_group'];
		$message->content = $params['content'];
		$message->proposed_date1 = $params['proposed_date1'];
		$message->proposed_date2 = $params['proposed_date2'];
		$message->followuplink = $params['followuplink'];
		$message->user_name = $this->session->userdata['username'];
		$message->save();
	}

	function get_btn_param($params){
		foreach($params as $key=>$val){
			if(substr($key, 0,3)=='btn'){
				return $key;
			}
		}
	}
}
