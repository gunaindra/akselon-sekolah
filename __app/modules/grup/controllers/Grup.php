<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grup extends CI_Controller {

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
	
		$data['title'] 		= "Group Users ";
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
					$val['nama'],
					'<a href="javascript:;" class="btn btn-info tooltips hakakses" data-toggle="modal" data-target="#modalakses"  data-container="body" data-placement="top" title="Group Users"   datanya="'.$val['id'].'"><i class="fa fa-codepen"></i> Atur Hak Akses </a> 
					
					
					',					
									
					'
					<a href="javascript:;" class="btn btn-success ubah tooltips" data-container="body" data-placement="top" title="Ubah Data" urlnya = "'.site_url("grup/form").'"  datanya="'.$val['id'].'"><i class="fa fa-pencil"></i>  </a> 
					
                    <a href="javascript:;" class="btn btn-danger hapus tooltips" data-container="body" data-placement="top" urlnya = "'.site_url("grup/hapus").'" title="Hapus Data" datanya="'.$val['id'].'"><i class="fa fa-trash-o"></i></a>
					
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
				
				$data['dataform'] = $this->Acuan_model->get_where("kepegawaian.tm_grup",array("id"=>$id));
			}
		 $this->load->view('form',$data);
	}
	
	public function save(){
     
        $this->form_validation->set_message('required', '{field} Di perlukan.');
       
				$config = array(
					array('field' => 'f[nama]', 'label' => 'Nama Group ', 'rules' => 'trim|required'),
					
				);
				$this->form_validation->set_rules($config);
		
	
        
        if ($this->form_validation->run() == true) {
			
			$id   = $this->input->get_post("id",true);
			
				if(empty($id)){
						$this->Model_data->insert();
				}else{
						$this->Model_data->update($id);
				}
			  
			   
	     } else {
            if ($this->input->post()) {
                header('Content-Type: application/json');
                echo json_encode(array('error' => true, 'message' => validation_errors()));
            } 
        }	
	
	
	}
	
	
	
	
	public function hapus(){
		
		$this->Acuan_model->hapus("kepegawaian.tm_grup",array("id"=>$this->input->get_post("id")));
		
		
	}
	
	
	public function hakakses(){
		
		 $id = $this->input->get_post("id",TRUE);
		 $data = array();
		    if(!empty($id)){
				
				$data['dataform'] = $this->Acuan_model->get_where("kepegawaian.tm_grup",array("id"=>$id));
				$data['datamenu'] = $this->Acuan_model->get(array("table"=>"tm_menu","order"=>"id","by"=>"asc"),null)->result();
			}
		 $this->load->view('privelege',$data);
	}
	
	public function setprivelege(){
		$status    = $this->input->get_post("status");
		$tmuser_id = $this->input->get_post("tmuser_id");
		$tmmenu_id = $this->input->get_post("tmmenu_id");
		  if($status==1){
			  
			   $this->Acuan_model->log($_SESSION['nama']." Atur Role User");
			   $this->Acuan_model->insert("kepegawaian.hak_akses",array("tmmenu_id"=>$tmmenu_id,"tmgrup_id"=>$tmuser_id));
			  
		  }else{
			  $this->Acuan_model->log($_SESSION['nama']." Hapus Role User");
			  $this->Acuan_model->hapus("kepegawaian.hak_akses",array("tmmenu_id"=>$tmmenu_id,"tmgrup_id"=>$tmuser_id));
			  
		  }
		
		
	}
	
	public function setprivelegec(){
		$status    = $this->input->get_post("status");
		$tmuser_id = $this->input->get_post("tmuser_id");
		$tmmenu_id = $this->input->get_post("tmmenu_id");
		$kolom     = $this->input->get_post("kolom");
		 
			  if(count($this->Acuan_model->get_where("kepegawaian.hak_akses",array("tmmenu_id"=>$tmmenu_id,"tmgrup_id"=>$tmuser_id))) >0){
			  
			   $this->Acuan_model->update("kepegawaian.hak_akses",array($kolom=>$status),"tmmenu_id='".$tmmenu_id."' and tmgrup_id='".$tmuser_id."'");
			  }else{
				  
				  echo "Error";
			  }
		 
		
		
	}
	

}
