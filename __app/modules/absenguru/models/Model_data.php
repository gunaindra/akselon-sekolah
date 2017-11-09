<?php

class Model_data extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    

	
	
	 private $table ="v_ruang";

		
		
	public function getdata($paging){
		
		
		
		$tmjenjang_id   = trim($this->input->get_post("tmjenjang_id"));
		$tmkelas_id	    = trim($this->input->get_post("tmkelas_id"));
		$tmruang_id	    = trim($this->input->get_post("tmruang_id"));
		
	    $this->db->select("*");
        $this->db->from('v_ruang');
		$this->db->where("tmsekolah_id",$_SESSION['tmsekolah_id']);
	
		
         if($paging==true){
				     $this->db->limit($_REQUEST['length'],$_REQUEST['start']);
					 
			 }
        
	    if($tmjenjang_id !=""){ $this->db->where("tmjenjang_id",$tmjenjang_id); }
	    if($tmkelas_id !=""){ $this->db->where("tmkelas_id",$tmkelas_id); }
	    if($tmruang_id !=""){ $this->db->where("tmruang_id",$tmruang_id); }
		
		
		
		return $this->db->get();
		
	
	}


	public function get_kondisi_namaguru($id){

		$this->db->select('nama')->from('tm_pegawai')->where('id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
		return $query->row()->nama;
		}
		return false;
	}
	
	public function getdatapel($table,$where){
		
		
		$this->db->where($where);
		$this->db->order_by("hari","asc");
		$this->db->order_by("tmjenjang_id","asc");
		return $this->db->get($table);
	}
	
	  public function insert() {
	   $ajaran        = $this->Acuan_model->ajaran();
       $semester      = $this->Acuan_model->semester();
     
       $tmjenjang_id  = $this->input->get_post("tmjenjang_id");
       $tmkelas_id    = $this->input->get_post("tmkelas_id");
       $tmruang_id    = $this->input->get_post("tmruang_id");
       $hari          = $this->input->get_post("hari");
       $tmjam_id      = $this->input->get_post("tmjam_id");
       $tmpelajaran_id= $this->input->get_post("mapel");
       $tmguru_id     = $this->input->get_post("tmguru_id");
           
		    
			
            $this->db->set('d_entry', date('Y-m-d H:i:s'));
			$this->db->set('i_entry', $_SESSION['user_id']);
			$this->db->set('tmsekolah_id', $_SESSION['tmsekolah_id']);
			
			$this->db->set('ajaran',$ajaran);
			$this->db->set('semester',$semester);
			
			$this->db->set('tmjenjang_id',$tmjenjang_id);
			$this->db->set('tmkelas_id',$tmkelas_id);
			$this->db->set('tmruang_id',$tmruang_id);
			$this->db->set('hari',$hari);
			$this->db->set('tmpelajaran_id',$tmpelajaran_id);
			$this->db->set('tmguru_id',$tmguru_id);
			$this->db->set('tmjam_id',$tmjam_id);
			
			$this->db->set('id',$this->Acuan_model->id("tr_jadwal"));
			
			
		  
			$this->db->insert("tr_jadwal");
		   
			
				
				
		
		
    }

    public function verifyAccount($post) {
        $id = $this->session->userdata['user_id'];
        $query = $this->db->get_where('tm_pegawai', ['id' => $id, 'password' => $post['password']]);
        if (empty($query->row())) {
            return false;
        }

        return true;
    }

    public function startAbsensiGuruJadwal($post) {
        $post['date'] = date('Y-m-d');
        $post['tmguru_id'] = $this->session->userdata['user_id'];
        $post['start'] = date('Y-m-d H:i:s');
	    $tmsekolah_id = $this->session->userdata['tmsekolah_id'];

	    $where = [
	        'date' => $post['date'],
            'tr_jadwal_id' => $post['jadwal_id'],
            'tmguru_id' => $post['tmguru_id'],
            'tmsekolah_id' => $tmsekolah_id
        ];

	    $data = [
            'date' => $post['date'],
	        'tr_jadwal_id' => $post['jadwal_id'],
	        'tmguru_id' => $post['tmguru_id'],
	        'tmsekolah_id' => $tmsekolah_id,
	        'start' => $post['start'],
        ];

	    return $this->Acuan_model->insert_update($data, $where, 'tr_absensigurujadwal');
    }

    public function getSiswaKelas($kelas_id) {
        $query = $this->db->get_where('v_siswa', ['tmkelas_id' => $kelas_id]);

        return $query->result();
    }

    public function saveAbsensiSiswa($post) {
        $post['date'] = date('Y-m-d');

	    foreach ($post['status'] as $key => $value) {
            $where = [
                'date' => $post['date'],
                'tr_jadwal_id' => $post['jadwal_id'],
                'tmsekolah_id' => $post['idsekolah'],
                'semester' => $post['ajaran'],
                'tm_siswa_id' => $key
            ];

            $data = [
                'date' => $post['date'],
                'tr_jadwal_id' => $post['jadwal_id'],
                'tmsekolah_id' => $post['idsekolah'],
                'semester' => $post['ajaran'],
                'tm_siswa_id' => $key,
                'status' => $value,
            ];

            $this->Acuan_model->insert_update($data, $where, 'tr_absensisiswajadwal');
        }

        return true;
    }

    public function getJadwalCheckedInStatus($jadwal_id) {
	    $date = date('Y-m-d');
	    $guru_id = $this->session->userdata['user_id'];

	    $where = [
	        'date' => $date,
            'tr_jadwal_id' => $jadwal_id,
            'tmguru_id' => $guru_id
        ];

        $query = $this->db->get_where('tr_absensigurujadwal', $where);
        $result = $query->row();

        if (empty($result)) {
            return false;
        }

        return $result;
    }

    public function endAbsensiGuruJadwal($post) {
        $post['date'] = date('Y-m-d');
        $post['tmguru_id'] = $this->session->userdata['user_id'];
        $post['end'] = date('Y-m-d H:i:s');

        $where = [
            'date' => $post['date'],
            'tr_jadwal_id' => $post['jadwal_id'],
            'tmguru_id' => $post['tmguru_id']
        ];

        $data = [
            'end' => $post['end'],
            'bap' => $post['bap']
        ];

        return $this->Acuan_model->insert_update($data, $where, 'tr_absensigurujadwal');
    }

    public function getJadwal($jadwal_id) {
        $query = $this->db->get_where('tr_jadwal', ['id' => $jadwal_id]);

        return $query->row();
    }
}
