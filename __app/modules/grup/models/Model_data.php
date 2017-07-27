<?php

class Model_data extends CI_Model {

    public function __construct() {
        parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
    }

	 private $table    ="tm_grup";


		
		
	public function getdata($paging){
		
		$keyword = trim($this->input->get_post("keyword"));
		
	    $this->db->select("*");
        $this->db->from(''.$this->table.'');
		$this->db->where("tmsekolah_id",$_SESSION['tmsekolah_id']);
		
         if($paging==true){
				     $this->db->limit($_REQUEST['length'],$_REQUEST['start']);
					 $this->db->order_by("nama",$_REQUEST['order'][0]['dir']);
			 }
        
	    if($keyword !=""){ $this->db->where("UPPER(nama) LIKE '%".strtoupper($keyword)."%'"); }
		
		
		return $this->db->get();
		
	
	}
	
	

	
	 public function insert() {
        
            $this->db->set('d_entry', date('Y-m-d H:i:s'));
			$this->db->set('i_entry', $_SESSION['user_id']);
			$this->db->set('tmsekolah_id', $_SESSION['tmsekolah_id']);
			$this->db->set('id', $this->Acuan_model->id($this->table));
			$this->db->insert($this->table,$this->input->get_post("f"));
			
			$this->Acuan_model->log($_SESSION['nama']." Entry Group Users ");	
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
			$this->Acuan_model->log($_SESSION['nama']." Update Group Users");	
				if ($this->db->trans_status() === FALSE) {
					$this->db->trans_rollback();
				   
				} else {
					
					$this->db->trans_commit();
					
				}
		
		
    }
	
	
		
	 public function cekprivelege($tmgrup_id,$tmmenu_id){
		  
		  $this->db->where("tmgrup_id",$tmgrup_id);
		  $this->db->where("tmmenu_id",$tmmenu_id);
		  $sql = $this->db->get("hak_akses")->num_rows();
		    return ($sql >0) ? "checked" :"";
		  
		  
	  }
	  public function cekprivelegec($tmgrup_id,$tmmenu_id,$kolom){
		  
		  $this->db->select($kolom);
		  $this->db->where("tmgrup_id",$tmgrup_id);
		  $this->db->where("tmmenu_id",$tmmenu_id);
		  $sql = $this->db->get("hak_akses")->row();
		  if(count($sql) >0){
		    return ($sql->$kolom ==1) ? "checked" :"";
		  }else{
			  
			  return "";
		  }
		  
		  
	  }


	
	
	
	
	
	
	
	
}
