<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penetapanruang extends CI_Controller {

	 public function __construct()
      {
        parent::__construct();
		$this->load->model(array('Data_siswa_model'));
          if(!$this->session->userdata("tmsekolah_id")){
			
			redirect(base_url());
			
		 }
		
      } 
	public function index()
	{  
	
	    
		$data['title'] 		= "Penetapan Ruang Kelas";
		$data['konten'] 	= "page_siswa";
		$data['jenjang'] = $this->Acuan_model->get(array("table"=>"tm_jenjang","order"=>"urutan","by"=>"asc"),null)->result(); 
		$this->load->view('home/page_header',$data);
	

	}
	
	
	public function save(){
        $ajaran     = $this->Acuan_model->ajaran();
        $jumlahdata = $this->input->get_post("jumlahdata",TRUE);
		
		for($a=1;$a<$jumlahdata;$a++){
			
			
				
		   $data = array(
			  "tmruang_id"=>$_POST['tmruang_id'.$a.''],
			  "i_update"=>$this->session->userdata("user_id"),
			  "d_update"=>date("Y-m-d H:i:s")
			 
			);
			
			
			$this->Acuan_model->update("akademik.tr_kelas",$data,"tmsiswa_id='".$_POST['tmsiswa_id'.$a.'']."' and ajaran='".$ajaran."'");
		
			
		}
		  $this->Acuan_model->log($_SESSION['nama']." Melakukan Penetapan Ruang  Siswa ");
		   
			redirect(base_url()."penetapanruang?status=Proses Penetapan Berhasil");
		
		
	}
	
	
	
	
	
	
	public function cari()
	{  
	
	   
	    $tmjenjang_id = $this->input->get_post("tmjenjang_id");
	    $tmkelas_id   = $this->input->get_post("tmkelas_id");
	    $keyword      = $this->input->get_post("keyword");
		
		$data['ruang'] = $this->Acuan_model->get(array("table"=>"tm_ruang","order"=>"urutan","by"=>"asc"),"tmkelas_id='$tmkelas_id' and tmjenjang_id='$tmjenjang_id'")->result(); 
		
		
		$data['data_grid']  = $this->Data_siswa_model->getdata($tmjenjang_id,$tmkelas_id,$keyword)->result_array();
	   
		$this->load->view('page_refresh',$data);
	

	}
	
	
	
	
	
}
