<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lihatabsensiswa extends CI_Controller {

	 public function __construct()
      {
        parent::__construct();
		$this->load->model(array('Model_lihatabsensiswa'));
         if(!$this->session->userdata("tmsekolah_id")){
			
			redirect(base_url());
			
		 }
		
      } 
	public function index($offset=null)
	{  
	
		$data['title'] 		= "Lihat Absen Siswa";
		$data['konten'] 	= "page";
		$data['jenjang'] = $this->Acuan_model->get(array("table"=>"tm_jenjang","order"=>"urutan","by"=>"asc"),null)->result();
        $data['privileges'] = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'lihatabsen');

		$this->load->view('home/page_header',$data);
	

	}
	
	public function grid(){
		
		  $iTotalRecords = $this->Model_lihatabsensiswa->getdata2(false)->num_rows();
		  $iDisplayLength = intval($_REQUEST['length']);
		  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		  $iDisplayStart = intval($_REQUEST['start']);
		  $sEcho = intval($_REQUEST['draw']);
		  
		  $records = array();
		  $records["data"] = array(); 

		  $end = $iDisplayStart + $iDisplayLength;
		  $end = $end > $iTotalRecords ? $iTotalRecords : $end;
		  
		  $datagrid = $this->Model_lihatabsensiswa->getdata2(true)->result_array();

          $privileges = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'lihatabsensiswa');
		   
		   $i= ($iDisplayStart +1);
		   foreach($datagrid as $val) {
               // enable/disable actions based on privileges
               $actions = '';
               $array  = "$val[idsiswa],$val[kodemapel],$val[idjadwal]";
               // non siswa can see this if allowed but siswa can only see his/her login details
               if (!empty($privileges) && ($this->session->userdata['grup'] != 4 || ($this->session->userdata['grup'] == 4 && $this->session->userdata['grup'] == $val['idsiswa']))) {
                   $actions .= '<a href="javascript:;" class="btn btn-success ubah tooltips" data-container="body" data-placement="top" title="Data absen" urlnya = "'.site_url("lihatabsensiswa/detailabsen").'"  datanya="'.$array.'" ><i class="fa fa-book"></i></a>';
               }

				
				$no = $i++;
				$records["data"][] = array(
					$no,	
					$val["kodemapel"],				
					$val["mapel"],
					$val["semester"],
					$actions
				  );
			  }
		
		  $records["draw"] = $sEcho;
		  $records["recordsTotal"] = $iTotalRecords;
		  $records["recordsFiltered"] = $iTotalRecords;
		  
		  echo json_encode($records);
	}

	public function grid2(){
		  $iTotalRecords = $this->Model_lihatabsensiswa->get_absen(false)->num_rows();
		  $iDisplayLength = intval($_REQUEST['length']);
		  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		  $iDisplayStart = intval($_REQUEST['start']);
		  $sEcho = intval($_REQUEST['draw']);
		  
		  $records = array();
		  $records["data"] = array(); 

		  $end = $iDisplayStart + $iDisplayLength;
		  $end = $end > $iTotalRecords ? $iTotalRecords : $end;
		  
		  $datagrid = $this->Model_lihatabsensiswa->get_absen(true)->result_array();

          $privileges = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'lihatabsensiswa');
		   
		   $i= ($iDisplayStart +1);
		   foreach($datagrid as $val) {
               // enable/disable actions based on privileges
               $actions = '';
               				
				$no = $i++;
				$records["data"][] = array(
					$no,	
					$val["pelajaran"],			
					$this->Acuan_model->formattanggalstring($val["tanggal"]),
					$val["status"]
				  );
			  }
		
		  $records["draw"] = $sEcho;
		  $records["recordsTotal"] = $iTotalRecords;
		  $records["recordsFiltered"] = $iTotalRecords;
		  
		  echo json_encode($records);
	}
	
	
	public function detailabsen(){
		 $data["det"] = $this->input->get_post("id",TRUE);
		 $this->load->view('detail',$data);
	}	
	
}
