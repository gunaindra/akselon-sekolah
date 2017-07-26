<?php

class Model_data extends CI_Model {

    public function __construct() {
        parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
    }

	 private $table ="kepegawaian.tr_gurumapel";

		
		
	public function getdata($paging){
		
		$keyword = trim($this->input->get_post("keyword"));
		$ajaran = $this->Acuan_model->ajaran();
		
		
	    $this->db->select("*");
        $this->db->from('kepegawaian.tm_pegawai');
		$this->db->where("tmsekolah_id",$_SESSION['tmsekolah_id']);
		$this->db->where("id in (select distinct(tmpegawai_id) from kepegawaian.tr_gurumapel where tmsekolah_id='".$_SESSION['tmsekolah_id']."')");
		
         if($paging==true){
				     $this->db->limit($_REQUEST['length'],$_REQUEST['start']);
					 $this->db->order_by("nama","asc");
			 }
        
	    if($keyword !=""){ $this->db->where("UPPER(nama) LIKE '%".strtoupper($keyword)."%'"); }
		
		
		return $this->db->get();
		
	
	}
	
	
	public function getdataguru($paging){
		
		$keyword = trim($this->input->get_post("keyword"));
		
		
		
	    $this->db->select("*");
        $this->db->from('kepegawaian.tm_pegawai');
		$this->db->where("tmsekolah_id",$_SESSION['tmsekolah_id']);
		$this->db->where("status_jabatan","guru");
		$this->db->where("id not in (select distinct(tmpegawai_id) from kepegawaian.tr_gurumapel where tmsekolah_id='".$_SESSION['tmsekolah_id']."')");
		
		
         if($paging==true){
				     $this->db->limit($_REQUEST['length'],$_REQUEST['start']);
					 $this->db->order_by("nama","asc");
			 }
        
	    if($keyword !=""){ $this->db->where("UPPER(nama) LIKE '%".strtoupper($keyword)."%'"); }
		
		
		return $this->db->get();
		
	
	}
	
	

	
	 
	
}
