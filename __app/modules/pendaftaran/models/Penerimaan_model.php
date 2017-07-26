<?php

class Penerimaan_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    private $table ="akademik.tm_siswa";

	public function insert() {
            $ajaran 		= $this->Acuan_model->ajaran();
		    $tmsiswa_id 	= $this->Acuan_model->id($this->table);
			$id_penanggung  = $this->Acuan_model->id2("akademik.tm_penanggungjawab");
			$id_kelas       = $this->Acuan_model->id2("akademik.tr_kelas");
			$nopendaftaran  = "P-0".$tmsiswa_id."/".date("m")."/".$ajaran;
            $this->db->set('d_entry', date('Y-m-d H:i:s'));
			$this->db->set('tmsekolah_id', $_POST['tmsekolah_id']);
			$this->db->set('status',1);
			$this->db->set('tgl_daftar',date("Y-m-d"));
			$this->db->set('no_pendaftaran',$nopendaftaran);
			$this->db->set('id',$tmsiswa_id);
			
			$password =  strtoupper($this->Acuan_model->get_id(8));
			
		    $password = ($this->db->get_where($this->table,array("password"=>$password))->num_rows() ==0) ? $password : strtoupper($this->Acuan_model->get_id(8));
			          
		    $this->db->set('password', $password);
		  
			$this->db->insert($this->table,$this->input->get_post("f"));
		   // end siswa
				
			$this->db->set('id',$id_penanggung);
			$this->db->set('tmsiswa_id',$tmsiswa_id);
			$this->db->set('username',strtolower(str_replace(array(" ","-","'"),"",$_POST['p']['nama_ibu'])));
			
			$password =  strtoupper($this->Acuan_model->get_id(8));
			
		    $password = ($this->db->get_where("akademik.tm_penanggungjawab",array("password"=>$password))->num_rows() ==0) ? $password : strtoupper($this->Acuan_model->get_id(8));
			          
		    $this->db->set('password', $password);
			$this->db->insert("akademik.tm_penanggungjawab",$this->input->get_post("p"));
			// end ortu
			$this->db->set('d_entry', date('Y-m-d H:i:s'));
			$this->db->set('tmsekolah_id', $_POST['tmsekolah_id']);
			$this->db->set('id',$id_kelas);
			$this->db->set('tmsiswa_id',$tmsiswa_id);
			$this->db->set('ajaran',$ajaran);
			$this->db->insert("akademik.tr_kelas",$this->input->get_post("k"));
			
			// end kelas
			
			$this->Acuan_model->notif(array("keterangan"=>$_POST['f']['nama']." Telah Melakukan Pendaftaran Online","link"=>"daftaronline?tmsiswa_id=".$tmsiswa_id."","tmsekolah_id"=>1));
		   
		    return "Pendaftaran Berhasil, kode pendaftaran anda adalah <b><u>".$nopendaftaran."</u></b> <br> Silahkan untuk mencatat nomor pendaftaran anda. Pihak Admission kami akan menghubungi anda jika anda diterima menjadi siswa disekolah kami";
				
				
		
		
    }
	
	
	public function save_persyaratan($data){
		
		
		$this->db->insert("akademik.tr_persyaratan",$data);
		
	}
	
	
	
	
	
	
}
