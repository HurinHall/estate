<?php

class Estate_model extends CI_Model{

	public function __construct(){
		$DB = $this->load->database('estate', TRUE);
		date_default_timezone_set("Pacific/Auckland");
	}

}