                                
									 <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Nama wali  <span class="required">*</span></label>
											 <div class="col-md-9">
											 
												<input type="text" class="form-control" name="p[nama_wali]" value="<?php echo isset($dataform) ? $dataform->nama_wali :"" ?>">							
											</div>
									 </div>
									 
									  <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Pekerjaan wali <span class="required"></span></label>
											 <div class="col-md-9">
											 
												<select class="form-control  input-sm" name="p[pekerjaan_wali]">
												     <option value="">- Pilih Pekerjaan -</option>
													   <?php 
													  
													     foreach($pekerjaan as $row){
															 
															 ?><option value='<?php echo $row->nama; ?>' <?php echo (isset($dataform)) ?  ($dataform->pekerjaan_wali==$row->nama) ? "selected":"" :"" ?>><?php echo $row->nama; ?></option>"<?php 
														 }
													    ?>
												  </select>
												  
											</div>
									 </div>
									 
									  
									  <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Pendidikan wali <span class="required"></span></label>
											 <div class="col-md-9">
											 
												<select class="form-control  input-sm" name="p[pendidikan_wali]">
												     <option value="">- Pilih Pendidikan -</option>
													   <?php 
													  
													     foreach($pendidikan as $row){
															 
															 ?><option value='<?php echo $row->nama; ?>' <?php echo (isset($dataform)) ?  ($dataform->pendidikan_wali==$row->nama) ? "selected":"" :"" ?>><?php echo $row->nama; ?></option>"<?php 
														 }
													    ?>
												  </select>
												  
											</div>
									 </div>
									 <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Tempat/Tanggal Lahir  <span class="required"></span></label>
											 <div class="col-md-4">
											 
												<input type="text" class="form-control" name="p[tempat_lahir_wali]" value="<?php echo isset($dataform) ? $dataform->tempat_lahir_wali :"" ?>">							
											</div>
											 <div class="col-md-4">
											 
												<input type="text" readonly class="form-control" id="tgl_lahir_wali" name="p[tgl_lahir_wali]" value="<?php echo isset($dataform) ? (!empty($dataform->tgl_lahir_wali)) ? $dataform->tgl_lahir_wali : date("Y-m-d") : date("Y-m-d"); ?>">							
											    <script type="text/javascript">
												 $(document).ready(function () {
													 $('#tgl_lahir_wali').datepicker({
														 changeMonth: true,
														 changeYear: true,
														 autoclose: true,
														 dateFormat: 'yy-mm-dd',
														 yearRange: '1970:2050',
																																
													 });
												});
                                                </script>
											
											</div>
									 </div>
									 
									  
									   <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Alamat <span class="required"></span></label>
											 <div class="col-md-9">
											 
												<textarea class="form-control" name="p[alamat_wali]"> <?php echo isset($dataform) ? $dataform->alamat_wali :"" ?> </textarea>							
											</div>
									 </div>
									  <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> No Handphone <span class="required">*</span></label>
											 <div class="col-md-9">
											 
												<input type="text" class="form-control" name="p[hp_wali]" value="<?php echo isset($dataform) ? $dataform->hp_wali :"" ?>">							
											</div>
									 </div>
									  <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Email <span class="required">*</span></label>
											 <div class="col-md-9">
											 
												<input type="email" class="form-control" name="p[email_wali]" value="<?php echo isset($dataform) ? $dataform->email_wali :"" ?>">							
											</div>
									 </div>
									 
									 
									 
									 