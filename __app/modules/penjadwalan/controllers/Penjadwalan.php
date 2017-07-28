<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjadwalan extends CI_Controller {

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
	
		$data['title'] 		= "Penjadwalan Pelajaran";
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
					$val['jenjang'],					
					$val['kelas'],					
					$val['ruang'],					
									
								
					'
					<a href="javascript:;" class="btn btn-success ubah tooltips" data-container="body" data-placement="top" title="Buat Jadwal " urlnya = "'.site_url("penjadwalan/form").'"    datanya="'.$val['id'].'" ><i class="fa  fa-file-text-o "></i> Penjadwalan  </a> 
				
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
				
				$data['dataform'] = $this->Acuan_model->get_where("v_ruang",array("id"=>$id));
				$data['datagrid']     = $this->Model_data->getdatapel("tr_jadwal",array("tmjenjang_id"=>$data['dataform']->tmjenjang_id,"tmkelas_id"=>$data['dataform']->tmkelas_id,"tmruang_id"=>$data['dataform']->tmruang_id,"ajaran"=>$this->Acuan_model->ajaran(),"semester"=>$this->Acuan_model->semester()))->result();
			}
		 $this->load->view('form',$data);
	}
	
	
	
	
	public function save(){
		
       $ajaran        = $this->Acuan_model->ajaran();
       $semester      = $this->Acuan_model->semester();
     
       $tmjenjang_id  = $this->input->get_post("tmjenjang_id");
       $tmkelas_id    = $this->input->get_post("tmkelas_id");
       $tmruang_id    = $this->input->get_post("tmruang_id");
       $hari          = $this->input->get_post("hari");
       $tmjam_id      = $this->input->get_post("tmjam_id");
       $tmpelajaran_id= $this->input->get_post("mapel");
       $tmguru_id     = $this->input->get_post("tmguru_id");
	
        
       // if ($this->Model_data->validasi() == 0) {
			
		        $this->Model_data->insert();
			   $data['datagrid']     = $this->Model_data->getdatapel("tr_jadwal",array("tmjenjang_id"=>$tmjenjang_id,"tmkelas_id"=>$tmkelas_id,"tmruang_id"=>$tmruang_id,"ajaran"=>$this->Acuan_model->ajaran(),"semester"=>$this->Acuan_model->semester()))->result();
                $this->load->view('page_item',$data);
			
	   /*  } else {
            if ($this->input->post()) {
                header('Content-Type: application/json');
                echo json_encode(array('error' => true, 'message' => "Item Tagihan siswa ybs Sudah tersedia di database,silahkan pilih item lain"));
            } 
        }	 */
	
	
	}
	
	
	public function hapus(){
		
		$this->Acuan_model->hapus("tr_jadwal",array("id"=>$this->input->get_post("id")));
		
		
		
	}
	
	public function changeguru(){
		$guru   =  $this->Acuan_model->get_where2("tr_gurumapel",array("tmpelajaran_id"=>$_POST['id']))->result();
		 if(count($guru) >0){
		   foreach($guru as $j){
			echo json_encode($j);
			   
			   ?><option value="<?php echo $j->tmpegawai_id ?>" >
			   <?php 
			   	$id = $j->tmpegawai_id;
			   	echo $this->Acuan_model->get_kondisi("9","id","tm_pegawai","nama");?></option><?php 
			   
		    }
		   }else{
			   ?>
			   <option value="0" > Belum ditentukan </option>
		   <?php 
		   }
		
	}
	
	
	
}
