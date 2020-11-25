<?php
class resultsmodel extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }	
	
	function getGameData($dt){
		 $where=array('regular_start_time'=>$dt);
		$this->db->select("*");
	  	$this->db->from("tb_games");
		$this->db->where($where);
		$data=$this->db->get()->result();	
		 return $data;

	}
	
	function getTransactionData($dt,$gid){

	    $sql_tran="select bate_series_number,sum(bate_amount_by_user) total from tb_user_transaction where valid_till_date='".$dt."' and game_id_custom='".$gid."' GROUP BY bate_series_number  order by total,bate_series_number ASC";
		$data=$this->db->query($sql_tran);
		return $data->result_array();
    }
	
	function getTranData($gid,$no){
		 $where=array('game_id_custom'=>$gid,'bate_series_number'=>$no);
		$this->db->select("*");
	  	$this->db->from("tb_user_transaction");
		$this->db->where($where);
		//$this->db->last_query();
		$data=$this->db->get()->result();	
		 return $data;

	}
	
	function submitGameResult($arr_arg)
	{
		$this->table_name = "tb_gameresult";
		$count = $this->db->insert($this->table_name,$arr_arg);
		return  $this->db->insert_id();
	}
	function submitGameResultData($arr_arg)
	{
		$this->table_name = "tb_game_result";
		$this->db->insert($this->table_name,$arr_arg);
		//return  $this->db->insert_id();
	}
     
	 function UpdateMemberPrice($points,$mid)
	 {
		$total="acc_balance+".$points;
		$this->db->set('acc_balance',$total, FALSE);
		$this->db->where('mid', $mid);
		$this->db->update('tb_members');
	 }
}
?>