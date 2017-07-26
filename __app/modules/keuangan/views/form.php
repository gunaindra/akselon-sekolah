<?php $attributes = array('class' => 'form-horizontal', 'role'=>'form','name' => 'simpan', 'id' => 'simpan', 'method' => "post", 'url' =>site_url("keuangan/save")); ?>
<?php echo form_open("javascript:void(0)", $attributes); ?>
<input type="hidden" name="id" class="form-control" value="<?php echo isset($dataform->id) ? $dataform->id:"";  ?>">
<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								 Form Item Tagihan
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
									       <label class="col-md-3 control-label" style="text-align:left"> Jenjang  <span class="required">*</span></label>
											 <div class="col-md-9">
											     <select class="form-control onchange " name="f[tmjenjang_id]" id="tmjenjang_id" url="<?php echo site_url("ruang/selectkelas"); ?>" target="tmkelas_id">
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
										  <label class="col-md-3 control-label" style="text-align:left"> Kelas  <span class="required">*</span></label>
											 <div class="col-md-9">
											  <select class="form-control tmkelas_id onchange" name="f[tmkelas_id]" id="tmkelas_id" url="<?php echo site_url("ruang/selectruang"); ?>" target="tmruang_id">
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
											 <label class="col-md-3 control-label" style="text-align:left">Item Tagihan <span class="required">*</span></label>
											 <div class="col-md-9">
												
													<input type="text"  name="f[nama]" value="<?php echo isset($dataform->nama) ? $dataform->nama:"";  ?>" placeholder="ex : SPP Maret 2017 " class="form-control"  >
																						
											</div>
									 </div>
									 
									  <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left">Jumlah Tagihan <span class="required">*</span></label>
											 <div class="col-md-9">
												
													<input type="text"  name="jumlah" onkeyup="FormatCurrency(this)" value="<?php echo isset($dataform->jumlah) ? $dataform->jumlah:"";  ?>" placeholder="" class="form-control"  >
																						
											</div>
									 </div>
									 
									   <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Kategori Pembayaran   <span class="required"></span></label>
											 <div class="col-md-9">
											       <select class="form-control" name="f[kategori]">
												     <?php 
													   $kategori = $this->Model_data->kategori();
													   foreach($kategori as $row){
													 ?>
													  
												        <option value="<?php echo $row; ?>" <?php echo (isset($dataform)) ?  ($dataform->kategori==$row) ? "selected":"" :"" ?>><?php echo $row; ?></option>
												     <?php 
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
						
						
				
							
							
							