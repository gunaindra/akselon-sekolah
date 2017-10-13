                                
									 <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Nama ibu  <span class="required">*</span></label>
											 <div class="col-md-9">
											 
												<input type="text" class="form-control" name="p[nama_ibu]" value="<?php echo isset($dataform) ? $dataform->nama_ibu :"" ?>">							
											</div>
									 </div>
									 
									  <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Pekerjaan ibu <span class="required"></span></label>
											 <div class="col-md-9">
											 
												<select class="form-control  input-sm" name="p[pekerjaan_ibu]">
												     <option value="">- Pilih Pekerjaan -</option>
													   <?php 
													  
													     foreach($pekerjaan as $row){
															 
															 ?><option value='<?php echo $row->nama; ?>' <?php echo (isset($dataform)) ?  ($dataform->pekerjaan_ibu==$row->nama) ? "selected":"" :"" ?>><?php echo $row->nama; ?></option>"<?php 
														 }
													    ?>
												  </select>
												  
											</div>
									 </div>
									 
									  
									  <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Pendidikan ibu <span class="required"></span></label>
											 <div class="col-md-9">
											 
												<select class="form-control  input-sm" name="p[pendidikan_ibu]">
												     <option value="">- Pilih Pendidikan -</option>
													   <?php 
													  
													     foreach($pendidikan as $row){
															 
															 ?><option value='<?php echo $row->nama; ?>' <?php echo (isset($dataform)) ?  ($dataform->pendidikan_ibu==$row->nama) ? "selected":"" :"" ?>><?php echo $row->nama; ?></option>"<?php 
														 }
													    ?>
												  </select>
												  
											</div>
									 </div>
									 <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Tempat/Tanggal Lahir  <span class="required"></span></label>
											 <div class="col-md-4">
											 
												<input type="text" class="form-control" name="p[tempat_lahir_ibu]" value="<?php echo isset($dataform) ? $dataform->tempat_lahir_ibu :"" ?>">							
											</div>
											 <div class="col-md-4">
											 
												<input type="text" readonly class="form-control" id="tgl_lahir_ibu" name="p[tgl_lahir_ibu]" value="<?php echo isset($dataform) ? (!empty($dataform->tgl_lahir_ibu)) ? $dataform->tgl_lahir_ibu : date("Y-m-d") : date("Y-m-d"); ?>">							
											    <script type="text/javascript">
												 $(document).ready(function () {
													 $('#tgl_lahir_ibu').datepicker({
														 changeMonth: true,
														 changeYear: true,
														 autoclose: true,
														 dateFormat: 'yy-mm-dd',
														 yearRange: '1900:2050',
																																
													 });
												});
                                                </script>
											
											</div>
									 </div>
									 
									  
									   <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Alamat <span class="required"></span></label>
											 <div class="col-md-9">
											 
												<textarea class="form-control" name="p[alamat_ibu]"> <?php echo isset($dataform) ? $dataform->alamat_ibu :"" ?> </textarea>							
											</div>
									 </div>
									  <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> No Handphone <span class="required">*</span></label>
											 <div class="col-md-9">
											 
												<input type="text" class="form-control" name="p[hp_ibu]" value="<?php echo isset($dataform) ? $dataform->hp_ibu :"" ?>">							
											</div>
									 </div>
									  <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Email <span class="required">*</span></label>
											 <div class="col-md-9">
											 
												<input type="email" class="form-control" name="p[email_ibu]" value="<?php echo isset($dataform) ? $dataform->email_ibu :"" ?>">							
											</div>
									 </div>
									 
									 
									 
									 