<?php
defined('BASEPATH') OR exit('No direct script access allowed');

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

date_default_timezone_set('Asia/Jakarta');
require_once APPPATH."libraries/templateexcel/Classes/PHPExcel/IOFactory.php";
class Laporanpembayaran extends CI_Controller {

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
	
		$data['title'] 		= "Laporan Pembayaran";
		$data['konten'] 	= "page";
		$data['jenjang'] = $this->Acuan_model->get(array("table"=>"tm_jenjang","order"=>"urutan","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."'")->result(); 
		 
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
									
					$val['nama'],					
					$val['sex'],					
					$val['nama_ayah'],					
					$val['nama_ibu'],					
					'
					<a href="javascript:;" class="btn btn-success ubah tooltips" data-container="body" data-placement="top" title="Cetak " urlnya = "'.site_url("laporanpembayaran/form").'"  datanya="'.$val['id'].'" ><i class="fa fa-print "></i> Cetak Kwitansi  </a> 
				
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
		 $id     = $this->input->get_post("id",TRUE);
		 $data   = array();
		   
		    if(!empty($id)){
				
				$data['dataform']         = $this->Acuan_model->get_where("v_siswa",array("id"=>$id));
				$data['datakeuangan']     = $this->Acuan_model->get_wherearray("akademik.tr_keuangan",array("tmjenjang_id"=>$data['dataform']->tmjenjang_id,"tmsiswa_id"=>$data['dataform']->id,"ajaran"=>$ajaran,"status"=>2));
			}
		 $this->load->view('form',$data);
	}
	
	
	
	
	public function kwitansi(){
		
		
	  $student = $this->input->get_post("tmsiswa_id",true);
	  $item = $this->input->get_post("item",true);
		
		
		
		if($student==""){
			return false;
		}
		
		$data_grid         = $this->Acuan_model->get_where("v_siswa",array("id"=>$student));
		$keuangan          = $this->Model_data->get_row_keuangan($student,$item)->result();
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $objPHPExcel = $objReader->load(APPPATH."libraries/templateexcel/templates/template.xlsx");
        $objPHPExcel->getActiveSheet()->setCellValue('K2', "INV-".date("ymdHis"));
        $objPHPExcel->getActiveSheet()->setCellValue('K3', $data_grid->nama);
        $objPHPExcel->getActiveSheet()->setCellValue('K4', $data_grid->kelas);
				
				
		    $style = array(
            'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
				)
			);

			$objPHPExcel->getActiveSheet()->getStyle("K39")->applyFromArray($style);

			
			$baseRow = 11;
			if(count($keuangan) >0):
			  $total = 0;
			foreach($keuangan as $r => $dataRow) {
				$row = $baseRow + $r;
				$total = $total + $dataRow->dibayar;
				$objPHPExcel->getActiveSheet()->removeRow($row);
				$objPHPExcel->getActiveSheet()->insertNewRowBefore($row,1);

				$objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $r+1)
											  
											  ->setCellValue('C'.$row, $this->Acuan_model->get_kondisi($dataRow->tmkeuangan_id,"id","tm_keuangan","nama"))
											  ->setCellValue('J'.$row, $dataRow->tagihan)
											  ->setCellValue('K'.$row, ($dataRow->dibayar));
			}
			
			
			$objPHPExcel->getActiveSheet()->setCellValue('K39', "Rp. ". number_format($total, 0 , ',' , '.'));
			$objPHPExcel->getActiveSheet()->setCellValue('D40', $this->Acuan_model->Terbilang($total)." Rupiah");
			$objPHPExcel->getActiveSheet()->setCellValue('B44', "Bandung ".str_replace("-"," ",$this->Acuan_model->formattanggalstring(date("Y-m-d"))));
			$objPHPExcel->getActiveSheet()->setCellValue('B49', $_SESSION['nama']);
         
			$objPHPExcel->getActiveSheet()->removeRow($baseRow-1,1);
            endif;

			
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
			
			
			 $this->load->helper('download');
      
			$data = file_get_contents(APPPATH."modules/laporanpembayaran/controllers/Laporanpembayaran.xlsx"); // Read the file's contents
		 	
			
			$xlsxname = explode(" ",$data_grid->nama);
			
	
			force_download("kwitansi-".$xlsxname[0].$xlsxname[1].".xlsx",$data);
			unlink(APPPATH."modules/laporanpembayaran/controllers/Laporanpembayaran.xlsx");
		
		  
	}
	
	
	
	
	
	
}
