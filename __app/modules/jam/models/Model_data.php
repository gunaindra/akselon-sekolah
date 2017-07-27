<?php

class Model_data extends CI_Model {

    public function __construct() {
        parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
    }

	 private $table ="tm_jam";

		
		
	public function getdata($paging){
		
		
		
	    $this->db->select("*");
        $this->db->from(''.$this->table.'');
		$this->db->where("tmsekolah_id",$_SESSION['tmsekolah_id']);
		
         if($paging==true){
				     $this->db->limit($_REQUEST['length'],$_REQUEST['start']);
					 $this->db->order_by("id",$_REQUEST['order'][0]['dir']);
			 }
        
	   
		
		
		return $this->db->get();
		
	
	}
	
	

	
	 public function insert() {
            $jam  = $_POST['jam1'].":".$_POST['menit1']." - ".$_POST['jam2'].":".$_POST['menit2'];
            $this->db->set('d_entry', date('Y-m-d H:i:s'));
			$this->db->set('i_entry', $_SESSION['user_id']);
			$this->db->set('tmsekolah_id', $_SESSION['tmsekolah_id']);
			$this->db->set('nama',  $jam);
			$this->db->set('id', $this->Acuan_model->id($this->table));
			$this->db->insert($this->table);
			$this->Acuan_model->log($_SESSION['nama']." Entry Jam Pelajaran");
				if ($this->db->trans_status() === FALSE) {
					$this->db->trans_rollback();
				   
				} else {
						
					$this->db->trans_commit();
					
				}
		
		
    }
	
	
	
	
	
	
	
	
	
}
