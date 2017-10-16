<?php

class Model_lihatnilai extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    private $table ="tm_siswa";

		
		
	public function getdata($paging){
		$ajaran 		= $this->Acuan_model->ajaran();
		$keyword 		= trim($this->input->get_post("keyword"));
		$tmpelajaran_id = trim($this->input->get_post("tmpelajaran_id"));
		$tmruang_id	    = trim($this->input->get_post("tmkelas_id"));
		// echo json_encode($tmkelas_id);
	    $this->db->select("nilai.id as id, nilai.tmpelajaran_id as idpel, ruang.nama as nm_ruang,siswa.nama as nm_siswa, nilai.tmnilai_siswa as  nilai, nilai.tmnilai_status as status_nilai, siswa.id as idsiswa");
        $this->db->from('tr_nilai as nilai');
        $this->db->join('tm_siswa as siswa','siswa.id=nilai.tmsiswa_id');
        $this->db->join('tm_ruang as ruang','ruang.id=nilai.tmruang_id');
		$this->db->where("nilai.tmsekolah_id",$_SESSION['tmsekolah_id']);
		$this->db->where('nilai.ajaran',$ajaran);
		$this->db->group_by('siswa.id');
         if($paging==true){
				     $this->db->limit($_REQUEST['length'],$_REQUEST['start']);
					 
			 }
        
	    if($keyword !=""){ $this->db->where("UPPER(siswa.nama) LIKE '%".strtoupper($keyword)."%'"); }
	    if($tmpelajaran_id !=""){ $this->db->where("nilai.tmpelajaran_id",$tmpelajaran_id); }
	    if($tmruang_id !=""){ $this->db->where("nilai.tmruang_id",$tmruang_id); }
		
		
		return $this->db->get();
		
	
	}
	
	
	  public function insert() {
            $ajaran 		= $this->Acuan_model->ajaran();
		    $tmsiswa_id 	= $this->Acuan_model->id($this->table);
			$id_penanggung  = $this->Acuan_model->id2("tm_penanggungjawab");
			$id_kelas       = $this->Acuan_model->id2("tr_kelas");
            $this->db->set('d_entry', date('Y-m-d H:i:s'));
			$this->db->set('i_entry', $_SESSION['user_id']);
			$this->db->set('tmsekolah_id', $_SESSION['tmsekolah_id']);
			$this->db->set('status',2);
			$this->db->set('tgl_daftar',date("Y-m-d"));
			$this->db->set('id',$tmsiswa_id);
			$password =  strtoupper($this->Acuan_model->get_id(8));
			
		    $password = ($this->db->get_where($this->table,array("password"=>$password))->num_rows() ==0) ? $password : strtoupper($this->Acuan_model->get_id(8));
			          
		    $this->db->set('password', $password);
		  
			$this->db->insert($this->table,$this->input->get_post("s"));
		   // end siswa
				
			$this->db->set('id',$id_penanggung);
			$this->db->set('tmsiswa_id',$tmsiswa_id);
			$this->db->set('username',strtolower(str_replace(array(" ","-","'"),"",$_POST['p']['nama_ibu'])));
			
			$password =  strtoupper($this->Acuan_model->get_id(8));
			
		    $password = ($this->db->get_where("tm_penanggungjawab",array("password"=>$password))->num_rows() ==0) ? $password : strtoupper($this->Acuan_model->get_id(8));
			          
		    $this->db->set('password', $password);
			$this->db->insert("tm_penanggungjawab",$this->input->get_post("p"));
			// end ortu
			$this->db->set('d_entry', date('Y-m-d H:i:s'));
			$this->db->set('i_entry', $_SESSION['user_id']);
			$this->db->set('tmsekolah_id', $_SESSION['tmsekolah_id']);
			$this->db->set('id',$id_kelas);
			$this->db->set('tmsiswa_id',$tmsiswa_id);
			$this->db->set('ajaran',$ajaran);
			$this->db->insert("tr_kelas",$this->input->get_post("k"));
			
			// end kelas
			$this->Acuan_model->log($_SESSION['nama']." Entry Data Siswa ");
				
				
		
		
    }
	
	public function update($tmsiswa_id) {
        
            $ajaran 		= $this->Acuan_model->ajaran();
		   
            $this->db->set('d_update', date('Y-m-d H:i:s'));
			$this->db->set('i_update', $_SESSION['user_id']);
			$this->db->where('id',$tmsiswa_id);
			 
		  
			$this->db->update($this->table,$this->input->get_post("s"));
		    
			$this->db->where('tmsiswa_id',$tmsiswa_id);
			
			$this->db->update("tm_penanggungjawab",$this->input->get_post("p"));
			
			$this->db->set('d_update', date('Y-m-d H:i:s'));
			$this->db->set('i_update', $_SESSION['user_id']);			
			$this->db->where('tmsiswa_id',$tmsiswa_id);
			$this->db->where('ajaran',$ajaran);
			$this->db->update("tr_kelas",$this->input->get_post("k"));
			
			
			$this->Acuan_model->log($_SESSION['nama']." Update Data Siswa ");
		
		
    }
	
	
	
	
	
	
	
	
	
}
