<?php

class Data_siswa_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    

		
		
	public function getdata($tmjenjang_id="",$tmkelas_id="",$keyword=""){
		
	
		
		$ajaran = $this->Acuan_model->ajaran();
		
		
	    $this->db->select("*");
        $this->db->from('v_siswa');
		$this->db->where("tmsekolah_id",$_SESSION['tmsekolah_id']);
		$this->db->where("status",2);
		$this->db->where("tmruang_id is NULL");
		$this->db->where('ajaran',$ajaran);
		
	   
	    
	    if($tmjenjang_id !=""){ $this->db->where("tmjenjang_id",$tmjenjang_id); }
	    if($tmkelas_id !=""){ $this->db->where("tmkelas_id",$tmkelas_id); }
	    
		if($keyword !=""){ $this->db->where("UPPER(nama) LIKE '%".strtoupper($keyword)."%'"); }
		
		return $this->db->get();
	
	}
	
	
	
	
	
	    
		
		
	
	
	
	
	
}
