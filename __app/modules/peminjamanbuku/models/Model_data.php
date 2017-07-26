<?php

class Model_data extends CI_Model {

    public function __construct() {
        parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
    }

	 private $table    ="perpus.tm_buku";


		
		
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
	
	public function get_peminjaman($tmsiswa_id){ 
		
		$this->db->select("a.*,b.*,a.id as trbuku_id");
		$this->db->from("perpus.tr_buku a");
		$this->db->join("perpus.tm_buku b","ON a.tmbuku_id=b.id","LEFT JOIN");
		$this->db->where("a.status",1);
	
		$this->db->where("a.tmsiswa_id",$tmsiswa_id);
		$this->db->order_by("a.tgl_pinjam","desc");
		
		return $this->db->get();
		
		
		
	}
	
	

	
	 
	
}
