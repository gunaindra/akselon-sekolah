<?php

class Model_datasiswa extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
	private $table ="tm_siswa";

		
		
	public function getdata($paging){
		$ajaran = $this->Acuan_model->ajaran();
		$keyword 		= trim($this->input->get_post("keyword"));
		$tmjenjang_id   = trim($this->input->get_post("tmjenjang_id"));
		$tmkelas_id	    = trim($this->input->get_post("tmkelas_id"));
		$tmsiswa_id	    = trim($this->input->get_post("tmsiswa_id"));
		$status	    = trim($this->input->get_post("status"));
		
	    $this->db->select("*");
        $this->db->from('v_siswa');
		$this->db->where("tmsekolah_id",$_SESSION['tmsekolah_id']);
		
		$this->db->where('ajaran',$ajaran);
		
         if($paging==true){
				     $this->db->limit($_REQUEST['length'],$_REQUEST['start']);
					 
			 }
        
	   
	    if($tmsiswa_id !=""){ $this->db->where("id",$tmsiswa_id); }
	    if($tmjenjang_id !=""){ $this->db->where("tmjenjang_id",$tmjenjang_id); }
	    if($tmkelas_id !=""){ $this->db->where("tmkelas_id",$tmkelas_id); }
	    if($status !=""){ $this->db->where("status",$status); }else{ $this->db->where("status='1' or status='99' or status='98' or status='97' or status='96'");   }
	    
		if($keyword !=""){ $this->db->where("UPPER(nama) LIKE '%".strtoupper($keyword)."%' or upper(no_pendaftaran) LIKE '%".strtoupper($keyword)."%'"); }
		
		return $this->db->get();
		
	
	}
	
	
	  public function get_persyaratan($id){
		
		
		$this->db->select("*");
		$this->db->from("tm_persyaratan");

		
		$this->db->where("tmjenjang_id",$id);
		$this->db->order_by("persyaratan","asc");
		return $this->db->get();
		
		
		
		
	}
	

	 public function save_persyaratan($data){
		
		
		$this->db->insert("tr_persyaratan",$data);
		
	}
	
	
	
	
	
	
	
	
	
}
