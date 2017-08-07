<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapkembalibuku extends CI_Controller {

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
	
		$data['title'] 		= "Laporan Pengembalian  Buku ";
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
					$this->Acuan_model->get_kondisi_a($val['tmsiswa_id'],"id","tm_siswa","nis"),					
					$this->Acuan_model->get_kondisi_a($val['tmsiswa_id'],"id","tm_siswa","nama"),					
					$val['nama'],					
					$this->Acuan_model->formattanggalstring($val['tgl_pinjam']),					
					$this->Acuan_model->formattanggalstring($val['tgl_kembali']),					
					$this->Acuan_model->formattanggalstring($val['harus_kembali']),		
					'Rp'.$val['denda'],
					'<i class="label label-success">'.$val['status_denda'].'</i>',
					'<i class="label label-success"> Sudah dikembalikan </i>'

				  );
			  }
		
		  $records["draw"] = $sEcho;
		  $records["recordsTotal"] = $iTotalRecords;
		  $records["recordsFiltered"] = $iTotalRecords;
		  
		  echo json_encode($records);
	}
	
	

	
	
	

}
