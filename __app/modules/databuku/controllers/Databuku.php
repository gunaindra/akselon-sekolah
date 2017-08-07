<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Databuku extends CI_Controller {

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
	
		$data['title'] 		= "Data Buku ";
		$data['konten'] 	= "page";
        $data['privileges'] = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'databuku');

		$this->load->view('home/page_header',$data);
	

	}
	
	function bikin_barcode($kode)
	{
		$this->load->library('zend');
		 
		$this->zend->load('Zend/Barcode');
		  
		 
		Zend_Barcode::render('code39', 'image', array('text'=>$kode), array());
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
		$kode='123';

        $privileges = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'databuku');

		$i= ($iDisplayStart +1);
		foreach($datagrid as $val) {
            // enable/disable actions based on privileges
            $actions = '';
            if (isset($privileges->c_update) && $privileges->c_update == '1') {
                $actions .= '<a href="javascript:;" class="btn btn-success ubah tooltips" data-container="body" data-placement="top" title="Ubah Data" urlnya = "'.site_url("databuku/form").'"  datanya="'.$val['id'].'"><i class="fa fa-pencil"></i>  </a>';
            }

            if (isset($privileges->c_delete) && $privileges->c_delete == '1') {
                $actions .= '<a href="javascript:;" class="btn btn-danger hapus tooltips" data-container="body" data-placement="top" urlnya = "'.site_url("databuku/hapus").'" title="Hapus Data" datanya="'.$val['id'].'"><i class="fa fa-trash-o"></i></a>';
            }

			$no = $i++;
			$records["data"][] = array(
				$no,
				$val['nama'],					
				$val['subjek'],					
				$val['pengarang'],					
				$val['penerbit'],					
				$val['tahun_terbit'],					
				$val['isbn'],	
				'<img src="'.base_url().'databuku/bikin_barcode/'.$val['barcode'].'">',
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
				
				$data['dataform'] = $this->Acuan_model->get_where("tm_buku",array("id"=>$id));
			}
		 $this->load->view('form',$data);
	}
	
	public function save(){
     
        $this->form_validation->set_message('required', '{field} Di perlukan.');
       
				$config = array(
					array('field' => 'f[nama]', 'label' => 'Judul Buku ', 'rules' => 'trim|required'),
					
				);
				$this->form_validation->set_rules($config);

        $privileges = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'databuku');
        
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
        $privileges = $this->Acuan_model->getPrivilege($this->session->userdata['grup'], 'databuku');

        if (!isset($privileges->c_delete) || $privileges->c_delete != '1') {
            header('Content-Type: application/json');
            echo json_encode(array('error' => true, 'alert' => '<div class="alert alert-danger">Anda tidak memiliki hak untuk mengakses fitur ini.</div>'));
            return;
        }
		
		$this->Acuan_model->hapus("tm_buku",array("id"=>$this->input->get_post("id")));
		
		
	}
	

}
