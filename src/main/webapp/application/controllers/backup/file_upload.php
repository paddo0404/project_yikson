<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class file_upload extends CI_Controller
{
public function __construct() {
    parent::__construct();  
	 $this->load->database();  
        $this->load->helper('text');
        $this->load->library('email');
		$this->load->helper('url');
		//$this->load->helper('user_helper');
		//$this->load->library('encrypt');
		$this->load->library('session');
		$this->load->model('adminmodel');
		$this->load->model('upload_model');
		$this->load->helper(array('form','url'));
		$this->load->library('upload');
		$this->load->library('form_validation');
		$this->load->library('pagination');
}    


	
public function file_view(){
    $this->load->view('file_view', array('error' => ' ' ));    
}
function do_upload()
{
     $config =  array(
                  'upload_path'     => "uploads/",
                  'allowed_types'   => "gif|jpg|png|jpeg|pdf",
                  'overwrite'       => TRUE,
                  'max_size'        => "2048000",  // Can be set to particular file size
                  'max_height'      => "768",
                  'max_width'       => "1024"  
                );    
				$this->load->library('upload', $config);
				if($this->upload->do_upload())
				{
					$data = array('upload_data' => $this->upload->data());
					$this->load->view('upload_success',$data);
				}
				else
				{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('file_view', $error);
				}    
}
}
?>