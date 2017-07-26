<?php

class Model_data extends CI_Model {

    public function __construct() {
        parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
    }

	 private $table ="kepegawaian.tm_pegawai";

		
		
	public function getdata($paging){
		
		$keyword = trim($this->input->get_post("keyword"));
		
	    $this->db->select("*");
        $this->db->from(''.$this->table.'');
		$this->db->where("tmsekolah_id",$_SESSION['tmsekolah_id']);
		$this->db->where("status_jabatan","staff");
		
         if($paging==true){
				     $this->db->limit($_REQUEST['length'],$_REQUEST['start']);
					 $this->db->order_by("nama","asc");
			 }
        
	    if($keyword !=""){ $this->db->where("UPPER(nama) LIKE '%".strtoupper($keyword)."%'"); }
		
		
		return $this->db->get();
		
	
	}
	
	

	
	
	
	
	
	
	
	
}
