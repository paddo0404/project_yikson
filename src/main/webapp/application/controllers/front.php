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
		if( $this->session->userdata('isUserLoggedIn') )
		{
			$uid=$this->session->userdata('user_id');
			$data['all_categories']=$this->usermodel->getAllCategories();
			$data['all_posts']=$this->usermodel->getAllPosts();
			$data['all_followings']=$this->usermodel->getAllFollowings($uid);

			$this->load->view('front/dashboard',$data);	
		} else {
			$this->load->view('front/index');	
		}
	}

		
	public function user_dashboard()
	{
		if( $this->session->userdata('isUserLoggedIn') )
		{
			$uid=$this->session->userdata('user_id');
			$data['all_categories']=$this->usermodel->getAllCategories();
			$data['all_posts']=$this->usermodel->getAllPosts();
			$data['all_followings']=$this->usermodel->getAllFollowings($uid);

			$this->load->view('front/dashboard',$data);
		} 
		else
		{
			$this->load->view('front/index');	
		}
	}
	public function forgot_pwd()
	{
		if( $this->session->userdata('isUserLoggedIn') ) 
		{
			$this->load->view('front/dashboard');	
		} 
		else 
	    {
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
	
   public function edit_profile()
   {
		if( $this->session->userdata('isUserLoggedIn') )
		{
			 $uid=$this->session->userdata('user_id');
			 $data['user_data']=$this->usermodel->getUserData($uid);
			 $data['all_posts']=$this->usermodel->getAllPostsBasedOnUser($uid);

			
			$this->load->view('front/myprofile',$data);	
		} else {
			$this->load->view('front/index');	
		}
	}
	public function profile_information()
	{
		if( $this->session->userdata('isUserLoggedIn') ) {
			$this->load->view('front/profile_info');	
		} else {
			$this->load->view('front/index');	
		}
	}

	public function submit_new_post()
	{

		if($this->session->userdata('isUserLoggedIn') ) 
		{
			$file_name='';$ext='';$file_size='';$file_type='';$post_type='General';
			if($_FILES['post_file']['name']!="")
			{
				$result=$this->do_upload('post_file','gif|jpg|png|jpeg');
				if($result['error']!="")
				{
					 redirect("dashboard?ferr=".$result['error']);
					 exit();
				}
				else
				{
					$file_name=$result['file_name'];$post_type='Image';
					$file_type=str_replace(".","",$result['file_ext']);
					$file_size=$result['file_size'];
				}
			}
			
			$msg = $this->input->post('your_message');

			$data=array("message"=>$msg,"file_name"=>$file_name,"extension"=>$file_type,"posted_by"=>$this->session->userdata("user_id"),"file_size"=>$file_size,'status'=>'Active','post_type'=>$post_type);	
			$this->usermodel->submit_new_post($data);
			 redirect("dashboard?fsuccess=You have successfully posted new post");
			 exit();
		} 
		else 
		{
			$this->load->view('front/index');	
		}
	}

	function do_upload($filename,$extension)
	{
		 $config =  array(
					  'upload_path'     => "assets/uploads/posts/",
					  'allowed_types'   => $extension,
					  'overwrite'       => FALSE,
					  'max_size'        => "2048000",  // Can be set to particular file size
					  'max_height'      => "768",
					  'max_width'       => "1024",
					  "encrypt_name"=>TRUE
				     );    
		$this->upload->initialize( $config );
		if($this->upload->do_upload($filename))
		{
			$data =$this->upload->data();
			$data['error']='';
			return $data;
		}
		else
		{
			$error = array('error' => $this->upload->display_errors());
			return $error;
		}    
	}

	public function search_all_users()
	{
		if( $this->session->userdata('isUserLoggedIn') )
		{
			$keyword = $this->input->get('txtSearch');

			$data['all_users']=$this->usermodel->getAllUsers($keyword);
			
			$this->load->view('front/search_results',$data);	
		} else {
			$this->load->view('front/index');	
		}
	}
   
	public function friend_profile_details()
	{
		if( $this->session->userdata('isUserLoggedIn') )
		{
			$uid = $this->uri->segment('2');
			$data['user_data']=$this->usermodel->getUserData($uid);
			$data['all_posts']=$this->usermodel->getAllPostsBasedOnUser($uid);
			$this->load->view('front/friend_profile',$data);
		}
		else 
		{
			$this->load->view('front/index');	
		}
	}

   public function add_friend_data()
   {
		if( $this->session->userdata('isUserLoggedIn') )
		{
			$uid = $this->uri->segment('2');
			$myid = $this->session->userdata('user_id');
			$data=array("friend_id"=>$uid,"user_id"=>$myid,'status'=>'Requested');	
			$this->usermodel->submit_new_friend_request($data);

			redirect("friend_profile/".$uid."?fsuccess=You have successfully sent friend request");
			exit();
		}
		else 
		{
			$this->load->view('front/index');	
		}
   }

   public function add_following_data()
   {
		if( $this->session->userdata('isUserLoggedIn') )
		{
			$uid = $this->uri->segment('2');
			$myid = $this->session->userdata('user_id');
			$data=array("friend_id"=>$uid,"user_id"=>$myid,'status'=>'Active');	
			$this->usermodel->submit_new_following_request($data);
			redirect("friend_profile/".$uid."?fsuccess=You have successfully followed this friend");
			exit();
		}
		else 
		{
			$this->load->view('front/index');	
		}
   }
	
	public function profile_pictures()
	{
		if( $this->session->userdata('isUserLoggedIn') )
		{
			$uid = $this->uri->segment('2');
			$data['user_data']=$this->usermodel->getUserData($uid);
			$data['all_images']=$this->usermodel->getAllPicturesBasedOnUser($uid);
			$this->load->view('front/friend_profile_pictures',$data);
		}
		else 
		{
			$this->load->view('front/index');	
		}
	}

	public function profile_videos()
	{
		if( $this->session->userdata('isUserLoggedIn') )
		{
			$uid = $this->uri->segment('2');
			$data['user_data']=$this->usermodel->getUserData($uid);
			$data['all_videos']=$this->usermodel->getAllVideosBasedOnUser($uid);
			$this->load->view('front/friend_profile_videos',$data);
		}
		else 
		{
			$this->load->view('front/index');	
		}
	}
	

	public function all_images()
	{
		if( $this->session->userdata('isUserLoggedIn') )
		{
			$uid=$this->session->userdata('user_id');
			$data['all_categories']=$this->usermodel->getAllCategories();
			$data['all_posts']=$this->usermodel->getAllImages();
			$data['all_gif_posts']=$this->usermodel->getAllGifImages();
			$data['all_followings']=$this->usermodel->getAllFollowings($uid);

			$this->load->view('front/all_images',$data);
		} 
		else
		{
			$this->load->view('front/index');	
		}
	}

	public function all_videos()
	{
		if( $this->session->userdata('isUserLoggedIn') )
		{
			$uid=$this->session->userdata('user_id');
			$data['all_categories']=$this->usermodel->getAllCategories();
			$data['all_posts']=$this->usermodel->getAllVideos();
			$data['all_gif_posts']=$this->usermodel->getAllGifImages();
			$data['all_followings']=$this->usermodel->getAllFollowings($uid);

			$this->load->view('front/all_videos',$data);
		} 
		else
		{
			$this->load->view('front/index');	
		}
	}
	
	public function all_articals()
	{
		if( $this->session->userdata('isUserLoggedIn') )
		{
			$uid=$this->session->userdata('user_id');
			$data['all_categories']=$this->usermodel->getAllCategories();
			$data['all_posts']=$this->usermodel->getAllArticals();
			$data['all_gif_posts']=$this->usermodel->getAllGifImages();
			$data['all_followings']=$this->usermodel->getAllFollowings($uid);

			$this->load->view('front/all_articals',$data);
		} 
		else
		{
			$this->load->view('front/index');	
		}
	}


	public function all_images_category()
	{
		if( $this->session->userdata('isUserLoggedIn') )
		{
			$uid = $this->uri->segment('2');
			$uid=$this->session->userdata('user_id');
			$data['all_categories']=$this->usermodel->getAllCategories();
			$data['all_posts']=$this->usermodel->getAllImages();
			$data['all_gif_posts']=$this->usermodel->getAllGifImages();
			$data['all_followings']=$this->usermodel->getAllFollowings($uid);

			$this->load->view('front/all_images',$data);
		} 
		else
		{
			$this->load->view('front/index');	
		}
	}
	

	public function submit_image_post()
	{

		if($this->session->userdata('isUserLoggedIn') ) 
		{
			$file_name='';$ext='';$file_size='';$file_type='';$post_type='General';
			if($_FILES['upload_image']['name']!="")
			{
				$result=$this->do_upload('upload_image','gif|jpg|png|jpeg');
				if($result['error']!="")
				{
					 redirect("dashboard?ferr=".$result['error']);
					 exit();
				}
				else
				{
					$file_name=$result['file_name'];$post_type='Image';
					$file_type=str_replace(".","",$result['file_ext']);
					$file_size=$result['file_size'];
				}
			}
			$title = $this->input->post('image_title');
			$msg = $this->input->post('image_desc');

			$data=array("title"=>$title,"message"=>$msg,"file_name"=>$file_name,"extension"=>$file_type,"posted_by"=>$this->session->userdata("user_id"),"file_size"=>$file_size,'status'=>'Active','post_type'=>$post_type);	
			$this->usermodel->submit_new_post($data);
			 redirect("dashboard?fsuccess=You have successfully posted image");
			 exit();
		} 
		else 
		{
			$this->load->view('front/index');	
		}
	}

	public function submit_gif_post()
	{

		if($this->session->userdata('isUserLoggedIn') ) 
		{
			$file_name='';$ext='';$file_size='';$file_type='';$post_type='General';
			if($_FILES['upload_gif_image']['name']!="")
			{
				$result=$this->do_upload('upload_gif_image','gif');
				if($result['error']!="")
				{
					 redirect("dashboard?ferr=".$result['error']);
					 exit();
				}
				else
				{
					$file_name=$result['file_name'];$post_type='Image';
					$file_type=str_replace(".","",$result['file_ext']);
					$file_size=$result['file_size'];
				}
			}
			$title = $this->input->post('gif_title');
			$msg = $this->input->post('gif_desc');

			$data=array("title"=>$title,"message"=>$msg,"file_name"=>$file_name,"extension"=>$file_type,"posted_by"=>$this->session->userdata("user_id"),"file_size"=>$file_size,'status'=>'Active','post_type'=>$post_type);	
			$this->usermodel->submit_new_post($data);
			 redirect("dashboard?fsuccess=You have successfully posted gif image");
			 exit();
		} 
		else 
		{
			$this->load->view('front/index');	
		}
	}
	
	public function submit_video_post()
	{

		if($this->session->userdata('isUserLoggedIn') ) 
		{
			$file_name='';$ext='';$file_size='';$file_type='';$post_type='General';
			if($_FILES['upload_video']['name']!="")
			{	
				$name=$_FILES['upload_video']['name'];
				$extension  = pathinfo($name, PATHINFO_EXTENSION);
				$new = rand(0000,9999);
				$newfilename=$new.$name;				
				//$type=$_FILES['upload_video']['type'];
				$size=$_FILES['upload_video']['size'];
				$cname=str_replace(" ","_",$new.$name);
				$tmp_name=$_FILES['upload_video']['tmp_name'];
				$target_path="assets/uploads/video_post/";
				$target_path=$target_path.basename($cname);
				
				 if(move_uploaded_file($_FILES['upload_video']['tmp_name'],$target_path))
				 {
					$file_name=$cname;
					$post_type='Video';
					$file_type=$extension;
					$file_size=$size;
				 }
				 else
				 {
				   redirect("dashboard?ferr=".$result['error']);
				   exit();
				 }
			}
			$title = $this->input->post('video_title');
			$msg = $this->input->post('video_desc');

			$data=array("title"=>$title,"message"=>$msg,"file_name"=>$file_name,"extension"=>$file_type,"posted_by"=>$this->session->userdata("user_id"),"file_size"=>$file_size,'status'=>'Active','post_type'=>$post_type);	
			$this->usermodel->submit_new_post($data);
			 redirect("dashboard?fsuccess=You have successfully posted Video");
			 exit();
		} 
		else 
		{
			$this->load->view('front/index');	
		}
	}
	
	
}