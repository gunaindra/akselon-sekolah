        <center> <img src="<?php echo base_url(); ?>assets/img/logo.jpg" class="img-responsive" width="90" height="90"> </center>
		<center><h4><b>Al JABR ISLAMIC SCHOOL<br> <?php echo $this->Acuan_model->get_kondisi($data_grid['tmjenjang_id'],"id","tm_jenjang","nama"); ?> </b></h4><small> <b>Jl. Bango II No. 34 dan 38 Pondok Labu – Jakarta Selatan<br>
Telp/Fax (021) 7591 3675, 7591 3678
</b></small></center>
		 <hr style="border-top: 2px double #8c8b8b">
		<center><h3><b>FORMULIR PENDAFTARAN SISWA BARU<br>TA <?php echo $this->Acuan_model->tahun_aktif(); ?> / <?php echo $this->Acuan_model->tahun_aktif()+1; ?></b></h3>
					 
		</center>
		<br>
						
									
									   <div class="form-group">
											
											<div class="col-md-10">
												<p style="float:left; font-weight: bold;font-size:15px"><b>A. TERDAFTAR MENJADI SISWA </b></p>
											</div>
										</div>
										
										<table>
											<tr>
											  <td width="30%">1. Tahun Pelajaran </td>
											  <td width="10%" align="center">:</td>
											  <td><?php echo isset($data_grid['ajaran']) ? $data_grid['ajaran']:""; ?>/<?php echo isset($data_grid['ajaran']) ? $data_grid['ajaran']+1:""; ?></td>
											</tr>
											<tr>
											  <td>2. Kelas </td>
											  <td align="center">:  </td>
											  <td><?php if(isset($data_grid['tmkelas_id'])): echo $this->Acuan_model->get_kondisi($data_grid['tmkelas_id'],"id","tm_kelas","nama"); endif; ?>
											</td>
											</tr>

										</table>
										<br>
										<div class="form-group">
											
											<div class="col-md-10">
												<p style="float:left; font-weight: bold;font-size:15px"><b>B. KETERANGAN TENTANG IDENTITAS SISWA/I </b></p>
											</div>
										</div>
										
										
										<div class="form-group">
											<label class="col-md-4 control-label;float:left;">1.  Nama : 
											
										</div>
										
										<table>
											<tr>
											  <td width="30%">&nbsp; &nbsp; a. Nama Lengkap </td>
											  <td width="10%" align="center">:</td>
											  <td><?php echo isset($data_grid['nama']) ? $data_grid['nama']:""; ?></td>
											</tr>
											<tr>
											  <td>&nbsp; &nbsp; b. Nama Panggilan    </td>
											  <td align="center">:  </td>
											  <td><?php echo isset($data_grid['nama_panggilan']) ? $data_grid['nama_panggilan']:""; ?>
											</td>
											</tr>
											
										    <tr>
											  <td>2. Jenis Kelamin   </td>
											  <td align="center">:  </td>
											  <td><?php echo isset($data_grid['sex']) ? $data_grid['sex']:""; ?>
											</td>
											</tr>
											
											 <tr>
											  <td>3. Tempat/Tanggal Lahir   </td>
											  <td align="center">:  </td>
											  <td>
											  <?php echo isset($data_grid['tempat_lahir']) ? $data_grid['tempat_lahir']:""; ?>, <?php echo isset($data_grid['tgl_lahir']) ? $this->Acuan_model->formattanggaldb($data_grid['tgl_lahir']):""; ?>
												
											</td>
											</tr>
											
											 <tr>
											  <td>4. Nomor Telepon</td>
											  <td align="center">:  </td>
											  <td>
											 <?php echo isset($data_grid['hp']) ? $data_grid['hp']:""; ?>	
											</td>
											</tr>
											
											 <tr>
											  <td>5. Alamat </td>
											  <td align="center">:  </td>
											  <td>
											   <?php echo isset($data_grid['alamat']) ? $data_grid['alamat']:""; ?>
											</td>
											</tr>
											<tr>
											  <td>6. Anak Ke </td>
											  <td align="center">:  </td>
											  <td>
											   <?php echo isset($data_grid['anakke']) ? $data_grid['anakke']:""; ?>
											</td>
											</tr>
											
											<tr>
											  <td >7. Jumlah Sudara </td>
											  <td align="center">:  </td>
											  <td>
											 <?php echo isset($data_grid['saudara']) ? $data_grid['saudara']:""; ?>
											</td>
											</tr>
											
											<tr>
											  <td >&nbsp; &nbsp; 7.1 Saudara Kandung  </td>
											  <td align="center">:  </td>
											  <td>
											   <?php echo isset($data_grid['kandung']) ? $data_grid['kandung']:""; ?>
											</td>
											</tr>
											
											<tr>
											  <td >&nbsp; &nbsp; 7.2 Saudara Tiri </td>
											  <td align="center">:  </td>
											  <td>
											  <?php echo isset($data_grid['tiri']) ? $data_grid['tiri']:""; ?>
											</td>
											</tr>
										   <tr>
											  <td >&nbsp; &nbsp; 7.3 Saudara Angkat </td>
											  <td align="center">:  </td>
											  <td>
											  <?php echo isset($data_grid['angkat']) ? $data_grid['angkat']:""; ?>
											</td>
											</tr>
										    <tr>
											  <td >8. Status Anak </td>
											  <td align="center">:  </td>
											  <td>
											  <?php echo isset($data_grid['tiri']) ? $data_grid['tiri']:""; ?>
											</td>
											</tr>
											
											 <tr>
											  <td >9. Bahasa Sehari-hari</td>
											  <td align="center">:  </td>
											  <td>
											  <?php echo isset($data_grid['bahasa']) ? $data_grid['bahasa']:""; ?>
											</td>
											</tr>
											
											
											 <tr>
											  <td >10. Warga Negara</td>
											  <td align="center">:  </td>
											  <td>
											  <?php echo isset($data_grid['warganegara']) ? $data_grid['warganegara']:""; ?>
											</td>
											</tr>
											
											
											 <tr>
											  <td >11. Agama </td>
											  <td align="center">:  </td>
											  <td>
											 <?php echo isset($data_grid['agama']) ? $data_grid['agama']:""; ?>
											</td>
											</tr>
											
											<tr>
											  <td >12. Kelainan Jasmani </td>
											  <td align="center">:  </td>
											  <td>
											  <?php echo isset($data_grid['kelainanjasmani']) ? $data_grid['kelainanjasmani']:""; ?>
											
											</td>
											</tr>
											
										
											
											
											

										</table>
										
										<br>
										
								
								
										
										<div class="form-group">
											
											<div class="col-md-10">
												<p style="float:left; font-weight: bold;font-size:15px"><b>C. KETERANGAN TENTANG IDENTITAS ORANGTUA/ WALI </b></p>
											</div>
										</div>
									
										
										<div class="form-group">
											<label class="col-md-10 control-label;float:left;">&nbsp; &nbsp; 1. Ayah Kandung/tiri/angkat atau Wali *): 
											
											
											
										</div>
										
										<table>
										
											<tr>
											  <td width="30%">1.1. Nama</td>
											  <td align="center" width="10%">:  </td>
											  <td>
											  <?php echo isset($data_grid['nama_ayah']) ? $data_grid['nama_ayah']:"-"; ?>
											 </td>
											</tr>
											
											<tr>
											  <td>1.2. Tempat/Tanggal Lahir </td>
											  <td align="center">:  </td>
											  <td>
											  
												    <?php echo isset($data_grid['tempat_lahir_ayah']) ? $data_grid['tempat_lahir_ayah']:""; ?>, <?php echo isset($data_grid['tgl_lahir_ayah']) ? $this->Acuan_model->formattanggaldb($data_grid['tgl_lahir_ayah']):""; ?>
									
											 </td>
											</tr>
											
												<tr>
											  <td>1.3. Agama</td>
											  <td align="center">:  </td>
											  <td>
											  	<?php echo isset($data_grid['agama_ayah']) ? $data_grid['agama_ayah']:""; ?>
											 </td>
											</tr>
											
										   <tr>
											  <td>1.4. Pendidikan Terakhir </td>
											  <td align="center">:  </td>
											  <td>  <?php echo isset($data_grid['pendidikan_ayah']) ? $this->Acuan_model->get_kondisi($data_grid['pendidikan_ayah'],"id","tm_pendidikan","nama"):""; ?>
											  
											
											</td>
											</tr>
											
											  <tr>
											  <td>1.5. Pekerjaan </td>
											  <td align="center">:  </td>
											  <td>  <?php echo isset($data_grid['pekerjaan_ayah']) ? $this->Acuan_model->get_kondisi($data_grid['pekerjaan_ayah'],"id","tm_pekerjaan","nama"):""; ?>
											 
											</td>
											</tr>
											
											  <tr>
											  <td>1.6. Warga Negara</td>
											  <td align="center">:  </td>
											  <td>  <?php echo isset($data_grid['warganegaraayah']) ? $data_grid['warganegaraayah']:""; ?>
											</td>
											</tr>
											
											  <tr>
											  <td>1.7. Pekerjaan </td>
											  <td align="center">:  </td>
											  <td>  <?php echo isset($data_grid['pekerjaan_ayah']) ? $this->Acuan_model->get_kondisi($data_grid['pekerjaan_ayah'],"id","tm_pekerjaan","nama"):""; ?>
											 
											</td>
											</tr>
											
											<tr>
											  <td colspan="3">1.8. Alamat dan nomor telepon </td>
											
											</td>
											</tr>
											
											  <tr>
											  <td>&nbsp;&nbsp; 1.8.1. Rumah  </td>
											  <td align="center">:  </td>
											  <td> <?php echo isset($data_grid['rumah_ayah']) ? $data_grid['rumah_ayah']:""; ?>
											</td>
											</tr>
											
											 <tr>
											  <td>&nbsp;&nbsp; 1.8.2. Kantor </td>
											  <td align="center">:  </td>
											  <td> <?php echo isset($data_grid['kantor_ayah']) ? $data_grid['kantor_ayah']:""; ?>
											</td>
											</tr>

										   <tr>
											  <td>&nbsp;&nbsp; 1.8.3. Handphone </td>
											  <td align="center">:  </td>
											  <td> <?php echo isset($data_grid['hp_ayah']) ? $data_grid['hp_ayah']:""; ?>
											</td>
											</tr>

										    <tr>
											  <td>&nbsp;&nbsp; 1.8.4. Email  </td>
											  <td align="center">:  </td>
											  <td> <?php echo isset($data_grid['email_ayah']) ? $data_grid['email_ayah']:""; ?>
											</td>
											</tr>



										</table>
									  
										
										
										<div class="form-group">
											<label class="col-md-10 control-label;float:left;">&nbsp; &nbsp; 2. Ibu Kandung/tiri/angkat atau wali *): 
											
											
											
										</div>
										
										<table>
										
											<tr>
											  <td width="30%">2.1. Nama</td>
											  <td align="center" width="10%">:  </td>
											  <td>
											  <?php echo isset($data_grid['nama_ibu']) ? $data_grid['nama_ibu']:"-"; ?>
											 </td>
											</tr>
											
											<tr>
											  <td>2.2. Tempat/Tanggal Lahir </td>
											  <td align="center">:  </td>
											  <td>
											  
												    <?php echo isset($data_grid['tempat_lahir_ibu']) ? $data_grid['tempat_lahir_ibu']:""; ?>, <?php echo isset($data_grid['tgl_lahir_ibu']) ? $this->Acuan_model->formattanggaldb($data_grid['tgl_lahir_ibu']):""; ?>
									
											 </td>
											</tr>
											
												<tr>
											  <td>2.3. Agama</td>
											  <td align="center">:  </td>
											  <td>
											  	<?php echo isset($data_grid['agama_ibu']) ? $data_grid['agama_ibu']:""; ?>
											 </td>
											</tr>
											
										   <tr>
											  <td>2.4. Pendidikan Terakhir </td>
											  <td align="center">:  </td>
											  <td>  <?php echo isset($data_grid['pendidikan_ibu']) ? $this->Acuan_model->get_kondisi($data_grid['pendidikan_ibu'],"id","tm_pendidikan","nama"):""; ?>
											  
											
											</td>
											</tr>
											
											  <tr>
											  <td>2.5. Pekerjaan </td>
											  <td align="center">:  </td>
											  <td>  <?php echo isset($data_grid['pekerjaan_ibu']) ? $this->Acuan_model->get_kondisi($data_grid['pekerjaan_ibu'],"id","tm_pekerjaan","nama"):""; ?>
											 
											</td>
											</tr>
											
											  <tr>
											  <td>2.6. Warga Negara</td>
											  <td align="center">:  </td>
											  <td>  <?php echo isset($data_grid['warganegaraibu']) ? $data_grid['warganegaraibu']:""; ?>
											</td>
											</tr>
											
											  <tr>
											  <td>2.7. Pekerjaan </td>
											  <td align="center">:  </td>
											  <td>  <?php echo isset($data_grid['pekerjaan_ibu']) ? $this->Acuan_model->get_kondisi($data_grid['pekerjaan_ibu'],"id","tm_pekerjaan","nama"):""; ?>
											 
											</td>
											</tr>
											
											<tr>
											  <td colspan="3">2.8. Alamat dan nomor telepon </td>
											
											</td>
											</tr>
											
											  <tr>
											  <td>&nbsp;&nbsp; 2.8.1. Rumah  </td>
											  <td align="center">:  </td>
											  <td> <?php echo isset($data_grid['rumah_ibu']) ? $data_grid['rumah_ibu']:""; ?>
											</td>
											</tr>
											
											 <tr>
											  <td>&nbsp;&nbsp; 2.8.2. Kantor </td>
											  <td align="center">:  </td>
											  <td> <?php echo isset($data_grid['kantor_ibu']) ? $data_grid['kantor_ibu']:""; ?>
											</td>
											</tr>

										   <tr>
											  <td>&nbsp;&nbsp; 2.8.3. Handphone </td>
											  <td align="center">:  </td>
											  <td> <?php echo isset($data_grid['hp_ibu']) ? $data_grid['hp_ibu']:""; ?>
											</td>
											</tr>

										    <tr>
											  <td>&nbsp;&nbsp; 2.8.4. Email  </td>
											  <td align="center">:  </td>
											  <td> <?php echo isset($data_grid['email_ibu']) ? $data_grid['email_ibu']:""; ?>
											</td>
											</tr>



										</table>
									  
									  <div class="form-group">
											<label class="col-md-10 control-label;float:left;">&nbsp; &nbsp; 3. Wali : 
											
											
											
										</div>
										
										<table>
										
											<tr>
											 <td width="30%">3.1. Nama</td>
											  <td align="center" width="10%">:  </td>
											  <td>
											  <?php echo isset($data_grid['nama_wali']) ? $data_grid['nama_wali']:"-"; ?>
											 </td>
											</tr>
											
											<tr>
											  <td>3.2. Tempat/Tanggal Lahir </td>
											  <td align="center">:  </td>
											  <td>
											  
												    <?php echo isset($data_grid['tempat_lahir_wali']) ? $data_grid['tempat_lahir_wali']:""; ?>, <?php echo isset($data_grid['tgl_lahir_wali']) ? $this->Acuan_model->formattanggaldb($data_grid['tgl_lahir_wali']):""; ?>
									
											 </td>
											</tr>
											
												<tr>
											  <td>3.3. Agama</td>
											  <td align="center">:  </td>
											  <td>
											  	<?php echo isset($data_grid['agama_wali']) ? $data_grid['agama_wali']:""; ?>
											 </td>
											</tr>
											
										   <tr>
											  <td>3.4. Pendidikan Terakhir </td>
											  <td align="center">:  </td>
											  <td>  <?php echo isset($data_grid['pendidikan_wali']) ? $this->Acuan_model->get_kondisi($data_grid['pendidikan_wali'],"id","tm_pendidikan","nama"):""; ?>
											  
											
											</td>
											</tr>
											
											  <tr>
											  <td>3.5. Pekerjaan </td>
											  <td align="center">:  </td>
											  <td>  <?php echo isset($data_grid['pekerjaan_wali']) ? $this->Acuan_model->get_kondisi($data_grid['pekerjaan_wali'],"id","tm_pekerjaan","nama"):""; ?>
											 
											</td>
											</tr>
											
											  <tr>
											  <td>3.6. Warga Negara</td>
											  <td align="center">:  </td>
											  <td>  <?php echo isset($data_grid['warganegarawali']) ? $data_grid['warganegarawali']:""; ?>
											</td>
											</tr>
											
											  <tr>
											  <td>3.7. Pekerjaan </td>
											  <td align="center">:  </td>
											  <td>  <?php echo isset($data_grid['pekerjaan_wali']) ? $this->Acuan_model->get_kondisi($data_grid['pekerjaan_wali'],"id","tm_pekerjaan","nama"):""; ?>
											 
											</td>
											</tr>
											
											<tr>
											  <td colspan="3">3.8. Alamat dan nomor telepon </td>
											
											</td>
											</tr>
											
											  <tr>
											  <td>&nbsp;&nbsp; 3.8.1. Rumah  </td>
											  <td align="center">:  </td>
											  <td> <?php echo isset($data_grid['rumah_wali']) ? $data_grid['rumah_wali']:""; ?>
											</td>
											</tr>
											
											 <tr>
											  <td>&nbsp;&nbsp; 3.8.2. Kantor </td>
											  <td align="center">:  </td>
											  <td> <?php echo isset($data_grid['kantor_wali']) ? $data_grid['kantor_wali']:""; ?>
											</td>
											</tr>

										   <tr>
											  <td>&nbsp;&nbsp; 3.8.3. Handphone </td>
											  <td align="center">:  </td>
											  <td> <?php echo isset($data_grid['hp_wali']) ? $data_grid['hp_wali']:""; ?>
											</td>
											</tr>

										    <tr>
											  <td>&nbsp;&nbsp; 3.8.4. Email  </td>
											  <td align="center">:  </td>
											  <td> <?php echo isset($data_grid['email_wali']) ? $data_grid['email_wali']:""; ?>
											</td>
											</tr>



										</table>
									  
										
										<div class="form-group">
											
											<div class="col-md-10">
												<p style="float:left; font-weight: bold;font-size:15px"><b>D. MUTASI (Jika pindahan) </b></p>
											</div>
										</div>
									
										<table>
										
											<tr>
											  <td width="30%">1. Asal Sekolah</td>
											  <td align="center" width="10%">:  </td>
											  <td>
											  <?php echo isset($data_grid['sekolah_asal']) ? $data_grid['sekolah_asal']:"-"; ?>
											 </td>
											</tr>
											
										   <tr>
											  <td>2. Alamat </td>
											  <td align="center">:  </td>
											  <td><?php echo $data_grid['alamat_sekolah_asal'] ;  ?>
											</td>
											</tr>
											<tr>
											  <td>3. NISN </td>
											  <td align="center">:  </td>
											  <td><?php echo $data_grid['nisn'] ;  ?>
											</td>
											</tr>

											
										


										</table>
										
										
										<div class="form-group">
											
											<div class="col-md-10">
												<p style="float:left; font-weight: bold;font-size:15px"><b>E. KETERANGAN LAIN-LAIN TENTANG SISWA/I</b></p>
											</div>
										</div>
									  <table>
										
											<tr>
											  <td width="30%">1. Tinggal Bersama </td>
											  <td align="center" width="10%">:  </td>
											  <td>
											  	<?php echo isset($data_grid['tinggalbersama']) ? $data_grid['tinggalbersama']:""; ?>
															
											 </td>
											</tr>
											
										   <tr>
											  <td>2. Jarak dari tempat tinggal ke sekolah </td>
											  <td align="center">:  </td>
											  <td> <?php echo isset($data_grid['jarak_tempuh']) ? $data_grid['jarak_tempuh']:""; ?>
											</td>
											</tr>
											<tr>
											  <td>3. Berangkat Sekolah </td>
											  <td align="center">:  </td>
											  <td><?php echo isset($data_grid['berangkat']) ? $data_grid['berangkat']:""; ?>
											</td>
											</tr>
											
											<tr>
											  <td>4. Bakat/Minat yang Menonjol </td>
											  <td align="center">:  </td>
											  <td> <?php echo isset($data_grid['bakat']) ? $data_grid['bakat']:""; ?>
																	
											</td>
											</tr>
											
											<tr>
											  <td>5. Golongan Darah</td>
											  <td align="center">:  </td>
											  <td><?php echo isset($data_grid['golongan_darah']) ? $data_grid['golongan_darah']:""; ?>
																	
											</td>
											</tr>

											
										


										</table>
										
										 
										 
										<div class="form-group">
											
											<div class="col-md-10">
												<p style="float:left; font-weight: bold;font-size:15px"><b>F. INFORMASI KEADAAN JASMANI DAN KESEHATAN  </b></p>
											</div>
										</div>
									
										
										
										<div class="form-group">
											<label class="col-md-4 control-label;float:left;" style="padding:0px 0px 0px 70px">1. Keadaan pada waktu anak dalam kandungan <span class="required"></span>: 
											
											<?php echo isset($data_grid['kandungan']) ? $data_grid['kandungan']:""; ?>
																	
												               
											</div>
										</div>
										
											<div class="form-group">
											<label class="col-md-4 control-label;float:left;" style="padding:0px 0px 0px 70px">2. Keadaan pada waktu kelahiran anak  <span class="required"></span>: 
											
												<?php echo isset($data_grid['kelahiran']) ? $data_grid['kelahiran']:""; ?>
										
												              
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-4 control-label;float:left;" style="padding:0px 0px 0px 70px">3. Perkembangan anak dalam 12 bulan pertama   <span class="required"></span>: 
											
												              
																<?php echo isset($data_grid['keadaanbalita']) ? $data_grid['keadaanbalita']:""; ?>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-4 control-label;float:left;" style="padding:0px 0px 0px 70px">4. Anak disusui oleh Ibunya/wanita lain, selama    <span class="required"></span>: 
											
												               
															   <?php echo isset($data_grid['lamasusu']) ? $data_grid['lamasusu']:""; ?>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-4 control-label;float:left;" style="padding:0px 0px 0px 70px">5. Makanan tambahan yang diberikan setelah 3 bulan     <span class="required"></span>: 
											
												            
															    <?php echo isset($data_grid['makanantambahan']) ? $data_grid['makanantambahan']:""; ?>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-4 control-label;float:left;" style="padding:0px 0px 0px 70px">6. Kelainan pada tubuh    <span class="required"></span>: 
											
												             
															    <?php echo isset($data_grid['kelainanjasmani']) ? $data_grid['kelainanjasmani']:""; ?>
											</div>
										</div>
										

									   <div class="form-group">
											
											<div class="col-md-10">
												<p style="float:left; font-weight: bold;font-size:15px"><b>G. PENYAKIT BERAT / KECELAKAAN YANG PERNAH DIALAMI </b></p>
											</div>
										</div>
									
										
									
									<!--	   <div class="table-responsive">
										  <table class="table table-striped">
											  <thead>
											    <tr>
											    <th> No </th>
											    <th> Jenis Penyakit / Kecelakaan </th>
											    <th> Waktu sakit pada umur </th>
											    <th> Lama Sakit </th>
										        </tr>
											 </thead>
											 <tbody>
											   <?php 
											    $sql = $this->db->query("select * from tr_penyakit where tmsiswa_id='".$data_grid['id_now']."'")->result();
												 if(count($sql) >0):
												  $p=1;
											      foreach($sql as $i=>$s):
												?>
												  <tr>
												    <td><?php echo $p++; ?></td>
												    <td> <?php echo $s->penyakit; ?></td>
												    <td>  <?php echo $s->waktu; ?> </td>
												    <td> <?php echo $s->lama; ?> </td>
												  </tr>
												 <?php 
												endforeach;
												 else:
												 ?>
												  <tr>
												    <td colspan="4">Inputan Tidak Di Temukan</td>
												    
												  </tr>
												 <?php 
												 
												endif;
												
											 ?>
												  </tbody>
										   </table>
										  </div> -->
									