<?php $attributes = array('class' => 'form-horizontal', 'role'=>'form','name' => 'simpan', 'id' => 'simpan', 'method' => "post", 'url' =>site_url("kepegawaian/save")); ?>
<?php echo form_open("javascript:void(0)", $attributes); ?>
<input type="hidden" name="id" class="form-control" value="<?php echo isset($dataform->id) ? $dataform->id:"";  ?>">
<input type="hidden" name="f[nama]" class="form-control" value="<?php echo isset($dataform->nama) ? $dataform->nama:"";  ?>">
<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								 Setting Group Users
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
											 <label class="col-md-3 control-label" style="text-align:left"> Group <span class="required"></span></label>
											 <div class="col-md-9">
											 
												<select class="form-control  input-sm" name="f[grup]">
												     <option value="">- Pilih Group Users -</option>
													   <?php 
													     
													     foreach($group as $row){
															 
															 ?><option value='<?php echo $row->id; ?>' <?php echo (isset($dataform)) ?  ($dataform->grup==$row->nama) ? "selected":"" :"" ?>><?php echo $row->nama; ?></option>"<?php 
														 }
													    ?>
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
						
						
				
							
							
							