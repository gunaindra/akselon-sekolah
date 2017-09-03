<?php

class Model_data extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    

		
		
	public function getdata($tmjenjang_id="",$tmkelas_id="",$tmruang_id=""){
		
	
		
		$ajaran = $this->Acuan_model->ajaran();
		
		
	    $this->db->select("*");
        $this->db->from('v_ruang');
		$this->db->where("tmsekolah_id",$_SESSION['tmsekolah_id']);
		
		
	   
	    
	    if($tmjenjang_id !=""){ $this->db->where("tmjenjang_id",$tmjenjang_id); }
	    if($tmkelas_id !=""){ $this->db->where("tmkelas_id",$tmkelas_id); }
	    if($tmruang_id !=""){ $this->db->where("tmruang_id",$tmruang_id); }
	    
		
		return $this->db->get();
	
	}
	
	
	
	 public function insert() {
		 
		    $ajaran        = $this->Acuan_model->ajaran();
			$tmpegawai_id  = $this->input->get_post("id",TRUE);
			$tmruang_id    = $this->input->get_post("tmruang_id",TRUE);
			$sekolah       = $_SESSION['tmsekolah_id'];
            $data          = array("tmsekolah_id"=>$_SESSION['tmsekolah_id'],"tmruang_id"=>$tmruang_id,"ajaran"=>$ajaran,"tmpegawai_id"=>$tmpegawai_id);
           
		    $this->db->set('d_entry', date('Y-m-d H:i:s'));
			$this->db->set('i_entry', $_SESSION['user_id']);
			$this->db->set('tmsekolah_id', $sekolah);
			$this->db->set('id',$this->Acuan_model->id("tr_walas"));
			$this->db->insert("tr_walas",$data);
			
			$this->Acuan_model->log($_SESSION['nama']." Menetapkan Wali Kelas ");	
			
			
				if ($this->db->trans_status() === FALSE) {
					$this->db->trans_rollback();
				   
				} else {
					
					$this->db->trans_commit();
					
				}
		
		
    }
	
	public function update() {
        
		    $ajaran        = $this->Acuan_model->ajaran();
			$tmpegawai_id  = $this->input->get_post("id",TRUE);
			$tmruang_id    = $this->input->get_post("tmruang_id",TRUE);
			$tmsekolah_id  = $_SESSION['tmsekolah_id'];
            $data          = array("tmpegawai_id"=>$tmpegawai_id);
           
		   
            $this->db->set('d_update', date('Y-m-d H:i:s'));
			$this->db->set('i_update', $_SESSION['user_id']);
			
			$this->db->where("tmruang_id",$tmruang_id);
			$this->db->where("ajaran",$ajaran);
			$this->db->where("tmsekolah_id",$tmsekolah_id);
			$this->db->update("tr_walas",$data);
			$this->Acuan_model->log($_SESSION['nama']." Update Wali Kelas");	
				if ($this->db->trans_status() === FALSE) {
					$this->db->trans_rollback();
				   
				} else {
					
					$this->db->trans_commit();
					
				}
		
		
    }
	public function update_pegawai($id) {
        
            $this->db->set('d_update', date('Y-m-d H:i:s'));
			$this->db->set('i_update', $_SESSION['user_id']);
			
			$this->db->where("id",$id);
			$updateData=array("grup"=>"6");
			$this->db->update("tm_pegawai",$updateData);
			$this->Acuan_model->log($_SESSION['nama']." Update Data Pegawai");	
				if ($this->db->trans_status() === FALSE) {
					$this->db->trans_rollback();
				   
				} else {
					
					$this->db->trans_commit();
					
				}
		
		
    }
	    
  public function selected($tmpegawai_id,$tmruang_id){
	  
	    $ajaran        = $this->Acuan_model->ajaran();
		$tmsekolah_id  = $_SESSION['tmsekolah_id'];
	  
	    $row = $this->Acuan_model->get_where("tr_walas",array("tmsekolah_id"=>$_SESSION['tmsekolah_id'],"tmruang_id"=>$tmruang_id,"ajaran"=>$ajaran,"tmpegawai_id"=>$tmpegawai_id));
	  
	     if(count($row) >0){
			 
			 return "selected";
		 }
	  
	  
  }
  
    public function status($tmruang_id){
	  
	    $ajaran        = $this->Acuan_model->ajaran();
		$tmsekolah_id  = $_SESSION['tmsekolah_id'];
	  
	    $row = $this->Acuan_model->get_where("tr_walas",array("tmsekolah_id"=>$_SESSION['tmsekolah_id'],"tmruang_id"=>$tmruang_id,"ajaran"=>$ajaran));
	  
	     if(count($row) >0){
			 
			 return "any";
		 }else{
			 
			 return "";
		 }
	  
	  
  }
		
	
	
	
	
	
}
