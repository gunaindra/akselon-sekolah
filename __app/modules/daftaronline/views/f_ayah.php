                                
									 <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Nama Ayah  <span class="required">*</span></label>
											 <div class="col-md-9">
											 
												<input type="text" class="form-control" name="p[nama_ayah]" value="<?php echo isset($dataform) ? $dataform->nama_ayah :"" ?>">							
											</div>
									 </div>
									 
									  <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Pekerjaan Ayah <span class="required"></span></label>
											 <div class="col-md-9">
											 
												<select class="form-control  input-sm" name="p[pekerjaan_ayah]">
												     <option value="">- Pilih Pekerjaan -</option>
													   <?php 
													  
													     foreach($pekerjaan as $row){
															 
															 ?><option value='<?php echo $row->nama; ?>' <?php echo (isset($dataform)) ?  ($dataform->pekerjaan_ayah==$row->nama) ? "selected":"" :"" ?>><?php echo $row->nama; ?></option>"<?php 
														 }
													    ?>
												  </select>
												  
											</div>
									 </div>
									 
									  
									  <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Pendidikan Ayah <span class="required"></span></label>
											 <div class="col-md-9">
											 
												<select class="form-control  input-sm" name="p[pendidikan_ayah]">
												     <option value="">- Pilih Pendidikan -</option>
													   <?php 
													  
													     foreach($pendidikan as $row){
															 
															 ?><option value='<?php echo $row->nama; ?>' <?php echo (isset($dataform)) ?  ($dataform->pendidikan_ayah==$row->nama) ? "selected":"" :"" ?>><?php echo $row->nama; ?></option>"<?php 
														 }
													    ?>
												  </select>
												  
											</div>
									 </div>
									 <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Tempat/Tanggal Lahir  <span class="required"></span></label>
											 <div class="col-md-4">
											 
												<input type="text" class="form-control" name="p[tempat_lahir_ayah]" value="<?php echo isset($dataform) ? $dataform->tempat_lahir_ayah :"" ?>">							
											</div>
											 <div class="col-md-4">
											 
												<input type="text" readonly class="form-control" id="tgl_lahir_ayah" name="p[tgl_lahir_ayah]" value="<?php echo isset($dataform) ? $this->Acuan_model->formattanggalstring($dataform->tgl_lahir_ayah) :""; ?>">							
											    <script type="text/javascript">
												 $(document).ready(function () {
													 $('#tgl_lahir_ayah').datepicker({
														 changeMonth: true,
														 changeYear: true,
														 autoclose: true,
														 dateFormat: 'yy-mm-dd',
																																
													 });
												});
                                                </script>
											
											</div>
									 </div>
									 
									  
									   <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Alamat <span class="required"></span></label>
											 <div class="col-md-9">
											 
												<textarea class="form-control" name="p[alamat_ayah]"> <?php echo isset($dataform) ? $dataform->alamat_ayah :"" ?> </textarea>							
											</div>
									 </div>
									  <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> No Handphone <span class="required">*</span></label>
											 <div class="col-md-9">
											 
												<input type="text" class="form-control" name="p[hp_ayah]" value="<?php echo isset($dataform) ? $dataform->hp_ayah :"" ?>">							
											</div>
									 </div>
									  <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Email <span class="required">*</span></label>
											 <div class="col-md-9">
											 
												<input type="email" class="form-control" name="p[email_ayah]" value="<?php echo isset($dataform) ? $dataform->email_ayah :"" ?>">							
											</div>
									 </div>
									 
									 
									 
									 