<?php

class Model_data extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    

	
	
	 private $table ="akademik.tm_siswa";

		
		
	public function getdata($paging){
		$ajaran = $this->Acuan_model->ajaran();
		$keyword 		= trim($this->input->get_post("keyword"));
		$tmjenjang_id   = trim($this->input->get_post("tmjenjang_id"));
		$tmkelas_id	    = trim($this->input->get_post("tmkelas_id"));
		$tmruang_id	    = trim($this->input->get_post("tmruang_id"));
		
	    $this->db->select("*");
        $this->db->from('view.v_siswa');
		$this->db->where("tmsekolah_id",$_SESSION['tmsekolah_id']);
		$this->db->where("status",2);
		$this->db->where('ajaran',$ajaran);
		
         if($paging==true){
				     $this->db->limit($_REQUEST['length'],$_REQUEST['start']);
					 
			 }
        
	    if($tmjenjang_id !=""){ $this->db->where("tmjenjang_id",$tmjenjang_id); }
	    if($tmkelas_id !=""){ $this->db->where("tmkelas_id",$tmkelas_id); }
	    if($tmruang_id !=""){ $this->db->where("tmruang_id",$tmruang_id); }
		if($keyword !=""){ $this->db->where("UPPER(nama) LIKE '%".strtoupper($keyword)."%' or UPPER(nama_ibu) LIKE '%".strtoupper($keyword)."%' or  UPPER(nama_ayah) LIKE '%".strtoupper($keyword)."%'" ); }
	 
		
		
		return $this->db->get();
		
	
	}
	
	public function validasi(){
	   $ajaran        = $this->Acuan_model->ajaran();
       $tmsiswa_id    = $this->input->get_post("tmsiswa_id");
       $tmjenjang_id  = $this->input->get_post("tmjenjang_id");
       $tmkeuangan_id = $this->input->get_post("tmkeuangan_id");
	   
	   $this->db->select("id");
	   $this->db->from("akademik.tr_keuangan");
	   $this->db->where("ajaran",$ajaran);
	   $this->db->where("tmsiswa_id",$tmsiswa_id);
	   $this->db->where("tmkeuangan_id",$tmkeuangan_id);
	   $this->db->where("tmjenjang_id",$tmjenjang_id);
	   return $this->db->get()->num_rows();
		
		
	}
	
	  public function insert() {
		   $ajaran        = $this->Acuan_model->ajaran();
		   $tmsiswa_id    = $this->input->get_post("tmsiswa_id");
		   $tmjenjang_id  = $this->input->get_post("tmjenjang_id");
		   $tmkeuangan_id = $this->input->get_post("tmkeuangan_id");
		   $jumlah        = trim($this->input->get_post("jumlah"));
		   $id        	  = $this->Acuan_model->id("akademik.tr_keuangan");
           
		    
			
            $this->db->set('d_entry', date('Y-m-d H:i:s'));
			$this->db->set('i_entry', $_SESSION['user_id']);
			$this->db->set('tmsekolah_id', $_SESSION['tmsekolah_id']);
			$this->db->set('status',0);
			$this->db->set('ajaran',$ajaran);
			$this->db->set('tmsiswa_id',$tmsiswa_id);
			$this->db->set('tmjenjang_id',$tmjenjang_id);
			$this->db->set('tmkeuangan_id',$tmkeuangan_id);
			$this->db->set('tagihan',str_replace(".","",$jumlah));
			$this->db->set('id',$id);
			
			
		  
			$this->db->insert("akademik.tr_keuangan");
		   
			$this->Acuan_model->log($_SESSION['nama']." Membuat Tagihan Siswa  ");
				
				
		
		
    }
	

	
	
	
	
	
}
