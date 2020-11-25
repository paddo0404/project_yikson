<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller
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
	
	
	public function register()
	{
		$this->load->view('front/register');	
	}
	
	public function mem_register()
	{
				$data= (object) array(
				  'user_name' =>$this->input->post('username'),
				  'pwd' => $this->adminmodel->pwdEncrypt($this->input->post('password')),
				  'fname' =>$this->input->post('name'),
				  'email_id' => $this->input->post('email'),
				  'mobile' => $this->input->post('mobile'),
				  'address' => $this->input->post('address'),
				  'bankname' => $this->input->post('bank_name'),
				  'acc_name' => $this->input->post('account_name'),
				  'bank_acc' => $this->input->post('bank_account'),
				  'ifsc_code' => $this->input->post('ifsc_code'),
				  'status' => 'Active'
				);
		        $this->usermodel->member_registration($data);
		        $subject ="Member Registration :: Diamond Matka";
			    $from ="diamondmatka@gmail.com";
				$this->load->library('email');
				$this->email->set_mailtype('html');
				$this->email->from('diamondmatka.com',$from);
				$this->email->to($this->input->post('email'));
				$this->email->subject($subject);
				$html = '<html><body>
			    <div>Dear '.$this->input->post('name').',<br> </div>
			    <p>Thanks for registering with us. You have successfully registered with diamond matka. Below details are your logged in details.</p>
			    <p>User ID:&nbsp;&nbsp;'.$this->input->post('username').'</p>
				<p>Password:&nbsp;&nbsp;'.$this->input->post('password').'</p></div>
			    <br/>
				<div><a href="'.base_url().'">Click here</a> to login</div>
			    <div></div><br/><div>Thank You,</div><br/><div>Diamond Matka Team</div>
			    </body></html>';            
				$this->email->message($html); 
				//$this->email->send();
		
		
		redirect("user/result");
	}
	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('pwd', 'Password', 'required');
		$this->form_validation->set_message('required', ' %s is Required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('message', validation_errors()."<br>");
			redirect(base_url()."");
			exit();
		}
		else
		{
			$username = $this->input->post('username');
			$usr_pwd = $this->input->post('pwd');
			$password = $this->adminmodel->pwdEncrypt($usr_pwd);
			$result=array();
			$result['login_data']=$this->usermodel->checkLoginInformation($username,$password);
			$count=count($result['login_data']);
			if($count==0) //check  login from db
			{
				 $this->session->set_flashdata('message',"Invalid User name / Password<br>");
				 redirect(base_url());
				 exit();
			}else{
						if($count!="" && $count>0)
				$session=array(
				'usr_id' => $result['login_data'][0]->mid ,
				'usr_username' => $result['login_data'][0]->user_name,
				'usr_email' =>$result['login_data'][0]->email_id,
				'isUserLoggedIn'=>true
				);
				
				$this->session->set_userdata($session);		
				redirect(base_url());
			}
		}
	}
	
	
	function logout()
	{
		$session=array(
					'usr_id' =>'' ,
					'usr_username' =>'',
					'usr_email' =>'',
					'isUserLoggedIn'=>false
					);
		
	   $this->session->unset_userdata($session);
	   redirect(base_url());
	}
	
	
	public function change_pwd()
	{
		if( $this->session->userdata('isUserLoggedIn') ) {
				if(isset($_POST['submit']))
			{
				$username = $this->session->userdata("usr_username");
				$newpwd = $this->input->post('new_pwd');
				$oldpwd = $this->input->post('old_pwd');
				$password = $this->adminmodel->pwdEncrypt($oldpwd);
				$result=array();
				$result['login_data']=$this->usermodel->checkLoginInformation($username,$password);
			    $count=count($result['login_data']);
			    if($count==0) //check  login from db
                {
			   		 redirect("user/change_pwd?ferr=Old password is incorrect.");
					 exit();
				}else{
						$data=array(
						"pwd"=>$this->adminmodel->pwdEncrypt($newpwd)
						 );	
						$this->usermodel->change_pwd($data);
						redirect("user/change_pwd?fsuccess=You have successfully changed your password.");
				}
				
			}
			else
			{
        		$data['site_settings']=$this->adminmodel->getSettingInformation();
				$this->load->view('front/change_password',$data);
			}
		} else {
			$this->session->set_flashdata('message', "Not yet all logged in. Please enter your credentials to login.");
			redirect(base_url());
			exit;
		}
	}
	
	public function result()
	{
			$this->load->view('front/result');
	}
	
	
	public function deposit()
	{
		if( $this->session->userdata('isUserLoggedIn') ) {
				if(isset($_POST['submit']))
			{
				$usr_id = $this->session->userdata("usr_id");
				
			  
						$data=array(
						"uid"=>$usr_id,
						"deposit_amount"=>$this->input->post('amount'),
						"payment_mode"=>$this->input->post('payment_mode'),
						"transfered_to"=>$this->input->post('bank_transfered'),
						"state"=>$this->input->post('state'),
						"city"=>$this->input->post('city'),
						"status"=>'Pending',
						"deposited_on"=>$this->input->post('tr_date')
						 );	
						$this->usermodel->submit_deposit($data);
						redirect("user/deposit?fsuccess=You have successfully submitted your depositted amount.");
				
			}
			else
			{
				$this->load->view('front/deposit_amount');
			}
		} else {
			$this->session->set_flashdata('message', "Not yet all logged in. Please enter your credentials to login.");
			redirect(base_url());
			exit;
		}
	}
	
	public function show_deposits()
	{
		if( $this->session->userdata('isUserLoggedIn') ) 
		{
			$config = array();
			$config["base_url"] = base_url() . "user/show_deposits";
			$total_row = $this->usermodel->submitted_deposits();
			$config["total_rows"] = $total_row;
			$config["per_page"] = 15;
			$config['use_page_numbers'] = TRUE;
			$config['num_links'] = $total_row;
			$config['cur_tag_open'] = '&nbsp;<a class="current">';
			$config['cur_tag_close'] = '</a>';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			
			$this->pagination->initialize($config);
			if($this->uri->segment(3)){
				$page = ($this->uri->segment(3)) ;
			}
			else{
				$page = 1;
			}
			$str_links = $this->pagination->create_links();
			$data["links"] = explode('&nbsp;',$str_links );

			$data["damount"] = $this->usermodel->getAllSubmittedDeposits($config["per_page"], $page-1);
			$this->load->view('front/all_deposits',$data);
		}
		else 
		{
			$this->session->set_flashdata('message', "Not yet all logged in. Please enter your credentials to login.");
			redirect(base_url());
			exit;
		}
	}
	
	public function withdraw()
	{
		if( $this->session->userdata('isUserLoggedIn') ) {
			if(isset($_POST['submit']))
			{
				      $usr_id = $this->session->userdata("usr_id");
				
				 $usrdata=$this->usermodel->getLoggedinUserData();
			
				$point=$usrdata->acc_balance;
				if($point>=$this->input->post('points'))
				{
			  
						$data=array(
							"uid"=>$usr_id,
							"withdraw_type"=>$this->input->post('radioBtn'),
							"usr_name"=>$this->input->post('to_user'),
							"mobile_no"=>$this->input->post('mobile'),
							"points"=>$this->input->post('points')
						 );	
						$this->usermodel->submit_withdraws($data);
						redirect("user/withdraw?fsuccess=You have successfully submitted your withdraw points.");
				}
				else
				{
					redirect("user/withdraw?fsuccess=You don't have enough points to with draw or transfered to your friend.");
				}
			}
			else
			{
				$this->load->view('front/withdraw');
			}
		} else {
			$this->session->set_flashdata('message', "Not yet all logged in. Please enter your credentials to login.");
			redirect(base_url());
			exit;
		}
	}
	
	
	public function show_withdraws()
	{
		if( $this->session->userdata('isUserLoggedIn') ) 
		{
			$config = array();
			$config["base_url"] = base_url() . "user/show_withdraws";
			$total_row = $this->usermodel->submitted_withdraws();
			$config["total_rows"] = $total_row;
			$config["per_page"] = 15;
			$config['use_page_numbers'] = TRUE;
			$config['num_links'] = $total_row;
			$config['cur_tag_open'] = '&nbsp;<a class="current">';
			$config['cur_tag_close'] = '</a>';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			
			$this->pagination->initialize($config);
			if($this->uri->segment(3)){
				$page = ($this->uri->segment(3)) ;
			}
			else{
				$page = 1;
			}
			$str_links = $this->pagination->create_links();
			$data["links"] = explode('&nbsp;',$str_links );

			$data["damount"] = $this->usermodel->getAllSubmittedWithdraws($config["per_page"], $page-1);
			$this->load->view('front/show_withdraws',$data);
		}
		else 
		{
			$this->session->set_flashdata('message', "Not yet all logged in. Please enter your credentials to login.");
			redirect(base_url());
			exit;
		}
	}
	
	public function viewtickets()
	{
		if( $this->session->userdata('isUserLoggedIn') ) 
		{
			$config = array();
			$config["base_url"] = base_url() . "user/viewtickets";
			$total_row = $this->usermodel->getLastTwoDaysTickets();
			$config["total_rows"] = $total_row;
			$config["per_page"] = 15;
			$config['use_page_numbers'] = TRUE;
			$config['num_links'] = $total_row;
			$config['cur_tag_open'] = '&nbsp;<a class="current">';
			$config['cur_tag_close'] = '</a>';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			
			$this->pagination->initialize($config);
			if($this->uri->segment(3)){
				$page = ($this->uri->segment(3)) ;
			}
			else{
				$page = 1;
			}
			$str_links = $this->pagination->create_links();
			$data["links"] = explode('&nbsp;',$str_links );
			
			$all_data = $this->usermodel->getAllLastTwoDaysTicketsTotal();


        if (empty($all_data))
            $all_data = array();

        $tot_amt_ticket = array();

       foreach ($all_data as $k => $v) {
            $totalamt = 0;
			
           $ticket_numbers = json_decode($v['ticket_numbers']);
            $arr = array_values($ticket_numbers);
           if(count($arr)>0)
		   {
			   $str=implode("','",$arr);
			   $all_data = $this->usermodel->getTotalTransactionAmount($str);
			   $totalamt=$all_data->total_amount;
		   }
		   
            $tot_amt_ticket[$v['id']] = $totalamt;
        }
$data["total_amount"]=$tot_amt_ticket;

$data["damount"] = $this->usermodel->getAllLastTwoDaysTickets($config["per_page"], $page-1);




			$this->load->view('front/view_tickets',$data);
		}
		else 
		{
			$this->session->set_flashdata('message', "Not yet all logged in. Please enter your credentials to login.");
			redirect(base_url());
			exit;
		}
	}
	
	
	public function checktickets()
	{
		if( $this->session->userdata('isUserLoggedIn') ) 
		{
			if(isset($_POST['submit']))
			{
				 $id=trim($this->input->post('ticket_no'),'TKT');
				 $ticket_data =$this->usermodel->getTicketData($id);
				 $data['ticketdata']=$ticket_data;
				 $ticket_numbers = json_decode($ticket_data->ticket_numbers);
					$arr = array_values($ticket_numbers);
				   if(count($arr)>0)
				   {
					   $str=implode("','",$arr);
					   $all_data = $this->usermodel->getTransactionDetails($str);
					  
				   }
				 $data['tran_data']=$all_data;
			}
			else
			{
				$value= (object) array(
				'id' => '',
				'mid' => '',
				'game_id' => '',
				'game_name' => '',
				'ticket_numbers' => '',
				'date_time' => ''
 				);  
				$data['ticketdata']=$value;
				$value1= (object) array(
				'id' => '',
				'game_id_custom' => '',
				'user_id' => '',
				'bate_type' => '',
				'bate_amount_by_user' => '',
				'bate_series_number' => '',
				'bate_series_column' => '',
				'valid_till_date' => '',
				'date_time' => ''
 				);  
				$data['tran_data'][]=$value1;
			}
			$this->load->view('front/check_tickets',$data);
		}
		else 
		{
			$this->session->set_flashdata('message', "Not yet all logged in. Please enter your credentials to login.");
			redirect(base_url());
			exit;
		}
	}
	
	
	
	public function print_all()
	{
		if( $this->session->userdata('isUserLoggedIn') ) 
		{
			
				 $id=trim($this->uri->segment(3),'TKT');
				 $ticket_data =$this->usermodel->getTicketData($id);
				 $data['ticketdata']=$ticket_data;
				 $ticket_numbers = json_decode($ticket_data->ticket_numbers);
					$arr = array_values($ticket_numbers);
				   if(count($arr)>0)
				   {
					   $str=implode("','",$arr);
					   $all_data = $this->usermodel->getTransactionDetails($str);
					  
				   }
				 $data['tran_data']=$all_data;
			
			$this->load->view('front/print',$data);
		}
		else 
		{
			$this->session->set_flashdata('message', "Not yet all logged in. Please enter your credentials to login.");
			redirect(base_url());
			exit;
		}
	}
	
	
	public function ToCancelTickets()
	{
		if( $this->session->userdata('isUserLoggedIn') ) 
		{
			$config = array();
			$config["base_url"] = base_url() . "user/viewtickets";
			$total_row = $this->usermodel->getLastTwoDaysTickets();
			$config["total_rows"] = $total_row;
			$config["per_page"] = 15;
			$config['use_page_numbers'] = TRUE;
			$config['num_links'] = $total_row;
			$config['cur_tag_open'] = '&nbsp;<a class="current">';
			$config['cur_tag_close'] = '</a>';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			
			$this->pagination->initialize($config);
			if($this->uri->segment(3)){
				$page = ($this->uri->segment(3)) ;
			}
			else{
				$page = 1;
			}
			$str_links = $this->pagination->create_links();
			$data["links"] = explode('&nbsp;',$str_links );
			
			$all_data = $this->usermodel->getAllLastTwoDaysTicketsTotal();


        if (empty($all_data))
            $all_data = array();

        $tot_amt_ticket = array();

       foreach ($all_data as $k => $v) {
            $totalamt = 0;
			
           $ticket_numbers = json_decode($v['ticket_numbers']);
            $arr = array_values($ticket_numbers);
           if(count($arr)>0)
		   {
			   $str=implode("','",$arr);
			   $all_data = $this->usermodel->getTotalTransactionAmount($str);
			   $totalamt=$all_data->total_amount;
		   }
		   
            $tot_amt_ticket[$v['id']] = $totalamt;
        }
$data["total_amount"]=$tot_amt_ticket;

$data["damount"] = $this->usermodel->getAllLastTwoDaysTickets($config["per_page"], $page-1);




			$this->load->view('front/cancel_ticket',$data);
		}
		else 
		{
			$this->session->set_flashdata('message', "Not yet all logged in. Please enter your credentials to login.");
			redirect(base_url());
			exit;
		}
	}
	
	public function cancel_ticket()
	{
		 $id=trim($this->uri->segment(3),'TKT');
		 
		  $ticket_data =$this->usermodel->getTicketData($id);
		 $data['ticketdata']=$ticket_data;
		 $ticket_numbers = json_decode($ticket_data->ticket_numbers);
			$arr = array_values($ticket_numbers);
		   if(count($arr)>0)
		   {
			   $str=implode("','",$arr);
			   $all_data = $this->usermodel->getTransactionDetails($str);
			  
		   }
		 $data['tran_data']=$all_data;
        $totalamt = 0;
    
        $timeout = FALSE;
        foreach ($all_data as  $vv) {
			
			
            if (date("Y-m-d") > $vv->valid_till_date) {
                $timeout = TRUE;
            }
            if (!$this->_isGameActiveNow($ticket_data->game_id)) {
                $timeout = TRUE;
            }
        }
	
        if ($timeout) {
           
           redirect("user/ToCancelTickets?msg=Already timeout.Ticket cannot be cancelle");
        }
        foreach ($arr as $kk => $vv) {
			
            $usrtx = $this->usermodel->getTransactionData($vv);
            $totalamt+=$usrtx->bate_amount_by_user;
			$this->usermodel->deleteTransaction($vv);
          
        }
		$usr_id = $this->session->userdata("usr_id");
        $refundAmount = $totalamt;
        if($ticket_data->id!="")
		{
			$this->usermodel->deleteTickets($ticket_data->id);
			$this->usermodel->updateCancelPoints($refundAmount,$usr_id);
		}
       
      
        redirect("user/ToCancelTickets?msg=You have successfully cancelled your tickets");
		
	}
	
	   function _isGameActiveNow($gamecustomid) {
        $arr1 = explode("_", $gamecustomid);
        $time1 = "close";
        $iseastgame = false;
        $isActive = false;
        if (count($arr1) == 2) {
            $game1 = $arr1[0];
            if ($arr1[1] == "1") {
                $time1 = "open";
            }
        } else {
            $iseastgame = true;
            $game1 = $arr1[0];
        }
        if ($iseastgame) {
            $game =  $this->usermodel->getGameById($game1);
            $time = $game->regular_end_time;
        } else {
            $game = $this->usermodel->getGameById($game1); 
            if ($time1 == "open") {
                $time = $game->regular_start_time;
            } else {
                $time = $game->regular_end_time;
            }
        }
        //$c=date('H:i:s');
        if (date("H:i:s", strtotime($time)) > date('H:i:s')) {
            $isActive = TRUE;
        }
        return $isActive;
    }
	
	
	public function salesReport()
	{
		
		if( $this->session->userdata('isUserLoggedIn') ) 
		{
			if(isset($_POST['submit']))
			{
				 if (isset($_POST)) {
					if (!empty($_POST['dt'])) {
						$date = $_POST['dt'];
						
						$user=$this->usermodel->getLoggedinUserData();
						$timestart="00:00:00";
						$time_end="23:59:59";
						
					
						$usertickets = $this->usermodel->getsaleReports($user->mid,$date,$date,$timestart,$time_end);
						$totwinamountlist = array();
					
						$salesReposrtUserResults = array();
		
						
						for($i=0;$i<count($usertickets);$i++){
							
							 $sql="select * from tb_game_result where winning_number='".$usertickets[$i]->bate_series_number."' and game='".$usertickets[$i]->game_id_custom."' and date like ('%".$usertickets[$i]->valid_till_date."%')";
							$data=$this->db->query($sql);
							$rs=$data->result();
							$timefrom1=$usertickets[$i]->game_id_custom;
							$time1='';
							$arr1 = explode("_", $timefrom1);
							if (count($arr1) == 2) {
								$gameid = $arr1[0];
								if ($arr1[1] == "1") {
									$time1 = "open";
								}
								else
								{
									$time1="close";
								}
							} else {
								$gameid = $arr1[0];
							}
							
							$game_info=$this->usermodel->getGameById($gameid);
							$dt='';
							 if(isset($arr1['1']))
							 {
								 $time1="open";
								  if($arr1['1']=='1')
								  {
									 $dt=$usertickets[$i]->valid_till_date." ".$game_info->regular_start_time;
								  }
								  else
								  {
									  $time1="dclose".$gameid." ";
									  $dt=$usertickets[$i]->valid_till_date." ".$game_info->regular_end_time;
								  }
									
							 }
							 else
							 {
									 $time1="close";
								 
								    if($arr1['0']>8 && $arr1['0']<15)
									{
										 $dt=$usertickets[$i]->valid_till_date." ".$game_info->regular_end_time;
									}
									else
									{
										$dt=$usertickets[$i]->valid_till_date." ".$game_info->regular_end_time;
									}
								    $dt=$usertickets[$i]->valid_till_date." ".$game_info->regular_end_time;
							 }
							 
							if(count($rs)>0){
								
								
								$data=array(
								"bated_amount"=>$usertickets[$i]->bate_amount_by_user,
								"win_amount" =>$rs[0]->win_amount,
								"date" => $usertickets[$i]->date_time,
								"game"=> $dt
								);
							}
							else
							{
								$data=array(
								"bated_amount"=>$usertickets[$i]->bate_amount_by_user,
								"win_amount" =>'0.00',
								"date" => $usertickets[$i]->date_time,
								"game"=> $dt
								);
							}
							array_push($salesReposrtUserResults, $data);
						}
						if (empty($salesReposrtUserResults)) {
							
							$data=array(
							"bated_amount"=> "0",
							"win_amount" => "0",
							"date" =>"",
							"game"=> "0000:00:00 00:00:00"
							);
							array_push($salesReposrtUserResults, $data);
						}
					
					} else {
						$msg = "Please enter all the values";
					}
				}
		
				$data['sales_report']=$salesReposrtUserResults;
			}
			else
			{
				$value1= array(
							"bated_amount"=> "0",
							"win_amount" => "0",
							"date" =>"",
							"game"=> "0000:00:00 00:00:00"
 				);  
				$data['sales_report'][]=$value1;
			}
			
			
			$this->load->view('front/sales_report',$data);
		}
		else 
		{
			$this->session->set_flashdata('message', "Not yet all logged in. Please enter your credentials to login.");
			redirect(base_url());
			exit;
		}
	
	}
	
	public function totalSalesReport()
	{
			
		if( $this->session->userdata('isUserLoggedIn') ) 
		{
			if(isset($_POST['submit']))
			{
				 if (isset($_POST)) {
					if (!empty($_POST['date_form']) && !empty($_POST['date_to'])) {
						$date_form = $_POST['date_form'];
						$date_to = $_POST['date_to'];
						$user=$this->usermodel->getLoggedinUserData();
						$timestart="00:00:00";
						$time_end="23:59:59";
						$user=$this->usermodel->getLoggedinUserData();
					
						$user_tickets = $this->usermodel->gettotalSaleReports1($user->mid,$date_form,$date_to,$timestart,$time_end);
						$totwinamountlist = array();
						$salesReposrtUserResults = array();
						if(count($user_tickets)>0)
						{
							for($i=0;$i<count($user_tickets);$i++)
							{
								
								$total=$user_tickets[$i]->total;
								$dt=$user_tickets[$i]->dt;
								$usertickets = $this->usermodel->gettotalSaleReports($user->mid,$dt,$dt,$timestart,$time_end);
								for($j=0;$j<count($usertickets);$j++)
								{
									 $sql="select SUM( win_amount ) win from tb_game_result where mid='".$user->mid."' and winning_number='".$usertickets[$j]->bate_series_number."' and game='".$usertickets[$j]->game_id_custom."' and date like ('%".$usertickets[$j]->valid_till_date."%')";
									$data=$this->db->query($sql);
									$rs=$data->result();
									
									$data=array(
									"bated_amount"=>$total,
									"win_amount" =>$rs['0']->win,
									"date" => $dt,
									"total"=> $user->acc_balance
									);
							    }
							 		  array_push($salesReposrtUserResults, $data);
								}
								
								
						}
						else
						{
							$value1= array(
							"bated_amount"=> "0",
							"win_amount" => "0",
							"date" =>"0000-00-00",
							"total"=> "0"
 							);  
							array_push($salesReposrtUserResults, $data);
						}
						
					
					} else {
						$msg = "Please enter all the values";
					}
				}
		
				$data['sales_report'][]=$salesReposrtUserResults;
			}
			else
			{
				$value1= array(
							"bated_amount"=> "0",
							"win_amount" => "0",
							"date" =>"0000-00-00",
							"total"=> "0"
 				);  
				$data['sales_report'][]=$value1;
			}
			
			
			$this->load->view('front/total_sales_report',$data);
		}
		else 
		{
			$this->session->set_flashdata('message', "Not yet all logged in. Please enter your credentials to login.");
			redirect(base_url());
			exit;
		}
	}
	public function salesReport1()
	{
		if( $this->session->userdata('isUserLoggedIn') ) 
		{
			if(isset($_POST['submit']))
			{
				 if (isset($_POST)) {
					if (!empty($_POST['dt'])) {
						$date = $_POST['dt'];
						 $timefrom1 = $_POST['report_from'];
						 $timefrom2 = $_POST['report_to'];
						if ($timefrom1 == "selected" || empty($timefrom1)) {
							$timefrom1 = "7_0";
						}
						if ($timefrom2 == "selected" || empty($timefrom2)) {
							$timefrom2 = "8_1";
						}
						$arr1 = explode("_", $timefrom1);
						$arr2 = explode("_", $timefrom2);
						$time1 = "close";
						$time2 = "close";
		
						if (count($arr1) == 2) {
							$game1 = $arr1[0];
							if ($arr1[1] == "1") {
								$time1 = "open";
							}
						} else {
							$game1 = $arr1[0];
						}
		
						if (count($arr2) == 2) {
							$game2 = $arr2[0];
							if ($arr2[1] == "1") {
								$time2 = "open";
							}
						} else {
							$game2 = $arr2[0];
						}
	
						$game_start = $this->usermodel->getGameById($game1);
						if ($time1 == "close") {
							$timestart = $game_start->regular_end_time;
						} else if ($time1 == "open") {
							$timestart = $game_start->regular_start_time;
						}
						$game_end = $this->usermodel->getGameById($game2);
						if ($time2 == "close") {
							$time_end = $game_end->regular_end_time;
						} else if ($time2 == "open") {
							$time_end = $game_end->regular_start_time;
						}
						$user=$this->usermodel->getLoggedinUserData();
						
						$userresults = $this->usermodel->getGameDayUserResults($user->mid,$date,$date,$timestart,$time_end);
	
						$winamountlist = array();
						for($i=0;$i<count($userresults);$i++)
						{
							 $id=$userresults[$i]->game;
							$winamountlist[$id] = $userresults[$i]->win_amount;
						}
		
					
						$usertickets = $this->usermodel->getGameDayUserTickets($user->mid,$date,$date,$timefrom1,$timefrom2);
					$totwinamountlist = array();
						for($i=0;$i<count($usertickets);$i++){
							$numbers = json_decode($usertickets[$i]->ticket_numbers, true);
							$totalamt = 0;
							$winamt = 0;
							foreach ($numbers as $kk => $vv) {
								
								$userTx=$this->usermodel->getTransactionData($vv);
								$totalamt+=$userTx->bate_amount_by_user;
								 $userTx->game_id_custom;
								if (empty($winamountlist[$userTx->game_id_custom])) {
									$winamt+=0;
								} else {
									$winamt+=$winamountlist[$userTx->game_id_custom];
								}
							}
							$totwinamountlist[$usertickets[$i]->id] = array('tot_amt' => $totalamt, 'win_amt' => $winamt);
						}
		
						$salesReposrtUserResults = array();
		
						for($i=0;$i<count($usertickets);$i++){
							$data=array(
							"bated_amount"=> $totwinamountlist[$usertickets[$i]->id]['tot_amt'],
							"win_amount" => $totwinamountlist[$usertickets[$i]->id]['win_amt'],
							"date" => $usertickets[$i]->date_time,
							"game"=> $usertickets[$i]->game_id
							);
							array_push($salesReposrtUserResults, $data);
						}
						if (empty($salesReposrtUserResults)) {
							
							$data=array(
							"bated_amount"=> "0",
							"win_amount" => "0",
							"date" =>"",
							"game"=> "0000:00:00 00:00:00"
							);
							array_push($salesReposrtUserResults, $data);
						}
					
					} else {
						$msg = "Please enter all the values";
					}
				}
		
				$data['sales_report']=$salesReposrtUserResults;
			}
			else
			{
				$value1= array(
							"bated_amount"=> "0",
							"win_amount" => "0",
							"date" =>"",
							"game"=> "0000:00:00 00:00:00"
 				);  
				$data['sales_report'][]=$value1;
			}
			
			
			$this->load->view('front/sales_report',$data);
		}
		else 
		{
			$this->session->set_flashdata('message', "Not yet all logged in. Please enter your credentials to login.");
			redirect(base_url());
			exit;
		}
	}
	
	
	public function totalSalesReport1()
	{
		
		if( $this->session->userdata('isUserLoggedIn') ) 
		{
			if(isset($_POST['submit']))
			{
				 if (isset($_POST)) {
					if (!empty($_POST['dt'])) {
						$date = $_POST['dt'];
						 $dateto = $_POST['to_dt'];
						 $timefrom1 = $_POST['report_from'];
						 $timefrom2 = $_POST['report_to'];
						if ($timefrom1 == "selected" || empty($timefrom1)) {
							$timefrom1 = "7_0";
						}
						if ($timefrom2 == "selected" || empty($timefrom2)) {
							$timefrom2 = "8_1";
						}
						$arr1 = explode("_", $timefrom1);
						$arr2 = explode("_", $timefrom2);
						$time1 = "close";
						$time2 = "close";
		
						if (count($arr1) == 2) {
							$game1 = $arr1[0];
							if ($arr1[1] == "1") {
								$time1 = "open";
							}
						} else {
							$game1 = $arr1[0];
						}
		
						if (count($arr2) == 2) {
							$game2 = $arr2[0];
							if ($arr2[1] == "1") {
								$time2 = "open";
							}
						} else {
							$game2 = $arr2[0];
						}
	
						$game_start = $this->usermodel->getGameById($game1);
						if ($time1 == "close") {
							$timestart = $game_start->regular_end_time;
						} else if ($time1 == "open") {
							$timestart = $game_start->regular_start_time;
						}
						$game_end = $this->usermodel->getGameById($game2);
						if ($time2 == "close") {
							$time_end = $game_end->regular_end_time;
						} else if ($time2 == "open") {
							$time_end = $game_end->regular_start_time;
						}
						$user=$this->usermodel->getLoggedinUserData();
						
						$userresults = $this->usermodel->getGameDayUserResults($user->mid,$date,$dateto,$timestart,$time_end);
	
						$winamountlist = array();
						for($i=0;$i<count($userresults);$i++)
						{
							 $id=$userresults[$i]->game;
							$winamountlist[$id] = $userresults[$i]->win_amount;
						}
		
					
						$usertickets = $this->usermodel->getGameDayUserTickets($user->mid,$date,$dateto,$timefrom1,$timefrom2);
					$totwinamountlist = array();
						for($i=0;$i<count($usertickets);$i++){
							$numbers = json_decode($usertickets[$i]->ticket_numbers, true);
							$totalamt = 0;
							$winamt = 0;
							foreach ($numbers as $kk => $vv) {
								
								$userTx=$this->usermodel->getTransactionData($vv);
								$totalamt+=$userTx->bate_amount_by_user;
								 $userTx->game_id_custom;
								if (empty($winamountlist[$userTx->game_id_custom])) {
									$winamt+=0;
								} else {
									$winamt+=$winamountlist[$userTx->game_id_custom];
								}
							}
							$totwinamountlist[$usertickets[$i]->id] = array('tot_amt' => $totalamt, 'win_amt' => $winamt);
						}
		
						$salesReposrtUserResults = array();
		
						for($i=0;$i<count($usertickets);$i++){
							$data=array(
							"bated_amount"=> $totwinamountlist[$usertickets[$i]->id]['tot_amt'],
							"win_amount" => $totwinamountlist[$usertickets[$i]->id]['win_amt'],
							"date" => $usertickets[$i]->date_time,
							"game"=> $usertickets[$i]->game_id
							);
							array_push($salesReposrtUserResults, $data);
						}
						if (empty($salesReposrtUserResults)) {
							
							$data=array(
							"bated_amount"=> "0",
							"win_amount" => "0",
							"date" =>"",
							"game"=> "0000:00:00 00:00:00"
							);
							array_push($salesReposrtUserResults, $data);
						}
					
					} else {
						$msg = "Please enter all the values";
					}
				}
		
				$data['sales_report']=$salesReposrtUserResults;
			}
			else
			{
				$value1=  array(
							"bated_amount"=> "0",
							"win_amount" => "0",
							"date" =>"",
							"game"=> "0000:00:00 00:00:00"
 				);  
				$data['sales_report'][]=$value1;
			}
			
			
			$this->load->view('front/total_sales_report',$data);
		}
		else 
		{
			$this->session->set_flashdata('message', "Not yet all logged in. Please enter your credentials to login.");
			redirect(base_url());
			exit;
		}
	
	}
}