<?php

class Model_lihatabsensiswa extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    private $table ="tm_siswa";

		
		
	public function getdata($paging){
		$ajaran 		= $this->Acuan_model->ajaran();
		$keyword 		= trim($this->input->get_post("keyword"));
		$semester 		= trim($this->input->get_post("semester"));
		$id = $_SESSION['user_id'];
		$nama = $this->Acuan_model->get_siswa($id)->row();
	    $this->db->select("*");
        $this->db->from("v_nilai2"); 
		$this->db->where("siswa",$nama->nama);
         if($paging==true){
				     $this->db->limit($_REQUEST['length'],$_REQUEST['start']);
					 
			 }
	    if($semester !=""){ $this->db->where("semester",$semester); }
		
		
		return $this->db->get();
		
	
	}

	public function getdata2($paging){
		$ajaran 		= $this->Acuan_model->ajaran();
		$keyword 		= trim($this->input->get_post("keyword"));
		$semester 		= trim($this->input->get_post("semester"));
		if($_SESSION['grup']=="7"){
			$username = $_SESSION["nama"];
			$anak = $this->Acuan_model->get_where2("v_siswa",array("username"=>$username))->row_array();
			$id = $anak['id'];
		}else{
			$id = $_SESSION['user_id'];
		}
	    $this->db->select("c.nama as mapel,c.id as id,b.id as idsiswa, c.id as kodemapel, a.ajaran as semester, a.id as idjadwal");
	    // $this->db->select("a.id as jadwal_id");
        $this->db->from("tr_jadwal as a"); 
        $this->db->join("v_siswa as b","a.tmruang_id = b.tmruang_id");
        $this->db->join("tm_pelajaran as c","a.tmpelajaran_id = c.id");
		$this->db->where("b.id",$id);
		$this->db->group_by("a.tmpelajaran_id,b.id");
         if($paging==true){
				     $this->db->limit($_REQUEST['length'],$_REQUEST['start']);
					 
			 }
	    if($semester !=""){ $this->db->where("b.ajaran",$semester); }
		
		
		return $this->db->get();
		
	
	}

	public function get_absen($paging){
		$idsiswa 		= trim($this->input->get_post("idsiswa"));
		$idpel 			= trim($this->input->get_post("idpel"));
		$idjadwal 		= trim($this->input->get_post("idjadwal"));
		$status 		= trim($this->input->get_post("status"));
		
		$this->db->select("a.date as tanggal, a.status as status, c.nama as pelajaran");
		$this->db->from("tr_absensisiswajadwal as a");
		$this->db->join("tr_jadwal as b","a.tr_jadwal_id = b.id");
		$this->db->join("tm_pelajaran as c","b.tmpelajaran_id = c.id");
		$this->db->where("a.tr_jadwal_id",$idjadwal);
		$this->db->where("a.tm_siswa_id",$idsiswa);
		 if($paging==true){
				     $this->db->limit($_REQUEST['length'],$_REQUEST['start']);
					 
			 }
		 if($status !=""){ $this->db->where("a.status",$status); }
		return $this->db->get();
	}

	public function get_absen_row($id,$status){
		$id = (explode(",",$id));
		$idsiswa = json_decode($id[0]);
		$idpel = json_decode($id[1]);
		$idjadwal = json_decode($id[2]); 
		$status = $status;
		
		$this->db->select("a.date as tanggal, a.status as status, c.nama as pelajaran");
		$this->db->from("tr_absensisiswajadwal as a");
		$this->db->join("tr_jadwal as b","a.tr_jadwal_id = b.id");
		$this->db->join("tm_pelajaran as c","b.tmpelajaran_id = c.id");
		$this->db->where("a.tr_jadwal_id",$idjadwal);
		$this->db->where("a.tm_siswa_id",$idsiswa);
		if($status !=""){ $this->db->where("a.status",$status); }
		return $this->db->get();
	}
	
	
}
