<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lihatnilai extends CI_Controller {

	 public function __construct()
      {
        parent::__construct();
		$this->load->model(array('Model_lihatnilai'));
         if(!$this->session->userdata("tmsekolah_id")){
			
			redirect(base_url());
			
		 }
		
      } 
	public function index($offset=null)
	{  
	
		$data['title'] 		= "Data Siswa";
		$data['konten'] 	= "page";
		$data['jenjang'] = $this->Acuan_model->get(array("table"=>"tm_jenjang","order"=>"urutan","by"=>"asc"),null)->result();
        $data['privileges'] = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'lihatnilai');

		$this->load->view('home/page_header',$data);
	

	}
	
	public function grid(){
		
		  $iTotalRecords = $this->Model_lihatnilai->getdata(false)->num_rows();
		  
		  $iDisplayLength = intval($_REQUEST['length']);
		  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		  $iDisplayStart = intval($_REQUEST['start']);
		  $sEcho = intval($_REQUEST['draw']);
		  
		  $records = array();
		  $records["data"] = array(); 

		  $end = $iDisplayStart + $iDisplayLength;
		  $end = $end > $iTotalRecords ? $iTotalRecords : $end;
		  
		  $datagrid = $this->Model_lihatnilai->getdata(true)->result_array();

        $privileges = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'lihatnilai');
		   
		   $i= ($iDisplayStart +1);
		   foreach($datagrid as $val) {
               // enable/disable actions based on privileges
               $actions = '';
               $array  = "$val[idsiswa],$val[idpel]";
               // echo json_encode($array);
               // non siswa can see this if allowed but siswa can only see his/her login details
               if (!empty($privileges) && ($this->session->userdata['grup'] != 3 || ($this->session->userdata['grup'] == 3 && $this->session->userdata['grup'] == $val['id']))) {
                   $actions .= '<a href="javascript:;" class="btn btn-success ubah tooltips" data-container="body" data-placement="top" title="Data Akun" urlnya = "'.site_url("lihatnilai/detailnilai").'"  datanya="'.$array.'" ><i class="fa fa-book"></i></a>';
               }
               if (isset($privileges->c_update) && $privileges->c_update == '1') {
                   $actions .= '<a href="javascript:;" class="btn btn-success ubah tooltips" data-container="body" data-placement="top" title="Ubah Data" urlnya = "'.site_url("gurumapel/formedit").'"  datanya="'.$val['id'].'"><i class="fa fa-pencil"></i></a>';
               }
               
				$no = $i++;
				$records["data"][] = array(
					$no,					
					$val['nm_ruang'],					
					$val['nm_siswa'],					
					$actions
				  );
			  }
		
		  $records["draw"] = $sEcho;
		  $records["recordsTotal"] = $iTotalRecords;
		  $records["recordsFiltered"] = $iTotalRecords;
		  
		  echo json_encode($records);
	}
	
	public function detailnilai(){
		
		 $id = $this->input->get_post("id",TRUE);
		 // echo $id;
		 $id = (explode(",",$id));
		 $idsiswa = json_decode($id[0]);
		 $idpel = json_decode($id[1]);
		    if(!empty($id)){
		    	$a = "ulangan";
				$data['ulangan'] = $this->Acuan_model->get_nilai_by($idpel,$idsiswa,$a);
				$data['rata1'] =  $this->Acuan_model->get_nilai_rata_by($idpel,$idsiswa,$a);
				$b = "uts";
				$data['uts'] = $this->Acuan_model->get_nilai_by($idpel,$idsiswa,$b);
				$data['rata2'] =  $this->Acuan_model->get_nilai_rata_by($idpel,$idsiswa,$b);
				$c = "uas";
				$data['uas'] = $this->Acuan_model->get_nilai_by($idpel,$idsiswa,$c);
				$data['rata3'] =  $this->Acuan_model->get_nilai_rata_by($idpel,$idsiswa,$c);
				$d = "tugas";
				$data['tugas'] = $this->Acuan_model->get_nilai_by($idpel,$idsiswa,$d);
				$data['rata4'] =  $this->Acuan_model->get_nilai_rata_by($idpel,$idsiswa,$d);
				
			}
		 $this->load->view('detailnilai',$data);
	}
	
	
}
