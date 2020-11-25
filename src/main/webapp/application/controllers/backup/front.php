<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class front extends CI_Controller
{
	function __construct()
    {
        parent::__construct();
        $this->load->database();  
        $this->load->helper('text');
        $this->load->library('email');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('adminmodel');
		$this->load->model('usermodel');
		$this->load->helper(array('form','url'));
		$this->load->library('upload');
		$this->load->library('form_validation');
		$this->load->library('pagination');
    }
	
	
	public function index()
	{
        	
		if( $this->session->userdata('isUserLoggedIn') ) {
			$this->load->view('front/dashboard');	
		} else {
			$this->load->view('front/index');	
		}
		
	}
	
	public function user_dashboard()
	{
		if( $this->session->userdata('isUserLoggedIn') ) {
			$this->load->view('front/dashboard');	
		} else {
			$this->load->view('front/index');	
		}
	}
	public function forgot_pwd()
	{
		if( $this->session->userdata('isUserLoggedIn') ) {
			$this->load->view('front/dashboard');	
		} else {
			$this->load->view('front/forgot_pwd');	
		}
		
	}
    
	public function send_forgot_password()
	{
		$email = $this->input->post('txtUserName');
		$result=$this->usermodel->check_user_login($email);
		$pwd=$this->usermodel->pwdDecrypt($result[0]->user_pwd);
        $message = '<html><body>';
		$message .= '<table width="627"  cellpadding="10">';
		$message .= "<tr><td colspan=2><strong>Dear ".$result[0]->full_name." ,</strong> </td></tr>";
		$message .= "<tr><td colspan='2'>Here are your login credentials.Now you can login by using following credentials.<br /></td></tr>";
		$message .= "<tr><td width='100px'><strong>User Name:</strong> </td><td>" . strip_tags( $email) . "</td></tr>";
		$message .= "<tr><td width='100px'><strong>Password:</strong> </td><td>" . strip_tags($pwd) . "</td></tr>";
		$message .= "<tr><td colspan='2' height='10px'></td></tr>";
		$message .= "<tr><td colspan=2><strong>Thank You,</strong> </td></tr>";
		$message .= "<tr><td colspan=2><strong>".PROJECT_NAME."</strong> </td></tr>";
		$message .= "</table>";
		$message .= "</body></html>"; 
		$subject = "Your Account Details :: ".PROJECT_NAME;
		$res=$this->usermodel->check_user_login(FROM_NAME,FROM_MAIL,$email,$subject,$message);
		if($res=='success')
		{
			redirect("forgot_pwd?fsuccess=success");
			exit();
		}
		else
		{
			redirect("forgot_pwd?ferr=fail");
			exit();
		}
	}
  

	public function checklogin()
	{
		$username = $this->input->post('txtUserName');
		$usr_pwd = $this->input->post('txtPassword');
		$result['login_data']=$this->usermodel->check_user_login($username);
		$count=count($result['login_data']);
		if($count==0) //check  login from db
		{
			 redirect("index?ferr=Invalid Email ID / Password");
			 exit();
		}
		else 
		{
			$pwd=$this->usermodel->pwdDecrypt($result['login_data'][0]->user_pwd);
			if($usr_pwd==$pwd)
			{
				if($result['login_data'][0]->status=='Active')
				{
					$session=array(
					'user_id' => $result['login_data'][0]->mid,
					'full_name' =>$result['login_data'][0]->full_name,
					'isUserLoggedIn'=>true
					);
					
					$this->session->set_userdata($session);		
					redirect('dashboard');	
				}
				else
				{
					redirect("index?ferr=Your account is inactive");
					 exit();
				}
			}
			else
			{
				redirect("index?ferr=Invalid password");
				exit();
			}
			
		}
	}


	public function member_register()
	{
		$full_name = $this->input->post('txtFullName');
		$email = $this->input->post('txtEmailID');
		$dob = $this->input->post('txtDob');
		$password = $this->input->post('txtPwd');
		$gender = $this->input->post('rdbGender');

		$new_pwd = $this->usermodel->pwdEncrypt($password);

		$result['login_data']=$this->usermodel->check_user_login($email);
		$count=count($result['login_data']);
		if($count==0) //check  login from db
		{
			 $data=array("full_name"=>$full_name,"email_id"=>$email,"date_of_birth"=>$dob,"user_pwd"=>$new_pwd,"gender"=>$gender);	
			 $this->usermodel->member_create($data);
			 redirect("index?fsuccess=You have successfully created your account. Now you can login.");
			 exit();
		}
		else 
		{
			redirect("index?ferr=Email ID already existed");
			exit();
		}
	}

	function log_out()
	{
		$session=array(
					'user_id' =>'' ,
					'full_name' =>'',
					'isUserLoggedIn'=>false
					);
		
	   $this->session->unset_userdata($session);
	   redirect('index?ferr=You have successfully logout from website');
	}
	

}