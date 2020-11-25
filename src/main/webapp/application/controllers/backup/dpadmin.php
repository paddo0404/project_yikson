<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dpadmin extends CI_Controller
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
		$this->load->helper(array('form','url'));
		$this->load->library('upload');
		$this->load->library('form_validation');
		$this->load->library('pagination');
    }
	
	
	public function index()
	{
		if( $this->session->userdata('isLoggedIn') ) {
        	$data['site_settings']=$this->adminmodel->getSettingInformation();
		$this->load->view('administrator/dashboard',$data);	
		} else {
			redirect('/administrator/login');
		}
	}
	
}