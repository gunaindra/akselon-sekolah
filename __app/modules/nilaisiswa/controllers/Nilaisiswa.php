<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilaisiswa extends CI_Controller {

	 public function __construct()
      {
        parent::__construct();
		$this->load->model(array('Model_nilaisiswa'));
         
		
      } 
	public function index($offset=null)
	{  
	   if(!$this->session->userdata("tmsekolah_id")){
			
			redirect(base_url());
			
		 }
		$data['title'] 		= "Nilai Siswa ";
		$data['konten'] 	= "page";
		$data['jenjang'] = $this->Acuan_model->get(array("table"=>"tm_jenjang","order"=>"urutan","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."'")->result();
        $data['privileges'] = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'nilaisiswa');
		 
		$this->load->view('home/page_header',$data);
	

	}
	
	
    public function grid(){
		
		  $iTotalRecords = $this->Model_nilaisiswa->getdata(false)->num_rows();
		  
		  $iDisplayLength = intval($_REQUEST['length']);
		  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		  $iDisplayStart = intval($_REQUEST['start']);
		  $sEcho = intval($_REQUEST['draw']);
		  
		  $records = array();
		  $records["data"] = array(); 

		  $end = $iDisplayStart + $iDisplayLength;
		  $end = $end > $iTotalRecords ? $iTotalRecords : $end;
		  
		  $datagrid = $this->Model_nilaisiswa->getdata(true)->result_array();

      	  $privileges = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'nilaisiswa');
		   
		   $i= ($iDisplayStart +1);
		   foreach($datagrid as $val) {
				$no = $i++;

               // enable/disable actions based on privileges
               $actions = '';
               if (isset($privileges->c_update) && $privileges->c_update == '1') {
                   // $actions .= '<a href="javascript:;" class="btn btn-success ubah tooltips" data-container="body" data-placement="top" title="Ubah Data" urlnya = "'.site_url("nilaisiswa/form").'"  datanya="'.$val['id_ruang'].'" ><i class="fa fa-pencil"></i></a>';
                   $actions .= '<a href="javascript:;" class="btn btn-success ubah tooltips" data-container="body" data-placement="top" title="List Siswa" urlnya = "'.site_url("nilaisiswa/listsiswa").'"  datanya="'.$val['id_ruang'].'" ><i class="fa fa-plus"></i></a>';
               }
               if (isset($privileges->c_delete) && $privileges->c_delete == '1') {
                   // $actions .= '<a href="javascript:;" class="btn btn-danger hapus tooltips" data-container="body" data-placement="top" urlnya = "'.site_url("nilaisiswa/hapus").'" title="Hapus Data" datanya="'.$val['id_ruang'].'"  ><i class="fa fa-trash-o"></i></a>';
               }

				$records["data"][] = array(
					$no,					
					$val['kelas'],					
					$val['ruang'],
                    $actions
				  );
			  }
		
		  $records["draw"] = $sEcho;
		  $records["recordsTotal"] = $iTotalRecords;
		  $records["recordsFiltered"] = $iTotalRecords;
		  
		  echo json_encode($records);
	}

	

	
	public function form(){
		
		 $id = $this->input->get_post("id",TRUE);

		 $data = array();
		 $data['jenjang'] = $this->Acuan_model->get(array("table"=>"tm_jenjang","order"=>"urutan","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."'")->result(); 
		  
		    if(!empty($id)){
				
				$data['dataform'] = $this->Acuan_model->get_where("tm_ruang",array("id"=>$id));
				$data['kelas']    = $this->Acuan_model->get(array("table"=>"tm_kelas","order"=>"urutan","by"=>"asc"),"tmjenjang_id='".$data['dataform']->tmjenjang_id."'")->result();
			}
		 $this->load->view('form',$data);
	}

	public function listsiswa(){
		$id = $this->input->get_post("id",TRUE);
		$data['datasiswa'] = array("id"=>$id);
		$this->load->view('list',$data);
	}

	 public function gridsiswa(){
	 	  $id = $this->input->get_post("id",TRUE);
		  $iTotalRecords = $this->Model_nilaisiswa->getdatasiswa($id)->num_rows();
	 	  $iDisplayLength = intval($_REQUEST['length']);
		  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		  $iDisplayStart = intval($_REQUEST['start']);
		  $sEcho = intval($_REQUEST['draw']);
		  
		  $records = array();
		  $records["data"] = array(); 

		  $end = $iDisplayStart + $iDisplayLength;
		  $end = $end > $iTotalRecords ? $iTotalRecords : $end;
		  $datagrid = $this->Model_nilaisiswa->getdatasiswa($id)->result_array();
		  $privileges = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'nilaisiswa');
		   
		   $i= ($iDisplayStart +1);
		   foreach($datagrid as $val) {
				$no = $i++;

               // enable/disable actions based on privileges
               $actions = '';
               if (isset($privileges->c_update) && $privileges->c_update == '1') {
                   // $actions .= '<a href="javascript:;" class="btn btn-success ubah tooltips" data-container="body" data-placement="top" title="Ubah Data" urlnya = "'.site_url("nilaisiswa/form").'"  datanya="'.$val['tmsiswa_id'].'" ><i class="fa fa-pencil"></i></a>';
                   // $actions .= '<a href="javascript:;" class="btn btn-success ubah tooltips" data-container="body" data-placement="top" title="List Siswa" urlnya = "'.site_url("nilaisiswa/nilaisiswa").'"  datanya="'.$val['tmsiswa_id'].'" ><i class="fa fa-plus"></i></a>';
               }
               if (isset($privileges->c_delete) && $privileges->c_delete == '1') {
                   // $actions .= '<a href="javascript:;" class="btn btn-danger hapus tooltips" data-container="body" data-placement="top" urlnya = "'.site_url("nilaisiswa/hapus").'" title="Hapus Data" datanya="'.$val['tmsiswa_id'].'"  ><i class="fa fa-trash-o"></i></a>';
               }

				$records["data"][] = array(
					$no,					
					'<input type="hidden" name="kelas[]" value="'.$val['tmkelas_id'].'">
					 <input type="hidden" name="ruang[]" value="'.$val['tmruang_id'].'">
					 <input type="hidden" name="jenjang[]" value="'.$val['tmjenjang_id'].'">
					 <input type="hidden" name="ajaran[]" value="'.$val['ajaran'].'">
					 <input type="hidden" name="sekolah[]" value="'.$val['tmsekolah_id'].'">
					 <input type="hidden" id="nama_id" name="nama_id[]" value="'.$val['id'].'">'.$val['nisn'],					
					$val['nama'],
					'<input type="text" name="nilai[]" id="nilai">',
                    $actions
				  );
			  }
		
		  $records["draw"] = $sEcho;
		  $records["recordsTotal"] = $iTotalRecords;
		  $records["recordsFiltered"] = $iTotalRecords;
		  
		  echo json_encode($records);
	}
	
	
	public function save(){
     
        $this->form_validation->set_message('required', '{field} Di perlukan.');
       
				$config = array(
					array('field' => 'f[tmjenjang_id]', 'label' => 'Jenjang Pendidikan ', 'rules' => 'trim|required'),
					array('field' => 'f[tmkelas_id]', 'label' => 'Kelas ', 'rules' => 'trim|required'),
					array('field' => 'f[nama]', 'label' => 'Ruang ', 'rules' => 'trim|required'),
				);
				$this->form_validation->set_rules($config);

        $privileges = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'nilaisiswa');
        
        if ($this->form_validation->run() == true) {
			
			$id   = $this->input->get_post("id",true);
			
				if(empty($id)){
                    if (!isset($privileges->c_create) || $privileges->c_create != '1') {
                        header('Content-Type: application/json');
                        echo json_encode(array('error' => true, 'message' => 'Anda tidak memiliki hak untuk mengakses fitur ini.'));
                        return;
                    }

						$this->Model_nilaisiswa->insert();
				}else{
                    if (!isset($privileges->c_update) || $privileges->c_update != '1') {
                        header('Content-Type: application/json');
                        echo json_encode(array('error' => true, 'message' => 'Anda tidak memiliki hak untuk mengakses fitur ini.'));
                        return;
                    }

						$this->Model_nilaisiswa->update($id);
				}
			  
			   
	     } else {
            if ($this->input->post()) {
                header('Content-Type: application/json');
                echo json_encode(array('error' => true, 'message' => validation_errors()));
            } 
        }	
	
	
	}

	public function save_nilai(){
		$idsiswa = $this->input->get_post('nama_id');
  		$jenjang = $this->input->get_post('jenjang');
  		$kelas = $this->input->get_post('kelas');
  		$ruang =$this->input->get_post('ruang');
  		$nilai = $this->input->get_post('nilai');
  		$pelajaran = $this->input->get_post('pelajaran');
  		$status =$this->input->get_post('nilaistatus');
  		$ajaran = $this->input->get_post('ajaran');
  		$sekolah = $this->input->get_post('sekolah');
  		$tanggal = $this->input->get_post('tanggal');
  		$table = "tr_nilai";
        $this->form_validation->set_message('required', '{field} Di perlukan.');
       
		$config = array(array('field' => 'nilai[]', 'label' => 'Nilai ', 'rules' => 'trim|required'));
		$this->form_validation->set_rules($config);

        $privileges = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'nilaisiswa');
        
        if ($this->form_validation->run() == true) {
				if(!empty($idsiswa)){
                    if (!isset($privileges->c_create) || $privileges->c_create != '1') {
                        header('Content-Type: application/json');
                        echo json_encode(array('error' => true, 'message' => 'Anda tidak memiliki hak untuk mengakses fitur ini.'));
                        return;
                    }

						foreach( $idsiswa as $key => $n ) {
						$data = array(
						  		'tmsiswa_id' =>$n,
						  		'tmjenjang_id' =>$jenjang[$key],
						  		'tmkelas_id'=>$kelas[$key],
						  		'tmruang_id' =>$ruang[$key],
						  		'tmnilai_siswa' =>$nilai[$key],
						  		'tmnilai_status' =>$status,
						  		'tmpelajaran_id' =>$pelajaran,
						  		'ajaran' =>$ajaran[$key],
						  		'tmsekolah_id' =>$sekolah[$key],
						  		'i_entry' =>$tanggal,
						  );


							$this->Model_nilaisiswa->save_nilai($table,$data);
						}
				}
			  
			   
	     } else {
            if ($this->input->post()) {
                header('Content-Type: application/json');
                echo json_encode(array('error' => true, 'message' => validation_errors()));
            } 
        }	
	
	
	}
	
	
	
	
	public function hapus(){
        $privileges = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'nilaisiswa');

        if (!isset($privileges->c_delete) || $privileges->c_delete != '1') {
            header('Content-Type: application/json');
            echo json_encode(array('error' => true, 'alert' => '<div class="alert alert-danger">Anda tidak memiliki hak untuk mengakses fitur ini.</div>'));
            return;
        }
		
		$this->Acuan_model->hapus("tm_ruang",array("id"=>$this->input->get_post("id")));
		
		
	}
	
	// onchange
	
	public function selectkelas(){
		
		$tmjenjang_id = $this->input->get_post("id");
		$kelas  	  = $this->Acuan_model->get_wherearray("tm_kelas",array("tmjenjang_id"=>$tmjenjang_id));
		  if(count($kelas) >0){
			  echo "<option value=''>-Pilih Kelas-</option>";
			  
			  foreach($kelas as $row){
				  
				  echo "<option value='".$row->id."'>".$row->nama."</option>";
			  }
			  
		  }else{
			  
			     echo "<option value=''>Tidak ditemukan</option>";
		  }
		  
		
	}
	
	public function selectruang(){
		
		$tmkelas_id   = $this->input->get_post("id");
		$ruang  	  = $this->Acuan_model->get_wherearray("tm_ruang",array("tmkelas_id"=>$tmkelas_id));
		  if(count($ruang) >0){
			  echo "<option value=''>-Pilih Ruang-</option>";
			  
			  foreach($ruang as $row){
				  
				  echo "<option value='".$row->id."'>".$row->nama."</option>";
			  }
			  
		  }else{
			  
			     echo "<option value=''>Tidak ditemukan</option>";
		  }
		  
		
	}
	

}
