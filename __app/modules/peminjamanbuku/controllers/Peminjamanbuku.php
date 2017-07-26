<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjamanbuku extends CI_Controller {

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
	
		$data['title'] 		= "Peminjaman Buku";
		$data['konten'] 	= "form";
		$this->load->view('home/page_header',$data);
	

	}
	
	
	public function pinjam(){
     
       
	   $tmsiswa_id   = $this->input->get_post("tmsiswa_id",true);
	   $tmbuku_id    = $this->input->get_post("tmbuku_id",true);
	   $harus_kembali= $this->input->get_post("harus_kembali",true);
	   
	   if(count($this->Acuan_model->get_where("perpus.tr_buku",array("tmsiswa_id"=>$tmsiswa_id,"tmbuku_id"=>$tmbuku_id,"status"=>1))) ==0){
		
	     $this->Acuan_model->insert("perpus.tr_buku",array("tmsiswa_id"=>$tmsiswa_id,"tmbuku_id"=>$tmbuku_id,"harus_kembali"=>$harus_kembali,"tgl_pinjam"=>date("Y-m-d"),"status"=>1,"i_entry"=>$_SESSION['user_id'],"d_entry"=>date("Y-m-d H:i:s")));
				
        $this->Acuan_model->log($_SESSION['nama']." Melakukan Peminjaman Buku ");
				
	   }

       $data['peminjaman'] = $this->Model_data->get_peminjaman($tmsiswa_id)->result();

      $this->load->view("pagepeminjaman",$data);	   
	
	}
	
	
	
	
	public function batalpinjam(){
		
		$this->Acuan_model->hapus("perpus.tr_buku",array("id"=>$this->input->get_post("id")));
		
		
	}
	
	
	// Siswa 
	
	public function siswa(){
		$data['jenjang'] = $this->Acuan_model->get(array("table"=>"tm_jenjang","order"=>"urutan","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."'")->result(); 
		$this->load->view("pagesiswa",$data);
		
	}
	
	public function gridsiswa(){
		
		  $iTotalRecords = $this->Model_datasiswa->getdata(false)->num_rows();
		  
		  $iDisplayLength = intval($_REQUEST['length']);
		  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		  $iDisplayStart = intval($_REQUEST['start']);
		  $sEcho = intval($_REQUEST['draw']);
		  
		  $records = array();
		  $records["data"] = array(); 

		  $end = $iDisplayStart + $iDisplayLength;
		  $end = $end > $iTotalRecords ? $iTotalRecords : $end;
		  
		  $datagrid = $this->Model_datasiswa->getdata(true)->result_array();
		   
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
	
	
	// Buku 
	
	public function buku(){
		$this->load->view("pagebuku");
		
	}
	
	public function gridbuku(){
		
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
					$val['nama'],					
					$val['subjek'],					
					$val['pengarang'],					
					$val['penerbit'],
					$val['isbn'],					
					
					'
					<a href="javascript:;" class="btn btn-success pilihbuku tooltips" data-container="body" data-placement="top" title="Pilih"  tmbuku_id="'.$val['id'].'" judulbuku="'.$val['nama'].'" barcode="'.$val['barcode'].'" ><i class="fa fa-check-circle "></i>  </a> 
					
                  	'

				  );
			  }
		
		  $records["draw"] = $sEcho;
		  $records["recordsTotal"] = $iTotalRecords;
		  $records["recordsFiltered"] = $iTotalRecords;
		  
		  echo json_encode($records);
	}
	

}
