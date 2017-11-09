<?php

class Model_nilaisiswa extends CI_Model {

    public function __construct() {
        parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
    }

	 private $table    ="tm_ruang";
	 private $tabletmk ="tm_kelas";
	 private $tabletrk ="tm_jenjang";

		
		
	public function getdata($paging){
		
		$keyword 		= trim($this->input->get_post("keyword"));
		$tmjenjang_id   = trim($this->input->get_post("tmjenjang_id"));
		$tmkelas_id	    = trim($this->input->get_post("tmkelas_id"));
		
	    $this->db->select("tmk.id as id_kelas,tmj.id as id_jenjang,tmr.id as id_ruang,tmr.nama as ruang,tmk.nama as kelas,tmj.nama as jenjang");
        $this->db->from(''.$this->table.' tmr');
        $this->db->join(''.$this->tabletmk.' tmk','tmk.id = tmr.tmkelas_id','inner');
        $this->db->join(''.$this->tabletrk.' tmj','tmj.id = tmr.tmjenjang_id','inner');
		$this->db->where("tmr.tmsekolah_id",$_SESSION['tmsekolah_id']);
		$this->db->order_by("tmj.urutan","asc");
		$this->db->order_by("tmk.urutan","asc");
         if($paging==true){
				     $this->db->limit($_REQUEST['length'],$_REQUEST['start']);
					 $this->db->order_by("tmr.urutan",$_REQUEST['order'][0]['dir']);
			 }
        
	    if($keyword !=""){ $this->db->where("UPPER(tmr.nama) LIKE '%".strtoupper($keyword)."%'"); }
	    if($tmjenjang_id !=""){ $this->db->where("tmr.tmjenjang_id",$tmjenjang_id); }
	    if($tmkelas_id !=""){ $this->db->where("tmr.tmkelas_id",$tmkelas_id); }
		
		
		return $this->db->get();
		
	
	}
	function save_nilai($table,$data)
	{
		   return $this->db->insert($table, $data);

	}
	public function getdatasiswa($id){
		

	    $this->db->select("*");
        $this->db->from("tr_kelas");
        $this->db->join("tm_siswa","tr_kelas.tmsiswa_id=tm_siswa.id","inner");
		$this->db->where("tmruang_id",$id);
		return $this->db->get();
		
	
	}
	
	public function getpelajaran($id){
		$this->db->select("*");
		$this->db->from("tr_gurumapel as a");
		$this->db->join("tm_pelajaran as b","a.tmpelajaran_id=b.id");
		$this->db->where("a.tmpegawai_id",$id);
		return $this->db->get()->result();
	}

	
	 public function insert() {
        
            $this->db->set('d_entry', date('Y-m-d H:i:s'));
			$this->db->set('i_entry', $_SESSION['user_id']);
			$this->db->set('tmsekolah_id', $_SESSION['tmsekolah_id']);
			$this->db->set('id', $this->Acuan_model->id($this->table));
			$this->db->insert($this->table,$this->input->get_post("f"));
			
			$this->Acuan_model->log($_SESSION['nama']." Entry Ruang ");	
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
			$this->Acuan_model->log($_SESSION['nama']." Update Ruang");	
				if ($this->db->trans_status() === FALSE) {
					$this->db->trans_rollback();
				   
				} else {
					
					$this->db->trans_commit();
					
				}
		
		
    }
	
	
		


	
	
	
	
	
	
	
	
}
