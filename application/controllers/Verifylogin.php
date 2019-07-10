<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Verifylogin extends CI_Controller {
 function __construct()
 {
    parent::__construct();
    $this->load->helper("general");
 }

 function index()
 { 
    $this->form_validation->set_rules('email', 'UserName', 'trim|required');
    $this->form_validation->set_rules('pwd', 'Password', 'trim|required|callback_serviceAuth');
    if($this->form_validation->run() == FALSE)
    {
      $data['email'] = $this->input->post('email');
      //Field validation failed.  User redirected to login page
      $this->load->view('login',$data);
    }
    else
    {
      redirect('home', 'refresh');
    }
 }
  function serviceAuth($password)
  {
     //Field validation succeeded.  Validate against database
     $useremail = $this->input->post('email');
     //query the database
     $data = array('user'=>$useremail, 'password'=>$password);
     // $result = $this->login_model->checkLogin( inputvalidation( $data ) );
     $result = $this->checkLogin( inputvalidation( $data ) );
     if($result == 1)
     {
            $this->form_validation->set_message('serviceAuth', 'User JSON not found');
            return false;
     }
     if($result == 2)
     {
            $this->form_validation->set_message('serviceAuth', 'User JSON don\'t have any user');
            return false;
     }
     else
     {
         if(is_array($result) && count($result) > 0)
         {
            $this->session->set_userdata('logged_in',$result);
            return TRUE;
         }
         else
         {
           $this->form_validation->set_message('serviceAuth', 'Invalid username or password');
           return false;
         }
     }
  }

  public function checkLogin($data)
  {
    // echo FCPATH.WORKFILES.LOGIN_USER;exit;
    $user_json = FCPATH.WORKFILES.LOGIN_USER;
    if( file_exists( $user_json ) )
    {
      $user_data = file_get_contents($user_json);
      $user_data = json_decode( $user_data,1 );
      $login = 0;
      $user = array();
      if( is_array( $user_data ) && !empty( $user_data ) && count( $data ) != 0 )
      {
        foreach ($user_data as $user_key => $user_val) 
        {
          if( $user_val['user'] == $data['user'] && $user_val['password'] == md5($data['password']) )
          {
            $login = 1;
            $user = $user_val;
          }
          if( $login == 1 )
          {
            return $user;
          }
          else
          {
            return 3;
          }
        }
      }
      else
      {
        return 2;
      }
    }
    else
    {
      return 1;
    }
  }
}