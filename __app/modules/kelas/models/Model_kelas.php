<?php

class Model_kelas extends CI_Model {

    public function __construct() {
        parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
    }

	 private $table    ="tm_kelas";
	 private $tabletrk ="tm_jenjang";

		
		
	public function getdata($paging){
		
		$keyword = trim($this->input->get_post("keyword"));
		
	    $this->db->select("tmk.id as id_kelas,tmj.id as id_jenjang,tmk.nama as kelas,tmj.nama as jenjang");
        $this->db->from(''.$this->table.' tmk');
        $this->db->join(''.$this->tabletrk.' tmj','tmj.id = tmk.tmjenjang_id','inner');
		$this->db->where("tmk.tmsekolah_id",$_SESSION['tmsekolah_id']);
		$this->db->order_by("tmj.urutan","asc");
         if($paging==true){
				     $this->db->limit($_REQUEST['length'],$_REQUEST['start']);
					 $this->db->order_by("tmk.urutan",$_REQUEST['order'][0]['dir']);
			 }
        
	    if($keyword !=""){ $this->db->where("UPPER(tmk.nama) LIKE '%".strtoupper($keyword)."%'"); }
		
		
		return $this->db->get();
		
	
	}
	
	

	
	 public function insert() {
        
            $this->db->set('d_entry', date('Y-m-d H:i:s'));
			$this->db->set('i_entry', $_SESSION['user_id']);
			$this->db->set('tmsekolah_id', $_SESSION['tmsekolah_id']);
			$this->db->set('id', $this->Acuan_model->id($this->table));
			$this->db->insert($this->table,$this->input->get_post("f"));
			
			$this->Acuan_model->log($_SESSION['nama']." Entry Kelas ");	
				if ($this->db->trans_status() === FALSE) {
					$this->db->trans_rollback();
				   
				} else {
					
					$this->db->trans_commit();
					
				}
		
		
    }
	
	public function update($id) {
        
            $this->db->set('d_update', date('Y-m-d H:i:s'));
			$this->db->set('i_update', $_SESSION['user_id']);
			
			$this->db->where("id",$id);
			$this->db->update($this->table,$this->input->get_post("f"));
			$this->Acuan_model->log($_SESSION['nama']." Update Kelas");	
				if ($this->db->trans_status() === FALSE) {
					$this->db->trans_rollback();
				   
				} else {
					
					$this->db->trans_commit();
					
				}
		
		
    }
	
	
		


	
	
	
	
	
	
	
	
}
