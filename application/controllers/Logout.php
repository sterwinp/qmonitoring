<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Logout extends CI_Controller {
	function __construct()
	{
	   parent::__construct();
	}
	function index()
	{
		if($this->session->userdata('logged_in'))
		{
			// session_start();
			$this->session->unset_userdata('logged_in');
			// $this->session->unset_userdata('logged_in_otp');
			redirect('login', 'refresh');
		}
		else
		{
			redirect('login', 'refresh');
		}
	}
}