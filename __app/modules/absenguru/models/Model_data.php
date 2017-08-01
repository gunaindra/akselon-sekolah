<?php

class Model_data extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    

	
	
	 private $table ="v_ruang";

		
		
	public function getdata($paging){
		
		
		
		$tmjenjang_id   = trim($this->input->get_post("tmjenjang_id"));
		$tmkelas_id	    = trim($this->input->get_post("tmkelas_id"));
		$tmruang_id	    = trim($this->input->get_post("tmruang_id"));
		
	    $this->db->select("*");
        $this->db->from('v_ruang');
		$this->db->where("tmsekolah_id",$_SESSION['tmsekolah_id']);
	
		
         if($paging==true){
				     $this->db->limit($_REQUEST['length'],$_REQUEST['start']);
					 
			 }
        
	    if($tmjenjang_id !=""){ $this->db->where("tmjenjang_id",$tmjenjang_id); }
	    if($tmkelas_id !=""){ $this->db->where("tmkelas_id",$tmkelas_id); }
	    if($tmruang_id !=""){ $this->db->where("tmruang_id",$tmruang_id); }
		
		
		
		return $this->db->get();
		
	
	}


	public function get_kondisi_namaguru($id){

		$this->db->select('nama')->from('tm_pegawai')->where('id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
		return $query->row()->nama;
		}
		return false;
	}
	
	public function getdatapel($table,$where){
		
		
		$this->db->where($where);
		$this->db->order_by("hari","asc");
		$this->db->order_by("tmjenjang_id","asc");
		return $this->db->get($table);
	}
	
	  public function insert() {
	   $ajaran        = $this->Acuan_model->ajaran();
       $semester      = $this->Acuan_model->semester();
     
       $tmjenjang_id  = $this->input->get_post("tmjenjang_id");
       $tmkelas_id    = $this->input->get_post("tmkelas_id");
       $tmruang_id    = $this->input->get_post("tmruang_id");
       $hari          = $this->input->get_post("hari");
       $tmjam_id      = $this->input->get_post("tmjam_id");
       $tmpelajaran_id= $this->input->get_post("mapel");
       $tmguru_id     = $this->input->get_post("tmguru_id");
           
		    
			
            $this->db->set('d_entry', date('Y-m-d H:i:s'));
			$this->db->set('i_entry', $_SESSION['user_id']);
			$this->db->set('tmsekolah_id', $_SESSION['tmsekolah_id']);
			
			$this->db->set('ajaran',$ajaran);
			$this->db->set('semester',$semester);
			
			$this->db->set('tmjenjang_id',$tmjenjang_id);
			$this->db->set('tmkelas_id',$tmkelas_id);
			$this->db->set('tmruang_id',$tmruang_id);
			$this->db->set('hari',$hari);
			$this->db->set('tmpelajaran_id',$tmpelajaran_id);
			$this->db->set('tmguru_id',$tmguru_id);
			$this->db->set('tmjam_id',$tmjam_id);
			
			$this->db->set('id',$this->Acuan_model->id("tr_jadwal"));
			
			
		  
			$this->db->insert("tr_jadwal");
		   
			
				
				
		
		
    }
	

	
	
	
	
	
}
