<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

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
	
		$data['title'] 		= "Berita  ";
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
					'<img src="'.base_url().'__statics/img/berita/'.$val['gambar'].'" style="height:70px;width:70px" class="img-responsive img-circle">',
					$val['judul'],					
					$val['isi'],					
					$this->Acuan_model->formattimestamp($val['d_entry']),					
								
					'
					<a href="javascript:;" class="btn btn-success ubah tooltips" data-container="body" data-placement="top" title="Ubah Data" urlnya = "'.site_url("berita/form").'"  datanya="'.$val['id'].'"><i class="fa fa-pencil"></i>  </a> 
					
                    <a href="javascript:;" class="btn btn-danger hapus tooltips" data-container="body" data-placement="top" urlnya = "'.site_url("berita/hapus").'" title="Hapus Data" datanya="'.$val['id'].'"><i class="fa fa-trash-o"></i></a>
					
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
				
				$data['dataform'] = $this->Acuan_model->get_where("tm_berita",array("id"=>$id));
			}
		 $this->load->view('form',$data);
	}
	
	public function save(){
     
        $this->form_validation->set_message('required', '{field} Di perlukan.');
       
				$config = array(
					array('field' => 'f[judul]', 'label' => 'Judul Berita ', 'rules' => 'trim|required'),
	
					
				);
				$this->form_validation->set_rules($config);
		
	                $config['upload_path'] = './__statics/img/berita/';
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
												$image = "berita".time().".".pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);;
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
												
												  unlink(FCPATH."__statics/img/berita/".$_FILES['gambar']['name']);
												  $this->db->set("gambar",$image);
												 if(!empty($id)){						
														
														$this->Model_data->update($id);
												 }else{
													 
													    $this->Model_data->insert();
												 }
												
											}
												
			
				
			  
			   
	     } else {
            if ($this->input->post()) {
                header('Content-Type: application/json');
                echo json_encode(array('error' => true, 'message' => validation_errors()));
            } 
        }	
	
	
	}
	
	
	
	
	public function hapus(){
		
		$this->Acuan_model->hapus("tm_berita",array("id"=>$this->input->get_post("id")));
		
		
	}
	

}
