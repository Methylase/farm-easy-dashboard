<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usercontroller extends CI_Controller {

	/**
	
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->database();
	}

	//Landing page
	public function index()
	{
		$this->load->view('includes/head');
        $this->load->view('index');
        $this->load->view('includes/footer');
    }

   
	//login Authentication
	public function auth()
	{
		$this->load->model('Users_model');
		$email = $this->input->post('email', TRUE);
		$password = md5($this->input->post('password', TRUE));
		$validate = $this->Users_model->validate($email, $password);
		if ($validate->num_rows() > 0) {
			$data = $validate->row_array();

			$name = $data['name'];
			$verified = $data['status'];
			$email = $data['email'];
			$level = $data['user_type'];
			$country = $data['country'];

			$sesdata = array(

				'name' => $name,
				'status' => $verified,
				'email' => $email,
				'user_type' => $level,
				'country' => $country,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($sesdata);

			// access login for superadmin
			if ($level === '1') {
				redirect('superadmin');
			} // access login for admin/support
			elseif ($level === '2') {
				redirect('admin');
			} 	// access login for finance
			elseif($level === '3'){
				redirect('finance');
			}else {
				echo $this->session->set_flashdata('verify', 'Email Not Yet Verified. <br> Kindly Check Your Inbox');
				redirect('/');
			}

		} else {
			echo $this->session->set_flashdata('msg', 'Email or Password is Wrong');
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

	
    
}

