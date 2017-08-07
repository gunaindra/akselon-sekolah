<?php

class Acuan_model extends CI_Model {

    public function __construct() {
        parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
    }
  // Baru
  
  public function indukmenu(){
		
		return $this->db->query("select a.id as id_menu, a.nama as menu, a.link,a.icon,b.* FROM tm_menu a INNER JOIN hak_akses b ON b.tmmenu_id=a.id  where b.tmgrup_id='".$_SESSION['grup']."' and parent_id='0' order by a.urutan asc");
	}
	
	public function submenu($tmmenu_id){
		
		return $this->db->query("select a.nama as menu, a.link,a.icon,b.* FROM tm_menu a INNER JOIN hak_akses b ON b.tmmenu_id=a.id  where b.tmgrup_id='".$_SESSION['grup']."' and parent_id='".$tmmenu_id."' order  by a.urutan asc");
	}
	
   public function formatuang($jumlah){
	   
	   return "Rp. ". number_format($jumlah, 0 , ',' , '.');
   }
   public function formatuang2($jumlah){
	   
	   return  number_format($jumlah, 0 , ',' , '.');
   }
   public function status($status){
	   
	   $statusarray = array("1"=>"Pendaftaran Online","2"=>"Siswa Aktif","99"=>"Menunggu Proses Pembayaran","98"=>"Di Proses","97"=>"Dikembalikan","96"=>"Tidak Di Terima");
	   
	   return $statusarray[$status];
	   
   }
	public function sekolah(){
	   
	   return $this->db->get_where("tm_sekolah",array("id"=>1))->row();
	   
	}   
	
	public function ajaran(){
		
		 $row = $this->db->get_where("tm_sekolah",array("id"=>1))->row();
		 
		 return $row->ajaran;
	}
	
	public function semester(){
		
		 $row = $this->db->get_where("tm_sekolah",array("id"=>1))->row();
		 
		 return $row->semester;
	}
	
	public function get_where($table,$where){
		
		$this->db->where($where);
		return $this->db->get($table)->row();
		
	}
	public function get_wherearray($table,$where){
		
		$this->db->where($where);
		return $this->db->get($table)->result();
		
	}
	
	public function get_where2($table,$where){
		
		$this->db->where($where);
		return $this->db->get($table);
		
	}
	
	
	public function hapus($table,$where){
		
		$this->db->where($where);
		$this->db->delete($table);
		
	}
	
	public function id($table){
		
		$this->db->select("MAX(id) as id");
		$this->db->from($table);
		$this->db->where("tmsekolah_id",1);
		
		$sql = $this->db->get()->row();
		
		return ($sql->id+1);
		
	}
	
	public function id2($table){
		
		$this->db->select("MAX(id) as id");
		$this->db->from($table);

		$sql = $this->db->get()->row();
		
		return ($sql->id+1);
		
	}
	public function get($param,$where){
	
		
		//$this->db->select("*");
		//$this->db->from("tm_jenjang a");
		$condition = "1=1";
		if($where !=null){
			
			$condition .=" and ".$where;
			
		}
		return $this->db->query("select * from ".$param['table']." where ".$condition." order by ".$param['order']." ".$param['by']."");
		//$this->db->order_by("".$param['order']."","".$param['by']."");
		//return ($this->db->get()->num_rows() >0) ? $this->db->get() :"";
		
	}

	public function getlimit($param,$where){
    
        $condition = "";
        if($where !=null){
            
            $condition .=" where ".$where;
            
        }
        return $this->db->query("select * from ".$param['table'].$condition." order by ".$param['order']." ".$param['by']." limit ".$param['limit']."");
        
        
    }
	
	
	public function update($table,$data,$where){
		
		
		$this->db->set('d_update', date('Y-m-d H:i:s'));
		$this->db->set('i_update', $_SESSION['user_id']);
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	
	public function insert($table,$data){
		
		    $this->db->set('d_entry', date('Y-m-d H:i:s'));
			$this->db->set('i_entry', $_SESSION['user_id']);
			$this->db->set('tmsekolah_id', 1);
			$this->db->set('id', $this->id($table));
		    
			$this->db->insert($table,$data);
		
	}
   //Lama
    public function log($keterangan){
		
		$this->db->set("id",$this->id("log"));
		$this->db->set("keterangan",$keterangan);
		$this->db->set("tanggal",date("Y-m-d H:i:s"));
		$this->db->set("tmsekolah_id",1);
	    $this->db->insert("log");
		
		
	}
	
	 public function notif($array){
		
		$this->db->set("id",$this->id("notif"));
		
		$this->db->set("tanggal",date("Y-m-d H:i:s"));
		
	    $this->db->insert("notif",$array);
		
		
	}
	
    public function notification($keterangan,$url,$nama,$tmsiswa_id){
		
		$this->db->set("keterangan",$keterangan);
		$this->db->set("url",$url);
		$this->db->set("nama",$nama);
		$this->db->set("tmsiswa_id",$tmsiswa_id);
		$this->db->set("tanggal",date("Y-m-d H:i:s"));
		$this->db->insert("tm_notification");
		
		
	}
	public function get_kelas_tab($id){
		
		$this->db->where("kelas",$id);
		$sql = $this->db->get("tm_about_kelas")->row();
		return $sql->keterangan;
	
	}
	
	public function get_video(){
		
		
		$sql = $this->db->get("tm_video")->row();
		return $sql;
	
	}
	
	public function get_entry($id){
		
		$this->db->where("id",$id);
		$a =$this->db->get("tm_userlogin")->row();
		if(count($a) > 0){
			
			return $a->nama;
			
		}else{
			return "excel";
		}
		
	}
	public function ip_lokal(){
		
		$ip_public   		         = $_SERVER['REMOTE_ADDR'];
		$hostname  			         = gethostbyaddr($ip_public);
		return $ip_private  		 = gethostbyname(trim($hostname));
	}
	
	
	public function hostname(){
		
		$ip_public   		 = $_SERVER['REMOTE_ADDR'];
		return $hostname  			 = gethostbyaddr($ip_public);
		$ip_private  		 = gethostbyname(trim($hostname));
	}
	
		public function pengunjung($browser){
		
		 $ip 		= $this->ip_lokal();
		
		 if($this->cek_pengunjung($ip,$browser) ==0):
		
		   $this->db->set("ip",$ip);
		   $this->db->set("browser",$browser);
		  
		   $this->db->set("tanggal",date("Y-m-d"));
		   
		   $this->db->insert("tm_pengunjung");
		
		  
		 
		 
		 endif;
		
	}
		public function cek_pengunjung($ip,$browser){
		
		$this->db->where("ip",$ip);
		$this->db->where("browser",$browser);
		$this->db->where("tanggal",date("Y-m-d"));
		
		return $this->db->get("tm_pengunjung")->num_rows();
		
		
	}
	   public function count_pengunjung($where,$param){
		
		$q = $this->db->query("select count(id) as jumlah from tm_pengunjung where $where(tanggal)='".$param."' and YEAR(tanggal)='".date("Y")."'")->row();
		  if(count($q) >0){
			  
			  return $q->jumlah;
		  }
		
	}
	public function get_gallery(){
		
		$this->db->order_by("tanggal","desc");
		$this->db->limit(10);
		$sql = $this->db->get("tm_gallery")->result();
		return $sql;
	
	}
	
	public function get_news($param){
		
		
		$this->db->where("status",$param);
		$this->db->order_by("tanggal","desc");
		$sql = $this->db->get("tm_news",3)->result();
		return $sql;
	
	}
	
	
	public function get_testimoni(){
		
		$this->db->order_by("id","asc");
		$sql = $this->db->get("tm_testimoni",1)->row();
		return $sql;
	
	}
	
	public function get_mapel(){
		
		$this->db->order_by("nama","asc");
		$sql = $this->db->get("tm_pelajaran")->result();
		return $sql;
	
	}
	
	public function get_jenjang(){
		
		$this->db->order_by("id","asc");
		$sql = $this->db->get("tm_jenjang")->result();
		return $sql;
	
	}
	
	public function get_kontak(){
		
		
		$sql = $this->db->get("tm_kontak")->row();
		return $sql;
	
	}
	
	public function get_kontakbanyak(){
		
		
		$sql = $this->db->get("tm_kontak")->result();
		return $sql;
	
	}
	
	public function get_pekerjaan(){
		
		$this->db->order_by("nama","asc");
		$sql = $this->db->get("tm_pekerjaan")->result();
		return $sql;
	
	}
	
	
	public function get_pendidikan(){
		
		$this->db->order_by("id","asc");
		$sql = $this->db->get("tm_pendidikan")->result();
		return $sql;
	
	}
	
		public function get_jabatan(){
		
		$this->db->order_by("id","asc");
		$sql = $this->db->get("tm_jabatan")->result();
		return $sql;
	
	}
	
	public function get_kondisi($id,$where,$table,$kolom){
		
		$this->db->where($where,$id);
		return $sql = $this->db->get($table);
		if(count($sql)>0):
		return $sql->$kolom;
		else:
		return "";
		endif;
		
	}

	public function get_kondisi_a($id,$where,$table,$kolom){
		
		$this->db->where($where,$id);
		$sql = $this->db->get($table);
		if(count($sql)>0):
		return $sql->row()->$kolom;
		else:
		return "";
		endif;
		
	}

	
	public function get_kondisi_student($id,$where,$table,$kolom,$ajaran){
		$ajaranaktif = $this->Acuan_model->tahun_aktif();
		
		$this->db->where($where,$id);
		$this->db->where($ajaran,$ajaranaktif);
		$sql = $this->db->get($table)->row();
		if(count($sql)>0):
		return $sql->$kolom;
		else:
		return "";
		endif;
		
	}
	
	public function agama(){
		
		
		
		return array("1"=>"Islam","2"=>"Kristen Protestan","3"=>"Katholik","4"=>"Hindu","5"=>"Buddha","6"=>"Kong Hu cu","7"=>"Lainnya");
		
		
		
		
	}
	
	public function golongan_darah(){
		
		
		
		return array("A","B","AB","O");
		
		
		
		
	}
	public function statuspernikahan(){
		
		
		
		return array("Belum Menikah","Sudah Menikah","Duda","Janda");
		
		
		
		
	}
	
	public function statuspegawai(){
		
		
		
		return array("PNS","Honorer");
		
		
		
		
	}
	
	function get_id($length = 5){
		$password = "";
		$possible = "0123456789bcdfghjkmnpqrstvwxyz"; //no vowels

		$i = 0;

		while ($i < $length) {
			$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
			if (!strstr($password, $char)) {
				$password .= $char;
				$i++;
			}
		}
		 $password= $password;
		
		return $password;
	}	
	
	
	
	function Terbilang($x)
	{
		if($x=="-"){ return false; }
	  $abil = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
	  if ($x < 12)
		return " " . $abil[$x];
	  elseif ($x < 20)
		return $this->Terbilang($x - 10) . "Belas";
	  elseif ($x < 100)
		return $this->Terbilang($x / 10) . " Puluh" . $this->Terbilang($x % 10);
	  elseif ($x < 200)
		return " Seratus" . $this->Terbilang($x - 100);
	  elseif ($x < 1000)
		return $this->Terbilang($x / 100) . " Ratus" . $this->Terbilang($x % 100);
	  elseif ($x < 2000)
		return " Seribu" . $this->Terbilang($x - 1000);
	  elseif ($x < 1000000)
		return $this->Terbilang($x / 1000) . " Ribu" . $this->Terbilang($x % 1000);
	  elseif ($x < 1000000000)
		return $this->Terbilang($x / 1000000) . " Juta" . $this->Terbilang($x % 1000000);
	  elseif ($x < 1000000000000)
		return $this->Terbilang($x / 1000000000) . " Milyar " . $this->Terbilang(substr($x,1));
	   
	}
	
	
	
	function formattanggaldb($tanggal){
		
		if($tanggal=="0000-00-00" or $tanggal=="00-00-0000" or $tanggal==""){
			
			$tanggal = date("Y-m-d");
		}
		$pecah = explode("-",$tanggal);
		return $pecah[2]."-".$pecah[1]."-".$pecah[0];
		
		
		
	}
	function formattimestamp($tanggal){
		
		
		$pecah = explode(" ",$tanggal);
		return $this->formattanggalstring($pecah[0])." Pukul ".$pecah[1];
		
		
		
	}
	function formattimestampbulan($tanggal){
		
		
		$pecah = explode(" ",$tanggal);
		return $this->formattanggalstring($pecah[0]);
		
		
		
	}
	
	function formattanggalstring($tanggal){
		
		if($tanggal=="0000-00-00" or $tanggal=="00-00-0000" or $tanggal==""){
			
			$tanggal = date("Y-m-d");
		}
		
		$pecah = explode("-",$tanggal);
		return $pecah[2]." ".$this->bulan($pecah[1])." ".$pecah[0];
		
		
	}
	
   function postlearning($tanggal){
		
		
		
		$pecah   = explode(" ",$tanggal);
		$tanggal = $pecah[0];
		$jam     = $pecah[1];
		
		$pecahtgl  = explode("-",$tanggal);
		return $pecahtgl[2]."-".$this->bulan($pecahtgl[1])."-".$pecahtgl[0]." Pukul ".$jam;
		
		
		
	}
	
	function arraybulan(){
		
		$databulan= array("01"=>"Januari",
					"02"=>"Februari",
					"03"=>"Maret",
					"04"=>"April",
					"05"=>"Mei",
					"06"=>"Juni",
					"07"=>"Juli",
					"08"=>"Agustus",
					"09"=>"September",
					"10"=>"Oktober",
					"11"=>"November",
					"12"=>"Desember");
		
		return $databulan;
	}
	function bulan($bulan){
		
		$databulan= array("01"=>"Januari",
					"02"=>"Februari",
					"03"=>"Maret",
					"04"=>"April",
					"05"=>"Mei",
					"06"=>"Juni",
					"07"=>"Juli",
					"08"=>"Agustus",
					"09"=>"September",
					"10"=>"Oktober",
					"11"=>"November",
					"12"=>"Desember");
		
		return $databulan[$bulan];
	}
	
	function bulanbalik($bulan){
		
		$databulan= array("Januari"=>"01",
					"Februari"=>"02",
					"Maret"=>"03",
					"April"=>"04",
					"Mei"=>"05",
					"Juni"=>"06",
					"Juli"=>"07",
					"Agustus"=>"08",
					"September"=>"09",
					"Oktober"=>"10",
					"November"=>"11",
					"Desember"=>"12");
		
		return $databulan[$bulan];
	}
	
	function getstatusabsen($tmsiswa_id,$tanggal,$valpel){
		
		$this->db->where("tmsiswa_id",$tmsiswa_id);
		$this->db->where("tanggal",$tanggal);
		$this->db->where("absensi",$valpel);
		
		$query = $this->db->get("tr_absensi");
		
		if($query->num_rows() >0){
			
			 return "<span class='glyphicon glyphicon-ok'></span>";
			
		}else{
			
			return "-";
		}
		
	}
	
	function getstatusabsenstudentprivate($tmsiswa_id,$tanggal,$valpel){
		
		$this->db->where("tmsiswa_id",$tmsiswa_id);
		$this->db->where("tanggal",$tanggal);
		$this->db->where("tmpelajaran_id",$valpel);
		
		$query = $this->db->get("tr_absensi");
		
		if($query->num_rows() >0){
			 $row = $query->row();
			 return $row->absensi;
			 
			
		}else{
			
			return "-";
		}
		
	}
	
	
	public function nilai_kuantitif(){
		
		return array("A"=>"Baik Sekali","B"=>"Baik","C"=>"Cukup","D"=>"Kurang","E"=>"Kurang Sekali");
		
		
	}
	
   public function balik_nilai_kuantitif($nilai){
		
		$arr=  array("A"=>"Baik Sekali","B"=>"Baik","C"=>"Cukup","D"=>"Kurang","E"=>"Kurang Sekali");
		if($nilai!=""){
			return $arr[$nilai];
			
		}
		
		
	}
	public function tahun_aktif(){
		
		$row = $this->db->get("tm_tahun_pelajaran")->row();
		return $row->tahun;
		//return 2017;
	}
	
	public function semester_aktif(){
		
		$row = $this->db->get("tm_semester")->row();
		return $row->nama;
		//return 2017;
	}
	
	public function session_learning(){
		
		 $session_siswa           = $this->session->userdata("id_learning_siswa");
		 $session_guru            = $this->session->userdata("id_learning");
		// $data['status_learning'] = $this->session->userdata("status_learning");
		return $data['sessionaktif']    = isset($session_siswa) ? $session_siswa  : $session_guru;
		
		
	}
	
	function timeAgo($date,$display = array('Year', 'Month', 'Day', 'Hour', 'Minute', 'Second'), $ago = ''){
			
	date_default_timezone_set("Asia/Jakarta");
        $timestamp = strtotime($date);
        $timestamp = (int) $timestamp;
        $current_time = time();
        $diff = $current_time - $timestamp;

        //intervals in seconds
        $intervals = array(
            'year' => 31556926, 'month' => 2629744, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute' => 60
        );

        //now we just find the difference
        if ($diff == 0) {
            return ' Baru Saja ';
        }

        if ($diff < 60) {
            return $diff == 1 ? $diff . ' Detik Yang Lalu ' : $diff . '  Detik Yang Lalu ';
        }

        if ($diff >= 60 && $diff < $intervals['hour']) {
            $diff = floor($diff / $intervals['minute']);
            return $diff == 1 ? $diff . ' Menit Yang Lalu ' : $diff . '  Menit Yang Lalu ';
        }

        if ($diff >= $intervals['hour'] && $diff < $intervals['day']) {
            $diff = floor($diff / $intervals['hour']);
            return $diff == 1 ? $diff . ' Jam Yang Lalu ' : $diff . '  Jam Yang Lalu ';
        }

        if ($diff >= $intervals['day'] && $diff < $intervals['week']) {
            $diff = floor($diff / $intervals['day']);
            return $diff == 1 ? $diff . ' Hari Yang Lalu ' : $diff . '  Hari Yang Lalu ';
        }

        if ($diff >= $intervals['week'] && $diff < $intervals['month']) {
            $diff = floor($diff / $intervals['week']);
            return $diff == 1 ? $diff . ' Minggu Yang Lalu ' : $diff . '  Minggu Yang Lalu ';
        }

        if ($diff >= $intervals['month'] && $diff < $intervals['year']) {
            $diff = floor($diff / $intervals['month']);
            return $diff == 1 ? $diff . ' Bulan Yang Lalu ' : $diff . '  Bulan Yang Lalu';
        }

        if ($diff >= $intervals['year']) {
            $diff = floor($diff / $intervals['year']);
            return $diff == 1 ? $diff . ' Tahun Yang Lalu ' : $diff . '  Tahun Yang Lalu ';
        }
		
	}
	
	function jumlah_hari_bulan(){
		date_default_timezone_set("Asia/Jakarta");
		 $kalender = CAL_GREGORIAN;
		 $bulan    = date("m");
		 $tahun    = date("Y");
		 
		 return cal_days_in_month($kalender,$bulan,$tahun);
		
		
		
		
	}
	
	function kategori_pembayaran(){
		
		return array("1"=>"Perhari",
		"2"=>"Perminggu",
		"3"=>"Perbulan",
		"4"=>"Persemester",
		"5"=>"Pertahun",
		"7"=>"Per 2 Tahun",
		"8"=>"Per 3 Tahun",
		"6"=>"Persekali");
		
	}
	
	function kategori_tagihan(){
		
		return array("1"=>"Umum",
		"2"=>"Ekstrakulikuler",
		"3"=>"SPP"
		);
		
	}
	
	public function cronjob_spp(){
		date_default_timezone_set("Asia/Jakarta");
		
		$anggaran = $this->Acuan_model->tahun_aktif();
			
       if(date("d") =="11"):	
         	  
		   $sql = $this->db->query("select a.id as trkeuangan_id,a.*,b.id as tmkeuangan_id,b.* from tr_keuangan a INNER JOIN tm_keuangan b on 
            a.tmkeuangan_id =b.id  where a.status_denda='0' and a.anggaran='$anggaran' and a.dibayar_online='0' and a.dibayar='0' and b.kategori_tagihan='3' and upper(b.nama) LIKE '%".strtoupper($this->bulan(date("m")))."%'")->result();
		  
		     if(count($sql) >0){
				 $tagihant=0;
				   foreach($sql as $index=>$dataRow){
					   
					  $tagihan = $dataRow->tagihan;
                      $persen  = ($tagihan * 10) / 100;
					   $tagihant = $tagihan + $persen;
					    
					$this->db->query("update tr_keuangan set tagihan ='$tagihant',status_denda='1',tgl_denda='".date("Y-m-d")."' where id='".$dataRow->trkeuangan_id."'");
				   }
				return "Ada ".count($sql)." Data Tagihan SPP yang di kenakan denda 10 % pada bulan ini"; 
				
			 }else{
				 
			   $hd = $this->db->query("select * from tr_keuangan where status_denda='1' and tgl_denda='".date("Y-m-11")."'")->num_rows();
		       return "Ada ".$hd." Data Tagihan SPP yang di kenakan denda 10 % pada bulan ini"; 
				
				 
			 } 
		
	   endif;
		
		
	}
	
	public function get_max_id($id,$table){
		
		$sql = $this->db->query("select max(".$id.") as maxid from ".$table."")->row();
		    
			if(count($sql) >0){
				
				return $sql->maxid;
				
			}
		
		
	}
	public function count_siswa(){
		
		return $this->db->query("
SELECT 	COUNT(
					CASE
						WHEN id IN (SELECT tmsiswa_id FROM tr_kelas WHERE tmkelas_id IN(34,35,38,39,22,23,24,25,26))
						THEN 0
						ELSE NULL
					END
				) AS 'pyp',
				COUNT(
										CASE
						WHEN id IN (SELECT tmsiswa_id FROM tr_kelas WHERE tmkelas_id IN(27,28,29,30))
						THEN 0
						ELSE NULL
					END
				) AS 'myp',
				COUNT(
											CASE
						WHEN id IN (SELECT tmsiswa_id FROM tr_kelas WHERE tmkelas_id IN(31,32,33))
						THEN 0
						ELSE NULL
					END
				) AS 'sma',
				COUNT(
					CASE
						WHEN id IS NOT NULL
						THEN 0
						ELSE NULL
					END
				) AS 'total' FROM tm_siswa WHERE status_persyaratan='2' and ajaran='".$this->tahun_aktif()."'")->row();
		
	}

	public function getPrivilege($group_id, $link) {
        $this->db->select('*');
        $this->db->from('hak_akses');
        $this->db->join('tm_menu', 'hak_akses.tmmenu_id = tm_menu.id');
        $this->db->where('hak_akses.tmgrup_id',$group_id);
        $this->db->where('tm_menu.link',$link);
        $query = $this->db->get();

        return $query->row();
    }
}
