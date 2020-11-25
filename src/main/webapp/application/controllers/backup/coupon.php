<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class coupon extends CI_Controller
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
	
	
	public function lucky()
	{
		$data["bombaygames"] = $this->usermodel->getAllBombayGames();
		$this->load->view('front/single',$data);	
	}
	
	
	
	
	
	
	
	public function book_your_ticket()
	{
		  if (!empty($_POST)) {
			
            $data = $this->process($_POST); //array of processed models to be saved
          $tickets = array();
            $user =$this->usermodel->getLoggedinUserData();
            if ($data['balance_used'] > $user->acc_balance) {
                 redirect(base_url()."");
            }
			 $selectedSeries = $this->getSelectedSeries($_POST);
			
			
            foreach ($data["userTxList"] as $key => $userTx) 
			{
				
				//print_r($userTx);exit;
				
				
				$id=$this->usermodel->saveGameData($userTx);
                if ($id!="") 
				{
					$var = $id;
					$userTx['id']=$id;
                    $cc =  $userTx['id'];
                    $tickets[$id] = array($userTx['game_id_custom'], $userTx['valid_till_date'], $userTx['bate_amount_by_user']);
                    if (empty($ticketByGames[$userTx['game_id_custom']])) {
                        $ticketByGames[$userTx['game_id_custom']] = array();
                    }
                    array_push($ticketByGames[$userTx['game_id_custom']], $id);
                }
            }

 			$user =$this->usermodel->getLoggedinUserData();
            foreach ($ticketByGames as $key => $ticketByGame) 
			{
			  $jsondata = json_encode($ticketByGame);
			  $this->_SaveTicketDetails($key,$user->mid,$jsondata);
            }
				
            $Points = $data['balance_used'];
           $this->usermodel->updateRemainingPoints($Points,$user->mid);
           
        }
		
		   redirect("user/viewtickets");
			 exit;
	}
	
	    function _SaveTicketDetails($game_id_custom,$mid, $jsondata) {
        $arr = explode("_", $game_id_custom);
        $game = $this->usermodel->getGameById($arr[0]);
        if (is_numeric($game_id_custom)) {
            $game_name = $game->name;
        } else {
            $game_name = $game->name;
            if ($arr[1] == 0) {
                $game_name = $game->name . " CLOSE";
            }if ($arr[1] == 1) {
                $game_name = $game->name . " at ".date('h:i A', strtotime($game->regular_start_time));
            }
        }
		
			$data=array(
						"ticket_numbers"=>$jsondata,
						"m_id"=>$mid,
						"game_id"=>$game_id_custom,
						"game_name"=>$game_name
						
						 );	
						$this->usermodel->SaveUserTicket($data);
 		
    }
	
	
	  public function process($data) {
        $txCollection = Array();
        $balanceUsed = 0;
		
       $users = $this->usermodel->getLoggedinUserData();
		
        $gamename_ids = $data['name_id'];
        $game_valid_till_date = $data['date'];
		
		
        $selectedSeries = $this->getSelectedSeries($data);

       foreach ($gamename_ids as $key1 => $gamename_id) {
            foreach ($selectedSeries as $seriesColumnNumber => $bateAmount) {
				
               $ser_no= $this->getCouponNumberFromSeriesColumn($seriesColumnNumber);
			   if($seriesColumnNumber=='450' || $seriesColumnNumber=='231')
			   {
			   	    $ser_no=sprintf("%02d", $ser_no);
			   }
			   if($seriesColumnNumber=='230')
			   {
				    $ser_no=sprintf("%03d", $ser_no);
			   }
			   
			    if($seriesColumnNumber>230 && $seriesColumnNumber<241)
			   {
				    $ser_no=sprintf("%02d", $ser_no);
			   }
			    if($seriesColumnNumber>440 && $seriesColumnNumber<451)
			   {
				    $ser_no=sprintf("%02d", $ser_no);
			   }
			   
			   
                $userTx = array('game_id_custom' => $gamename_id,
                    'user_id' => $users->mid,
                    'bate_type' => json_encode($this->gameBateTypeFromRange($seriesColumnNumber)),
                    'bate_amount_by_user' => $bateAmount,
                    'bate_series_number' =>$ser_no,// $this->getCouponNumberFromSeriesColumn($seriesColumnNumber),
                    'bate_series_column' => $seriesColumnNumber,
                    'valid_till_date' => $game_valid_till_date
                );
                $balanceUsed = $balanceUsed + $bateAmount;
                array_push($txCollection, $userTx);
            }
        }
        return array("userTxList" => $txCollection, "balance_used" => $balanceUsed);
    }
	
	 public static function getSelectedSeries($data) {
        $selectedList = array();

        foreach ($data['text'] as $key1 => $subarr) {
            foreach ($subarr as $key2 => $value) {
                if (!empty($value)) {
                    $selectedList[$key2] = $value;
                }
            }
        }
        return $selectedList;
    }
	
	    public  function getCouponNumberFromSeriesColumn($seriesColumnNumber) {
        $couponValidList = $this->getCouponValidList();
		
        $couponFullList = array_merge($couponValidList[1], $couponValidList[2], $couponValidList[3], $couponValidList[4], $couponValidList[5], $couponValidList[6], $couponValidList[7], $couponValidList[8]);
        return $couponFullList[$seriesColumnNumber - 1];
    }
	
	
	  public  function getCouponValidList() {
		  
		 
         $couponValidList = array(
            1 => array(
                1 => 1, 2, 3, 4, 5, 6, 7, 8, 9, 0
            ),
            2 => array(
                11 => 128, 129, 120, 130, 140, 123, 124, 125, 126, 127,
                137, 138, 139, 149, 159, 150, 160, 134, 135, 136,
                146, 147, 148, 158, 168, 169, 179, 170, 180, 145,
                236, 156, 157, 167, 230, 178, 250, 189, 234, 190,
                245, 237, 238, 239, 249, 240, 269, 260, 270, 235,
                290, 246, 247, 248, 258, 259, 278, 279, 289, 280,
                380, 345, 256, 257, 267, 268, 340, 350, 360, 370,
                470, 390, 346, 347, 348, 349, 359, 369, 379, 389,
                489, 480, 490, 356, 357, 358, 368, 378, 450, 460,
                560, 570, 580, 590, 456, 367, 458, 459, 469, 479,
                579, 589, 670, 680, 690, 457, 467, 468, 478, 569,
                678, 679, 689, 789, 780, 790, 890, 567, 568, 578
            ),
            3 => array(
                131 => 100, 110, 166, 112, 113, 114, 115, 116, 117, 118,
                119, 200, 229, 220, 122, 277, 133, 224, 144, 226,
                155, 228, 300, 266, 177, 330, 188, 233, 199, 244,
                227, 255, 337, 338, 339, 448, 223, 288, 225, 299,
                335, 336, 355, 400, 366, 466, 377, 440, 388, 334,
                344, 499, 445, 446, 447, 556, 449, 477, 559, 488,
                399, 660, 599, 455, 500, 600, 557, 558, 577, 550,
                588, 688, 779, 699, 799, 880, 566, 800, 667, 668,
                669, 778, 788, 770, 889, 899, 700, 990, 900, 677
            ),
            4 => array(221 => 777, 444, 111, 888, 555, 222, 999, 666, 333, 000
            ),
            5 => array(
                231 => 00, 01, 02, 03, 04, 05, 06, 07, 8, 9,
                10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
                20, 21, 22, 23, 24, 25, 26, 27, 28, 29,
                30, 31, 32, 33, 34, 35, 36, 37, 38, 39,
                40, 41, 42, 43, 44, 45, 46, 47, 48, 49,
                50, 51, 52, 53, 54, 55, 56, 57, 58, 59,
                60, 61, 62, 63, 64, 65, 66, 67, 68, 69,
                70, 71, 72, 73, 74, 75, 76, 77, 78, 79,
                80, 81, 82, 83, 84, 85, 86, 87, 88, 89,
                90, 91, 92, 93, 94, 95, 96, 97, 98, 99,
            ),
            6 => array(
                331 => 1, 2, 3, 4, 5, 6, 7, 8, 9, 0
            ),
            7 => array(
                341 => 1, 2, 3, 4, 5, 6, 7, 8, 9, 0
            ),
            8 => array(
                351 => 11, 12, 13, 14, 15, 16, 17, 18, 19, 10,
                21, 22, 23, 24, 25, 26, 27, 28, 29, 20,
                31, 32, 33, 34, 35, 36, 37, 38, 39, 30,
                41, 42, 43, 44, 45, 46, 47, 48, 49, 40,
                51, 52, 53, 54, 55, 56, 57, 58, 59, 50,
                61, 62, 63, 64, 65, 66, 67, 68, 69, 60,
                71, 72, 73, 74, 75, 76, 77, 78, 79, 70,
                81, 82, 83, 84, 85, 86, 87, 88, 89, 80,
                91, 92, 93, 94, 95, 96, 97, 98, 99, 90,
                01, 02, 03, 04, 05, 06, 07, 08, 09, 00
            )
        );
		  //.print_r($couponValidList); echo "<br>--------------------------------<br>"; exit;
		 return $couponValidList;
    }

	  public  function gameBateTypeFromRange($seriesColumn) {
        switch ($seriesColumn) {
            case $seriesColumn <= 10:
                return array(1 => 9);
                break;
            case $seriesColumn <= 130:
                return array(1 => 140);
                break;
            case $seriesColumn <= 220:
                return array(1 => 280);
                break;
            case $seriesColumn <= 230:
                return array(1 => 800);
                break;
            case $seriesColumn <= 330:
                return array(1 => 90);
                break;
            case $seriesColumn <= 340:
                return array(1 => 8);
                break;
            case $seriesColumn <= 350:
                return array(1 => 8);
                break;
            case $seriesColumn <= 450:
                return array(1 => 80);
                break;
            default:
                break;
        }
    }

}