<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenjang extends CI_Controller {

	 public function __construct()
      {
        parent::__construct();
		$this->load->model(array('Model_jenjang'));
         if(!$this->session->userdata("tmsekolah_id")){
			
			redirect(base_url());
			
		 }
		
      } 
	public function index($offset=null)
	{
		$data['title'] 		= "Master Jenjang Pendidikan";
		$data['konten'] 	= "page";
		$data['privileges'] = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'jenjang');

		$this->load->view('home/page_header',$data);
	}
	
	
    public function grid(){
		
		  $iTotalRecords = $this->Model_jenjang->getdata(false)->num_rows();
		  
		  $iDisplayLength = intval($_REQUEST['length']);
		  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		  $iDisplayStart = intval($_REQUEST['start']);
		  $sEcho = intval($_REQUEST['draw']);
		  
		  $records = array();
		  $records["data"] = array(); 

		  $end = $iDisplayStart + $iDisplayLength;
		  $end = $end > $iTotalRecords ? $iTotalRecords : $end;
		  
		  $datagrid = $this->Model_jenjang->getdata(true)->result_array();

		  $privileges = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'jenjang');

		   $i= ($iDisplayStart +1);
		   foreach($datagrid as $val) {
				$no = $i++;

               // enable/disable actions based on privileges
               $actions = '';
               if (isset($privileges->c_update) && $privileges->c_update == '1') {
                   $actions .= '<a href="javascript:;" class="btn btn-success ubah tooltips" data-container="body" data-placement="top" title="Ubah Data" urlnya = "'.site_url("jenjang/form").'"  datanya="'.$val['id'].'"><i class="fa fa-pencil"></i></a>';
               }

               if (isset($privileges->c_delete) && $privileges->c_delete == '1') {
                   $actions .= '<a href="javascript:;" class="btn btn-danger hapus tooltips" data-container="body" data-placement="top" urlnya = "'.site_url("jenjang/hapus").'" title="Hapus Data" datanya="'.$val['id'].'"><i class="fa fa-trash-o"></i></a>';
               }

				$records["data"][] = array(
					$no,
					$val['nama'],
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
				
				$data['dataform'] = $this->Acuan_model->get_where("tm_jenjang",array("id"=>$id));
			}
		 $this->load->view('form',$data);
	}
	
	public function save(){

        $this->form_validation->set_message('required', '{field} Wajib di isi.');
       
				$config = array(
					array('field' => 'f[nama]', 'label' => 'Jenjang Pendidikan ', 'rules' => 'trim|required'),
				);
				$this->form_validation->set_rules($config);

        $privileges = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'jenjang');
        
        if ($this->form_validation->run() == true) {
			
			$id   = $this->input->get_post("id",true);
			
				if(empty($id)){
                    if (!isset($privileges->c_create) || $privileges->c_create != '1') {
                        header('Content-Type: application/json');
                        echo json_encode(array('error' => true, 'message' => 'Anda tidak memiliki hak untuk mengakses fitur ini.'));
                        return;
                    }

                    $this->Model_jenjang->insert();
				}else{
                    if (!isset($privileges->c_update) || $privileges->c_update != '1') {
                        header('Content-Type: application/json');
                        echo json_encode(array('error' => true, 'message' => 'Anda tidak memiliki hak untuk mengakses fitur ini.'));
                        return;
                    }

						$this->Model_jenjang->update($id);
				}
			  
			   
	     } else {
            if ($this->input->post()) {
                header('Content-Type: application/json');
                echo json_encode(array('error' => true, 'message' => validation_errors()));
            } 
        }	
	
	
	}
	
	
	
	
	public function hapus(){
        $privileges = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'jenjang');

        if (!isset($privileges->c_delete) || $privileges->c_delete != '1') {
            header('Content-Type: application/json');
            echo json_encode(array('error' => true, 'alert' => '<div class="alert alert-danger">Anda tidak memiliki hak untuk mengakses fitur ini.</div>'));
            return;
        }
		
		$this->Acuan_model->hapus("tm_jenjang",array("id"=>$this->input->get_post("id")));
		
		
	}
	

}
