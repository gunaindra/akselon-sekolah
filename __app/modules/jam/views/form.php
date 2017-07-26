<?php $attributes = array('class' => 'form-horizontal', 'role'=>'form','name' => 'simpan', 'id' => 'simpan', 'method' => "post", 'url' =>site_url("jam/save")); ?>
<?php echo form_open("javascript:void(0)", $attributes); ?>
<input type="hidden" name="id" class="form-control" value="<?php echo isset($dataform->id) ? $dataform->id:"";  ?>">
<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								 Form Jam Pelajaran
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
											 <label class="col-md-2 control-label" style="text-align:left"> Jam <span class="required">*</span></label>
											 <div class="col-md-2">
												
													<select  class="form-control" name="jam1" required">
					                                      <option value=""> Jam Awal </option>
					                                         <?php 
																for($a=0;$a<=24;$a++){
																	
																	if(strlen($a)==1){
																		
																		$a = "0".$a;
																	}
																	?><option value="<?php echo $a; ?>"><?php echo $a; ?></option><?php
																	
																}
															
															 ?>
													</select>
																						
											</div>
											 
											 <div class="col-md-2"> 
												
													 <select  class="form-control" name="menit1" required">
					                                     <option value=""> Menit Awal </option>
					  
														  <?php 
															for($a=0;$a<=60;$a++){
																
																if(strlen($a)==1){
																	
																	$a = "0".$a;
																}
																?><option value="<?php echo $a; ?>"><?php echo $a; ?></option><?php
																
															}
														
														 ?>
													</select>
																						
											</div>
											
											<div class="col-md-1"> - </div>
											<div class="col-md-2">
												
													<select  class="form-control" name="jam2" required">
					                                   <option value=""> Jam Akhir </option>
					                                         <?php 
																for($a=0;$a<=24;$a++){
																	
																	if(strlen($a)==1){
																		
																		$a = "0".$a;
																	}
																	?><option value="<?php echo $a; ?>"><?php echo $a; ?></option><?php
																	
																}
															
															 ?>
													</select>
																						
											</div>
											 
											 <div class="col-md-2"> 
												
													 <select  class="form-control" name="menit2" required">
					                                   <option value=""> Menit Akhir </option>
					  
														  <?php 
															for($a=0;$a<=60;$a++){
																
																if(strlen($a)==1){
																	
																	$a = "0".$a;
																}
																?><option value="<?php echo $a; ?>"><?php echo $a; ?></option><?php
																
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
						
						
				
							
							
							