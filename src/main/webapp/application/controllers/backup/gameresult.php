<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gameresult extends CI_Controller
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
	
	
	public function game_result()
	{
		$gameResults=array();
        $allgameNameTypes=array();
        if(isset($_POST['date_form'])) {
            $allgames = $this->usermodel->getAllGamesData();
            $selectedDate = date('Y-m-d',strtotime($_POST['date_form']));
            $date2 =$selectedDate;
            $thirydays_prior=date('Y-m-d',strtotime($date2 . "-30 days"));
            $start_time = $thirydays_prior . ' 00:00:00';
            $end_time = $selectedDate . ' 23:59:59';
           
            $gamesResults = $this->usermodel->getGameResults($start_time,$end_time);
			
			
            $allgameNameTypes = $this->_getGameNametypesList($allgames);
            asort($allgameNameTypes);
			
            $gameResults = $this->_formatHomePageGamesesultByDate($gamesResults);
			$data["gameNamesList"]=$allgameNameTypes;
			$data["game_results"]=$gameResults;
			$data["result"]=1;
        }
		else
		{
			$data["result"]=0;
		}
		$this->load->view('front/game_result',$data);	
	}
	
	
	 function _getGameNametypesList($gamesList) {
        $formattedGameNamesList = array();
        foreach ($gamesList as $key => $value) {
            $formattedGameNamesList[$value->regular_start_time]['id'] = $value->id;
			 $formattedGameNamesList[$value->regular_start_time]['name'] = $value->name;
            $formattedGameNamesList[$value->regular_start_time]['type'] = $value->game_head_id;
        }
		
		
        return $formattedGameNamesList;
    }

  function _formatHomePageGamesesultByDate($gamesResults) {
        $dateOrderedGames = array();
        foreach ($gamesResults as $key => $value) {
            $date = new DateTime($value->game_date);
            $date = $date->format('Y-m-d');
            $dateOrderedGames[$date][$value->game_id] = $value;
        }
        return $dateOrderedGames;
    }
}