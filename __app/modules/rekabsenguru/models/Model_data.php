<?php

class Model_data extends CI_Model {

    public function __construct() {
        parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
    }

	 private $table ="akademik.tr_absensiguru";

		
		
	public function getdata($paging){
		
		$keyword = trim($this->input->get_post("keyword"));
		$tanggal = trim($this->input->get_post("tanggal"));
		
	    $this->db->select("*");
        $this->db->from(''.$this->table.'');
		$this->db->where("tmsekolah_id",$_SESSION['tmsekolah_id']);
		
         if($paging==true){
				     $this->db->limit($_REQUEST['length'],$_REQUEST['start']);
					 $this->db->order_by("tanggal","desc");
			 }
        
	    if($keyword !=""){ $this->db->where("UPPER(tmsiswa_id) LIKE '%".strtoupper($keyword)."%'"); }
		
		
		return $this->db->get();
		
	
	}
	
	

	
	
	
}
