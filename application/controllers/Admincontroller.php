<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admincontroller extends CI_Controller {

	/**
	
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->database();
	
	}

	public function superadmin()
	{
		if($this->session->userdata('user_type')=== '1'){
			$curl = curl_init();
			curl_setopt_array($curl, array(
			
			CURLOPT_URL => "http://fme.riceafrika.com/api/all_request",
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
			if(isset($result['success'])){
				$requests = $result['data'];


				$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => "http://fme.riceafrika.com/api/all_service_providers",
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
				if(isset($result['data'])){
					$service_providers = $result['data'];
				}else{
					$service_providers = '';
				}

				$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => "http://fme.riceafrika.com/api/all_agents",
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
				if(isset($result['data'])){
					$agents = $result['data'];
				}else{
					$agents = '';
				}


				$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => "http://fme.riceafrika.com/api/all_farmers",
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
				if(isset($result['data'])){
					$farmers = $result['data'];
				}else{
					$farmers = '';
				}

				$this->load->view('includes/head');
				$this->load->view('includes/header');
				$this->load->view('pages/superadmin', ["requests"=>$requests, "service_providers"=>$service_providers, "agents"=>$agents, "farmers"=>$farmers]);
				$this->load->view('includes/footer');
			}

		 }else{
			redirect('/');						
		 }
			
    }

    public function admin()
	{

		 if($this->session->userdata('user_type')=== '2'){
			$country = $this->session->userdata('country');
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/all_request_by_country?country=".$country,
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

			if(isset($result['success'])){
				$requests = $result['data'];

				$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => "http://fme.riceafrika.com/api/service_providers_by_country?country=".$country,
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
				if(isset($result['data'])){
					$service_providers = $result['data'];
				}else{
					$service_providers = '';
				}

				$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => "http://fme.riceafrika.com/api/all_agents_by_country?country=".$country,
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
				if(isset($result['data'])){
					$agents = $result['data'];

				}else{
					$agents = '';
				}
				$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => "http://fme.riceafrika.com/api/all_farmers_by_country?country=".$country,
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
				if(isset($result['data'])){
					$farmers = $result['data'];
				}else{
					$farmers = '';
				}

				$this->load->view('includes/head');
				$this->load->view('includes/header');
				$this->load->view('pages/admin', ["requests"=>$requests, "service_providers"=>$service_providers, "agents"=>$agents, "farmers"=>$farmers]);
				$this->load->view('includes/footer');
			}
		}else{
			redirect('/');			
		}
	
	}

	public function get_service_price(){
		if($this->session->userdata('user_type') == '1'){
			$data = array(
				'sp_id' => $this->input->post('sp_id', TRUE),
				'service_type'=> $this->input->post('service_type', TRUE)
				
			);

			$curl = curl_init("http://fme.riceafrika.com/api/get_service_price");
			curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl,CURLOPT_SSL_VERIFYPEER ,false);
			curl_setopt($curl,CURLOPT_POSTFIELDS ,$data);

			$response = curl_exec($curl);
			curl_close($curl);
            echo $response;
		}else if($this->session->userdata('user_type') == '2'){
			$data = array(
				'sp_id' => $this->input->post('sp_id', TRUE),
				'service_type'=> $this->input->post('service_type', TRUE)
			);
				$curl = curl_init("http://fme.riceafrika.com/api/get_service_price");
				curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl,CURLOPT_SSL_VERIFYPEER ,false);
				curl_setopt($curl,CURLOPT_POSTFIELDS ,$data);
	
				$response = curl_exec($curl);
				curl_close($curl);
				echo $response;
		}else{
			redirect('/');			
		}
	}

	public function update_set_service_price(){
		if($_SERVER['REQUEST_METHOD'] =='POST'){
			$data = array(
				'sp_id' => $this->input->post('sp_id', TRUE),
				'service_type'=> $this->input->post('service_type', TRUE),
				'amount'=> $this->input->post('amount', TRUE)
			);

			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/update_set_service_price",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_POSTFIELDS => http_build_query($data),
			CURLOPT_CUSTOMREQUEST => "PUT"
			));  
			$response = curl_exec($curl);
			curl_close($curl);
			echo $response;
		}else{
			redirect('/');			
		}
	}

	public function change_service_type(){
		if($_SERVER['REQUEST_METHOD'] =='POST'){
			$data = array(
				'sp_id' => $this->input->post('sp_id', TRUE),
				'service_type'=> $this->input->post('service_type', TRUE)
			);

			$curl = curl_init("http://fme.riceafrika.com/api/change_service_type");
			curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl,CURLOPT_SSL_VERIFYPEER ,false);
			curl_setopt($curl,CURLOPT_POSTFIELDS ,$data);
			
			$response = curl_exec($curl);
			curl_close($curl);
			echo $response;
		}else{
			redirect('/');			
		}
	}	


	public function create_request()
	{
		if(in_array($this->session->userdata('user_type'),['1','2'])){

			if($_SERVER['REQUEST_METHOD'] =='POST'){
				$name = $this->input->post('name', TRUE);
				$service_type = $this->input->post('service_type', TRUE);
				$checkbox =  implode(",",$_POST['farm_type']);
				$data = array(
					'name'=> $this->input->post('name', TRUE),
					'service_type' => $this->input->post('service_type', TRUE),
					'phone' => $this->input->post('phone', TRUE),
					'location'=> $this->input->post('location', TRUE),
					'farm_type'=> $checkbox,
					'user_id' =>$this->session->userdata('user_type'),
					'country' =>$this->session->userdata('country'),
				);
	
				
				$curl = curl_init("http://fme.riceafrika.com/api/admin_request");
				curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl,CURLOPT_SSL_VERIFYPEER ,false);
				curl_setopt($curl,CURLOPT_POSTFIELDS ,$data);
	
	
				$response = curl_exec($curl);
				curl_close($curl);
				$result = json_decode($response, true);
				if($result['success']){
					echo $this->session->set_flashdata('msg_success', 'You have successfully made '.strtolower($service_type).' service request for '.strtolower($name));
					return  redirect('create-request');
				}else{
					echo $this->session->set_flashdata('msg_danger', 'Ooop something Went wrong, try again later');
					return  redirect('create-request');
				}
			}else{
				$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => "http://fme.riceafrika.com/api/services",
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
				if(isset($result['success'])){
					if(isset($result['data'])){
						$service_types = $result['data'];
					}else{
						$service_types = '';
					}
	
	
					$curl = curl_init();
					curl_setopt_array($curl, array(
					CURLOPT_URL => "http://fme.riceafrika.com/api/all_service_providers",
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
					if(isset($result['data'])){
						$service_providers = $result['data'];
					}else{
						$service_providers = '';
					}
	
					$curl = curl_init();
					curl_setopt_array($curl, array(
					CURLOPT_URL => "http://fme.riceafrika.com/api/all_agents",
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
					if(isset($result['data'])){
						$agents = $result['data'];
					}else{
						$agents = '';
					}
	
					$this->load->view('includes/head');
					$this->load->view('includes/header');
					$this->load->view('pages/create-request', ["service_types"=>$service_types, "service_providers"=>$service_providers, "agents"=>$agents]);
					$this->load->view('includes/footer');
			}


			}
		}else{
			redirect('/');			
		}
	
	}
	public function all_requests()
	{
		if($this->session->userdata('user_type') == '1'){
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/all_request",
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
			if(isset($result['success'])){
				$requests = $result['data'];


				$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => "http://fme.riceafrika.com/api/all_service_providers",
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
				$service_providers = $result['data'];

				$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => "http://fme.riceafrika.com/api/all_agents",
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


				$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => "http://fme.riceafrika.com/api/all_farmers",
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

				$this->load->view('includes/head');
				$this->load->view('includes/header');
				$this->load->view('pages/all_requests', ["requests"=>$requests, "service_providers"=>$service_providers, "agents"=>$agents, "farmers"=>$farmers]);
				$this->load->view('includes/footer');
			}
		}else if($this->session->userdata('user_type') == '2'){
			$country = $this->session->userdata('country');
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/all_request_by_country?country=".$country,
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
			if(isset($result['success'])){
				$requests = $result['data'];

				$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => "http://fme.riceafrika.com/api/service_providers_by_country?country=".$country,
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
				$service_providers = $result['data'];

				$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => "http://fme.riceafrika.com/api/all_agents_by_country?country=".$country,
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

				$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => "http://fme.riceafrika.com/api/all_farmers_by_country?country=".$country,
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

				$this->load->view('includes/head');
				$this->load->view('includes/header');
				$this->load->view('pages/all_requests', ["requests"=>$requests, "service_providers"=>$service_providers, "agents"=>$agents, "farmers"=>$farmers]);
				$this->load->view('includes/footer');
			}
		}else{
			redirect('/');			
		}
	
	}	

	public function service_providers()
	{
		if($this->session->userdata('user_type') == '1'){
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/all_service_providers",
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
			if(isset($result['data'])){
				$service_providers = $result['data'];
			}else{
				$service_providers = '';
			}	
	
			$this->load->view('includes/head');
			$this->load->view('includes/header');
			$this->load->view('pages/service-providers', ["service_providers"=>$service_providers]);
			$this->load->view('includes/footer');
		}else if($this->session->userdata('user_type') == '2'){
			$country =$this->session->userdata('country');
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/service_providers_by_country?country=".$country,
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
				if(isset($result['data'])){
					$service_providers = $result['data'];
				}else{
					$service_providers = '';
				}
	
			$this->load->view('includes/head');
			$this->load->view('includes/header');
			$this->load->view('pages/service-providers', ["service_providers"=>$service_providers]);
			$this->load->view('includes/footer');

		}else{
			redirect('/');			
		}
	}



public function all_users()
	{
		if($this->session->userdata('user_type') =='1'){
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/all_users",
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
			$users = $result['data'];	

	
			$this->load->view('includes/head');
			$this->load->view('includes/header');
			$this->load->view('pages/all_users', ["users"=>$users]);
			$this->load->view('includes/footer');
		}else if($this->session->userdata('user_type') == '2'){
			$country =$this->session->userdata('country');
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/all_users_by_country?country=".$country,
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
			$users = $result['data'];	

	
			$this->load->view('includes/head');
			$this->load->view('includes/header');
			$this->load->view('pages/all_users', ["users"=>$users]);
			$this->load->view('includes/footer');			

		}else{
			redirect('/');			
		}
	}



	public function user($id)
	{
		if(in_array($this->session->userdata('user_type'),['1','2'])){

			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/edit_user?id=".$id,
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
			if($result['success']){
				$user = $result['data'];	
				$this->load->view('includes/head');
				$this->load->view('includes/header');
				$this->load->view('pages/user', ["user"=>$user]);
				$this->load->view('includes/footer');				
			}else{
				$this->logout();
				
			}	

			
		}else{
			redirect('/');			
		}
	}

	public function update_user()
	{
		if(in_array($this->session->userdata('user_type'),['1','2'])){

			if($_SERVER['REQUEST_METHOD'] =='POST'){
				$name = $this->input->post('name', TRUE);
				$status = $this->input->post('status', TRUE);
				$id = $this->input->post('id', TRUE);
				$data = array(
					'name'=> $this->input->post('name', TRUE),
					'status'=> $this->input->post('status', TRUE),
					'id'=> $this->input->post('id', TRUE),
				);
	
				
				$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => "http://fme.riceafrika.com/api/update_user",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_POSTFIELDS => http_build_query($data),
				CURLOPT_CUSTOMREQUEST => "PUT"
				));  
	
	
				$response = curl_exec($curl);
				curl_close($curl);
				$result = json_decode($response, true);
				if($result['success']){
					echo $this->session->set_flashdata('msg_success', 'You have successfully edited '.strtolower($name));
					redirect(base_url('user/'.$id));
				}else{
					echo $this->session->set_flashdata('msg_danger', 'Ooop something Went wrong, try again later');
					redirect(base_url('user/'.$id));
				}
			}else{
				$this->load->view('includes/head');
				$this->load->view('includes/header');
				$this->load->view('pages/user');
				$this->load->view('includes/footer');				
			}

		}else{
			redirect('/');			
		}
	}



	public function farmers()
	{
		if($this->session->userdata('user_type') =='1'){
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/all_farmers",
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

	
			$this->load->view('includes/head');
			$this->load->view('includes/header');
			$this->load->view('pages/farmers', ["farmers"=>$farmers]);
			$this->load->view('includes/footer');
		}else if($this->session->userdata('user_type') == '2'){
			$country =$this->session->userdata('country');
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/all_farmers_by_country?country=".$country,
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

	
			$this->load->view('includes/head');
			$this->load->view('includes/header');
			$this->load->view('pages/farmers', ["farmers"=>$farmers]);
			$this->load->view('includes/footer');			
		}else{
			redirect('/');			
		}
	}

	public function agents()
	{
		if($this->session->userdata('user_type') == '1'){


			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/all_agents",
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

			$this->load->view('includes/head');
			$this->load->view('includes/header');
			$this->load->view('pages/agents', ["agents"=>$agents]);
			$this->load->view('includes/footer');
		}else if($this->session->userdata('user_type') == '2'){
			$country =$this->session->userdata('country');
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/all_agents_by_country?country=".$country,
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

			$this->load->view('includes/head');
			$this->load->view('includes/header');
			$this->load->view('pages/agents', ["agents"=>$agents]);
			$this->load->view('includes/footer');
		}else{
			redirect('/');			
		}
	}


	public function become_agent()
	{
		if(in_array($this->session->userdata('user_type'),['1','2'])){
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/all_become_agent",
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
			$becomagent = $result['data'];		
			$this->load->view('includes/head');
			$this->load->view('includes/header');
			$this->load->view('pages/become-agent', ["becomeagent"=>$becomagent]);
			$this->load->view('includes/footer');
		}else{
			redirect('/');			
		}
	}


	public function create_agent()
	{
		if(in_array($this->session->userdata('user_type'),['1','2'])){

			if($_SERVER['REQUEST_METHOD'] =='POST'){
				$name = $this->input->post('name', TRUE);
				$data = array(
					'name'=> $this->input->post('name', TRUE),
					'country'=> $this->input->post('country', TRUE),
					'phone' => $this->input->post('phone', TRUE)
				);
	
				
				$curl = curl_init("http://fme.riceafrika.com/api/agent");
				curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl,CURLOPT_SSL_VERIFYPEER ,false);
				curl_setopt($curl,CURLOPT_POSTFIELDS ,$data);
	
	
				$response = curl_exec($curl);
				curl_close($curl);
				$result = json_decode($response, true);
				if($result['success']){
					echo $this->session->set_flashdata('msg_success', 'You have successfully created '.strtolower($name).' as an agent');
					return  redirect('create-agent');
				}else{
					echo $this->session->set_flashdata('msg_danger', 'Ooop something Went wrong, try again later');
					return  redirect('create-agent');
				}
			}else{
				$this->load->view('includes/head');
				$this->load->view('includes/header');
				$this->load->view('pages/create-agent');
				$this->load->view('includes/footer');				
			}

		}else{
			redirect('/');			
		}
	}

	public function payments()
	{
		if($this->session->userdata('user_type') == '1'){
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/all_payments",
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
			$payments = $result['data'];		
			$this->load->view('includes/head');
			$this->load->view('includes/header');
			$this->load->view('pages/payments', ["payments"=>$payments]);
			$this->load->view('includes/footer');
		}else if($this->session->userdata('user_type') == '2'){
			$country =$this->session->userdata('country');
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/all_payments_by_country?country=".$country,
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
			$payments = $result['data'];

			$this->load->view('includes/head');
			$this->load->view('includes/header');
			$this->load->view('pages/payments', ["payments"=>$payments]);
			$this->load->view('includes/footer');			
		}else{
			redirect('/');			
		}
	}

	public function add_farm_type()
	{
		if(in_array($this->session->userdata('user_type'),['1','2'])){

			if($_SERVER['REQUEST_METHOD'] =='POST'){
				$name = $this->input->post('name', TRUE);
				$status = $this->input->post('status', TRUE);
				$data = array(
					'farm'=> $this->input->post('name', TRUE),
					'status'=> $this->input->post('status', TRUE)

				);
	
				
				$curl = curl_init("http://fme.riceafrika.com/api/add_farm_type");
				curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl,CURLOPT_SSL_VERIFYPEER ,false);
				curl_setopt($curl,CURLOPT_POSTFIELDS ,$data);
	
	
				$response = curl_exec($curl);
				curl_close($curl);
				$result = json_decode($response, true);
				if($result['success']){
					echo $this->session->set_flashdata('msg_success', 'You have successfully added '.strtolower($name).' as a new farm type');
					return  redirect('add-farm-type');
				}else{
					echo $this->session->set_flashdata('msg_danger', 'Ooop something Went wrong, try again later');
					return  redirect('add-farm-type');
				}
			}else{
				$this->load->view('includes/head');
				$this->load->view('includes/header');
				$this->load->view('pages/add-farm-type');
				$this->load->view('includes/footer');				
			}

		}else{
			redirect('/');			
		}
	}
	
	public function farm_types()
	{
		if(in_array($this->session->userdata('user_type'),['1','2'])){
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/all_farm_types",
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
			$farm_types = $result['data'];		
			$this->load->view('includes/head');
			$this->load->view('includes/header');
			$this->load->view('pages/farm-types', ["farm_types"=>$farm_types]);
			$this->load->view('includes/footer');
		}else{
			redirect('/');			
		}
	}

	public function farm_type($id)
	{
		if(in_array($this->session->userdata('user_type'),['1','2'])){

			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/edit_farm_type?farm_type_id=".$id,
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
			if($result['success']){
				$farm_type = $result['data'];	
				$this->load->view('includes/head');
				$this->load->view('includes/header');
				$this->load->view('pages/farm-type', ["farm_type"=>$farm_type]);
				$this->load->view('includes/footer');				
			}else{
				$this->logout();
				
			}	

		}else{
			redirect('/');			
		}
	}

	public function update_farm_type()
	{
		if(in_array($this->session->userdata('user_type'),['1','2'])){

			if($_SERVER['REQUEST_METHOD'] =='POST'){
				$name = $this->input->post('name', TRUE);
				$status = $this->input->post('status', TRUE);
				$id = $this->input->post('id', TRUE);
				$data = array(
					'farm'=> $this->input->post('name', TRUE),
					'status'=> $this->input->post('status', TRUE),
					'farm_type_id'=> $this->input->post('id', TRUE),
				);
	
				
				$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => "http://fme.riceafrika.com/api/update_farm_type",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_POSTFIELDS => http_build_query($data),
				CURLOPT_CUSTOMREQUEST => "PUT"
				));  
	
	
				$response = curl_exec($curl);
				curl_close($curl);
				$result = json_decode($response, true);
				if($result['success']){
					echo $this->session->set_flashdata('msg_success', 'You have successfully edited '.strtolower($name).' as a farm type');
					redirect(base_url('farm-type/'.$id));
				}else{
					echo $this->session->set_flashdata('msg_danger', 'Ooop something Went wrong, try again later');
					redirect(base_url('farm-type/'.$id));
				}
			}else{
				$this->load->view('includes/head');
				$this->load->view('includes/header');
				$this->load->view('pages/farm-types');
				$this->load->view('includes/footer');				
			}

		}else{
			redirect('/');			
		}
	}


	public function add_service_type()
	{
		if(in_array($this->session->userdata('user_type'),['1','2'])){

			if($_SERVER['REQUEST_METHOD'] =='POST'){
				$name = $this->input->post('service', TRUE);
				$data = array(
					'service'=> $this->input->post('service', TRUE),
				);
	
				
				$curl = curl_init("http://fme.riceafrika.com/api/add_service_type");
				curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl,CURLOPT_SSL_VERIFYPEER ,false);
				curl_setopt($curl,CURLOPT_POSTFIELDS ,$data);
	
	
				$response = curl_exec($curl);
				curl_close($curl);
				$result = json_decode($response, true);
				if($result['success']){
					echo $this->session->set_flashdata('msg_success', 'You have successfully added '.strtolower($name).' as a new service type');
					return  redirect('add-service-type');
				}else{
					echo $this->session->set_flashdata('msg_danger', 'Ooop something Went wrong, try again later');
					return  redirect('add-service-type');
				}
			}else{
				$this->load->view('includes/head');
				$this->load->view('includes/header');
				$this->load->view('pages/add-service-type');
				$this->load->view('includes/footer');				
			}

		}else{
			redirect('/');			
		}
	}
	public function service_types()
	{
		if(in_array($this->session->userdata('user_type'),['1','2'])){
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/services",
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
			$service_types = $result['data'];		
			$this->load->view('includes/head');
			$this->load->view('includes/header');
			$this->load->view('pages/service-types', ["service_types"=>$service_types]);
			$this->load->view('includes/footer');
		}else{
			redirect('/');			
		}
	}	

	public function service_type($id)
	{
		if(in_array($this->session->userdata('user_type'),['1','2'])){
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/edit_service_type?service_type_id=".$id,
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
			if($result['success']){
				$service_type = $result['data'];
				$this->load->view('includes/head');
				$this->load->view('includes/header');
				$this->load->view('pages/service-type', ["service_type"=>$service_type]);
				$this->load->view('includes/footer');				
			}else{
				$this->logout();
				
			}				
			
		}else{
			redirect('/');			
		}
	}

	public function update_service_type()
	{
		if(in_array($this->session->userdata('user_type'),['1','2'])){

			if($_SERVER['REQUEST_METHOD'] =='POST'){
				$name = $this->input->post('name', TRUE);
				$id = $this->input->post('id', TRUE);
				$data = array(
					'service'=> $this->input->post('name', TRUE),
					'service_type_id'=> $this->input->post('id', TRUE),
				);
	
				
				$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => "http://fme.riceafrika.com/api/update_service_type",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_POSTFIELDS => http_build_query($data),
				CURLOPT_CUSTOMREQUEST => "PUT"
				));  
	
	
				$response = curl_exec($curl);
				curl_close($curl);
				$result = json_decode($response, true);
				if($result['success']){
					echo $this->session->set_flashdata('msg_success', 'You have successfully edited '.strtolower($name).' as a service type');
					redirect(base_url('service-type/'.$id));
				}else{
					echo $this->session->set_flashdata('msg_danger', 'Ooop something Went wrong, try again later');
					redirect(base_url('service-type/'.$id));
				}
			}else{
				$this->load->view('includes/head');
				$this->load->view('includes/header');
				$this->load->view('pages/service-types');
				$this->load->view('includes/footer');				
			}

		}else{
			redirect('/');			
		}
	}	

	public function set_service_type_price()
	{

		if($this->session->userdata('user_type') == '1'){
			if($_SERVER['REQUEST_METHOD'] =='POST'){
			
				$data = array(
					'service_type_id'=> $this->input->post('service_type_id', TRUE),
					'sp_id'=> $this->input->post('sp_id', TRUE),
					'price' => $this->input->post('price', TRUE),
					'country'=> $this->input->post('country', TRUE)
					
				);
	
				$curl = curl_init("http://fme.riceafrika.com/api/set_price");
				curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl,CURLOPT_SSL_VERIFYPEER ,false);
				curl_setopt($curl,CURLOPT_POSTFIELDS ,$data);
	
	
				$response = curl_exec($curl);

				curl_close($curl);
				$result = json_decode($response, true);


				if($result['success']){
					echo $this->session->set_flashdata('msg_success', 'You have successfully set price for the service provider');
					return  redirect('set-service-price');
				}else{
					echo $this->session->set_flashdata('msg_danger', 'Ooop something Went wrong, try again later');
					return  redirect('set-service-price');
				}
			

			}else{

				$country = $this->session->userdata('country');
				$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => "http://fme.riceafrika.com/api/all_service_providers",
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
				$service_providers = $result['data'];	
	
	
				$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => "http://fme.riceafrika.com/api/services",
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
				$service_types = $result['data'];			
	
				$this->load->view('includes/head');
				$this->load->view('includes/header');
				$this->load->view('pages/set-service-price', ["service_providers"=>$service_providers, "service_types"=>$service_types]);
				$this->load->view('includes/footer');	
			}
		}else if($this->session->userdata('user_type') == '2'){

			if($_SERVER['REQUEST_METHOD'] =='POST'){
			
				$data = array(
					'service_type_id'=> $this->input->post('service_type_id', TRUE),
					'sp_id'=> $this->input->post('sp_id', TRUE),
					'price' => $this->input->post('price', TRUE),
					'country'=> $this->input->post('country', TRUE)
					
				);
	
				$curl = curl_init("http://fme.riceafrika.com/api/set_price");
				curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl,CURLOPT_SSL_VERIFYPEER ,false);
				curl_setopt($curl,CURLOPT_POSTFIELDS ,$data);
	
	
				$response = curl_exec($curl);

				curl_close($curl);
				$result = json_decode($response, true);


				if($result['success']){
					echo $this->session->set_flashdata('msg_success', 'You have successfully set price for the service provider');
					return  redirect('set-service-price');
				}else{
					echo $this->session->set_flashdata('msg_danger', 'Ooop something Went wrong, try again later');
					return  redirect('set-service-price');
				}
			

			}else{

				$country = $this->session->userdata('country');
				$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => "http://fme.riceafrika.com/api/set_service_providers_by_country?country=".$country,
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
				$service_providers = $result['data'];	
	
	
				$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => "http://fme.riceafrika.com/api/services",
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
				$service_types = $result['data'];			
	
				$this->load->view('includes/head');
				$this->load->view('includes/header');
				$this->load->view('pages/set-service-price', ["service_providers"=>$service_providers, "service_types"=>$service_types]);
				$this->load->view('includes/footer');	
			}

		}else{
			redirect('/');			
		}
	}

	public function get_all_service_type_price()
	{

		if($this->session->userdata('user_type') == '1'){

			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/all_service_providers",
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
			if(isset($result['data'])){
				$service_providers = $result['data'];
			}else{
				$service_providers = '';
			}



			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/prices",
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
			$prices = $result['data'];	

			$this->load->view('includes/head');
			$this->load->view('includes/header');
			//$this->load->view('pages/all_servicetype_prices', ["prices"=>$prices]);
			$this->load->view('pages/all_servicetype_prices', ["service_providers"=>$service_providers]);
			$this->load->view('includes/footer');
		}else if($this->session->userdata('user_type') == '2'){
			$country = $this->session->userdata('country');			
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/service_providers_by_country?country=".$country,
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
			if(isset($result['data'])){
				$service_providers = $result['data'];
			}else{
				$service_providers = '';
			}

			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/prices_by_country?country=".$country,
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
			$prices = $result['data'];	

			$this->load->view('includes/head');
			$this->load->view('includes/header');
			//$this->load->view('pages/all_servicetype_prices', ["prices"=>$prices]);
			$this->load->view('pages/all_servicetype_prices', ["service_providers"=>$service_providers]);
			$this->load->view('includes/footer');

		}else{
			redirect('/');			
		}
	}
	public function edit_service_type_price($id)
	{

		if(in_array($this->session->userdata('user_type'),['1','2'])){
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://fme.riceafrika.com/api/price?price_id=".$id,
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
			if($result['success']){
				$price = $result['data'];
				$this->load->view('includes/head');
				$this->load->view('includes/header');
				$this->load->view('pages/service-price', ["price"=>$price]);
				$this->load->view('includes/footer');				
			}else{
				$this->logout();
			}		

		}else{
			redirect('/');			
		}
	}

	public function update_service_type_price()
	{
		if(in_array($this->session->userdata('user_type'),['1','2'])){

			if($this->session->userdata('country') == "NG"){
				$symbol = '&#x20A6 ';			
			}else if($this->session->userdata('country') =="TZ"){
				$symbol = '&#xa5; ';	
			}
			if($_SERVER['REQUEST_METHOD'] =='POST'){
				$name = $this->input->post('name', TRUE);
				$price = $this->input->post('price', TRUE);
				$id = $this->input->post('id', TRUE);
				$data = array(
					'price'=> $this->input->post('price', TRUE),
					'price_id'=> $this->input->post('id', TRUE),
				);
	
				
				$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => "http://fme.riceafrika.com/api/update_price",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_POSTFIELDS => http_build_query($data),
				CURLOPT_CUSTOMREQUEST => "PUT"
				));  
	
	
				$response = curl_exec($curl);
				curl_close($curl);
				$result = json_decode($response, true);
				if($result['success']){
					echo $this->session->set_flashdata('msg_success', 'You have successfully edited price of service type '.strtolower($name).' to '.$symbol.number_format($price,2 ));
					redirect(base_url('service-price/'.$id));
				}else{
					echo $this->session->set_flashdata('msg_danger', 'Ooop something Went wrong, try again later');
					redirect(base_url('service-price/'.$id));
				}
			}else{
				$this->load->view('includes/head');
				$this->load->view('includes/header');
				$this->load->view('pages/all_servicetype-prices');
				$this->load->view('includes/footer');				
			}

		}else{
			redirect('/');			
		}
	}		

	public function settings(){

		if($this->session->userdata('user_type') == '1'){
			$data = array(
				'sp_id' => $this->input->post('sp_id', TRUE),
				'privilege'=> $this->input->post('privilege', TRUE)
				
			);

			$curl = curl_init("http://fme.riceafrika.com/api/settings");
			curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl,CURLOPT_SSL_VERIFYPEER ,false);
			curl_setopt($curl,CURLOPT_POSTFIELDS ,$data);

			$response = curl_exec($curl);
			curl_close($curl);
            echo $response;
		}else if($this->session->userdata('user_type') == '2'){
			
				$data = array(
					'sp_id' => $this->input->post('sp_id', TRUE),
					'privilege'=> $this->input->post('privilege', TRUE)
					
				);
	
				$curl = curl_init("http://fme.riceafrika.com/api/settings");
				curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl,CURLOPT_SSL_VERIFYPEER ,false);
				curl_setopt($curl,CURLOPT_POSTFIELDS ,$data);
	
				$response = curl_exec($curl);
				curl_close($curl);
				echo $response;
		}else{
			redirect('/');			
		}		

	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_type');
		$this->session->sess_destroy();
		redirect(site_url());
	}

	public function create_service_provider()
	{
		if(in_array($this->session->userdata('user_type'),['1','2'])){

			if($_SERVER['REQUEST_METHOD'] =='POST'){
				$name = $this->input->post('name', TRUE);
				$phone = $this->input->post('phone', TRUE);
				$service_type = $this->input->post('servicetype', TRUE);
				$password = $this->input->post('password', TRUE);

				$data = array(
					'name'=> $this->input->post('name', TRUE),
					'phone'=> $this->input->post('phone', TRUE),
					'service_type' => $this->input->post('servicetype', TRUE),
					'password'=> $this->input->post('password', TRUE),
					'password_confirmation'=> $this->input->post('password_confirmation', TRUE),
					'country'=>'NG'
					
				);
	
				$curl = curl_init("http://fme.riceafrika.com/api/service");
				curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl,CURLOPT_SSL_VERIFYPEER ,false);
				curl_setopt($curl,CURLOPT_POSTFIELDS ,$data);
	
				$response = curl_exec($curl);
				curl_close($curl);
				$result = json_decode($response, true);
				if(!empty($result['error'])){
					echo $this->session->set_flashdata('password', $result['error']);
					return  redirect('create-service-provider');
				}else{
					if($result['success']){
						echo $this->session->set_flashdata('msg_success', 'You have successfully made '.strtolower($name).' service provider');
						return  redirect('create-service-provider');
					}else{
						echo $this->session->set_flashdata('msg_danger', 'Ooop something Went wrong, try again later');
						return  redirect('create-service-provider');
					}
				}

			}else{
				$this->load->view('includes/head');
				$this->load->view('includes/header');
				$this->load->view('pages/create-service-provider');
				$this->load->view('includes/footer');	
			}
		}else{
			redirect('/');			
		}
	
	}
    
}
