<?php $attributes = array('class' => 'form-horizontal', 'role'=>'form','name' => 'simpan', 'id' => 'simpan', 'method' => "post", 'url' =>site_url("pelajaran/save")); ?>
<?php echo form_open("javascript:void(0)", $attributes); ?>
<input type="hidden" name="id" class="form-control" value="<?php echo isset($dataform->id) ? $dataform->id:"";  ?>">
<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								 Form Mata Pelajaran
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
									 <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Mata Pelajaran <span class="required">*</span></label>
											 <div class="col-md-9">
												
													<input type="text"  name="f[nama]" value="<?php echo isset($dataform->nama) ? $dataform->nama:"";  ?>" placeholder="ex : Matematika" class="form-control"  >
																						
											</div>
									 </div>
									 
									   <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Status   <span class="required"></span></label>
											 <div class="col-md-9">
											       <select class="form-control" name="f[status]">
												     <option value="1" <?php echo (isset($dataform)) ?  ($dataform->status=="1") ? "selected":"" :"" ?>>KBM</option>
												     <option value="2" <?php echo (isset($dataform)) ?  ($dataform->status=="2") ? "selected":"" :"" ?>>Muatan Lokal</option>
												     <option value="3" <?php echo (isset($dataform)) ?  ($dataform->status=="3") ? "selected":"" :"" ?>>Break</option>
												  
													 
												  </select>									
											 </div>
									 </div>
									 
									 
									 <div class="form-actions">
										<div class="row">
											<div class="col-md-3 navbar-right">
												<button type="submit" class="btn green"><i class="fa fa-save"></i> Simpan</button>
												<button type="button" class="btn default" id="cancel"><i class="fa fa-repeat "></i> Batal</button>
											</div>
										</div>
									</div>
								
								<div class="clear"><br></div>
								<div class="alert alert-info">
									<b> Keterangan </b>
									<ol type="square">
									  <li> Tanda (*) Wajib di isi</li>
									 </ol>
								</div>
						</div>
</div>
						
							<?php echo form_close(); ?>
						
						
				
							
							
							