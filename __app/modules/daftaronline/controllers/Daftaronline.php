<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftaronline extends CI_Controller {

	 public function __construct()
      {
        parent::__construct();
		$this->load->model(array('Model_datasiswa'));
         if(!$this->session->userdata("tmsekolah_id")){
			
			redirect(base_url());
			
		 }
		
      } 
	public function index($offset=null)
	{  
	
		$data['title'] 		= "Pendaftaran Online";
		$data['konten'] 	= "page";
		$data['tmsiswa_id'] = $this->input->get_post("tmsiswa_id",true);
		$data['jenjang'] = $this->Acuan_model->get(array("table"=>"tm_jenjang","order"=>"urutan","by"=>"asc"),null)->result(); 
		 
		$this->load->view('home/page_header',$data);
	

	}
	
	public function grid(){
		
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

        $privileges = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'daftaronline');
		   
		   $i= ($iDisplayStart +1);
		   foreach($datagrid as $val) {
               // enable/disable actions based on privileges
               $actions = '';
               if (isset($privileges->c_update) && $privileges->c_update == '1') {
                   $actions .= '<a href="javascript:;" class="btn btn-success ubah tooltips" data-container="body" data-placement="top" title="Data Persyaratan " urlnya = "'.site_url("daftaronline/persyaratan").'"  datanya="'.$val['id'].'[split]'.$val['tmjenjang_id'].'"  ><i class="fa fa-file-archive-o "></i></a>';
               }

               if(!empty($privileges)) {
                   $actions .= '<a href="javascript:;" class="btn btn-success ubah tooltips" data-container="body" data-placement="top" title="Data Lengkap " urlnya = "'.site_url("daftaronline/detail").'"   datanya="'.$val['id'].'"><i class="fa fa-user"></i></a>';
               }

               if (isset($privileges->c_delete) && $privileges->c_delete == '1') {
                   $actions .= '<a href="javascript:;" class="btn btn-success hapus tooltips" data-container="body" data-placement="top" urlnya = "'.site_url("datasiswa/hapus").'" title="Hapus Data" datanya="'.$val['id'].'"  ><i class="fa fa-trash-o"></i></a>';
               }

               $action_approval = '';
               if (isset($privileges->c_update) && $privileges->c_update == '1') {
                   $action_approval .= '<a href="javascript:;" class="btn btn-success approv tooltips" data-container="body" data-placement="top" urlnya = "'.site_url("daftaronline/approv").'" title="Verifikasi" datanya="'.$val['id'].'"  data-toggle="modal" data-target="#verifikasimodal"><i class="fa fa-check-square-o "></i></a>';
               }
				
				$no = $i++;
				$records["data"][] = array(
					$val['no_pendaftaran'],
					$this->Acuan_model->formattanggalstring($val['tgl_daftar']),					
					$val['jenjang'],					
					$val['kelas'],	
					$val['nama'],					
					$val['sex'],					
				
					'<div class="label label-danger"><i class="label label-info">'.$this->Acuan_model->status($val['status']).'</i></div>',

                    $actions,
                    $action_approval

				  );
			  }
		
		  $records["draw"] = $sEcho;
		  $records["recordsTotal"] = $iTotalRecords;
		  $records["recordsFiltered"] = $iTotalRecords;
		  
		  echo json_encode($records);
	}
	
	
	
	
	public function detail(){
		
		 $id = $this->input->get_post("id",TRUE);
		 $data = array();
		 $data['jenjang']    = $this->Acuan_model->get(array("table"=>"tm_jenjang","order"=>"urutan","by"=>"asc"),null)->result(); 
		 $data['pekerjaan']  = $this->Acuan_model->get(array("table"=>"tm_pekerjaan","order"=>"nama","by"=>"asc"),null)->result(); 
		 $data['pendidikan'] = $this->Acuan_model->get(array("table"=>"tm_pendidikan","order"=>"nama","by"=>"asc"),null)->result(); 
		   
		    if(!empty($id)){
				
				$data['dataform'] = $this->Acuan_model->get_where("v_siswa",array("id"=>$id));
				$data['kelas']    = $this->Acuan_model->get(array("table"=>"tm_kelas","order"=>"urutan","by"=>"asc"),"tmjenjang_id='".$data['dataform']->tmjenjang_id."'")->result();
				$data['ruang']    = $this->Acuan_model->get(array("table"=>"tm_ruang","order"=>"urutan","by"=>"asc"),"tmjenjang_id='".$data['dataform']->tmjenjang_id."' and tmkelas_id='".$data['dataform']->tmkelas_id."'")->result();
			}
		 $this->load->view('form',$data);
	}
	
	
	public function persyaratan(){
		
		 $id = $this->input->get_post("id",TRUE);
		 $pecah = explode("[split]",$id);
		 $data['tmsiswa_id'] = $pecah[0];

		    if(!empty($id)){
				$data['datasiswa'] = $this->Acuan_model->get_where("v_siswa",array("id"=>$data['tmsiswa_id']));
				$data['dataform']  = $this->Model_datasiswa->get_persyaratan($pecah[1])->result();
				
				
			}
			
		 $this->load->view('persyaratan',$data);
	}
	
	public function savepersyaratan(){
			  error_reporting(0);
		              $sekolah = $this->Acuan_model->sekolah();
		              $tmpersyaratan_id      = $this->input->get_post("id");
		              $persyaratan           = $this->input->get_post("persyaratan");
		              $namasiswa             = $this->input->get_post("nama");		            
		              $tmsiswa_id             = $this->input->get_post("tmsiswa_id");		            
					
					  $syarat           = explode(" ",$persyaratan);
					  
					  $nama   			= str_replace(array("'"," ","-",'"',".","(",")","/","*"),"",$namasiswa);
					  
		              
						
							if (!is_dir('statics/upload/persyaratan/'.$nama)) {
								mkdir('./__statics/upload/persyaratan/' . $nama, 0777, TRUE);

							}
			           
			            $path = $_FILES['image']['name'];
                        $newName = str_replace(array("'"," ","-",'"',".","(",")","/","*","x"),"",$syarat[0]).time().".".pathinfo($path, PATHINFO_EXTENSION);
			
			            $config['upload_path']   = './__statics/upload/persyaratan/'.$nama.'/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg|xlsx|docx|doc|xls|pdf';
						$config['max_size']      = 10000;
						$config['file_name']     = $newName;
						$config['overwrite']     = TRUE;

						$this->load->library('upload', $config);

						if (! $this->upload->do_upload('image'))
						{
							
							 echo "error[split]";
                             echo $this->upload->display_errors();
							
							
							
						}
						else
						{
							
							$id 			= $this->Acuan_model->id("tr_persyaratan");
						
							$data = array("tmpersyaratan_id"=>$tmpersyaratan_id,
							"file"=>$newName,
							"folder"=>$nama,
							"siswa"=>$namasiswa,
							"tmsekolah_id"=>$_SESSION['tmsekolah_id'],
							"tmsiswa_id"=>$tmsiswa_id);
							
							$this->db->set("id",$id);
							
							$this->Model_datasiswa->save_persyaratan($data);
							
							echo "sukses[split]";
							
							?>
						    <a target="_blank" href="<?php echo base_url(); ?>__statics/upload/persyaratan/<?php echo $nama; ?>/<?php echo $newName; ?>"><?php echo $newName; ?> </a>
							<?php 
						    ?>
							
						    <a type="button" data-id='<?php echo $id; ?>' tmpersyaratan_id="<?php echo $tmpersyaratan_id; ?>" persyaratan="<?php echo $persyaratan; ?>"  unlink="__statics/upload/persyaratan/<?php echo $nama; ?>/<?php echo $newName; ?>" class="batalkan"><i class="fa fa-times-circle"></i> </a>
							<?php 
						}
			
		
		
	}
	
	
	public function approv(){
		
		
		$this->Acuan_model->update("tm_siswa",array("status"=>$_POST['val'],"d_update"=>date("Y-m-d H:i:s"),"i_update"=>$_SESSION["user_id"]),"id='".$_POST["id"]."'");
	    $this->Acuan_model->log($_SESSION['nama']." Melakukan Verifikasi Data Siswa ");
	}
	
	
	
}
