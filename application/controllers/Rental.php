<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rental extends CI_Controller {

	public function __construct(){
    	parent::__construct();

    	//if change device type
		if(isset($_GET['device'])){
			if($_GET['device'] == "mobile"){
				$this->user_session->setmobile();
			}else if($_GET['device'] == "PC"){
				$this->user_session->setPC();
			}
		}
		
		//if change language
		if(isset($_GET['lang'])){
			$this->user_session->setLang($_GET['lang']);
		}
		
		//if user login, record information to database
		if($this->user_session->checklogin()){
			$this->user_session->RecordtoDB();
		}
		
		if($this->session->userdata('lang') == "en"){
			$this->lang->load('estate','english');
		}else{
			$this->lang->load('estate','chinese');
		}
		$this->load->model('Estate_model');
  	}
  	
	public function index(){
		$this->load->view('rental');
	}
}
