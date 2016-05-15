<?php 
/**
* User session
* @category	Library
* @author Hurin Hall <hurin@live.ca>
* @copyright Copyright (c) 2015, Hurin Hall
* @version 1.0
* @link	http://iceloof.com
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class User_session {
        
    protected $CI;
    
    public function __construct(){
    	//assign the CodeIgniter object to a variable
    	$this->CI =& get_instance();
    	$this->CI->load->library('user_agent');
    	
    	//set url record
    	if(!isset($_SESSION['this_visit'])){
	    	$_SESSION['this_visit'] = "//".$_SERVER['SERVER_NAME']."".$_SERVER['REQUEST_URI'];
    	}else{
    		$_SESSION['last_visit'] = $_SESSION['this_visit'];
	    	$_SESSION['this_visit'] = "//".$_SERVER['SERVER_NAME']."".$_SERVER['REQUEST_URI'];
    	}
    	
    	//set session id
        if(!isset($_SESSION['session_id']) || $_SESSION['session_id'] != session_id()){ 
  			$_SESSION['session_id'] = session_id(); 
  		}
  		
    	//set last_active time
        if(!isset($_SESSION['last_active']) || (time() - $_SESSION['last_active']) > 600){ 
  			$_SESSION['last_active'] = time(); 
  		}
  		
  		//set user_agent
  		if(!isset($_SESSION['user_agent']) || ($_SESSION['user_agent'] != $this->CI->agent->platform())){
  			$_SESSION['user_agent'] = $this->CI->agent->platform();	
  		}
  		
  		//set user ip address
  		if(!isset($_SESSION['ip_address']) || ($_SESSION['ip_address'] != $_SERVER['REMOTE_ADDR'])){
  			$_SESSION['ip_address'] = $_SERVER['REMOTE_ADDR'];	
  		}
  		
  		//set default device type to PC
  		if(!isset($_SESSION['device']) && !$this->CI->agent->is_mobile()){
  			$this->setPC();
  		}
  		
  		//set default device type to mobile
  		if(!isset($_SESSION['device']) && $this->CI->agent->is_mobile()){
  			$this->setmobile();
  		}
  		
  		//set default language
  		if(!isset($_SESSION['lang'])){
  			if(!isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
	  			$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
  			}else{
	  			$lang = "en";
  			}
  			if($lang == "zh"){
  				$_SESSION['lang'] = "zh";
  			}else{
  				$_SESSION['lang'] = "en";
  			}
  		}
    }
    
    //set device to mobile type
    public function setmobile(){
    	$_SESSION['device'] = "mobile";
    }
    
    //set device to PC
    public function setPC(){
    	$_SESSION['device'] = "PC";
    }
    
    //set language
    public function setLang($lang){
    	if($lang == "zh"){
  			$_SESSION['lang'] = "zh";
  		}else{
  			$_SESSION['lang'] = "en";
  		}
    }
    
    //record session data to database
    public function RecordtoDB(){
    	date_default_timezone_set("Pacific/Auckland");
    	if((time()-$this->getlastactivity())>300){
    		//load database and select data
    		$this->CI->db->reconnect();
    		$this->CI->db->select('uid');
    		$this->CI->db->where('uid', $this->CI->tools->encode_pass($_SESSION['uid'],"iceloof","decode",3600*24*7)); 
    		$query = $this->CI->db->get('session');
		
    		//if data exist then update data, else insert
    		if($query->num_rows()>0){
				$data = array(
					'user_agent' => $_SESSION['user_agent'],
					'ip_address' => $_SESSION['ip_address'],
					'device' => $_SESSION['device'],
					'lang' => $_SESSION['lang'],
					'last_active' => $_SESSION['last_active']
				);
				$this->CI->db->where('uid', $this->CI->tools->encode_pass($_SESSION['uid'],"iceloof","decode",3600*24*7));
				$this->CI->db->update('session', $data); 
			}else{
				$data = array(
					'uid' => $this->CI->tools->encode_pass($_SESSION['uid'],"iceloof","decode",3600*24*7),
					'user_agent' => $_SESSION['user_agent'],
					'ip_address' => $_SESSION['ip_address'],
					'device' => $_SESSION['device'],
					'lang' => $_SESSION['lang'],
					'last_active' => $_SESSION['last_active']
				);
				$this->CI->db->set($data);
				$this->CI->db->insert('session');
			}
			$this->CI->db->select('unreadnotification,unreadinbox,unreadcomment');
			$this->CI->db->from('user_member_msg');
			$this->CI->db->where("`uid`='".$this->CI->tools->encode_pass($_SESSION['uid'],"iceloof","decode",3600*24*7)."'");
			$query = $this->CI->db->get();
			$row = $query->row();
			$data = array(
		    			'unreadnotification' => $row->unreadnotification,
		    			'unreadinbox' => $row->unreadinbox,
		    			'unreadcomment' => $row->unreadcomment
		    			);
		    $this->CI->session->set_userdata($data);
		}
    }
    
    //set login
    public function setlogin($uid){
    	$_SESSION['logged_in'] = TRUE;
	    $_SESSION['uid'] = $uid;
    }
    
    //check login
    public function checklogin(){
	    if(isset($_SESSION['logged_in'])){
		    if($_SESSION['logged_in']){
		    	$this->CI->load->model('User_model');
		    	if($this->CI->User_model->checkAccessToken($this->CI->User_model->AccessToken())){
			    	$this->CI->User_model->refreshAccess($this->CI->User_model->AccessToken(), $this->CI->User_model->refeshToken());
			    	return true;
		    	}else{
		    		$this->logout();
			    	return false;
		    	}
		    }else{
			    return false;
		    }
	    }else{
		    return false;
	    }
    }
    
    //set logout
    public function logout(){
	    $_SESSION['logged_in'] = FALSE;
		unset($_SESSION['uid']);
		unset($_SESSION['user']);
		unset($_SESSION['last_active']);
		unset($_SESSION['last_visit']);
		unset($_SESSION['this_visit']);
    }
    
    //check language
    public function checklang(){
	    return $_SESSION['lang'];
    }
        
    //get lastactivity
    public function getlastactivity(){
		return $_SESSION['last_active'];    
    }
    
    //get uid
    public function getuid(){
		return $_SESSION['uid'];    
    }
    
    //get username
    public function getusername(){
		return $_SESSION['user'];    
    }
    
    //get profile pic
    public function getavatar(){
	    return $_SESSION['avatar'];
    }
    
    //get name
    public function getname(){
		return $_SESSION['name'];    
    }
    
    //get getunreadnotification
    public function getunreadnotification(){
	    return $_SESSION['unreadnotification'];
    }
    
    //get getunreadinbox
    public function getunreadinbox(){
	    return $_SESSION['unreadinbox'];
    }
    
    //get getunreadcomment
    public function getunreadcomment(){
	    return $_SESSION['unreadcomment'];
    }
    
    public function notification(){
	    return $_SESSION['unreadnotification']+$_SESSION['unreadinbox']+$_SESSION['unreadcomment'];
    }
}
?>