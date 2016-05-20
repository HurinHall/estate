<?php

class Estate_model extends CI_Model{

	public function __construct(){
		date_default_timezone_set("Pacific/Auckland");
	}
	
	public function getRentalPage($data){
		$DB = $this->load->database('estate', TRUE);
		$DB->select("id, title, available, city, districts, suburbs, price, bedroom, bathroom, parking, type");
		$DB->from('rental');
		$DB->where('city', $data['city']);
		if($data['districts']!="All"){
			$DB->where('districts', $data['districts']);
		}
		if($data['suburbs']!="All"&&$data['suburbs']!=""){
			$DB->where_in('suburbs', $data['suburbs']);
		}
		$DB->where('available >=', $data['available']);
		if($data['bedroom']!="Any"){
			$DB->where('bedroom', $data['bedroom']);
		}
		if($data['bathroom']!="Any"){
			$DB->where('bathroom', $data['bathroom']);
		}
		if($data['parking']!="Any"){
			$DB->where('parking', $data['parking']);
		}
		if($data['type']!="Any"){
			$DB->where('type', $data['type']);
		}
		if($data['optional']!=""){
			foreach($data['optional'] as $val) {
				$DB->where($val, 1);
    		}
		}
		$DB->where('price >=', $data['price'][0]);
		$DB->where('price <=', $data['price'][1]);
		$page = ceil($DB->count_all_results()/12);
		return $page;
	}
	
	public function getRentalList($data,$page){
		$DB = $this->load->database('estate', TRUE);
		$DB->select("id, title, available, city, districts, suburbs, price, bedroom, bathroom, parking, type");
		$DB->from('rental');
		$DB->where('city', $data['city']);
		if($data['districts']!="All"){
			$DB->where('districts', $data['districts']);
		}
		if($data['suburbs']!="All"&&$data['suburbs']!=""){
			$DB->where_in('suburbs', $data['suburbs']);
		}
		$DB->where('available >=', $data['available']);
		if($data['bedroom']!="Any"){
			$DB->where('bedroom', $data['bedroom']);
		}
		if($data['bathroom']!="Any"){
			$DB->where('bathroom', $data['bathroom']);
		}
		if($data['parking']!="Any"){
			$DB->where('parking', $data['parking']);
		}
		if($data['type']!="Any"){
			$DB->where('type', $data['type']);
		}
		if($data['optional']!=""){
			foreach($data['optional'] as $val) {
				$DB->where($val, 1);
    		}
		}
		$DB->where('price >=', $data['price'][0]);
		$DB->where('price <=', $data['price'][1]);
		$DB->limit(12, ($page-1)*12);
		if($data['order']=="latest"){
			$DB->order_by('date', 'DESC');
		}else if($data['order']=="available"){
			$DB->order_by('available', 'ASE');
		}else if($data['order']=="low"){
			$DB->order_by('price', 'ASE');
		}else if($data['order']=="high"){
			$DB->order_by('price', 'DESC');
		}
		$query = $DB->get();
		$array = array();
		foreach($query->result() as $row){
			$array[] = array(
									'id' => $row->id,
									'title' => $row->title,
									'available' => $row->available,
									'city' => $row->city,
									'districts' => $row->districts,
									'suburbs' => $row->suburbs,
									'price' => $row->price,
									'bedroom' => $row->bedroom,
									'bathroom' => $row->bathroom,
									'parking' => $row->parking,
									'type' => $row->type
								);
		}
		return json_encode($array);
	}
	
	public function getRentalDetail($id){
		$DB = $this->load->database('estate', TRUE);
		$DB->select();
		$DB->from('rental');
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
}