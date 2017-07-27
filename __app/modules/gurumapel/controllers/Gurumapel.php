<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gurumapel extends CI_Controller {

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
	
		$data['title'] 		= "Data Guru Mata Pelajaran";
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
				$pelajaran = $this->Acuan_model->get_wherearray("v_gurumapel",array("tmpegawai_id"=>$val['id']));
				  $mapel = "<ol type='square'>";
				    foreach($pelajaran as $row){
						
						$mapel .="<li>".$row->matapelajaran."</li>";
						
					}
				   $mapel .="</ol>";  
				$no = $i++;
				$records["data"][] = array(
					$no,
					$val['nama'],					
					ucwords($val['status_pegawai']),	
					$mapel,	
                  				
					'
					<a href="javascript:;" class="btn btn-success ubah tooltips" data-container="body" data-placement="top" title="Ubah Data" urlnya = "'.site_url("gurumapel/formedit").'"  datanya="'.$val['id'].'"><i class="fa fa-pencil"></i>  </a> 
					
                    <a href="javascript:;" class="btn btn-danger hapus tooltips" data-container="body" data-placement="top" urlnya = "'.site_url("gurumapel/hapus").'" title="Hapus Data" datanya="'.$val['id'].'"><i class="fa fa-trash-o"></i></a>
					
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
		    if(!empty($id)){
				
				$data['dataform'] = $this->Acuan_model->get_where("tm_pegawai",array("id"=>$id));
			}
		
		 $this->load->view('form',$data);
	}
	
	public function formedit(){
		
		 $id = $this->input->get_post("id",TRUE);
		 
		 $data = array();
		    if(!empty($id)){
				
				$data['dataform'] = $this->Acuan_model->get_where("tm_pegawai",array("id"=>$id));
			}
		 
		 $this->load->view('formedit',$data);
	}
	
	public function saveubah(){
		
		$tmpegawai_id   = $this->input->get_post("tmpegawai_id",true);
		$tmpelajaran_id = $this->input->get_post("tmpelajaran_id",true);
		                      if(!empty($tmpelajaran_id)){
								  $this->Acuan_model->insert("tr_gurumapel",array("tmpelajaran_id"=>$tmpelajaran_id,"tmpegawai_id"=>$tmpegawai_id));
								}
								
					                         $mapel = $this->Acuan_model->get_wherearray("v_gurumapel",array("tmpegawai_id"=>$tmpegawai_id));
												     
												      foreach($mapel as $row){
														  
														  ?>
														  <tr id="row<?php echo $row->id; ?>">
														    <td>-</td>
														    <td><?php echo $row->matapelajaran; ?></td>
														    <td><button type='button' class='btn btn-success hapusmapel'  datanya="<?php echo $row->id; ?>" ><i class='fa fa-remove'></i> </button> </td>
														 </tr>
													  <?php 
													  }			
					
	}
	
	public function save(){
     
        $this->form_validation->set_message('required', '{field} Wajib di isi.');
       
	   $jumlah       = $this->input->get_post("jumlah",true);
	   $tmpegawai_id = $this->input->get_post("tmpegawai_id",true);
		
	
        
        if ($jumlah > 0) {
		
			
						
						for($a=1;$a<=$jumlah;$a++){
							
							$tmpelajaran_id = isset($_POST['tmpelajaran_id'.$a]) ? $_POST['tmpelajaran_id'.$a] :"" ;
							
								if(!empty($tmpelajaran_id)){
								  $this->Acuan_model->insert("tr_gurumapel",array("tmpelajaran_id"=>$tmpelajaran_id,"tmpegawai_id"=>$tmpegawai_id));
								}
							
						}
						
						
				
			  
			   
	     } else {
            if ($this->input->post()) {
                header('Content-Type: application/json');
                echo json_encode(array('error' => true, 'message' => "Gagal : Pelajaran Tidak boleh kosong, pastikan anda telah menekan tombol 'Tambah Mata Pelajaran'"));
            } 
        }	
	
	
	}
	
	
	
	
	public function hapus(){
		
		$this->Acuan_model->hapus("tr_gurumapel",array("tmpegawai_id"=>$this->input->get_post("id")));
		
		
	}
	
	public function hapusmapel(){
		
		$this->Acuan_model->hapus("tr_gurumapel",array("id"=>$this->input->get_post("datanya")));
		
		
		
		
	}
	// Guru 
	
	public function guru(){
		
		$this->load->view("pageguru");
		
	}
	
	public function gridguru(){
		
		  $iTotalRecords = $this->Model_data->getdataguru(false)->num_rows();
		  
		  $iDisplayLength = intval($_REQUEST['length']);
		  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		  $iDisplayStart = intval($_REQUEST['start']);
		  $sEcho = intval($_REQUEST['draw']);
		  
		  $records = array();
		  $records["data"] = array(); 

		  $end = $iDisplayStart + $iDisplayLength;
		  $end = $end > $iTotalRecords ? $iTotalRecords : $end;
		  
		  $datagrid = $this->Model_data->getdataguru(true)->result_array();
		   
		   $i= ($iDisplayStart +1);
		   foreach($datagrid as $val) {
				 
				$no = $i++;
				$records["data"][] = array(
					$no,
					$val['nik'],					
									
					$val['nama'],					
					ucwords($val['status_pegawai']),	
					
                  				
					'
					<a href="javascript:;" class="btn btn-success pilih tooltips" data-container="body" data-placement="top" title="Pilih"  datanya="'.$val['id'].'" namanya="'.$val['nama'].'"><i class="fa fa-check-circle "></i>  </a> 
					
                  	'

				  );
			  }
		
		  $records["draw"] = $sEcho;
		  $records["recordsTotal"] = $iTotalRecords;
		  $records["recordsFiltered"] = $iTotalRecords;
		  
		  echo json_encode($records);
	}
	

}
