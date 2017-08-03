<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	 public function __construct()
      {
        parent::__construct();
		$this->load->model('Home_model');
     
		
	  }
		
	public function index()
	{  
	    $data = array();
	    $data['data'] 		 = $this->Acuan_model->sekolah();
	  
		$this->load->view('page_login',$data);
	

	}
	
	
	public function dashboard(){
		
		if(!$_SESSION['tmsekolah_id']){
			
			redirect(base_url());
		 }
		 
		 
		  $grid = array();
				$data['categorie_xAxis'] = "";
				$data['json_anggota']    = "";
				$pie   					 = "";
				$data['title']           = "Dashboard ";
				$kelas = $this->Acuan_model->get(array("table"=>"tm_kelas","order"=>"urutan","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."'")->result();
				$jumlah   = $this->Acuan_model->get(array("table"=>"v_siswa","order"=>"nama","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."' and status='2'")->num_rows();
				if($jumlah>0){
					foreach($jenis as $index=>$row){
						$pm = $this->Acuan_model->get(array("table"=>"v_siswa","order"=>"nama","by"=>"asc"),"tmsekolah_id='".$_SESSION['tmsekolah_id']."' and ajaran='".$this->Acuan_model->ajaran()."' and status='2' and sex='".$row."'")->num_rows();
						$data['json_anggota'] .=",".$pm;
						$data["categorie_xAxis"] .=",'".$row."'";
						$tempo = array("INDEXES"=>$row,"Jumlah"=>$pm);
						$pie          .=",['".$row."',".(($pm/$jumlah)*100)."]";
						$grid[] = $tempo;	   
					}
				}
				else{
					$tempo = 0;
					$pie          .=",['No Record',0]";
					$grid[] = $tempo;
				}
				
				
				
					 $data['statistik'] = "Persentase Siswa";
					 $data['header']    = "Kelas";
					 $data['categorie_xAxis'] = " Siswa";

				$data['json_pie_chart']  =  substr($pie,1);
				$data['line'] = substr($pie, 1);
				
				$data['json_anggota']    = substr($data['json_anggota'], 1);
				
				$data['grid'] = $grid;
				
				$data['data'] 		 = $this->Acuan_model->sekolah();
			    $data['log']         = $this->Acuan_model->getlimit(array("table"=>"log","order"=>"tanggal","by"=>"desc","limit"=>50),"tmsekolah_id='".$_SESSION['tmsekolah_id']."'")->result();
				
				$this->load->view('page_header',$data);
		
	}
	
	public function do_login(){
		  
		  $username = trim($this->input->get_post("username"));
		  $password = trim($this->input->get_post("password"));
		  
		  
		  $data['data']    = $this->Acuan_model->sekolah();
		 
		   if(empty($username) or empty($password)){
			       
				   
			       $data['status']  = "<span style='color:red;font-size:14px'>Masukkan Username dan Password</span>";
				   $this->load->view("page_login",$data);
				   return false;
			   
		   }
		  
		  $username   = $this->db->escape_str($username);
		  $password   = $this->db->escape_str($password);
		 /* $password_h = password_hash($this->input->post('sebagai'), PASSWORD_BCRYPT);
		  
		  $row      = $this->Home_model->cek_login($username)->row_array();  */

        // search pegawai
        $logged_in_user = $this->Acuan_model->get_where2("tm_pegawai",array("username"=>$username,"password"=>$password))->row_array();
        if (!empty($logged_in_user)) {
            $logged_in_user['status'] = 'staff';
        } else {
            // if pegawai now exists search siswa
            $logged_in_user = $this->Acuan_model->get_where2("tm_siswa",array("nis"=>$username,"password"=>$password))->row_array();
            $logged_in_user['grup'] = 3;
            $logged_in_user['status'] = 'siswa';
        }


			   if(count($logged_in_user) >0){

					   
					   
					   $session = array(
						'tmsekolah_id'     => $logged_in_user['tmsekolah_id'],
						'user_id'          => $logged_in_user['id'],
						'nama'             => $logged_in_user['nama'],
						'grup'             => $logged_in_user['grup'],
						'status'            => $logged_in_user['status']);
						
						
						$this->session->sess_expiration = '1000000';
						$this->session->set_userdata($session);
				   
				         redirect(base_url()."home/dashboard");
					   
					   
				   
				   
				   
			   }else{
				  
				   $data['status'] = "<span style='color:red;font-size:14px'>Username atau Password Salah</span>";
				   $this->load->view("page_login",$data);
				   
			   }

		
	}

	private function hash_password($password){
		
		
       return password_hash($password, "usesomesillystringforsalt");
	   
	   
     }
	 
	 
	 public function cek(){
		 
		 echo count($this->Acuan_model->get_wherearray("notif","tmsekolah_id='".$_SESSION['tmsekolah_id']."' and status='0'"));
		 
		 
	 }
	 
	 
	 public function get_pemberitahuan(){
		 
		 $this->Acuan_model->update("notif",array("status"=>1),"tmsekolah_id='".$_SESSION['tmsekolah_id']."'");
	
		  $pemberitahuan =  $this->Acuan_model->getlimit(array("table"=>"notif","order"=>"tanggal","by"=>"desc","limit"=>40),"tmsekolah_id='".$_SESSION['tmsekolah_id']."'")->result();
		    if(count($pemberitahuan) >0){
				  foreach($pemberitahuan as $row){
					?>
		                          <li>
									<a href="<?php echo site_url($row->link); ?>">
									
									<span class="subject">
									
									<span class="time"><?php echo $this->Acuan_model->timeAgo($row->tanggal); ?> </span>
									</span>
									<span class="pesan">
									 <?php echo $row->keterangan; ?> </span>
									</a>
								</li>
					<?php
				  }					
			}else{
				
					?>
		                         <li>
									<a href="#">
									
									<span class="subject">
									
									<span class="time"> </span>
									</span>
									<span class="pesan">
									 Tidak ada pemberitahuan </span>
									</a>
								</li>
					<?php 
				
			}
	 }
	 
	 
	 public function logout(){
		 $this->session->sess_destroy();
			redirect(base_url());
		 
	 }
	
}
