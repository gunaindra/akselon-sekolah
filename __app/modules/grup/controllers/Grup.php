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
        $data['privileges'] = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'grup');

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

        $privileges = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'grup');
		   
		   $i= ($iDisplayStart +1);
		   foreach($datagrid as $val) {
               // enable/disable actions based on privileges
               $privilage_settings_action = '';
               if (isset($privileges->c_update) && $privileges->c_update == '1') {
                   $privilage_settings_action .= '<a href="javascript:;" class="btn btn-info tooltips hakakses" data-toggle="modal" data-target="#modalakses"  data-container="body" data-placement="top" title="Group Users"   datanya="'.$val['id'].'"><i class="fa fa-codepen"></i> Atur Hak Akses </a>';
               }

               $actions = '';
               if (isset($privileges->c_update) && $privileges->c_update == '1') {
                   $actions .= '<a href="javascript:;" class="btn btn-success ubah tooltips" data-container="body" data-placement="top" title="Ubah Data" urlnya = "'.site_url("grup/form").'"  datanya="'.$val['id'].'"><i class="fa fa-pencil"></i>  </a>';
               }

               if (isset($privileges->c_delete) && $privileges->c_delete == '1') {
                   $actions .= '<a href="javascript:;" class="btn btn-danger hapus tooltips" data-container="body" data-placement="top" urlnya = "'.site_url("grup/hapus").'" title="Hapus Data" datanya="'.$val['id'].'"><i class="fa fa-trash-o"></i></a>';
               }
				
				$no = $i++;
				$records["data"][] = array(
					$no,
					$val['nama'],
                    $privilage_settings_action,

                    $actions

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
				
				$data['dataform'] = $this->Acuan_model->get_where("tm_grup",array("id"=>$id));
			}
		 $this->load->view('form',$data);
	}
	
	public function save(){
     
        $this->form_validation->set_message('required', '{field} Di perlukan.');
       
				$config = array(
					array('field' => 'f[nama]', 'label' => 'Nama Group ', 'rules' => 'trim|required'),
					
				);
				$this->form_validation->set_rules($config);

        $privileges = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'grup');
		
	
        
        if ($this->form_validation->run() == true) {
			
			$id   = $this->input->get_post("id",true);
			
				if(empty($id)){
                    if (!isset($privileges->c_create) || $privileges->c_create != '1') {
                        header('Content-Type: application/json');
                        echo json_encode(array('error' => true, 'message' => 'Anda tidak memiliki hak untuk mengakses fitur ini.'));
                        return;
                    }

						$this->Model_data->insert();
				}else{
                    if (!isset($privileges->c_update) || $privileges->c_update != '1') {
                        header('Content-Type: application/json');
                        echo json_encode(array('error' => true, 'message' => 'Anda tidak memiliki hak untuk mengakses fitur ini.'));
                        return;
                    }

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
        $privileges = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'grup');

        if (!isset($privileges->c_delete) || $privileges->c_delete != '1') {
            header('Content-Type: application/json');
            echo json_encode(array('error' => true, 'alert' => '<div class="alert alert-danger">Anda tidak memiliki hak untuk mengakses fitur ini.</div>'));
            return;
        }
		
		$this->Acuan_model->hapus("tm_grup",array("id"=>$this->input->get_post("id")));
		
		
	}
	
	
	public function hakakses(){
		
		 $id = $this->input->get_post("id",TRUE);
		 $data = array();
		    if(!empty($id)){
				
				$data['dataform'] = $this->Acuan_model->get_where("tm_grup",array("id"=>$id));
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
			   $this->Acuan_model->insert("hak_akses",array("tmmenu_id"=>$tmmenu_id,"tmgrup_id"=>$tmuser_id));
			  
		  }else{
			  $this->Acuan_model->log($_SESSION['nama']." Hapus Role User");
			  $this->Acuan_model->hapus("hak_akses",array("tmmenu_id"=>$tmmenu_id,"tmgrup_id"=>$tmuser_id));
			  
		  }
		
		
	}
	
	public function setprivelegec(){
		$status    = $this->input->get_post("status");
		$tmuser_id = $this->input->get_post("tmuser_id");
		$tmmenu_id = $this->input->get_post("tmmenu_id");
		$kolom     = $this->input->get_post("kolom");
		 
			  if(count($this->Acuan_model->get_where("hak_akses",array("tmmenu_id"=>$tmmenu_id,"tmgrup_id"=>$tmuser_id))) >0){
			  
			   $this->Acuan_model->update("hak_akses",array($kolom=>$status),"tmmenu_id='".$tmmenu_id."' and tmgrup_id='".$tmuser_id."'");
			  }else{
				  
				  echo "Error";
			  }
		 
		
		
	}
	

}
