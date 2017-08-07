<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Walas extends CI_Controller {

	 public function __construct()
      {
        parent::__construct();
		$this->load->model(array('Model_data'));
          if(!$this->session->userdata("tmsekolah_id")){
			
			redirect(base_url());
			
		 }
		
      } 
	public function index()
	{  
	
	    
		$data['title'] 		= "Penetapan Wali Kelas";
		$data['konten'] 	= "page_siswa";
		$data['jenjang']    = $this->Acuan_model->get(array("table"=>"tm_jenjang","order"=>"urutan","by"=>"asc"),"tmsekolah_id ='".$_SESSION['tmsekolah_id']."'")->result(); 
		$data['data_grid']  = $this->Model_data->getdata(null,null,null)->result();
		$this->load->view('home/page_header',$data);
	

	}
	
	
	public function setting(){
        $privileges = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'walas');

        if (!isset($privileges->c_update) || $privileges->c_update != '1') {
            header('Content-Type: application/json');
            echo json_encode(array('error' => true, 'alert' => '<div class="alert alert-danger">Anda tidak memiliki hak untuk mengakses fitur ini.</div>'));
            return;
        }

        $ajaran        = $this->Acuan_model->ajaran();
        $tmpegawai_id  = $this->input->get_post("id",TRUE);
        $tmruang_id    = $this->input->get_post("tmruang_id",TRUE);
        $sekolah       = $_SESSION['tmsekolah_id'];
		
		$valid  = $this->Acuan_model->get_where("tr_walas",array("tmsekolah_id"=>$_SESSION['tmsekolah_id'],"tmruang_id"=>$tmruang_id,"ajaran"=>$ajaran));
		
		  if(count($valid) ==0){
			  
			  $this->Model_data->insert();
		  }else{
			  
			  $this->Model_data->update();
			  
		  }
		
		  
		   
		
		
		
	}
	
	
	
	
	
	
	public function cari()
	{  
	
	   
	    $tmjenjang_id = $this->input->get_post("tmjenjang_id");
	    $tmkelas_id   = $this->input->get_post("tmkelas_id");
	    $tmruang_id      = $this->input->get_post("tmruang_id");
		
		
		$data['data_grid']  = $this->Model_data->getdata($tmjenjang_id,$tmkelas_id,$tmruang_id)->result();
	   
		$this->load->view('page_refresh',$data);
	

	}
	
	
	
	
	
}
