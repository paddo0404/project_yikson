<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Results extends CI_Controller {
function __construct()
    {
        parent::__construct();
        $this->load->database();  
        $this->load->helper('text');
        $this->load->library('email');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('resultsmodel');
		$this->load->helper(array('form','url'));
		$this->load->library('upload');
		$this->load->library('form_validation');
		$this->load->library('pagination');
    }
	
	

	public function index()
	{
		date_default_timezone_set('Asia/Kolkata');

$dt=date('H:i').":00";
//$dt="12:00:00";
 $date=date("Y-m-d")." ".$dt;
 		$data=$this->resultsmodel->getGameData($dt);
	
		$count=count($data);
	 
		
$arr_super=array();
$arr_lucky=array();
for($i=0;$i<10;$i++)
{
	$arr_super[$i]=0;
}
for($j=0;$j<100;$j++)
{
	$k=sprintf('%02s', $j);
	$arr_lucky[$k]=0;
}
if($count=='1')
{
	
	$type=$data[0]->game_head_id;
	$dt_on=date('Y-m-d');
	$game_id=$data[0]->id."_1";
	$gameid=$data[0]->id;
	$data_rs=$this->resultsmodel->getTransactionData($dt_on,$game_id);
	
	for($i=0;$i<count($data_rs);$i++ )
	{    $s='';
	
	
	     $s=$data_rs[$i]['bate_series_number'];
		 $arr[$s]=$data_rs[$i]['total'];
		 if($type=='1')
		 {
			 $arr_super[$s]=$data_rs[$i]['total'];
		 }
		
	}
	
	
		 if($type=='1')
		 {
			asort($arr_super);
			$p=9;
			$arr1=$arr_super;
		 }
		 else
		 {
			asort($arr_lucky);
			 $p=90;
			 $arr1=$arr_lucky;
		 }
		 
		
		$kl=0;$least_no='';$arr2=array();
		foreach($arr1 as $key=>$val)
		{
			$kl++;
			if($kl=='1')
			{    $least_key=$key;
				 $least_no=$val;
				 $arr2[$key]=$val;
			}
			else
			{
				if($least_no==$val)
				{
					$arr2[$key]=$val;
				}
				
			}
			
		}
		
		 $win_no=array_rand($arr2,1);
		//$win_no='2';
		$rs_bid_usr=$this->resultsmodel->getTranData($game_id,$win_no);
		//print_r($rs_bid_usr);
		$count_bid=count($rs_bid_usr);
		 	$arr_arg=array(
			  'game_id' =>$gameid,
			  'game_date' => $dt_on,
			  'win_no_open' =>$win_no
			);
		 
		 $id=$this->resultsmodel->submitGameResult($arr_arg);
		if($count_bid>0)
		{
			
		for($i=0;$i<count($rs_bid_usr);$i++ )
			{    $s='';
						
					
						
				 $amt=$rs_bid_usr[$i]->bate_amount_by_user*$p;
				
					$arr_arg1=array(
					  'mid' =>$rs_bid_usr[$i]->user_id,
					  'rid' => $id,
					  'winning_number' =>$win_no,
					  'bated_amount'=>$rs_bid_usr[$i]->bate_amount_by_user,
					  'win_amount'=>$amt,
					  'game'=>$game_id,
					   'date' => $date
					);
					
					$this->resultsmodel->submitGameResultData($arr_arg1);
					$this->resultsmodel->UpdateMemberPrice($amt,$rs_bid_usr[$i]->user_id);
				
			}
			
		}
		
		
}
	}
}

