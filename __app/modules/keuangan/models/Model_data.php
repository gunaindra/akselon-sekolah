<?php

class Model_data extends CI_Model {

    public function __construct() {
        parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
    }

	 private $table ="tm_keuangan";

		
		
	public function getdata($paging){
		
		$keyword      = trim($this->input->get_post("keyword"));
		$tmjenjang_id = trim($this->input->get_post("tmjenjang_id"));
		$tmkelas_id   = trim($this->input->get_post("tmkelas_id"));
		
	    $this->db->select("*");
        $this->db->from(''.$this->table.'');
		$this->db->where("tmsekolah_id",$_SESSION['tmsekolah_id']);
		
         if($paging==true){
				     $this->db->limit($_REQUEST['length'],$_REQUEST['start']);
					 $this->db->order_by("nama",$_REQUEST['order'][0]['dir']);
			 }
        if($tmjenjang_id !=""){ $this->db->where("tmjenjang_id",$tmjenjang_id); }
	    if($tmkelas_id !=""){ $this->db->where("tmkelas_id",$tmkelas_id); }
	    if($keyword !=""){ $this->db->where("UPPER(nama) LIKE '%".strtoupper($keyword)."%'"); }
		
		
		
		return $this->db->get();
		
	
	}
	
	

	
	 public function insert() {
        
            $this->db->set('d_entry', date('Y-m-d H:i:s'));
			$this->db->set('i_entry', $_SESSION['user_id']);
			$this->db->set('tmsekolah_id', $_SESSION['tmsekolah_id']);
			$this->db->set('jumlah', str_replace(".","",$_POST['jumlah']));
			
			$this->db->set('id', $this->Acuan_model->id($this->table));
			$this->db->insert($this->table,$this->input->get_post("f"));
			$this->Acuan_model->log($_SESSION['nama']." Entry Item Tagihan");
				if ($this->db->trans_status() === FALSE) {
					$this->db->trans_rollback();
				   
				} else {
						
					$this->db->trans_commit();
					
				}
		
		
    }
	
	public function update($id) {
        
            $this->db->set('d_update', date('Y-m-d H:i:s'));
			$this->db->set('i_update', $_SESSION['user_id']);
			$this->db->set('jumlah', str_replace(".","",$_POST['jumlah']));
			
			$this->db->where("id",$id);
			$this->db->update($this->table,$this->input->get_post("f"));
			$this->Acuan_model->log($_SESSION['nama']." Update Item Keuangan");	
				if ($this->db->trans_status() === FALSE) {
					$this->db->trans_rollback();
				   
				} else {
					
					$this->db->trans_commit();
					
				}
		
		
    }
	
	
		


	public function kategori(){
		
		return array("1"=>"Perhari",
		"2"=>"Perminggu",
		"3"=>"Perbulan",
		"4"=>"Persemester",
		"5"=>"Pertahun",
		"7"=>"Per 2 Tahun",
		"8"=>"Per 3 Tahun",
		"6"=>"Persekali");
	}
	
	
	
	
	
	
	
}
