<?php

class Model_data extends CI_Model {

    public function __construct() {
        parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
    }

	 private $table    ="tm_buku";


		
		
	public function getdata($paging){
		
		$keyword = trim($this->input->get_post("keyword"));
		
	    $this->db->select("a.*,b.*,a.id as trbuku_id");
        $this->db->from("tr_buku a");
		$this->db->join("tm_buku b","ON a.tmbuku_id=b.id","LEFT JOIN");
		$this->db->where("a.status",2);
		$this->db->where("a.tmsekolah_id",$_SESSION['tmsekolah_id']);
		$this->db->order_by("a.tmsiswa_id","asc");
         if($paging==true){
				     $this->db->limit($_REQUEST['length'],$_REQUEST['start']);
					 $this->db->order_by("a.tgl_pinjam","desc");
			 }
        
	    if($keyword !=""){ $this->db->where("UPPER(b.nama) LIKE '%".strtoupper($keyword)."%'"); }
		
		
		return $this->db->get();
		
	
	}
	
	
	
	
	
	
}
