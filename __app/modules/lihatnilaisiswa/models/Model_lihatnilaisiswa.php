<?php

class Model_lihatnilaisiswa extends CI_Model {

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
	    $this->db->select("c.nama as mapel,c.id as id,b.id as idsiswa, c.id as kodemapel");
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

	public function get_siswa($id){
		$this->db->select("*");
		$this->db->from("v_siswa");
		$this->db->where("id",$id);
		return $this->db->get();
	}
	
	
}
