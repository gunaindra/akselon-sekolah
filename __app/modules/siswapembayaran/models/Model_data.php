<?php

class Model_data extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    

	
	
	 private $table ="tm_siswa";

		
		
	public function getdata($paging){
		$ajaran = $this->Acuan_model->ajaran();
		$keyword 		= trim($this->input->get_post("keyword"));
		$tmjenjang_id   = trim($this->input->get_post("tmjenjang_id"));
		$tmkelas_id	    = trim($this->input->get_post("tmkelas_id"));
		$tmruang_id	    = trim($this->input->get_post("tmruang_id"));
		
	    $this->db->select("*");
        $this->db->from('v_siswa');
		$this->db->where("tmsekolah_id",$_SESSION['tmsekolah_id']);
		$this->db->where("status",2);
		$this->db->where('ajaran',$ajaran);
		$this->db->where('id in (select distinct(tmsiswa_id) from tr_keuangan)');
         if($paging==true){
				     $this->db->limit($_REQUEST['length'],$_REQUEST['start']);
					 
			 }
        
	    if($tmjenjang_id !=""){ $this->db->where("tmjenjang_id",$tmjenjang_id); }
	    if($tmkelas_id !=""){ $this->db->where("tmkelas_id",$tmkelas_id); }
	    if($tmruang_id !=""){ $this->db->where("tmruang_id",$tmruang_id); }
		if($keyword !=""){ $this->db->where("UPPER(nama) LIKE '%".strtoupper($keyword)."%' or UPPER(nama_ibu) LIKE '%".strtoupper($keyword)."%' or  UPPER(nama_ayah) LIKE '%".strtoupper($keyword)."%'" ); }
	 
		
		
		return $this->db->get();
		
	
	}
	

	
	  public function update() {
		  
		   $id             = trim($this->input->get_post("id"));
		   $dibayar        = trim($this->input->get_post("dibayar"));
		  
		    
			
            $this->db->set('d_update', date('Y-m-d H:i:s'));
			$this->db->set('i_update', $_SESSION['user_id']);
		
			$this->db->set('status',$this->input->get_post("status"));
			$this->db->set('dibayar',$dibayar);
			;
			$this->db->where('id',$id);
			$this->db->update("tr_keuangan");
		   
			$this->Acuan_model->log($_SESSION['nama']." Membayar Tagihan Siswa  ");
				
				
		
		
    }
	

	
	
	
	
	
}
