<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalianbuku extends CI_Controller {

	 public function __construct()
      {
        parent::__construct();
		$this->load->model(array('Model_data','datasiswa/Model_datasiswa'));
         if(!$this->session->userdata("tmsekolah_id")){
			
			redirect(base_url());
			
		 }
		 
		 date_default_timezone_set("Asia/Jakarta");
		
      } 
	public function index($offset=null)
	{  
	
		$data['title'] 		= "Pengembalian  Buku";
		$data['konten'] 	= "form";
		$this->load->view('home/page_header',$data);
	

	}
	
	public function datapeminjaman(){
		 $tmsiswa_id   = $this->input->get_post("tmsiswa_id",true);
		 $data['peminjaman'] = $this->Model_data->get_peminjaman($tmsiswa_id)->result();

         $this->load->view("pagepeminjaman",$data);	
		 
	}
	public function kembalikan(){
     
       
	   $id     = $this->input->get_post("id",true);
	   $denda  = $this->input->get_post("denda",true);
	   $status_denda  = $this->input->get_post("status",true);
	    $this->Acuan_model->update("tr_buku",array("status"=>2,"denda"=>$denda,"status_denda"=>$status_denda,"tgl_kembali"=>date("Y-m-d")),"id='".$id."'");
	
	}
	
	
	
	
	
	
	// Siswa 
	
	public function siswa(){
		$data['jenjang'] = $this->Acuan_model->get(array("table"=>"tm_jenjang","order"=>"urutan","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."'")->result(); 
		$this->load->view("pagesiswa",$data);
		
	}
	
	public function gridsiswa(){
		
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
					$val['nis'],
					$val['nama'],					
					
					'
					<a href="javascript:;" class="btn btn-success pilihsiswa tooltips" data-container="body" data-placement="top" title="Pilih"  tmsiswa_id="'.$val['id'].'" namasiswa="'.$val['nama'].'" jenjang="'.$val['jenjang'].'" kelas="'.$val['kelas'].'" ruang="'.$val['ruang'].'"><i class="fa fa-check-circle "></i>  </a> 
					
                  	'

				  );
			  }
		
		  $records["draw"] = $sEcho;
		  $records["recordsTotal"] = $iTotalRecords;
		  $records["recordsFiltered"] = $iTotalRecords;
		  
		  echo json_encode($records);
	}
	
	
	
}
