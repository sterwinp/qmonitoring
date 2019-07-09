<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{
	function __construct()
	{
      parent::__construct();
	   $this->load->model('process_model');
	}
	public function index()
	{
		if(($this->session->userdata('logged_in')) )
		{
			$data['query'] = $this->process_model->getquery();
          	$this->load->view('home',$data);
		}
      else
      {
         redirect('login','refresh');
		}
	}

	public function getresult()
	{
		if($this->session->userdata('logged_in'))
	   	{
	   		if( $this->input->post() )
	   		{
	   			$runQ = $this->process_model->getresult( $this->input->post() );
	   			echo json_encode( $runQ );
	   		}
	   		else
	   		{
				echo json_encode(array('code' => 2, 'msg' => 'Invalid Entry'));
	   		}
	   	}
	   	else
	   	{
			echo json_encode(array('code' => 0, 'msg' => 'Session timed out'));
	   	}
	}
}

   