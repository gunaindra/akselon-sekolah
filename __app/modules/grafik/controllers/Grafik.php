<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {
  
	 public function __construct()
      {
        parent::__construct();
		
        if(!$_SESSION['tmsekolah_id']){
			
			redirect(base_url());
		 }
		
	  }
		
    
	
	
	public function gender(){
		
		 
		 
		 
		  $grid = array();
				$data['categorie_xAxis'] = "";
				$data['json_anggota']    = "";
				$pie   					 = "";
				$data['title']           = "Grafik Gender Siswa ";
				 $jenis = array("Laki-Laki"=>"Laki-Laki","Perempuan"=>"Perempuan");
				 
					$jumlah   = $this->Acuan_model->get(array("table"=>"v_siswa","order"=>"nama","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."' and status='2'")->num_rows();
				  
					 foreach($jenis as $index=>$row){
					   
					   
						$pm = $this->Acuan_model->get(array("table"=>"v_siswa","order"=>"nama","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."' and ajaran='".$this->Acuan_model->ajaran()."' and status='2' and sex='".$row."'")->num_rows();
						$data['json_anggota'] .=",".$pm;
						$data["categorie_xAxis"] .=",'".$row."'";
						$tempo = array("INDEXES"=>$row,"Jumlah"=>$pm);
						
						$pie          .=",['".$row."',".(($pm/$jumlah)*100)."]";
						
					   $grid[] = $tempo;
					   
					 }
				
				
					 $data['statistik'] = $data['title'];
					 $data['header']    = "Jenis Kelamin";
					 $data['categorie_xAxis'] = " Siswa";

				$data['json_pie_chart']  =  substr($pie,1);
				$data['line'] = substr($pie, 1);
				
				$data['json_anggota']    = substr($data['json_anggota'], 1);
				
				$data['grid'] = $grid;
				$data['konten'] = "page";
				
				$this->load->view('home/page_header',$data);
		
	    }
	
	
	  public function agamasiswa(){
		
		
		 
		 
		  $grid = array();
				$data['categorie_xAxis'] = "";
				$data['json_anggota']    = "";
				$pie   					 = "";
				$data['title']           = "Grafik Agama Siswa ";
				 $jenis = $this->Acuan_model->agama();
				 
					$jumlah   = $this->Acuan_model->get(array("table"=>"v_siswa","order"=>"nama","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."' and status='2'")->num_rows();
				  
					 foreach($jenis as $index=>$row){
					   
					   
						$pm = $this->Acuan_model->get(array("table"=>"v_siswa","order"=>"nama","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."' and ajaran='".$this->Acuan_model->ajaran()."' and status='2' and agama='".$row."'")->num_rows();
						$data['json_anggota'] .=",".$pm;
						$data["categorie_xAxis"] .=",'".$row."'";
						$tempo = array("INDEXES"=>$row,"Jumlah"=>$pm);
						
						$pie          .=",['".$row."',".(($pm/$jumlah)*100)."]";
						
					   $grid[] = $tempo;
					   
					 }
				
				
					 $data['statistik'] = $data['title'];
					 $data['header']    = "Agama";
					 $data['categorie_xAxis'] = " Siswa";

				$data['json_pie_chart']  =  substr($pie,1);
				$data['line'] = substr($pie, 1);
				
				$data['json_anggota']    = substr($data['json_anggota'], 1);
				
				$data['grid'] = $grid;
				$data['konten'] = "page";
				
				$this->load->view('home/page_header',$data);
		
	    }
		
		
		
         public function kelas(){
		
		
		 
		 
		  $grid = array();
				$data['categorie_xAxis'] = "";
				$data['json_anggota']    = "";
				$pie   					 = "";
				$data['title']           = "Grafik Kelas  ";
				 $kelas = $this->Acuan_model->get(array("table"=>"tm_kelas","order"=>"urutan","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."'")->result();
				 
					$jumlah   = $this->Acuan_model->get(array("table"=>"v_siswa","order"=>"nama","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."' and status='2'")->num_rows();
				  
					 foreach($kelas as $index=>$row){
					   
					   
						$pm = $this->Acuan_model->get(array("table"=>"v_siswa","order"=>"nama","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."' and ajaran='".$this->Acuan_model->ajaran()."' and status='2' and tmkelas_id='".$row->id."'")->num_rows();
						$data['json_anggota'] .=",".$pm;
						$data["categorie_xAxis"] .=",'".$row->nama."'";
						$tempo = array("INDEXES"=>$row->nama,"Jumlah"=>$pm);
						
						$pie          .=",['".$row->nama."',".(($pm/$jumlah)*100)."]";
						
					   $grid[] = $tempo;
					   
					 }
				
				
					 $data['statistik'] = $data['title'];
					 $data['header']    = "Kelas";
					 $data['categorie_xAxis'] = " Siswa";

				$data['json_pie_chart']  =  substr($pie,1);
				$data['line'] = substr($pie, 1);
				
				$data['json_anggota']    = substr($data['json_anggota'], 1);
				
				$data['grid'] = $grid;
				$data['konten'] = "page";
				$this->load->view('home/page_header',$data);
		
	}
	
	public function ruang(){
		
		
		 
		 
		  $grid = array();
				$data['categorie_xAxis'] = "";
				$data['json_anggota']    = "";
				$pie   					 = "";
				$data['title']           = "Grafik Ruang  ";
				 $ruang = $this->Acuan_model->get(array("table"=>"tm_ruang","order"=>"urutan","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."'")->result();
				 
					$jumlah   = $this->Acuan_model->get(array("table"=>"v_siswa","order"=>"nama","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."' and status='2'")->num_rows();
				  
					 foreach($ruang as $index=>$row){
					   
					   
						$pm = $this->Acuan_model->get(array("table"=>"v_siswa","order"=>"nama","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."' and ajaran='".$this->Acuan_model->ajaran()."' and status='2' and tmruang_id='".$row->id."'")->num_rows();
						$data['json_anggota'] .=",".$pm;
						$data["categorie_xAxis"] .=",'".$row->nama."'";
						$tempo = array("INDEXES"=>$row->nama,"Jumlah"=>$pm);
						
						$pie          .=",['".$row->nama."',".(($pm/$jumlah)*100)."]";
						
					   $grid[] = $tempo;
					   
					 }
				
				
					 $data['statistik'] = $data['title'];
					 $data['header']    = "Ruang";
					 $data['categorie_xAxis'] = " Siswa";

				$data['json_pie_chart']  =  substr($pie,1);
				$data['line'] = substr($pie, 1);
				
				$data['json_anggota']    = substr($data['json_anggota'], 1);
				
				$data['grid'] = $grid;
				$data['konten'] = "page";
				$this->load->view('home/page_header',$data);
		
	}
	
	public function pekerjaanayah(){
		
		
		 
		 
		  $grid = array();
				$data['categorie_xAxis'] = "";
				$data['json_anggota']    = "";
				$pie   					 = "";
				$data['title']           = "Grafik Pekerjaan Ayah  ";
				 $array = $this->Acuan_model->get(array("table"=>"tm_pekerjaan","order"=>"nama","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."'")->result();
				 
					$jumlah   = $this->Acuan_model->get(array("table"=>"v_siswa","order"=>"nama","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."' and status='2'")->num_rows();
				  
					 foreach($array as $index=>$row){
					   
					   
						$pm = $this->Acuan_model->get(array("table"=>"v_siswa","order"=>"nama","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."' and ajaran='".$this->Acuan_model->ajaran()."' and status='2' and pekerjaan_ayah='".$row->nama."'")->num_rows();
						$data['json_anggota'] .=",".$pm;
						$data["categorie_xAxis"] .=",'".$row->nama."'";
						$tempo = array("INDEXES"=>$row->nama,"Jumlah"=>$pm);
						
						$pie          .=",['".$row->nama."',".(($pm/$jumlah)*100)."]";
						
					   $grid[] = $tempo;
					   
					 }
				
				
					 $data['statistik'] = $data['title'];
					 $data['header']    = "Pekerjaan Ayah";
					 $data['categorie_xAxis'] = " Orang";

				$data['json_pie_chart']  =  substr($pie,1);
				$data['line'] = substr($pie, 1);
				
				$data['json_anggota']    = substr($data['json_anggota'], 1);
				
				$data['grid'] = $grid;
				$data['konten'] = "page";
				$this->load->view('home/page_header',$data);
		
	}
	
	public function pendidikanayah(){
		
		
		 
		 
		  $grid = array();
				$data['categorie_xAxis'] = "";
				$data['json_anggota']    = "";
				$pie   					 = "";
				$data['title']           = "Grafik Pendidikan Ayah  ";
				 $array = $this->Acuan_model->get(array("table"=>"tm_pendidikan","order"=>"id","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."'")->result();
				 
					$jumlah   = $this->Acuan_model->get(array("table"=>"v_siswa","order"=>"nama","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."' and status='2'")->num_rows();
				  
					 foreach($array as $index=>$row){
					   
					   
						$pm = $this->Acuan_model->get(array("table"=>"v_siswa","order"=>"nama","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."' and ajaran='".$this->Acuan_model->ajaran()."' and status='2' and pendidikan_ayah='".$row->nama."'")->num_rows();
						$data['json_anggota'] .=",".$pm;
						$data["categorie_xAxis"] .=",'".$row->nama."'";
						$tempo = array("INDEXES"=>$row->nama,"Jumlah"=>$pm);
						
						$pie          .=",['".$row->nama."',".(($pm/$jumlah)*100)."]";
						
					   $grid[] = $tempo;
					   
					 }
				
				
					 $data['statistik'] = $data['title'];
					 $data['header']    = "Pendidikan Ayah";
					 $data['categorie_xAxis'] = " Orang";

				$data['json_pie_chart']  =  substr($pie,1);
				$data['line'] = substr($pie, 1);
				
				$data['json_anggota']    = substr($data['json_anggota'], 1);
				
				$data['grid'] = $grid;
				$data['konten'] = "page";
				$this->load->view('home/page_header',$data);
		
	}
	
	
	public function pekerjaanibu(){
		
		
		 
		 
		  $grid = array();
				$data['categorie_xAxis'] = "";
				$data['json_anggota']    = "";
				$pie   					 = "";
				$data['title']           = "Grafik Pekerjaan ibu  ";
				 $array = $this->Acuan_model->get(array("table"=>"tm_pekerjaan","order"=>"nama","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."'")->result();
				 
					$jumlah   = $this->Acuan_model->get(array("table"=>"v_siswa","order"=>"nama","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."' and status='2'")->num_rows();
				  
					 foreach($array as $index=>$row){
					   
					   
						$pm = $this->Acuan_model->get(array("table"=>"v_siswa","order"=>"nama","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."' and ajaran='".$this->Acuan_model->ajaran()."' and status='2' and pekerjaan_ibu='".$row->nama."'")->num_rows();
						$data['json_anggota'] .=",".$pm;
						$data["categorie_xAxis"] .=",'".$row->nama."'";
						$tempo = array("INDEXES"=>$row->nama,"Jumlah"=>$pm);
						
						$pie          .=",['".$row->nama."',".(($pm/$jumlah)*100)."]";
						
					   $grid[] = $tempo;
					   
					 }
				
				
					 $data['statistik'] = $data['title'];
					 $data['header']    = "Pekerjaan ibu";
					 $data['categorie_xAxis'] = " Orang";

				$data['json_pie_chart']  =  substr($pie,1);
				$data['line'] = substr($pie, 1);
				
				$data['json_anggota']    = substr($data['json_anggota'], 1);
				
				$data['grid'] = $grid;
				$data['konten'] = "page";
				$this->load->view('home/page_header',$data);
		
	}
	
	public function pendidikanibu(){
		
		
		 
		 
		  $grid = array();
				$data['categorie_xAxis'] = "";
				$data['json_anggota']    = "";
				$pie   					 = "";
				$data['title']           = "Grafik Pendidikan ibu  ";
				 $array = $this->Acuan_model->get(array("table"=>"tm_pendidikan","order"=>"id","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."'")->result();
				 
					$jumlah   = $this->Acuan_model->get(array("table"=>"v_siswa","order"=>"nama","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."' and status='2'")->num_rows();
				  
					 foreach($array as $index=>$row){
					   
					   
						$pm = $this->Acuan_model->get(array("table"=>"v_siswa","order"=>"nama","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."' and ajaran='".$this->Acuan_model->ajaran()."' and status='2' and pendidikan_ibu='".$row->nama."'")->num_rows();
						$data['json_anggota'] .=",".$pm;
						$data["categorie_xAxis"] .=",'".$row->nama."'";
						$tempo = array("INDEXES"=>$row->nama,"Jumlah"=>$pm);
						
						$pie          .=",['".$row->nama."',".(($pm/$jumlah)*100)."]";
						
					   $grid[] = $tempo;
					   
					 }
				
				
					 $data['statistik'] = $data['title'];
					 $data['header']    = "Pendidikan ibu";
					 $data['categorie_xAxis'] = " Orang";

				$data['json_pie_chart']  =  substr($pie,1);
				$data['line'] = substr($pie, 1);
				
				$data['json_anggota']    = substr($data['json_anggota'], 1);
				
				$data['grid'] = $grid;
				$data['konten'] = "page";
				$this->load->view('home/page_header',$data);
		
	}
	 
	
}
