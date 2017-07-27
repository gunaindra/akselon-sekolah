<?php $attributes = array('class' => 'form-horizontal', 'role'=>'form','name' => 'simpan', 'id' => 'simpan', 'method' => "post", 'url' =>site_url("kepegawaian/save")); ?>
<?php echo form_open("javascript:void(0)", $attributes); ?>
<input type="hidden" name="id" class="form-control" value="<?php echo isset($dataform->id) ? $dataform->id:"";  ?>">
<div class="portlet box red">
	<div class="portlet-title">
		<div class="caption">
			 Form Kepegawaian
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
						 <label class="col-md-3 control-label" style="text-align:left"> NIK <span class="required"></span></label>
						 <div class="col-md-9">
							
								<input type="text"  name="f[nik]" value="<?php echo isset($dataform->nik) ? $dataform->nik:"";  ?>" placeholder="Nomor Induk Kependudukan" class="form-control"  >
																	
						</div>
				 </div>
				  <div class="form-group">
						 <label class="col-md-3 control-label" style="text-align:left"> NIP  <span class="required"></span></label>
						 <div class="col-md-9">
							
								<input type="text"  name="f[nip]" value="<?php echo isset($dataform->nip) ? $dataform->nip:"";  ?>" placeholder="Nomor Induk Kepegawaian" class="form-control"  >
																	
						</div>
				 </div>
				 <div class="form-group">
						 <label class="col-md-3 control-label" style="text-align:left"> Nama <span class="required">*</span></label>
						 <div class="col-md-9">
							
								<input type="text"  name="f[nama]" value="<?php echo isset($dataform->nama) ? $dataform->nama:"";  ?>" placeholder="" class="form-control"  >
																	
						</div>
				 </div>
				 
				  <div class="form-group">
						 <label class="col-md-3 control-label" style="text-align:left"> Tempat/Tanggal Lahir  <span class="required"> *</span></label>
						 <div class="col-md-4">
						 
							<input type="text" class="form-control" name="f[tempat]" value="<?php echo isset($dataform) ? $dataform->tempat :"" ?>">							
						</div>
						 <div class="col-md-4">
						 
							<input type="text" readonly class="form-control" id="tgl_lahir" name="f[tgl_lahir]" value="<?php echo isset($dataform) ? (!empty($dataform->tgl_lahir)) ? $dataform->tgl_lahir : date("Y-m-d") : date("Y-m-d"); ?>">							
						    <script type="text/javascript">
							 $(document).ready(function () {
								 $('#tgl_lahir').datepicker({
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
						 <label class="col-md-3 control-label" style="text-align:left"> Gender  <span class="required"></span></label>
						 <div class="col-md-9">
						       <select class="form-control" name="f[jk]">
							     <option value="Laki-Laki" <?php echo (isset($dataform)) ?  ($dataform->jk=="Laki-Laki") ? "selected":"" :"" ?>>Laki-Laki</option>
							     <option value="Perempuan" <?php echo (isset($dataform)) ?  ($dataform->jk=="Perempuan") ? "selected":"" :"" ?>>Perempuan</option>
								 
							  </select>									
						 </div>
				 </div>
				 
				  <div class="form-group">
						 <label class="col-md-3 control-label" style="text-align:left"> Alamat <span class="required"></span></label>
						 <div class="col-md-9">
						 
							<textarea class="form-control" name="f[alamat]"> <?php echo isset($dataform) ? $dataform->alamat :"" ?> </textarea>							
						</div>
				 </div>
				  <div class="form-group">
						 <label class="col-md-3 control-label" style="text-align:left"> No Handphone <span class="required"></span></label>
						 <div class="col-md-9">
						 
							<input type="text" class="form-control" name="f[hp]" value="<?php echo isset($dataform) ? $dataform->hp :"" ?>">							
						</div>
				 </div>
				  <div class="form-group">
						 <label class="col-md-3 control-label" style="text-align:left"> Email <span class="required"></span></label>
						 <div class="col-md-9">
						 
							<input type="text" class="form-control" name="f[email]" value="<?php echo isset($dataform) ? $dataform->email :"" ?>">							
						</div>
				 </div>
				  <div class="form-group">
						 <label class="col-md-3 control-label" style="text-align:left"> Status Pegawai  <span class="required"></span></label>
						 <div class="col-md-9">
						       <select class="form-control" name="f[status_pegawai]">
							     <option value="PNS" <?php echo (isset($dataform)) ?  ($dataform->status_pegawai=="PNS") ? "selected":"" :"" ?>>PNS</option>
							     <option value="Honorer" <?php echo (isset($dataform)) ?  ($dataform->status_pegawai=="Honorer") ? "selected":"" :"" ?>>Honorer</option>
								 
							  </select>									
						 </div>
				 </div>
				 
				  <div class="form-group">
					 <label class="col-md-3 control-label" style="text-align:left"> Status Jabatan  <span class="required"></span></label>
					 <div class="col-md-9">
					       <select class="form-control" name="f[status_jabatan]" id="selectone" onclick="AnEventHasOccurred()">
						     <option value="pimpinan" <?php echo (isset($dataform)) ?  ($dataform->status_pegawai=="pimpinan") ? "selected":"" :"" ?>>Pimpinan </option>
						     <option value="guru" <?php echo (isset($dataform)) ?  ($dataform->status_pegawai=="guru") ? "selected":"" :"" ?>>Guru </option>
						     <option value="staff" <?php echo (isset($dataform)) ?  ($dataform->status_pegawai=="staff") ? "selected":"" :"" ?>> Staff </option>
						  </select>									

					 </div>
				 </div>
				<input type="hidden" id="grup" class="form-control" name="f[grup]" value="<?php echo isset($dataform) ? $dataform->grup :"" ?>">	

					<script type="text/javascript">
					function AnEventHasOccurred() {
					var sel = document.getElementById("selectone");
					var y = "1";
					var x =  sel.options[sel.selectedIndex].value;
						if(x=="pemimpin"){
							y = "1";
						}
						else if(x=="guru"){
							y = "4";
						}
				    document.getElementById("grup").value = y;
					}
					</script>



				   <div class="form-group">
						 <label class="col-md-3 control-label" style="text-align:left"> Pendidikan Terakhir <span class="required"></span></label>
						 <div class="col-md-9">
						 
							<select class="form-control  input-sm" name="f[pendidikan]">
							     <option value="">- Pilih Pendidikan -</option>
								   <?php 
								     
								     foreach($pendidikan as $row){
										 
										 ?><option value='<?php echo $row->nama; ?>' <?php echo (isset($dataform)) ?  ($dataform->pendidikan==$row->nama) ? "selected":"" :"" ?>><?php echo $row->nama; ?></option>"<?php 
									 }
								    ?>
							  </select>
							  
						</div>
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
						
						
				
							
							
							