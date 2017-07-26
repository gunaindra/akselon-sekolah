<?php $attributes = array('class' => 'form-horizontal', 'role'=>'form','name' => 'simpan', 'id' => 'simpan', 'method' => "post", 'url' =>site_url("persyaratanpendaftaran/save")); ?>
<?php echo form_open("javascript:void(0)", $attributes); ?>
<input type="hidden" name="id" class="form-control" value="<?php echo isset($dataform->id) ? $dataform->id:"";  ?>">
<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								 Form Persyaratan Pendaftaran
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
											 <label class="col-md-3 control-label" style="text-align:left"> Jenjang Pendidikan <span class="required">*</span></label>
											 <div class="col-md-9">
												  <select class="form-control" name="f[tmjenjang_id]">
												     <option value="">- Pilih Jenjang -</option>
													   <?php 
													  
													     foreach($jenjang as $row){
															 
															 ?><option value='<?php echo $row->id; ?>' <?php echo (isset($dataform)) ?  ($dataform->tmjenjang_id==$row->id) ? "selected":"" :"" ?>><?php echo $row->nama; ?></option>"<?php 
														 }
													    ?>
												  </select>
																						
											</div>
									 </div>
									 
									 <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Persyaratan <span class="required">*</span></label>
											 <div class="col-md-9">
												
													<input type="text"  name="f[persyaratan]" value="<?php echo isset($dataform->persyaratan) ? $dataform->persyaratan:"";  ?>" placeholder="ex : Ijazah" class="form-control"  >
																						
											</div>
									 </div>
									 
									  <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Status </label>
											 <div class="col-md-9">
												
													<select class="form-control" name="f[status]">
													  <option value="0" <?php echo isset($dataform->status) ? ($dataform->status==0) ? "selected":"" :"";  ?>>Optional </option>
													  <option value="1" <?php echo isset($dataform->status) ? ($dataform->status==1) ? "selected":"" :"";  ?>>Wajib </option>
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
						
						
				
							
							
							