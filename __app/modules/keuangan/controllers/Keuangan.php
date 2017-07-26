<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {

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
	
		$data['title'] 		= "Master Keuangan";
		$data['konten'] 	= "page";
		$data['jenjang'] = $this->Acuan_model->get(array("table"=>"tm_jenjang","order"=>"urutan","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."'")->result(); 
		
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
					$this->Acuan_model->get_kondisi($val['tmjenjang_id'],"id","tm_jenjang","nama"),					
					$this->Acuan_model->get_kondisi($val['tmkelas_id'],"id","tm_kelas","nama"),					
					$val['nama'],					
					$this->Acuan_model->formatuang($val['jumlah'])."/".$val['kategori'],					
								
					'
					<a href="javascript:;" class="btn btn-success ubah tooltips" data-container="body" data-placement="top" title="Ubah Data" urlnya = "'.site_url("keuangan/form").'"  datanya="'.$val['id'].'"><i class="fa fa-pencil"></i>  </a> 
					
                    <a href="javascript:;" class="btn btn-danger hapus tooltips" data-container="body" data-placement="top" urlnya = "'.site_url("keuangan/hapus").'" title="Hapus Data" datanya="'.$val['id'].'"><i class="fa fa-trash-o"></i></a>
					
					'

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
				
				$data['dataform'] = $this->Acuan_model->get_where("tm_keuangan",array("id"=>$id));
				$data['kelas']    = $this->Acuan_model->get(array("table"=>"tm_kelas","order"=>"urutan","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."' and tmjenjang_id='".$data['dataform']->tmjenjang_id."'")->result(); 
		
			}
		 $this->load->view('form',$data);
	}
	
	public function save(){
     
        $this->form_validation->set_message('required', '{field} Wajib di isi.');
       
				$config = array(
				   array('field' => 'f[tmjenjang_id]', 'label' => 'Jenjang Pendidikan  ', 'rules' => 'trim|required'),
					array('field' => 'f[tmkelas_id]', 'label' => 'Kelas  ', 'rules' => 'trim|required'),
					array('field' => 'f[nama]', 'label' => 'Nama Tagihan  ', 'rules' => 'trim|required'),
					array('field' => 'jumlah', 'label' => 'Jumlah Tagihan  ', 'rules' => 'trim|required'),
					
				);
				$this->form_validation->set_rules($config);
		
	
        
        if ($this->form_validation->run() == true) {
			
			$id   = $this->input->get_post("id",true);
			
				if(empty($id)){
						$this->Model_data->insert();
				}else{
						$this->Model_data->update($id);
				}
			  
			   
	     } else {
            if ($this->input->post()) {
                header('Content-Type: application/json');
                echo json_encode(array('error' => true, 'message' => validation_errors()));
            } 
        }	
	
	
	}
	
	
	
	
	public function hapus(){
		
		$this->Acuan_model->hapus("tm_keuangan",array("id"=>$this->input->get_post("id")));
		
		
	}
	

}
