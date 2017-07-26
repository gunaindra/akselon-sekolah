<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswapembayaran extends CI_Controller {

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
	
		$data['title'] 		= "Pembayaran Siswa";
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
					$val['jenjang'],					
					$val['kelas'],					
					$val['ruang'],					
									
					$val['nama'],					
					$val['sex'],					
					$val['nama_ayah'],					
					$val['nama_ibu'],					
					'
					<a href="javascript:;" class="btn btn-success ubah tooltips" data-container="body" data-placement="top" title="Tagihan " urlnya = "'.site_url("siswapembayaran/form").'"  datanya="'.$val['id'].'" ><i class="fa fa-money "></i> Lakukan Pembayaran  </a> 
				
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
				
				$data['dataform'] = $this->Acuan_model->get_where("view.v_siswa",array("id"=>$id));
				$data['data']     = $this->Acuan_model->get_wherearray("akademik.tr_keuangan",array("tmjenjang_id"=>$data['dataform']->tmjenjang_id,"tmsiswa_id"=>$data['dataform']->id,"ajaran"=>$ajaran));
			}
		 $this->load->view('form',$data);
	}
	
	
	
	
	public function bayar(){
		
     
     
	
       $this->Model_data->update();
			   
	
	
	}
	
	
	
	
	
	
}
