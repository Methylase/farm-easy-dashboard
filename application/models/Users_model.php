<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function activate($data, $id){
		$this->db->where('admin.id', $id);
		return $this->db->update('users', $data);
	}


//Login Users
	public function validate($email,$password){
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$result = $this->db->get('users',1);
		return $result;
	}


	public function farmers(){

		if(in_array($this->session->userdata('user_type'),['1','2'])){
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://localhost:8000/api/all_farmers",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			));

			$response = curl_exec($curl);
			curl_close($curl);
			
			$result = json_decode($response, true);			
			$farmers = $result['data'];
			return $farmers;	
	
	
		}
	}


		public function all_agents()
	{
		if(in_array($this->session->userdata('user_type'),['1','2'])){
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://localhost:8000/aapi/all_agents",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			));

			$response = curl_exec($curl);
			curl_close($curl);
			
			$result = json_decode($response, true);			
			$agents = $result['data'];		
			return $agents;
		}
	}


}//class
