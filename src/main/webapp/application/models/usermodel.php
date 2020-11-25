<?php

class usermodel extends CI_Model 
{
	
	function __construct()
    {
        parent::__construct();
    }	
	
	function pwdEncrypt($pwd)
	{
		return base64_encode(base64_encode($pwd));
	}

	function pwdDecrypt($pwd)
	{
		return base64_decode(base64_decode($pwd));
	}

	function check_user_login($userid)
	{
		$where=array('email_id'=>$userid);
		$this->db->select("*");
	  	$this->db->from("tb_members");
		$this->db->where($where);
		$data=$this->db->get()->result();	
		return $data;
	}
     public function send_mail($from_name,$from_email,$to_mail,$subject,$body) { 
           
         //Load email library 
         $this->load->library('email'); 
   
         $this->email->from($from_email, $from_name); 
         $this->email->to($to_mail);
         $this->email->subject($subject); 
         $this->email->message($body); 
   
         //Send mail 
         if($this->email->send()) 
			return "success";
         else 
			return "failed";
      } 
	
	function member_create($data)
	{
		$this->table_name = "tb_members";
		$count = $this->db->insert($this->table_name,$data);
		return $count;
	}

	function submit_new_post($data)
	{
		$this->table_name = "tb_posts";
		$count = $this->db->insert($this->table_name,$data);
		return $count;
	}

    
  function getAllPosts()
  {
	    $this->db->select("*");
	  	$this->db->from("tb_posts");
		$this->db->order_by("posted_on",'DESC');
	  	return $this->db->get()->result();	
  }
  function getUserData($id)
    {
        $this->db->select("*");
	  	$this->db->from("tb_members");
		$this->db->where('mid',$id);
		$data=$this->db->get()->result();	
		 return $data;
    }
	function getAllUsers($keyword)
    {
        $this->db->select("*");
	  	$this->db->from("tb_members");
		$this->db->where('status','Active');
		$this->db->like("full_name",$keyword);
		$data=$this->db->get()->result();	
		 return $data;
    }

  function getAllPostsBasedOnUser($uid)
  {
	    /* $where=array('posted_by'=>$uid);
	    $this->db->select("*");
	  	$this->db->from("tb_posts");
		$this->db->where($where);
		$this->db->order_by("posted_on",'DESC');
	  	return $this->db->get()->result();	*/
		$sql="SELECT * from tb_posts where posted_by=".$uid." and extension IN('jpg','gif','jpeg','png') order by posted_on DESC";
			$data=$this->db->query($sql);
			return $data->result_array();
  }
	

	function submit_new_friend_request($data)
	{
		$this->table_name = "tb_friend_requests";
		$count = $this->db->insert($this->table_name,$data);
		return $count;
	}

	function submit_new_following_request($data)
	{
		$this->table_name = "tb_friend_followings";
		$count = $this->db->insert($this->table_name,$data);
		return $count;
	}

	function getAllPostsBasedOnUserPictures($uid)
	{
		$sql="SELECT * from tb_posts where posted_by=".$uid." and extension IN('jpg','gif','jpeg','png') order by posted_on DESC";
		$data=$this->db->query($sql);
		return $data->result_array();
	}

	function getAllCategories()
	{
		
		$this->db->select("*");
	  	$this->db->from("tb_categories");
		$this->db->where('status','Active');
		$data=$this->db->get()->result();	
		return $data;
	}

	function getAllFollowings($uid)
	{
		$sql="SELECT m.full_name,m.mid from tb_members m,tb_friend_followings f where f.friend_id=m.mid and f.user_id=".$uid." order by m.full_name ASC";
		$data=$this->db->query($sql);
		return $data->result_array();
	}

	function getAllPicturesBasedOnUser($uid)
	{
		
		$this->db->select("*");
	  	$this->db->from("tb_posts");
		$data=array('status'=>'Active','post_type'=>'Image');
		$this->db->where($data);
		$data=$this->db->get()->result();	
		return $data;
	}

	function getAllVideosBasedOnUser($uid)
	{
		
		$this->db->select("*");
	  	$this->db->from("tb_posts");
		$data=array('status'=>'Active','post_type'=>'Video');
		$this->db->where($data);
		$data=$this->db->get()->result();	
		return $data;
	}


	function getAllImages()
	{
		$sql="SELECT * from tb_posts where  extension IN('jpg','jpeg','png') order by posted_on DESC";
		$data=$this->db->query($sql);
		return $data->result_array();
	}
	
	function getAllVideos()
	{
		$sql="SELECT * from tb_posts where  extension IN('avi') order by posted_on DESC";
		$data=$this->db->query($sql);
		return $data->result_array();
	}
	
	function getAllArticals()
	{
			$sql="SELECT * from tb_posts where  extension IN('jpg','jpeg','png') order by posted_on DESC";
		$data=$this->db->query($sql);
		return $data->result_array();
	}	
	function getAllGifImages()
	{
		$sql="SELECT * from tb_posts where  extension IN ('gif') order by posted_on DESC";
		$data=$this->db->query($sql);
		return $data->result_array();
	}
	
	function getlikeunlikecount($post_id, $like_type)
	{
		//$sql="SELECT count(*) as cntStatus,type FROM like_unlike WHERE userid=".$like_type." and postid=".$post_id;
		//$data=$this->db->query($sql);
		//return $data->result_array();
		
		//$data=$this->db->get()->result();	
		//return $data;
		
	$this->db->select("count(*) as cntStatus,type");
	  	$this->db->from("like_unlike");
		$data=array('type'=>$like_type,'postid'=>$post_id);
		$this->db->where($data);
		$data=$this->db->get()->result();	
		return $data;
		
	}
	
	

}

?>