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
		$data['cityList'] = $this->tools->cityList("New Zealand");
		$data['districtsList'] = $this->tools->districtsList("New Zealand",$data['cityList'][0]);
		$data['suburbList'] = $this->tools->suburbList($data['districtsList'][0]);
		$data_array = array('city'=>'Auckland','districts'=>'All','suburbs'=>'','available'=>date("m/d/Y"),'bedroom'=>'Any','bathroom'=>'Any','parking'=>'Any','type'=>'Any','optional'=>'','price'=>array(200,600),'order'=>'latest');
		$data['defaultList'] = json_decode($this->Estate_model->getRentalList($data_array,1),true);
		$data['page'] = $this->Estate_model->getRentalPage($data_array);
		$this->load->view('rental',$data);
	}
	
	public function rentalDetail(){
		if(!isset($_GET['id'])||$_GET['id']==0){
			redirect('/rental','reload');
		}
		$data['detail'] = json_decode($this->Estate_model->getRentalDetail($_GET['id']),true);
		if(empty($data['detail'])){
			redirect('/rental','reload');
		}
		$this->load->view('rentaldetail',$data);
	}
	
	public function search(){
		$city = $this->input->post('city');
		$districts = $this->input->post('districts');
		$suburbs = $this->input->post('suburbs');
		$available = $this->input->post('available');
		$bedroom = $this->input->post('bedroom');
		$bathroom = $this->input->post('bathroom');
		$parking = $this->input->post('parking');
		$type = $this->input->post('type');
		$optional = $this->input->post('optional');
		$price = $this->input->post('price');
		$page = $this->input->post('page');
		$order = $this->input->post('order');
		$data_array = array('city'=>$city,'districts'=>$districts,'suburbs'=>$suburbs,'available'=>$available,'bedroom'=>$bedroom,'bathroom'=>$bathroom,'parking'=>$parking,'type'=>$type,'optional'=>$optional,'price'=>$price,'order'=>$order);
		echo $this->Estate_model->getRentalList($data_array,$page);
	}
	
	public function searchPage(){
		$city = $this->input->post('city');
		$districts = $this->input->post('districts');
		$suburbs = $this->input->post('suburbs');
		$available = $this->input->post('available');
		$bedroom = $this->input->post('bedroom');
		$bathroom = $this->input->post('bathroom');
		$parking = $this->input->post('parking');
		$type = $this->input->post('type');
		$optional = $this->input->post('optional');
		$price = $this->input->post('price');
		$data_array = array('city'=>$city,'districts'=>$districts,'suburbs'=>$suburbs,'available'=>$available,'bedroom'=>$bedroom,'bathroom'=>$bathroom,'parking'=>$parking,'type'=>$type,'optional'=>$optional,'price'=>$price);
		echo $this->Estate_model->getRentalPage($data_array);
	}
}
