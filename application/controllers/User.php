<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
			$this->lang->load('user','english');
		}else{
			$this->lang->load('user','chinese');
		}
		$this->load->model('User_model');
  	}
  	
	public function index(){
		if(!$this->user_session->checklogin()){
			redirect('/','reload');
		}
		$this->load->view('dashboard');
	}
	
	public function rental($page = 1){
		if(!$this->user_session->checklogin()){
			redirect('/','reload');
		}
		$data['List'] = json_decode($this->User_model->getRentalList($this->tools->encode_pass($this->user_session->getuid(),"iceloof","decode",3600*24*7),$page),true);
		$data['TotalPage'] = $this->User_model->getRentalTotalPage($this->tools->encode_pass($this->user_session->getuid(),"iceloof","decode",3600*24*7));
		$data['page'] = $page;
		$this->load->view('rentalmanage',$data);
	}
	
	public function rentalAdd(){
		if(!$this->user_session->checklogin()){
			redirect('/','reload');
		}
		$data['cityList'] = $this->tools->cityList("New Zealand");
		$data['districtsList'] = $this->tools->districtsList("New Zealand",$data['cityList'][0]);
		$data['suburbList'] = $this->tools->suburbList($data['districtsList'][0]);
		$this->form_validation->set_rules('title', 'Title', 'required|max_length[50]');
		$this->form_validation->set_rules('phone', 'Phone', 'required|max_length[50]');
		$this->form_validation->set_rules('email', 'Email', 'required|max_length[50]|valid_email');
		$this->form_validation->set_rules('price', 'Price', 'required|is_natural');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('available', 'Available', 'required');
		$this->form_validation->set_rules('introduction', 'Introduction', 'required');
		$data['error'] = "";
		if ($this->form_validation->run() == FALSE){
        	$this->load->view('rentaladd',$data);
        }else{
        	$title = $this->input->post('title');
        	$phone = $this->input->post('phone');
        	$email = $this->input->post('email');
        	$city = $this->input->post('city');
        	$districts = $this->input->post('districts');
        	$suburbs = $this->input->post('suburbs');
        	$address = $this->input->post('address');
        	$price = $this->input->post('price');
        	$available = $this->input->post('available');
        	$bedroom = $this->input->post('bedroom');
        	$bathroom = $this->input->post('bathroom');
        	$parking = $this->input->post('parking');
        	$type = $this->input->post('type');
        	if($this->input->post('entire') == "on"){$entire = 1;}else{$entire = 0;};
        	if($this->input->post('kitchen') == "on"){$kitchen = 1;}else{$kitchen = 0;};
        	if($this->input->post('balcony') == "on"){$balcony = 1;}else{$balcony = 0;};
        	if($this->input->post('gym') == "on"){$gym = 1;}else{$gym = 0;};
        	if($this->input->post('pets') == "on"){$pets = 1;}else{$pets = 0;};
        	if($this->input->post('tv') == "on"){$tv = 1;}else{$tv = 0;};
        	if($this->input->post('microware') == "on"){$microware = 1;}else{$microware = 0;};
        	if($this->input->post('hob') == "on"){$hob = 1;}else{$hob = 0;};
        	if($this->input->post('oven') == "on"){$oven = 1;}else{$oven = 0;};
        	if($this->input->post('fridge') == "on"){$fridge = 1;}else{$fridge = 0;};
        	if($this->input->post('washmachine') == "on"){$washmachine = 1;}else{$washmachine = 0;};
        	if($this->input->post('dryer') == "on"){$dryer = 1;}else{$dryer = 0;};
        	if($this->input->post('dishwasher') == "on"){$dishwasher = 1;}else{$dishwasher = 0;};
        	if($this->input->post('heater') == "on"){$heater = 1;}else{$heater = 0;};
        	if($this->input->post('tables') == "on"){$tables = 1;}else{$tables = 0;};
        	if($this->input->post('beds') == "on"){$beds = 1;}else{$beds = 0;};
        	if($this->input->post('chairs') == "on"){$chairs = 1;}else{$chairs = 0;};
        	$introduction = $this->input->post('introduction');
        	$uid = $this->tools->encode_pass($this->user_session->getuid(),"iceloof","decode",3600*24*7);
        	$publisher = $this->user_session->getusername();
        	if($this->User_model->addRental($uid,$publisher,$phone,$email,$title,$city,$districts,$suburbs,$address,$price,$available,$bedroom,$bathroom,$parking,$type,$entire,$kitchen,$balcony,$gym,$pets,$tv,$microware,$hob,$oven,$fridge,$washmachine,$dryer,$dishwasher,$heater,$tables,$beds,$chairs,$introduction)){
	        	redirect('/user/rental','reload');
        	}else{
        		$data['error'] = "Add Failed! Try Again Later";
	        	$this->load->view('rentaladd',$data);
        	}
		}
	}
	
	public function rentalUpdate($id){
		if(!$this->user_session->checklogin()){
			redirect('/','reload');
		}
		if(!$this->User_model->checkRental($this->tools->encode_pass($this->user_session->getuid(),"iceloof","decode",3600*24*7),$id)){
			redirect('/user/rental','reload');
		}
		$data['id'] = $id;
		$data['detail'] = json_decode($this->User_model->getRentalDetail($this->tools->encode_pass($this->user_session->getuid(),"iceloof","decode",3600*24*7),$id),true);
		$data['cityList'] = $this->tools->cityList("New Zealand");
		$data['districtsList'] = $this->tools->districtsList("New Zealand",$data['detail']['city'] );
		$data['suburbList'] = $this->tools->suburbList($data['detail']['districts'] );
		$this->form_validation->set_rules('title', 'Title', 'required|max_length[50]');
		$this->form_validation->set_rules('phone', 'Phone', 'required|max_length[50]');
		$this->form_validation->set_rules('email', 'Email', 'required|max_length[50]|valid_email');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required|is_natural');
		$this->form_validation->set_rules('available', 'Available', 'required');
		$this->form_validation->set_rules('introduction', 'Introduction', 'required');
		$data['error'] = "";
		if(isset($_GET['error'])){
			if($_GET['error']==0){
				$data['error'] = "Delete Failed! Try Again Later";
			}
		}
		if ($this->form_validation->run() == FALSE){
        	$this->load->view('rentaledit',$data);
        }else{
        	$title = $this->input->post('title');
        	$phone = $this->input->post('phone');
        	$email = $this->input->post('email');
        	$city = $this->input->post('city');
        	$districts = $this->input->post('districts');
        	$suburbs = $this->input->post('suburbs');
        	$address = $this->input->post('address');
        	$price = $this->input->post('price');
        	$available = $this->input->post('available');
        	$bedroom = $this->input->post('bedroom');
        	$bathroom = $this->input->post('bathroom');
        	$parking = $this->input->post('parking');
        	$type = $this->input->post('type');
        	if($this->input->post('entire') == "on"){$entire = 1;}else{$entire = 0;};
        	if($this->input->post('kitchen') == "on"){$kitchen = 1;}else{$kitchen = 0;};
        	if($this->input->post('balcony') == "on"){$balcony = 1;}else{$balcony = 0;};
        	if($this->input->post('gym') == "on"){$gym = 1;}else{$gym = 0;};
        	if($this->input->post('pets') == "on"){$pets = 1;}else{$pets = 0;};
        	if($this->input->post('tv') == "on"){$tv = 1;}else{$tv = 0;};
        	if($this->input->post('microware') == "on"){$microware = 1;}else{$microware = 0;};
        	if($this->input->post('hob') == "on"){$hob = 1;}else{$hob = 0;};
        	if($this->input->post('oven') == "on"){$oven = 1;}else{$oven = 0;};
        	if($this->input->post('fridge') == "on"){$fridge = 1;}else{$fridge = 0;};
        	if($this->input->post('washmachine') == "on"){$washmachine = 1;}else{$washmachine = 0;};
        	if($this->input->post('dryer') == "on"){$dryer = 1;}else{$dryer = 0;};
        	if($this->input->post('dishwasher') == "on"){$dishwasher = 1;}else{$dishwasher = 0;};
        	if($this->input->post('heater') == "on"){$heater = 1;}else{$heater = 0;};
        	if($this->input->post('tables') == "on"){$tables = 1;}else{$tables = 0;};
        	if($this->input->post('beds') == "on"){$beds = 1;}else{$beds = 0;};
        	if($this->input->post('chairs') == "on"){$chairs = 1;}else{$chairs = 0;};
        	$introduction = $this->input->post('introduction');
        	$uid = $this->tools->encode_pass($this->user_session->getuid(),"iceloof","decode",3600*24*7);
        	$publisher = $this->user_session->getusername();
        	if($this->User_model->updateRental($uid,$id,$phone,$email,$title,$city,$districts,$suburbs,$address,$price,$available,$bedroom,$bathroom,$parking,$type,$entire,$kitchen,$balcony,$gym,$pets,$tv,$microware,$hob,$oven,$fridge,$washmachine,$dryer,$dishwasher,$heater,$tables,$beds,$chairs,$introduction)){
	        	redirect('/user/rental','reload');
        	}else{
        		$data['error'] = "Add Failed! Try Again Later";
	        	$this->load->view('rentaledit',$data);
        	}
		}
	}
	
	public function rentalDel($id){
		if(!$this->user_session->checklogin()){
			redirect('/','reload');
		}
		if($this->User_model->deleteRental($this->tools->encode_pass($this->user_session->getuid(),"iceloof","decode",3600*24*7),$id)){
			redirect('/user/rental','reload');
		}else{
			redirect('/user/rentalUpdate/'.$id.'?error=0','reload');
		}
	}
	
	public function register(){
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|callback_checkUser',array('checkUser' => 'This Username has already registered!'));
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('cpassword', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_checkEmail',array('checkEmail' => 'This Email has already registered!'));
		$this->form_validation->set_rules('phone', 'Phone', 'required|min_length[8]');
		$this->form_validation->set_rules('birth', 'Birthday', 'required');
		$data['countryCode'] = $this->tools->countryCode();
		$data['nationalityList'] = $this->tools->nationalityList();
		$data['countryList'] = $this->tools->countryList();
		$data['cityList'] = $this->tools->cityList($data['countryList'][0]);
		$data['districtsList'] = $this->tools->districtsList($data['countryList'][0],$data['cityList'][0]);
		if ($this->form_validation->run() == FALSE){
        	$this->load->view('register',$data);
        }else{
        	$username = $this->input->post('username');
        	$password = $this->input->post('password');
        	$email = $this->input->post('email');
        	$country_code = $this->input->post('country_code');
        	$phone = $this->input->post('phone');
        	$nationality = $this->input->post('nationality');
        	$birth = $this->input->post('birth');
        	$country = $this->input->post('country');
        	$city = $this->input->post('city');
        	$county = $this->input->post('county');
        	if($this->reg($username,$password,$email,$country_code,$phone,$nationality,$birth,$country,$city,$county)){
	        	$data['msg'] = "Register successfully!";
	        	$this->load->view('registerfinish',$data);
        	}else{
        		$data['msg'] = "Register failed!";
	        	$this->load->view('registerfinish',$data);
        	}
        }
	}
	
	public function auth(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		if($this->User_model->login($email, $password)){
			echo "true";
		}else{
			echo "false";
		}
	}
	
	public function logout(){
		$this->user_session->logout();
		redirect($this->session->userdata('last_visit'),'reload');
	}
	
	public function checkEmail($email){
		if($this->User_model->checkEmail($email)){
			return true;
		}else{
            return false;
		}
	}
	
	public function checkUser($user){
		if($this->User_model->checkUser($user)){
			return true;
		}else{
            return false;
		}
	}
	
	public function reg($username,$password,$email,$country_code,$phone,$nationality,$birth,$country,$city,$county){
		if($this->User_model->register($username,$password,$email,$country_code,$phone,$nationality,$birth,$country,$city,$county)){
			return true;
		}else{
			return false;
		}
	}
	
	public function getCity(){
		$country = $this->input->post('c');
		$cityList = $this->tools->cityList($country);
		echo json_encode($cityList);
	}
	
	public function getDistricts(){
		$country = $this->input->post('c1');
		$city = $this->input->post('c2');
		$districtsList = $this->tools->districtsList($country,$city);
		echo json_encode($districtsList);
	}
	
	public function getSuburbs(){
		$districts = $this->input->post('d');
		$suburbsList = $this->tools->suburbList($districts);
		echo json_encode($suburbsList);
	}
}
