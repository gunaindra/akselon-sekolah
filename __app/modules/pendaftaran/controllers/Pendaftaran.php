<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

	 public function __construct()
      {
        parent::__construct();
		$this->load->model(array('Penerimaan_model'));
        
		
      } 
	
	 
	
	public function index()
	{  
	    $this->Acuan_model->hapus("akademik.tr_persyaratan","tmsiswa_id not in(select id from akademik.tm_siswa)");
	    $data['sekolah']    = $this->Acuan_model->sekolah();
	    $data['jenjang']    = $this->Acuan_model->get(array("table"=>"tm_jenjang","order"=>"urutan","by"=>"asc"),"tmsekolah_id='".$data['sekolah']->id."'")->result(); 
		$data['pekerjaan']  = $this->Acuan_model->get(array("table"=>"tm_pekerjaan","order"=>"nama","by"=>"asc"),null)->result(); 
		$data['pendidikan'] = $this->Acuan_model->get(array("table"=>"tm_pendidikan","order"=>"id","by"=>"asc"),null)->result(); 
		
		$this->load->view("formpenerimaan",$data);
		
	}
	
	
	
	public function save(){
     
        $this->form_validation->set_message('required', '{field} Di perlukan.');
       
				$config = array(
					array('field' => 'k[tmjenjang_id]', 'label' => 'Jenjang Pendidikan ', 'rules' => 'trim|required'),
					array('field' => 'k[tmkelas_id]', 'label' => 'Kelas ', 'rules' => 'trim|required'),
					array('field' => 'f[nama]', 'label' => 'Nama ', 'rules' => 'trim|required'),
					array('field' => 'f[nama_panggilan]', 'label' => 'Nama Panggilan', 'rules' => 'trim|required'),
					array('field' => 'f[anakke]', 'label' => 'Anak Ke ', 'rules' => 'trim|required'),
					array('field' => 'f[saudara]', 'label' => 'Jumlah Saudara', 'rules' => 'trim|required'),
					array('field' => 'p[nama_ayah]', 'label' => 'Nama Ayah', 'rules' => 'trim|required'),
					array('field' => 'p[hp_ayah]', 'label' => 'No Handphone Ayah', 'rules' => 'trim|required'),
					array('field' => 'p[email_ayah]', 'label' => 'Email Ayah', 'rules' => 'trim|required'),
					array('field' => 'p[nama_ibu]', 'label' => 'Nama ibu', 'rules' => 'trim|required'),
					array('field' => 'p[hp_ibu]', 'label' => 'No Handphone ibu', 'rules' => 'trim|required'),
					array('field' => 'p[email_ibu]', 'label' => 'Email ibu', 'rules' => 'trim|required'),
					
					
				);
				$this->form_validation->set_rules($config);
		
	
        
        if ($this->form_validation->run() == true) {
			
						echo $this->Penerimaan_model->insert();
							   
	     } else {
            if ($this->input->post()) {
                header('Content-Type: application/json');
                echo json_encode(array('error' => true, 'message' => validation_errors()));
            } 
        }	
	
	
	}
	
	public function persyaratan(){
		$tmjenjang_id = $this->input->get_post("tmjenjang_id",true);
		echo $tmjenjang_id;
	  	if(!empty($tmjenjang_id)){
			$sekolah = $this->Acuan_model->sekolah();
			$persyaratan    = $this->Acuan_model->get(array("table"=>"tm_persyaratan","order"=>"persyaratan","by"=>"asc"),"tmjenjang_id='".$tmjenjang_id."'")->result();
			if(count($persyaratan) >0){
				$no=1;
				foreach($persyaratan as $row){ ?>
					<tr>
						<td> <?php echo $no++; ?></td>
				      	<td> <?php echo $row->persyaratan; ?> <?php echo ($row->status==1) ? "<span class='required'> * </span>" :""; ?> </td>
				     	<td id="upload<?php echo $row->id; ?>">
					 		<div class="btn green btn-sm fileUpload">
								<i class="fa  fa-upload "></i>
								<span>Upload </span>
									<input type="file" name="files" <?php echo ($row->status==1) ? "required" :""; ?> id="files" class="uploadpersyaratan fileupload" data-id="<?php echo $row->id; ?>" persyaratan="<?php echo $row->persyaratan; ?>">
							</div>
					 	</td>
					</tr>
				<?php }
			}
			else{ ?>
				<tr>
					<td colspan="3"> Tidak ada persyaratan</td>
				</tr>
			<?php }
		}
	}
	
		public function savepersyaratan(){
			  error_reporting(0);
		              $sekolah = $this->Acuan_model->sekolah();
		              $tmpersyaratan_id      = $this->input->get_post("id");
		              $persyaratan           = $this->input->get_post("persyaratan");
		              $namasiswa             = $this->input->get_post("nama");		            
					
					  $syarat           = explode(" ",$persyaratan);
					  
					  $nama   			= str_replace(array("'"," ","-",'"',".","(",")","/","*"),"",$namasiswa);
					  
		              
						
							if (!is_dir('__statics/upload/persyaratan/'.$nama)) {
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
							
							$id 			= $this->Acuan_model->id("akademik.tr_persyaratan");
							$tmsiswa_id 	= $this->Acuan_model->id("akademik.tm_siswa");
							$data = array("tmpersyaratan_id"=>$tmpersyaratan_id,
							"file"=>$newName,
							"folder"=>$nama,
							"siswa"=>$namasiswa,
							"tmsekolah_id"=>$sekolah->id,
							"tmsiswa_id"=>$tmsiswa_id);
							
							$this->db->set("id",$id);
							$this->Penerimaan_model->save_persyaratan($data);
							
							echo "sukses[split]";
							
							?>
						    <a target="_blank" href="<?php echo base_url(); ?>__statics/upload/persyaratan/<?php echo $nama; ?>/<?php echo $newName; ?>"><?php echo $newName; ?> </a>
							<?php 
						    ?>
							
						    <a type="button" data-id='<?php echo $id; ?>' tmpersyaratan_id="<?php echo $tmpersyaratan_id; ?>" persyaratan="<?php echo $persyaratan; ?>"  unlink="__statics/upload/persyaratan/<?php echo $nama; ?>/<?php echo $newName; ?>" class="batalkan"><i class="fa fa-times-circle"></i> </a>
							<?php 
						}
			
		
		
	}
	
	public function batal_syarat(){
		$id     = $this->input->get_post("id");
		$unlink = $this->input->get_post("unlink");
		
		$this->Acuan_model->hapus("akademik.tr_persyaratan","id='".$id."'");
		unlink(FCPATH.$unlink);
		
	}
	
	public function cetak(){
		
		
		
			$this->load->library('Pdf');
			$pdf = new TCPDF('P', 'mm', 'Legal',true, 'UTF-8', 0);
			$pdf->SetMargins(PDF_MARGIN_LEFT, 30, PDF_MARGIN_RIGHT);
			$pdf->SetTitle('Data Siswa');
			$pdf->SetHeaderMargin(14);
			$pdf->SetFont ($family='', $style='', 8.5, $fontfile="", '', $out=true);
			$pdf->SetHeaderData('logo.jpg', 10,  'Data Pendaftaran Online', PDF_HEADER_STRING, array(100,64,255), array(400,64,128));
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			
						
						$pdf->AddPage();
						$pdf->writeHTML($html, true, false, true, false, '');
						$pdf->lastPage();
					
					$pdf->Output('datasiswa.pdf', 'I');
				
		
	}
}
