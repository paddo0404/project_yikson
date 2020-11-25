<?php

include("config.php");

include("db.class.php");

$callConfig=new configClass();
$callConfig->configConnection();

$method=$_REQUEST['method'];
$sender_email='vijayalakshmivulli@gmail.com';
function terminar($error)
{
	echo $error."\n";
	exit;
}


	
switch ($_REQUEST['method'])
{
	case "member_login":
	{
		$emailid=$_REQUEST['email'];$pwd=$_REQUEST['password'];
		global $callConfig;
		$query=$callConfig->selectQuery('tb_members','*',"email_id='".$emailid."'",'','','');
		$res=$callConfig->getRow($query);
		if($res->mid!='')
		{
			if($res->status=='Active')
			{
				$db_pwd=$callConfig->passwordDecrypt($res->user_pwd);
				if($db_pwd==$pwd)
				{
					$error='SUCCESS';
				}
				else
				{
					$error='INVALID_PASSWORD';
				}
			}
			else
			{
				$error='INACTIVE_ACCOUNT';
			}
		}
		else
		{
			$error='NOT_FOUND';
		}
        
		$result=array("message"=>$error);
		echo json_encode($result);
        break;
	}
	case "member_register":
	{
		global $callConfig;
		$pwd=$_REQUEST['password'];$new_pwd=$callConfig->passwordEncrypt($pwd);

		$query=$callConfig->selectQuery('tb_members','*',"email_id='".$_REQUEST['email']."'",'','','');
		$res=$callConfig->getRow($query);


		if($res->mid=='')
		{
			$fieldnames=array('full_name'=>mysql_real_escape_string($_REQUEST['name']),'email_id'=>mysql_real_escape_string($_REQUEST['email']),'date_of_birth'=>$_REQUEST['dob'],'user_pwd'=>$new_pwd,'gender'=>$_REQUEST['gender'],'status'=>"Active",'member_photo'=>'');
		
			$res=$callConfig->insertRecord('tb_members',$fieldnames);
		
			if($res!="")
			{
				$error='SUCCESS';
			}
			else
			{
				$error='FAILED';
			}

        }
		else
		{
			$error='EXISTED';
		}
		$result=array("message"=>$error);
		echo json_encode($result);
        break; 
	}
	case "forgot_password":
	{
		global $callConfig;
		$email=$_REQUEST['email'];
		$query=$callConfig->selectQuery('tb_members','*',"email_id='".$email."'",'','','');
		$res=$callConfig->getRow($query);
		if($res->mid!='')
		{
			if($res->status=='Active')
			{
					$from=$sender_email;
					$pwd=$callConfig->passwordDecrypt($res->user_pwd);
					$subject = "Your Account Details :: Yikson";
					$to=$email;
					$message = '<html><body>';
					$message .= '<table width="627"  cellpadding="10">';
					$message .= "<tr><td colspan=2><strong>Dear ".$res->full_name." ,</strong> </td></tr>";
					$message .= "<tr><td colspan='2'>Here are your login credentials.Now you can login by using following credentials.<br /></td></tr>";
					$message .= "<tr><td width='100px'><strong>User Name:</strong> </td><td>" . strip_tags( $res->email_id) . "</td></tr>";
					$message .= "<tr><td width='100px'><strong>Password:</strong> </td><td>" . strip_tags($pwd) . "</td></tr>";
					$message .= "<tr><td colspan='2' height='10px'></td></tr>";
					$message .= "<tr><td colspan=2><strong>Thank You,</strong> </td></tr>";
					$message .= "<tr><td colspan=2><strong>yikson.com</strong> </td></tr>";
					$message .= "</table>";
				    $message .= "</body></html>"; 
					
					$headers = "From: " . strip_tags($from) . "\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					$ok=mail($to,$subject,$message,$headers);
					$error='SUCCESS';

			}
			else
			{
				$error='INACTIVE_ACCOUNT';
			}
		}
		else
		{
			$error='NOT_FOUND';
		}
		$result=array("message"=>$error);
		echo json_encode($result);
        break;
	}
	case "show_images":
	{
		global $callConfig;		
		//$sql="SELECT * from tb_posts where  extension IN('jpg','jpeg','png') order by posted_on DESC";
		$sql = " SELECT tbp.post_id, tbp.message, tbp.file_name, tbp.extension, tbp.title, tbp.posted_on, tbm.full_name from tb_posts tbp ";
		$sql .= " INNER JOIN tb_members tbm on tbp.posted_by = tbm.mid where  tbp.extension IN('jpg','jpeg','png') order by tbp.posted_on DESC ";
		$res=$callConfig->getAllRows($sql);
		//$result=array($res);
		echo json_encode($res);
		break;		
	}
	case "show_images_gif":
	{
		global $callConfig;		
		$sql="SELECT * from tb_posts where  extension IN ('gif') order by posted_on DESC";
		$res=$callConfig->getAllRows($sql);
		//$result=array($res);
		echo json_encode($res);
		break;		
	}
	case "show_images_articals":
	{
		global $callConfig;		
		$sql="SELECT * from tb_posts where  extension IN ('gif') order by posted_on DESC";
		$res=$callConfig->getAllRows($sql);
		//$result=array($res);
		echo json_encode($res);
		break;		
	}
	case "upload_images":
	{
		global $callConfig;
		$query=$callConfig->selectQuery('tb_members','*',"email_id='".$_REQUEST['email']."'",'','','');
		$res=$callConfig->getRow($query);
		if($res->mid!='')
		{
			$fieldnames=array('posted_by'=>'1','title'=>mysql_real_escape_string($_REQUEST['title']),'message'=>mysql_real_escape_string($_REQUEST['message']),'extension'=>$$_REQUEST['extension'],'file_size'=>$_REQUEST['file_size'],'status'=>"Active");
		
			$res=$callConfig->insertRecord('tb_posts',$fieldnames);
		
			if($res!="")
			{
				$error='SUCCESS';
			}
			else
			{
				$error='FAILED';
			}
        }
		else
		{
			$error='NOT_FOUND';
		}
		$result=array("message"=>$error);
		echo json_encode($result);
        break; 
	}
	default:
	 terminar("INVALID_METHOD");
}

?>