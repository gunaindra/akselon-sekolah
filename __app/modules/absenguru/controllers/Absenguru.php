<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absenguru extends CI_Controller {

    protected $name_of_days  = [
        '1' => 'Senin',
        '2' => 'Selasa',
        '3' => 'Rabu',
        '4' => 'Kamis',
        '5' => 'Jumat',
        '6' => 'Sabtu',
        '7' => 'Minggu'
    ];

	 public function __construct()
      {
        parent::__construct();
		$this->load->model(array('Model_data'));
         if(!$this->session->userdata("tmsekolah_id")){
			
			redirect(base_url());
			
		 }
		
      } 
	public function index($offset=null)
	{  
	
		$data['title'] 		= "Absen Guru";
		$data['konten'] 	= "page";
		 
		$this->load->view('home/page_header',$data);
	

	}
	
	public function grid(){
		
		  $iTotalRecords = $this->Model_data->getdata(false)->num_rows();
		  
		  $iDisplayLength = intval($_REQUEST['length']);
		  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		  $iDisplayStart = intval($_REQUEST['start']);
		  $sEcho = intval($_REQUEST['draw']);
		  
		  $records = array();
		  $records["data"] = array(); 

		  $end = $iDisplayStart + $iDisplayLength;
		  $end = $end > $iTotalRecords ? $iTotalRecords : $end;
		  
		  $datagrid = $this->Model_data->getdata(true)->result_array();
		   
		   $i= ($iDisplayStart +1);
		   foreach($datagrid as $val) {
				
				$no = $i++;
				$records["data"][] = array(
					$no,
					$val['jenjang'],					
					$val['kelas'],					
					$val['ruang'],					
									
								
					'
					<a href="javascript:;" class="btn btn-success ubah tooltips" data-container="body" data-placement="top" title="Buat Jadwal " urlnya = "'.site_url("absenguru/form").'"    datanya="'.$val['id'].'" ><i class="fa  fa-file-text-o "></i> Masuk Kelas  </a> 
				
					'

				  );
			  }
		
		  $records["draw"] = $sEcho;
		  $records["recordsTotal"] = $iTotalRecords;
		  $records["recordsFiltered"] = $iTotalRecords;
		  
		  echo json_encode($records);
	}
	
	
	
	
	public function form(){
		 $ajaran = $this->Acuan_model->ajaran();
		 $id = $this->input->get_post("id",TRUE);
		 $data = array();
		   
		    if(!empty($id)){
				
				$data['dataform'] = $this->Acuan_model->get_where("v_ruang",array("id"=>$id));
				$data['datagrid']     = $this->Model_data->getdatapel("tr_jadwal",array("tmjenjang_id"=>$data['dataform']->tmjenjang_id,"tmkelas_id"=>$data['dataform']->tmkelas_id,"tmruang_id"=>$data['dataform']->tmruang_id,"ajaran"=>$this->Acuan_model->ajaran(),"semester"=>$this->Acuan_model->semester()))->result();
			}

       
        foreach ($data['datagrid'] as $key => $val) {
	        	// if($val->tmguru_id== $_SESSION['nama'];)
	            $jam = $this->Acuan_model->get_where('tm_jam', ['id' => $val->tmjam_id]);
	            $pelajaran = $this->Acuan_model->get_where('tm_pelajaran', ['id' => $val->tmpelajaran_id]);
	            $guru = $this->Acuan_model->get_where('tm_pegawai', ['id' => $val->tmguru_id]);

	            $val->nama_hari = $this->name_of_days[$val->hari];
	            $val->jam = isset($jam->nama) ? $jam->nama : '';
	            $val->pelajaran = isset($pelajaran->nama) ? $pelajaran->nama : '';
	            $val->guru = isset($guru->nama) ? $guru->nama : '';
	            $val->idguru = $val->tmguru_id;

	            $jadwal_status = $this->Model_data->getJadwalCheckedInStatus($val->id);

                $val->checked_in = !$jadwal_status ? false : true;
                $val->checked_out = !$jadwal_status ? false : (empty($jadwal_status->end) ? false : true);
        }

        $this->load->view('form',$data);
	}
	
	
	
	
	public function save(){
		
       $ajaran        = $this->Acuan_model->ajaran();
       $semester      = $this->Acuan_model->semester();
     
       $tmjenjang_id  = $this->input->get_post("tmjenjang_id");
       $tmkelas_id    = $this->input->get_post("tmkelas_id");
       $tmruang_id    = $this->input->get_post("tmruang_id");
       $hari          = $this->input->get_post("hari");
       $tmjam_id      = $this->input->get_post("tmjam_id");
       $tmpelajaran_id= $this->input->get_post("mapel");
       $tmguru_id     = $this->input->get_post("tmguru_id");
	
        
       // if ($this->Model_data->validasi() == 0) {
			
		        $this->Model_data->insert();
			   $data['datagrid']     = $this->Model_data->getdatapel("tr_jadwal",array("tmjenjang_id"=>$tmjenjang_id,"tmkelas_id"=>$tmkelas_id,"tmruang_id"=>$tmruang_id,"ajaran"=>$this->Acuan_model->ajaran(),"semester"=>$this->Acuan_model->semester()))->result();

        foreach ($data['datagrid'] as $key => $val) {
            $jam = $this->Acuan_model->get_where('tm_jam', ['id' => $val->tmjam_id]);
            $pelajaran = $this->Acuan_model->get_where('tm_pelajaran', ['id' => $val->tmpelajaran_id]);
            $guru = $this->Acuan_model->get_where('tm_pegawai', ['id' => $val->tmguru_id]);

            $val->nama_hari = $this->name_of_days[$val->hari];
            $val->jam = isset($jam->nama) ? $jam->nama : '';
            $val->pelajaran = isset($pelajaran->nama) ? $pelajaran->nama : '';
            $val->guru = isset($guru->nama) ? $guru->nama : '';
        }

        $this->load->view('page_item',$data);
			
	   /*  } else {
            if ($this->input->post()) {
                header('Content-Type: application/json');
                echo json_encode(array('error' => true, 'message' => "Item Tagihan siswa ybs Sudah tersedia di database,silahkan pilih item lain"));
            } 
        }	 */
	
	
	}
	
	
	public function hapus(){
		
		$this->Acuan_model->hapus("tr_jadwal",array("id"=>$this->input->get_post("id")));
		
		
		
	}
	public function getsiswa(){
		
		$this->Acuan_model->hapus("tr_jadwal",array("id"=>$this->input->get_post("id")));
		
		
		
	}
	
	
	public function changeguru(){
		$guru   =  $this->Acuan_model->get_where2("tr_gurumapel",array("tmpelajaran_id"=>$_POST['id']))->result();
		 if(count($guru) >0){
		   foreach($guru as $j){
			echo json_encode($j);
			   
			  ?><option value="<?php echo $j->tmpegawai_id ?>" ><?php
			   $a=$this->Model_data->get_kondisi_namaguru($j->tmpegawai_id);
			   echo $a; ?></option><?php 
			   
		    }
		   }else{
			   ?>
			   <option value="0" > Belum ditentukan </option>
		   <?php 
		   }
		
	}

	public function checkin() {
	    $data['jadwal_id'] = $this->input->post('id');
	    $data['kelas_id'] = $this->input->post('kelas_id');

        $this->load->view('verify_account',$data);
    }

    public function verifyAccount() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password','trim|required');

        if($this->form_validation->run() === FALSE) {
            $errors = $this->form_validation->error_array();

            $errormsg = '<div class="alert alert-danger" role="alert">';
            foreach ($errors as $error) {
                $errormsg .= '<p>' . $error . '</p>';
            }
            $errormsg .= '</div>';

            json_output(['status' => false, 'errors' => $errormsg]);
        }
        else
        {
            $post = $this->input->post();

            $data['jadwal_id'] = $this->input->post('jadwal_id');
            $data['kelas_id'] = $this->input->post('kelas_id');

            $verified = $this->Model_data->verifyAccount($post);

            if (!$verified) {
                json_output(['status' => false, 'errors' => '<div class="alert alert-danger" role="alert"><p>Invalid Password.</p></div>']);
            }

            $this->Model_data->startAbsensiGuruJadwal($post);

            $data['siswa'] = $this->Model_data->getSiswaKelas($data['kelas_id']);

            $this->load->view('absen_siswa',$data);
        }
    }

    public function absenSiswa() {
        $post = $this->input->post();

        if (!isset($post['status'])) {
            json_output(['status' => false, 'errors' => '<div class="alert alert-danger" role="alert"><p>Data Absensi kosong.</p></div>']);
        }

        $this->Model_data->saveAbsensiSiswa($post);

        $jadwal = $this->Model_data->getJadwal($post['jadwal_id']);

        $_POST['id'] = $jadwal->tmruang_id;
        $this->form();
    }

    public function checkout() {
        $data['jadwal_id'] = $this->input->post('jadwal_id');

        $this->load->view('form_bap',$data);
    }

    public function saveBap() {
        $post = $this->input->post();

        if (empty($post['bap'])) {
            json_output(['status' => false, 'errors' => '<div class="alert alert-danger" role="alert"><p>Silakan isi catatan Keg. Belajar Mengajar.</p></div>']);
        }

        return $this->Model_data->endAbsensiGuruJadwal($post);
    }

    public function editAbsenSiswa() {
        $data['jadwal_id'] = $this->input->post('jadwal_id');
        $data['kelas_id'] = $this->input->post('kelas_id');

        $data['siswa'] = $this->Model_data->getSiswaKelas($data['kelas_id']);

        $this->load->view('absen_siswa',$data);
    }
}
