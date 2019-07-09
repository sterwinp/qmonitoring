<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
	function __construct()
	{
	   parent::__construct();
	   $this->load->helper("general");
	   $this->load->library('user_agent');
	}
	function index()
	{	
	   	if($this->session->userdata('logged_in'))
	   	{
	     	redirect('home', 'refresh');
	   	}
	   	else
	   	{	
      		$data['email'] = '';
	    	$this->load->view('login', $data);
	   	}			
	}
	
}