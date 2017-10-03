<?php $attributes = array('class' => 'form-horizontal', 'role'=>'form','name' => 'simpan', 'id' => 'simpan', 'method' => "post", 'url' =>site_url("datasiswa/save")); ?>
<?php echo form_open("javascript:void(0)", $attributes); ?>
<input type="hidden" name="id" class="form-control" value="<?php echo isset($dataform->id) ? $dataform->id:"";  ?>">
<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								 Detail Siswa
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
												<a href="#datasiswa" data-toggle="tab">
												 Data Siswa  </a>
											</li>
											<li>
												<a href="#sekolahasal" data-toggle="tab">
												 Sekolah Asal
												 </a>
											</li>
											<li>
												<a href="#dataayah" data-toggle="tab">
												Data Ayah </a>
											</li>
											
											<li>
												<a href="#dataibu" data-toggle="tab">
												Data Ibu </a>
											</li>
											
											<li>
												<a href="#datawali" data-toggle="tab">
												Data Wali </a>
											</li>
										</ul>
										
										<div class="tab-content">
											<div class="tab-pane active" id="datasiswa"><?php $this->load->view("d_siswa"); ?></div>
											<div class="tab-pane" id="sekolahasal"><?php $this->load->view("d_sekolah"); ?></div>
											<div class="tab-pane" id="dataayah"><?php $this->load->view("d_ayah"); ?></div>
											<div class="tab-pane" id="dataibu"><?php $this->load->view("d_ibu"); ?></div>
											<div class="tab-pane" id="datawali"><?php $this->load->view("d_wali"); ?></div>
										</div>
								  </div>
									 
						</div>
</div>
						
							<?php echo form_close(); ?>
						
						
				
							
							
							