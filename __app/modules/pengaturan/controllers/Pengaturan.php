<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

	 public function __construct()
      {
        parent::__construct();
		$this->load->model(array('Model_data'));
        if(!$this->session->userdata("tmsekolah_id")){
			
			redirect(base_url());
			
		}
		
      } 
	public function tahun()
	{  
	
	    
		$data['title'] 		= "Setting Tahun Pelajaran";
		$data['konten'] 	= "page";
		
	   
		$this->load->view('home/page_header',$data);
	

	}
	
   public function aktifkan(){
	   
	   $tahun = $this->input->get_post("tahun",TRUE);
	   
	   
	   $data = array("ajaran"=>$tahun);
	   $this->db->where("id",$_SESSION['tmsekolah_id']);
	   $this->db->update("tm_sekolah",$data);
	   
	   
   }
   
   
   // Semester
   
   public function semester()
	{  
	
	    
		$data['title'] 		= "Setting Semester Aktif";
		$data['konten'] 	= "page_semester";
		
	   
		$this->load->view('home/page_header',$data);
	

	}
	
   public function aktifkansemester(){
	   
	   $semester = $this->input->get_post("semester",TRUE);
	   
	   
	   $data = array("semester"=>$semester);
	   $this->db->where("id",$_SESSION['tmsekolah_id']);
	   $this->db->update("tm_sekolah",$data);
	   
	   
   }
   
    public function sekolah()
	{  
	
	    
		$data['title'] 		= "Setting Sekolah";
		$data['konten'] 	= "page_sekolah";
		$data['dataform'] = $this->Acuan_model->get_where("tm_sekolah",array("id"=>$_SESSION['tmsekolah_id']));
	   
		$this->load->view('home/page_header',$data);
	

	}
	
	public function save(){
     
        $this->form_validation->set_message('required', '{field} Di perlukan.');
       
				$config = array(
					array('field' => 'f[namasekolah]', 'label' => 'Nama Sekolah ', 'rules' => 'trim|required'),
					array('field' => 'f[telepon]', 'label' => 'Telepon', 'rules' => 'trim|required'),
					array('field' => 'f[email]', 'label' => 'Email ', 'rules' => 'trim|required'),
					array('field' => 'f[alamat]', 'label' => 'Alamat', 'rules' => 'trim|required'),
					array('field' => 'f[footer]', 'label' => 'Footer ', 'rules' => 'trim|required'),
					array('field' => 'f[title]', 'label' => 'Ucapan', 'rules' => 'trim|required'),
	
					
				);
				$this->form_validation->set_rules($config);
		
	                $config['upload_path'] = './__statics/img/logo/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg|';
					$config['overwrite'] = true;
					$config['remove_spaces'] = true;					
					$this->load->library('upload', $config);
					
					
        
        if ($this->form_validation->run() == true) {
			
			$id   = $this->input->get_post("id",true);
			
     if ( ! $this->upload->do_upload('gambar'))
		{
			
			if(!empty($id)){						
					
					$this->Model_data->update($id);
			 }else{
				 
				 header('Content-Type: application/json');
                 echo json_encode(array('error' => true, 'message' => $this->upload->display_errors('', '')));
			 }
											
		}else{
			
			$this->load->library('image_lib');
			$image = "logo".time().".".pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);;
			$this->image_lib->clear();
			$config['image_library'] = 'gd2';
			$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$config['new_image'] = $image;
			$config['quality'] = '100%';
			$config['create_thumb'] = false;
			$config['maintain_ratio'] = false;
			$config['thumb_marker'] = '';
			$config['width'] = 500;
			$config['height'] = 500;
			$this->image_lib->initialize($config);
		
		
			$this->load->library('image_lib', $config);
			if ( ! $this->image_lib->resize()){
				$this->session->set_flashdata('message', $this->image_lib->display_errors('', ''));
			 }
			
			  unlink(FCPATH."__statics/img/logo/".$_FILES['gambar']['name']);
			  $this->db->set("logo",$image);
			 if(!empty($id)){						
					
					$this->Model_data->update($id);
			 }
			
		}
												
			
				
			  
			   
	     } else {
            if ($this->input->post()) {
                header('Content-Type: application/json');
                echo json_encode(array('error' => true, 'message' => validation_errors()));
            } 
        }	
	
	
	}
	
	
	
}
