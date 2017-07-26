<?php

class Model_data extends CI_Model {

    public function __construct() {
        parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
    }

	 private $table ="kepegawaian.tm_pegawai";

		
		
	public function getdata($paging){
		
		$keyword = trim($this->input->get_post("keyword"));
		
	    $this->db->select("*");
        $this->db->from(''.$this->table.'');
		$this->db->where("tmsekolah_id",$_SESSION['tmsekolah_id']);
		
         if($paging==true){
				     $this->db->limit($_REQUEST['length'],$_REQUEST['start']);
					 $this->db->order_by("nama","asc");
			 }
        
	    if($keyword !=""){ $this->db->where("UPPER(nama) LIKE '%".strtoupper($keyword)."%'"); }
		
		
		return $this->db->get();
		
	
	}
	
	

	
	 public function insert() {
        
            $this->db->set('d_entry', date('Y-m-d H:i:s'));
			$this->db->set('i_entry', $_SESSION['user_id']);
			$this->db->set('tmsekolah_id', $_SESSION['tmsekolah_id']);
			$this->db->set('id', $this->Acuan_model->id($this->table));
			
			$this->db->set('username',strtolower(str_replace(array(" ","-","'"),"",$_POST['f']['nama'].$this->Acuan_model->id($this->table))));
			
			$password =  strtoupper($this->Acuan_model->get_id(8));
			
		    $password = ($this->db->get_where($this->table,array("password"=>$password))->num_rows() ==0) ? $password : strtoupper($this->Acuan_model->get_id(8));
			          
		    $this->db->set('password', $password);
			
			
			$this->db->insert($this->table,$this->input->get_post("f"));
			$this->Acuan_model->log($_SESSION['nama']." Entry Data Pegawai");
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
			$this->Acuan_model->log($_SESSION['nama']." Update Data Pegawai");	
				if ($this->db->trans_status() === FALSE) {
					$this->db->trans_rollback();
				   
				} else {
					
					$this->db->trans_commit();
					
				}
		
		
    }
	
	
		


	
	
	
	
	
	
	
	
}
