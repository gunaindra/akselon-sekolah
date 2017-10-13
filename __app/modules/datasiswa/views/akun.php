
<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								 Akun Siswa
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
								
								
							</div>
							<div class="actions">
								
								<a class="btn btn-icon-only btn-default btn-sm fullscreen" href="javascript:;" data-original-title="" title="">
								</a>
								
							</div>
						</div>
						<div class="portlet-body" id="headerawal">
						
						           <div class="row" style="display: none;" id="errorvalidation">
										<div class="col-md-12">
											<div class="note note-success note-bordered" id="messagevalidation"></div>
										</div>
									</div>
									
									<div class="tabbable-custom nav-justified">
										<ul class="nav nav-tabs nav-justified">
											<li class="active">
												<a href="#detail" data-toggle="tab">
												Detail Siswa
												 </a>
											</li>
											<li>
												<a href="#akunsiswa" data-toggle="tab">
												 Akun Siswa  </a>
											</li>
											<li>
												<a href="#ortu" data-toggle="tab">
												Akun Orang Tua
												 </a>
											</li>
										</ul>
										
										<div class="tab-content">

										<div class="tab-pane active" id="detail">
											  <div class="table-responsive">
											     <table class="table ">
												   
												     <tr>
												     	<?php $this->load->view("detail_siswa"); ?>

													 </tr>
												 </table>
											  </div>
												     
											
											</div>
											<div class="tab-pane" id="akunsiswa">
											  <div class="table-responsive">
											     <table class="table table-hover table-stripped table-bordered">
												   
												     <tr>
													    <td width="20%"> NISN (Nomor Induk Sekolah)</td>
													    <td> <?php echo $dataform->nisn; ?></td>
													 </tr>
													  <tr>
													    <td> Password </td>
													    <td> <?php echo $dataform->password; ?></td>
													 </tr>
												 </table>
											  </div>
												     
											
											</div>

											<div class="tab-pane" id="ortu">
											
											<div class="table-responsive">
											     <table class="table table-hover table-stripped table-bordered">
												   
												     <tr>
													    <td width="20%"> Username </td>
													    <td> <?php echo $dataform->username; ?></td>
													 </tr>
													  <tr>
													    <td> Password </td>
													    <td> <?php echo $dataform->passwordortu; ?></td>
													 </tr>
												 </table>
											  </div>
											
											
											</div>
										
										</div>
								  </div>
								
								
								
									 
									
									 
									 
								
								<div class="clear"><br></div>
								<div class="alert alert-info">
									<b> Keterangan </b>
									<ol type="square">
									  <li>Akun Siswa akan digunakan login oleh siswa</li>
									  <li>Username siswa menggunakan NIS(Nomor Induk Sekolah) </li>
									  <li>Akun Orangtua akan digunakan login oleh Orang Tua Siswa yang bersangkutan</li>
									 </ol>
								</div>
								
								 <div class="form-actions">
										<div class="row">
											<div class="col-md-3 navbar-right">
												
												<button type="button" class="btn default" id="cancel"><i class="fa fa-repeat "></i> Tutup</button>
											</div>
										</div>
									</div>
						</div>
</div>
						
							<?php echo form_close(); ?>
						
						
				
							
							
							