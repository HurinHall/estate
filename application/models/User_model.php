<?php

class User_model extends CI_Model{
	
	public function __construct(){
		$this->db->reconnect();
		date_default_timezone_set("Pacific/Auckland");
	}
	
	public function checkEmail($email){
		$this->db->select();
		$this->db->from('user_member');
		$this->db->where('email', $email);
		$query = $this->db->get();
		if($query->num_rows() == 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function checkUser($username){
		$this->db->select();
		$this->db->from('user_profile');
		$this->db->where('username', $username);
		$query = $this->db->get();
		if($query->num_rows() == 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function  register($username,$password,$email,$country_code,$phone,$nationality,$birth,$country,$city,$county){
		$salt = rand(1,9).rand(0,9).rand(0,9).rand(0,9);
		$data = array(
        	'uid' => null,
        	'email' => $email,
        	'password' => md5(md5($password).$salt),
        	'salt' => $salt
        );
        $this->db->insert('user_member', $data);
        if($this->db->affected_rows()!=1){
	        return false;
        }
        $this->db->select('uid');
        $this->db->from('user_member');
        $this->db->where('email', $email);
        $query = $this->db->get();
        if($query->num_rows() == 0){
			return false;
		}else{
			$row = $query->row(0);
			$uid = $row->uid;
			$data = array(
	        	'uid' => $uid,
	        	'username' => $username,
	        	'pic' => "img/profile/default.png",
	        	'country_code' => $country_code,
	        	'phone' => $phone,
	        	'birth' => $birth,
	        	'location_country' => $country,
	        	'location_city' => $city,
	        	'location_county' => $county,
	        	'nationality' => $nationality
        	);
        	$this->db->insert('user_profile', $data);
        	if($this->db->affected_rows()!=1){
	        	return false;
	        }else{
	        	$data = array(
	        		'uid' => $uid,
	        		'unreadnotification' => 0,
	        		'unreadinbox' => 0,
	        		'unreadcomment' => 0
	        	);
	        	$this->db->insert('user_member_msg', $data);
	        	if($this->db->affected_rows()!=1){
	        		return false;
	        	}else{
		        	return true;
	        	}
	        }
		}
	}
	
	public function login($email, $password){
		$this->db->select('uid, password, salt');
		$this->db->from('user_member');
		$this->db->where('email', $email);
		$query = $this->db->get();
		if($query->num_rows() == 0){
			return false;
		}else{
			$row = $query->row(0);
			$pwd = $row->password;
			$salt = $row->salt;
			if(md5(md5($password).$salt) == $pwd){
				$accesstoken = $this->tools->encode_pass($row->uid,"iceloof","encode",3600*24*7);
				$refreshtoken = $this->tools->encode_pass(time()+3600*24*7,"iceloof","encode",3600*24*7);
				$this->session->set_userdata('accesstoken', $accesstoken);
				$this->session->set_userdata('refreshtoken', $refreshtoken);
				$this->user_session->setlogin($accesstoken);
				$this->db->select("username");
				$this->db->from('user_profile');
				$this->db->where('uid', $row->uid);
				$query = $this->db->get();
				$row = $query->row(0);
				$_SESSION['user'] = $row->username;
				$_SESSION['last_active'] = time()-310;
				return true;
			}else{
				return false;
			}
		}
	}
	
	public function AccessToken(){
		return $this->session->userdata('accesstoken');
	}
	
	public function refeshToken(){
		return $this->session->userdata('refreshtoken');
	}
	
	public function checkAccessToken($accessToken){
		$uid = $this->tools->encode_pass($accessToken,"iceloof","decode",3600*24*7);
		if($uid != ""){
			return true;
		}else{
			return false;
		}
	}
	
	public function refreshAccess($accessToken, $refreshToken){
		$refresh = $this->tools->encode_pass($refreshToken,"iceloof","decode",3600*24*7);
		if($refreshToken > time()){
			$uid = $this->tools->encode_pass($accessToken,"iceloof","decode",3600*24*7);
			$accesstoken = $this->tools->encode_pass($uid,"iceloof","encode",3600*24*7);
			$refreshtoken = $this->tools->encode_pass(time()+3600*24*7,"iceloof","encode",3600*24*7);	
			$this->session->set_userdata('accesstoken', $accesstoken);
			$this->session->set_userdata('refreshtoken', $refreshtoken);
			return true;
		}else{
			return false;
		}
	}
	
	public function getRentalList($uid, $page){
		$DB = $this->load->database('estate', TRUE);
		$DB->select("id, title, date");
		$DB->from('rental');
		$DB->where('uid', $uid);
		$DB->limit(10, ($page-1)*10);
		$DB->order_by('date', 'DESC');
		$DB->order_by('id', 'DESC');
		$query = $DB->get();
		$array = array();
		foreach($query->result() as $row){
			$array[] = array(
									'id' => $row->id,
									'title' => $row->title,
									'date' => $row->date
								);
		}
		return json_encode($array);
	}
	
	public function getRentalTotalPage($uid){
		$DB = $this->load->database('estate', TRUE);
		$DB->select();
		$DB->from('rental');
		$DB->where('uid', $uid);
		$num = $DB->count_all_results();
		$num = ceil($num/10);
		return $num;
	}
	
	public function getRentalDetail($uid, $id){
		$DB = $this->load->database('estate', TRUE);
		$DB->select();
		$DB->from('rental');
		$DB->where('uid', $uid);
		$DB->where('id', $id);
		$query = $DB->get();
		foreach($query->result() as $row){
			$array = array(
								'phone' => $row->phone,
								'email' => $row->email,
								'title' => $row->title,
								'date' => $row->date,
								'city' => $row->city,
								'districts' => $row->districts,
								'suburbs' => $row->suburbs,
								'address' => $row->address,
								'price' => $row->price,
								'available' => $row->available,
								'bedroom' => $row->bedroom,
								'bathroom' => $row->bathroom,
								'parking' => $row->parking,
								'type' => $row->type,
								'entire' => $row->entire,
								'kitchen' => $row->kitchen,
								'balcony' => $row->balcony,
								'gym' => $row->gym,
								'pets' => $row->pets,
								'tv' => $row->tv,
								'microware' => $row->microware,
								'hob' => $row->hob,
								'oven' => $row->oven,
								'fridge' => $row->fridge,
								'washmachine' => $row->washmachine,
								'dryer' => $row->dryer,
								'dishwasher' => $row->dishwasher,
								'heater' => $row->heater,
								'tables' => $row->tables,
								'beds' => $row->beds,
								'chairs' => $row->chairs,
								'introduction' => $row->introduction
							);
		}
		return json_encode($array);
	}
	
	public function addRental($uid,$publisher,$phone,$email,$title,$city,$districts,$suburbs,$address,$price,$available,$bedroom,$bathroom,$parking,$type,$entire,$kitchen,$balcony,$gym,$pets,$tv,$microware,$hob,$oven,$fridge,$washmachine,$dryer,$dishwasher,$heater,$tables,$beds,$chairs,$introduction){
		$DB = $this->load->database('estate', TRUE);
		$data = array(
							'id' => null,
							'uid' => $uid,
							'publisher' => $publisher,
							'phone' => $phone,
							'email' => $email,
							'title' => $title,
							'date' => date("m/d/Y"),
							'city' => $city,
							'districts' => $districts,
							'suburbs' => $suburbs,
							'address' => $address,
							'price' => $price,
							'available' => $available,
							'bedroom' => $bedroom,
							'bathroom' => $bathroom,
							'parking' => $parking,
							'type' => $type,
							'entire' => $entire,
							'kitchen' => $kitchen,
							'balcony' => $balcony,
							'gym' => $gym,
							'pets' => $pets,
							'tv' => $tv,
							'microware' => $microware,
							'hob' => $hob,
							'oven' => $oven,
							'fridge' => $fridge,
							'washmachine' => $washmachine,
							'dryer' => $dryer,
							'dishwasher' => $dishwasher,
							'heater' => $heater,
							'tables' => $tables,
							'beds' => $beds,
							'chairs' => $chairs,
							'introduction' => $introduction
						);
		$DB->insert('rental', $data);
		if($DB->affected_rows()!=1){
			$id = $DB->insert_id();
			$data = array(
								'id' => $id,
								'visit' => 0
							);
			$DB->insert('rental_view', $data);
	    	return false;
	    }else{
	    	return true;    
	    }
	}
	
	public function updateRental($uid,$id,$phone,$email,$title,$city,$districts,$suburbs,$address,$price,$available,$bedroom,$bathroom,$parking,$type,$entire,$kitchen,$balcony,$gym,$pets,$tv,$microware,$hob,$oven,$fridge,$washmachine,$dryer,$dishwasher,$heater,$tables,$beds,$chairs,$introduction){
		$DB = $this->load->database('estate', TRUE);
		$data = array(
							'phone' => $phone,
							'email' => $email,
							'title' => $title,
							'date' => date("m/d/Y"),
							'city' => $city,
							'districts' => $districts,
							'suburbs' => $suburbs,
							'address' => $address,
							'price' => $price,
							'available' => $available,
							'bedroom' => $bedroom,
							'bathroom' => $bathroom,
							'parking' => $parking,
							'type' => $type,
							'entire' => $entire,
							'kitchen' => $kitchen,
							'balcony' => $balcony,
							'gym' => $gym,
							'pets' => $pets,
							'tv' => $tv,
							'microware' => $microware,
							'hob' => $hob,
							'oven' => $oven,
							'fridge' => $fridge,
							'washmachine' => $washmachine,
							'dryer' => $dryer,
							'dishwasher' => $dishwasher,
							'heater' => $heater,
							'tables' => $tables,
							'beds' => $beds,
							'chairs' => $chairs,
							'introduction' => $introduction
						);
		$DB->where('uid', $uid);
		$DB->where('id', $id);
		$DB->update('rental', $data);
		if($DB->affected_rows()!=1){
	    	return false;
	    }else{
	    	return true;    
	    }
	}
	
	public function deleteRental($uid,$id){
		$DB = $this->load->database('estate', TRUE);
		$DB->where('uid', $uid);
		$DB->where('id', $id);
		$DB->delete('rental');
		if($DB->affected_rows()!=1){
	    	return false;
	    }else{
	    	return true;    
	    }
	}

	public function checkRental($uid,$id){
		$DB = $this->load->database('estate', TRUE);
		$DB->select();
		$DB->from('rental');
		$DB->where('uid', $uid);
		$DB->where('id', $id);
		if($DB->count_all_results()==0){
			return false;
		}else{
			return true;
		}
	}
}