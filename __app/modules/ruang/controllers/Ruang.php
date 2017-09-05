<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang extends CI_Controller {

	 public function __construct()
      {
        parent::__construct();
		$this->load->model(array('Model_ruang'));
         
		
      } 
	public function index($offset=null)
	{  
	   if(!$this->session->userdata("tmsekolah_id")){
			
			redirect(base_url());
			
		 }
		$data['title'] 		= "Master Ruang ";
		$data['konten'] 	= "page";
		$data['jenjang'] = $this->Acuan_model->get(array("table"=>"tm_jenjang","order"=>"urutan","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."'")->result();
        $data['privileges'] = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'ruang');
		 
		$this->load->view('home/page_header',$data);
	

	}
	
	
    public function grid(){
		
		  $iTotalRecords = $this->Model_ruang->getdata(false)->num_rows();
		  
		  $iDisplayLength = intval($_REQUEST['length']);
		  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		  $iDisplayStart = intval($_REQUEST['start']);
		  $sEcho = intval($_REQUEST['draw']);
		  
		  $records = array();
		  $records["data"] = array(); 

		  $end = $iDisplayStart + $iDisplayLength;
		  $end = $end > $iTotalRecords ? $iTotalRecords : $end;
		  
		  $datagrid = $this->Model_ruang->getdata(true)->result_array();

        $privileges = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'ruang');
		   
		   $i= ($iDisplayStart +1);
		   foreach($datagrid as $val) {
				$no = $i++;

               // enable/disable actions based on privileges
               $actions = '';
               if (isset($privileges->c_update) && $privileges->c_update == '1') {
                   $actions .= '<a href="javascript:;" class="btn btn-success ubah tooltips" data-container="body" data-placement="top" title="Ubah Data" urlnya = "'.site_url("ruang/form").'"  datanya="'.$val['id_ruang'].'" ><i class="fa fa-pencil"></i></a>';
               }

               if (isset($privileges->c_delete) && $privileges->c_delete == '1') {
                   $actions .= '<a href="javascript:;" class="btn btn-danger hapus tooltips" data-container="body" data-placement="top" urlnya = "'.site_url("ruang/hapus").'" title="Hapus Data" datanya="'.$val['id_ruang'].'"  ><i class="fa fa-trash-o"></i></a>';
               }

				$records["data"][] = array(
					$no,
					$val['jenjang'],					
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
	
	public function save(){
     
        $this->form_validation->set_message('required', '{field} Di perlukan.');
       
				$config = array(
					array('field' => 'f[tmjenjang_id]', 'label' => 'Jenjang Pendidikan ', 'rules' => 'trim|required'),
					array('field' => 'f[tmkelas_id]', 'label' => 'Kelas ', 'rules' => 'trim|required'),
					array('field' => 'f[nama]', 'label' => 'Ruang ', 'rules' => 'trim|required'),
				);
				$this->form_validation->set_rules($config);

        $privileges = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'ruang');
        
        if ($this->form_validation->run() == true) {
			
			$id   = $this->input->get_post("id",true);
			
				if(empty($id)){
                    if (!isset($privileges->c_create) || $privileges->c_create != '1') {
                        header('Content-Type: application/json');
                        echo json_encode(array('error' => true, 'message' => 'Anda tidak memiliki hak untuk mengakses fitur ini.'));
                        return;
                    }

						$this->Model_ruang->insert();
				}else{
                    if (!isset($privileges->c_update) || $privileges->c_update != '1') {
                        header('Content-Type: application/json');
                        echo json_encode(array('error' => true, 'message' => 'Anda tidak memiliki hak untuk mengakses fitur ini.'));
                        return;
                    }

						$this->Model_ruang->update($id);
				}
			  
			   
	     } else {
            if ($this->input->post()) {
                header('Content-Type: application/json');
                echo json_encode(array('error' => true, 'message' => validation_errors()));
            } 
        }	
	
	
	}
	
	
	
	
	public function hapus(){
        $privileges = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'ruang');

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



	public function selectruangkelas(){
		
		$tmpelajaran_id= $this->input->get_post("id");
		// $kelas  	  = $this->Acuan_model->get_wherearray("tm_kelas",array("tmjenjang_id"=>$tmjenjang_id));

		$this->db->select("*");
        $this->db->from("tr_jadwal");
        $this->db->join("tm_ruang","tm_ruang.id=tr_jadwal.tmruang_id","inner");
        $this->db->group_by("tmruang_id");
		$this->db->where("tmpelajaran_id",$tmpelajaran_id);
		$kelas =  $this->db->get()->result();


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

	public function selectruang2(){
		
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
