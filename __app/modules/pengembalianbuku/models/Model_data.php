<?php

class Model_data extends CI_Model {

    public function __construct() {
        parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
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
		$this->db->where("id in(select DISTINCT(tmsiswa_id) from tr_buku where status='1')");
         if($paging==true){
				     $this->db->limit($_REQUEST['length'],$_REQUEST['start']);
					 
			 }
        
	    if($keyword !=""){ $this->db->where("UPPER(nama) LIKE '%".strtoupper($keyword)."%'"); }
	    if($tmjenjang_id !=""){ $this->db->where("tmjenjang_id",$tmjenjang_id); }
	    if($tmkelas_id !=""){ $this->db->where("tmkelas_id",$tmkelas_id); }
	    if($tmruang_id !=""){ $this->db->where("tmruang_id",$tmruang_id); }
		
		
		return $this->db->get();
		
	
	}
	
	public function get_peminjaman($tmsiswa_id){ 
		
		$this->db->select("a.*,b.*,a.id as trbuku_id");
		$this->db->from("tr_buku a");
		$this->db->join("tm_buku b","ON a.tmbuku_id=b.id","LEFT JOIN");
		$this->db->where("a.status",1);
	
		$this->db->where("a.tmsiswa_id",$tmsiswa_id);
		$this->db->order_by("a.tgl_pinjam","desc");
		
		return $this->db->get();
		
		
		
	}
	
	

	
	 
	
}
