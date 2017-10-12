                                <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Jenjang Pendidikan <span class="required">*</span></label>
											 <div class="col-md-9">
												  <select class="form-control onchange" name="k[tmjenjang_id]" url="<?php echo site_url("ruang/selectkelas"); ?>" target="tmkelas_id">
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
											 <label class="col-md-3 control-label" style="text-align:left"> Kelas <span class="required">*</span></label>
											 <div class="col-md-9">
											 
												<select class="form-control tmkelas_id onchange" name="k[tmkelas_id]"  url="<?php echo site_url("ruang/selectruang"); ?>" target="tmruang_id">
												     <option value="">- Pilih Kelas -</option>
													   <?php 
													   if(isset($kelas)){
													     foreach($kelas as $row){
															 
															 ?><option value='<?php echo $row->id; ?>' <?php echo (isset($dataform)) ?  ($dataform->tmkelas_id==$row->id) ? "selected":"" :"" ?>><?php echo $row->nama; ?></option>"<?php 
														 }
													   }
													    ?>
												  </select>									
											</div>
									 </div>
									 
									   <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Ruang  <span class="required">*</span></label>
											 <div class="col-md-9">
											 
												 <select class="form-control tmruang_id" name="k[tmruang_id]">
												     <option value="">- Pilih Ruang -</option>
													 
													 <?php 
													   if(isset($ruang)){
													     foreach($ruang as $row){
															 
															 ?><option value='<?php echo $row->id; ?>' <?php echo (isset($dataform)) ?  ($dataform->tmruang_id==$row->id) ? "selected":"" :"" ?>><?php echo $row->nama; ?></option>"<?php 
														 }
													   }
													    ?>
													 
												  </select>									
											</div>
									 </div>
									 
									   <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> NIS  <span class="required">*</span></label>
											 <div class="col-md-9">
											 
												<input type="text" class="form-control" name="s[nis]" value="<?php echo isset($dataform) ? $dataform->nis :"" ?>">							
											</div>
									 </div>
									 
									 <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Nama Lengkap  <span class="required">*</span></label>
											 <div class="col-md-9">
											 
												<input type="text" class="form-control" name="s[nama]" value="<?php echo isset($dataform) ? $dataform->nama :"" ?>">							
											</div>
									 </div>
									 
									  <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Nama Panggilan  <span class="required">*</span></label>
											 <div class="col-md-9">
											 
												<input type="text" class="form-control" name="s[nama_panggilan]" value="<?php echo isset($dataform) ? $dataform->nama_panggilan :"" ?>">							
											</div>
									 </div>
									 
									 <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Tempat/Tanggal Lahir  <span class="required"></span></label>
											 <div class="col-md-4">
											 
												<input type="text" class="form-control" name="s[tempat_lahir]" value="<?php echo isset($dataform) ? $dataform->tempat_lahir :"" ?>">							
											</div>
											 <div class="col-md-4">
											 
												<input type="text" readonly class="form-control" id="tgl_lahir" name="s[tgl_lahir]" value="<?php echo isset($dataform) ? (!empty($dataform->tgl_lahir)) ? $dataform->tgl_lahir : date("d-m-Y") : date("d-m-Y"); ?>">							
											    <script type="text/javascript">
												 $(document).ready(function () {
													 $('#tgl_lahir').datepicker({
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
											 <label class="col-md-3 control-label" style="text-align:left"> Sex  <span class="required"></span></label>
											 <div class="col-md-9">
											       <select class="form-control" name="s[sex]">
												     <option value="Laki-Laki" <?php echo (isset($dataform)) ?  ($dataform->sex=="Laki-Laki") ? "selected":"" :"" ?>>Laki-Laki</option>
												     <option value="Perempuan" <?php echo (isset($dataform)) ?  ($dataform->sex=="Perempuan") ? "selected":"" :"" ?>>Perempuan</option>
													 
												  </select>									
											 </div>
									 </div>
									 
									   <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Alamat <span class="required"></span></label>
											 <div class="col-md-9">
											 
												<textarea class="form-control" name="s[alamat]"> <?php echo isset($dataform) ? $dataform->alamat :"" ?> </textarea>							
											</div>
									 </div>
									  <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> No Handphone <span class="required"></span></label>
											 <div class="col-md-9">
											 
												<input type="text" class="form-control" name="s[hp]" value="<?php echo isset($dataform) ? $dataform->hp :"" ?>">							
											</div>
									 </div>
									  <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Email <span class="required"></span></label>
											 <div class="col-md-9">
											 
												<input type="text" class="form-control" name="s[email]" value="<?php echo isset($dataform) ? $dataform->email :"" ?>">							
											</div>
									 </div>
									 
									  <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Tinggi Badan(CM) <span class="required"></span></label>
											 <div class="col-md-3">
											 
												<input type="number" class="form-control" name="s[tinggi]" value="<?php echo isset($dataform) ? $dataform->tinggi :"" ?>">							
											</div>
											
											<label class="col-md-2 control-label" style="text-align:left"> Berat Badan(KG) <span class="required"></span></label>
											 <div class="col-md-2">
											 
												<input type="number" class="form-control" name="s[berat]" value="<?php echo isset($dataform) ? $dataform->berat :"" ?>">							
											</div>
									 </div>
									 
									 <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Anak Ke <span class="required">*</span></label>
											 <div class="col-md-3">
											 
												<input type="number" class="form-control" name="s[anakke]" value="<?php echo isset($dataform) ? $dataform->anakke :0; ?>">							
											</div>
											
											<label class="col-md-2 control-label" style="text-align:left"> Dari <span class="required">*</span></label>
											 <div class="col-md-2">
											 
												<input type="number" class="form-control" name="s[saudara]" value="<?php echo isset($dataform) ? $dataform->saudara :0; ?>">							
											</div>
											
											<label class="col-md-2 control-label" style="text-align:left"> Saudara <span class="required"></span></label>
									 </div>
									 
									   <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Agama  <span class="required"></span></label>
											 <div class="col-md-9">
											       <select class="form-control" name="s[agama]">
												     <?php 
													   $agama = $this->Acuan_model->agama();
													     foreach($agama as $row){
															 ?><option value="<?php echo $row; ?>"><?php echo $row; ?></option><?php
														 }
													 ?>
												  </select>									
											 </div>
									 </div>
									 
									 