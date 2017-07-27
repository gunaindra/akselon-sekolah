<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasiswa extends CI_Controller {

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
	
		$data['title'] 		= "Data Siswa";
		$data['konten'] 	= "page";
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
					<a href="javascript:;" class="btn btn-success ubah tooltips" data-container="body" data-placement="top" title="Data Akun" urlnya = "'.site_url("datasiswa/akun").'"  datanya="'.$val['id'].'" ><i class="fa fa-user"></i>  </a> 
					<a href="javascript:;" class="btn btn-success ubah tooltips" data-container="body" data-placement="top" title="Foto Siswa" urlnya = "'.site_url("datasiswa/formfoto").'"  datanya="'.$val['id'].'" ><i class="fa fa-camera"></i>  </a> 
					
					<a href="javascript:;" class="btn btn-success ubah tooltips" data-container="body" data-placement="top" title="Ubah Data" urlnya = "'.site_url("datasiswa/form").'"  datanya="'.$val['id'].'" ><i class="fa fa-pencil"></i>  </a> 
					
                    <a href="javascript:;" class="btn btn-success hapus tooltips" data-container="body" data-placement="top" urlnya = "'.site_url("datasiswa/hapus").'" title="Hapus Data" datanya="'.$val['id'].'"  ><i class="fa fa-trash-o"></i></a>
					
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
		 $data['jenjang']    = $this->Acuan_model->get(array("table"=>"tm_jenjang","order"=>"urutan","by"=>"asc"),null)->result(); 
		 $data['pekerjaan']  = $this->Acuan_model->get(array("table"=>"tm_pekerjaan","order"=>"nama","by"=>"asc"),null)->result(); 
		 $data['pendidikan'] = $this->Acuan_model->get(array("table"=>"tm_pendidikan","order"=>"id","by"=>"asc"),null)->result(); 
		   
		    if(!empty($id)){
				
				$data['dataform'] = $this->Acuan_model->get_where("v_siswa",array("id"=>$id));
				$data['kelas']    = $this->Acuan_model->get(array("table"=>"tm_kelas","order"=>"urutan","by"=>"asc"),"tmjenjang_id='".$data['dataform']->tmjenjang_id."'")->result();
				$data['ruang']    = $this->Acuan_model->get(array("table"=>"tm_ruang","order"=>"urutan","by"=>"asc"),"tmjenjang_id='".$data['dataform']->tmjenjang_id."' and tmkelas_id='".$data['dataform']->tmkelas_id."'")->result();
			}
		 $this->load->view('form',$data);
	}
	
	
	public function akun(){
		
		 $id = $this->input->get_post("id",TRUE);
			   
		    if(!empty($id)){
				$data['dataform'] = $this->Acuan_model->get_where("v_siswa",array("id"=>$id));
			}
		 $this->load->view('akun',$data);
	}
	
	public function save(){
     
        $this->form_validation->set_message('required', '{field} Di perlukan.');
       
				$config = array(
					array('field' => 'k[tmjenjang_id]', 'label' => 'Jenjang Pendidikan ', 'rules' => 'trim|required'),
					array('field' => 'k[tmkelas_id]', 'label' => 'Kelas ', 'rules' => 'trim|required'),
					array('field' => 'k[tmruang_id]', 'label' => 'Ruang ', 'rules' => 'trim|required'),
					array('field' => 's[nis]', 'label' => 'NIS ', 'rules' => 'trim|required'),
					array('field' => 's[nama]', 'label' => 'Nama ', 'rules' => 'trim|required'),
					array('field' => 's[nama_panggilan]', 'label' => 'Nama Panggilan', 'rules' => 'trim|required'),
					array('field' => 's[anakke]', 'label' => 'Anak Ke ', 'rules' => 'trim|required'),
					array('field' => 's[saudara]', 'label' => 'Jumlah Saudara', 'rules' => 'trim|required'),
					array('field' => 'p[nama_ayah]', 'label' => 'Nama Ayah', 'rules' => 'trim|required'),
					array('field' => 'p[hp_ayah]', 'label' => 'No Handphone Ayah', 'rules' => 'trim|required'),
					array('field' => 'p[email_ayah]', 'label' => 'Email Ayah', 'rules' => 'trim|required'),
					array('field' => 'p[nama_ibu]', 'label' => 'Nama ibu', 'rules' => 'trim|required'),
					array('field' => 'p[hp_ibu]', 'label' => 'No Handphone ibu', 'rules' => 'trim|required'),
					array('field' => 'p[email_ibu]', 'label' => 'Email ibu', 'rules' => 'trim|required'),
					
					
				);
				$this->form_validation->set_rules($config);
		
	
        
        if ($this->form_validation->run() == true) {
			
			$id   = $this->input->get_post("id",true);
			
				if(empty($id)){
						$this->Model_datasiswa->insert();
				}else{
						$this->Model_datasiswa->update($id);
				}
			  
			   
	     } else {
            if ($this->input->post()) {
                header('Content-Type: application/json');
                echo json_encode(array('error' => true, 'message' => validation_errors()));
            } 
        }	
	
	
	}
	
	
	public function hapus(){
		
		$this->Acuan_model->hapus("tm_siswa",array("id"=>$this->input->get_post("id")));
		$this->Acuan_model->hapus("tr_kelas",array("tmsiswa_id"=>$this->input->get_post("id")));
		$this->Acuan_model->hapus("tm_penanggungjawab",array("tmsiswa_id"=>$this->input->get_post("id")));
		
		
	}
	
	public function formfoto(){
		
		 $id = $this->input->get_post("id",TRUE);
		 $data = array();
		   
		    if(!empty($id)){
				
				$data['dataform'] = $this->Acuan_model->get_where("v_siswa",array("id"=>$id));
			}
		 $this->load->view('form_foto',$data);
	}
	
	
	
	
	public function savefoto(){
     
       
				    $id   = $this->input->get_post("id");
				    $foto = $this->input->get_post("textbox1");
				   
				   	$config['upload_path'] = './__statics/img/siswa/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg|';
					$config['overwrite'] = true;
					$config['remove_spaces'] = true;
					
					$this->load->library('upload', $config);

											if ( ! $this->upload->do_upload('files'))
											{
												
												if(!empty($foto)){
													
													$this->Acuan_model->update("tm_siswa",array("foto"=>$foto),"id='".$id."'");
												}else{
													
													header('Content-Type: application/json');
													echo json_encode(array('error' => true, 'message' => $this->upload->display_errors('', '')));
												}
											    
											}
											else
											{
												
											 $this->load->library('image_lib');
												$image = str_replace(array(" ","'","-",":"),"",$_POST["namasiswa"]).time().".jpeg";
												$this->image_lib->clear();
												$config['image_library'] = 'gd2';
												$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
												$config['new_image'] = $image;
												$config['quality'] = '100%';
												$config['create_thumb'] = false;
												$config['maintain_ratio'] = false;
												$config['thumb_marker'] = '';
												$config['width'] = 320;
												$config['height'] = 360;
												$this->image_lib->initialize($config);
											
											
												$this->load->library('image_lib', $config);
												if ( ! $this->image_lib->resize()){
													$this->session->set_flashdata('message', $this->image_lib->display_errors('', ''));
												}
												
												unlink(FCPATH."__statics/img/siswa/".$_FILES['files']['name']);
							                    
												$this->Acuan_model->update("tm_siswa",array("foto"=>$image),"id='".$id."'");
											}
											
			
	}
			
					
	

	
	
	
	public function camera(){
		

		
		 $this->load->view('camera');
	}
	
	public function ambilfoto(){
			
		$namafile = date("Ymdhis").".jpg";
		$jpeg_data = file_get_contents('php://input');
	  
		$filename = "./__statics/img/siswa/$namafile";
	  
		$result = file_put_contents($filename, $jpeg_data);
		$data['gambar'] = $namafile;
		$this->load->view("crop",$data);

	}
	
	public function crop(){
		
		$targ_w = $targ_h = 150;
		$jpeg_quality = 100;
		$namafile = $this->input->get_post('namafile');
		$src = "./__statics/img/siswa/$namafile";
		$dir = "./__statics/img/siswa/";

		$img_r = imagecreatefromjpeg($src);

		$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

		imagecopyresampled($dst_r,$img_r,0,0,intval($_POST['x']),intval($_POST['y']), $targ_w,$targ_h, intval($_POST['w']),intval($_POST['h']));

        
	
		imagejpeg($dst_r,$src);
		
		
     							 
		
		}
		

	
	
	
}
