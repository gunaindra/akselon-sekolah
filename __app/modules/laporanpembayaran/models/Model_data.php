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
		$this->db->where("id in (select distinct(tmsiswa_id) from tr_keuangan where status='2')");
         if($paging==true){
				     $this->db->limit($_REQUEST['length'],$_REQUEST['start']);
					 
			 }
        
	    if($tmjenjang_id !=""){ $this->db->where("tmjenjang_id",$tmjenjang_id); }
	    if($tmkelas_id !=""){ $this->db->where("tmkelas_id",$tmkelas_id); }
	    if($tmruang_id !=""){ $this->db->where("tmruang_id",$tmruang_id); }
		if($keyword !=""){ $this->db->where("UPPER(nama) LIKE '%".strtoupper($keyword)."%' or UPPER(nama_ibu) LIKE '%".strtoupper($keyword)."%' or  UPPER(nama_ayah) LIKE '%".strtoupper($keyword)."%'" ); }
	 
		
		
		return $this->db->get();
		
	
	}
	

	
	 public function get_row_keuangan($tmsiswa_id,$item){
		
		
		$this->db->where("tmsiswa_id",$tmsiswa_id);
		$this->db->where("dibayar !=",0);
		$this->db->where("status",2);
		
		 if(count($item) >0){
			 
			 $id ="";
			 foreach($item as $index=>$val){
				 
				 $id .=",".$val;
			 }
			 
			 $idnya = substr($id,1);
			   if($idnya !=""){
				   
				   $this->db->where("id in(".$idnya.")");
				   
			   }
			 
		 }
		return $this->db->get("tr_keuangan");
		
		
	}
	

	
	
	
	
	
}
