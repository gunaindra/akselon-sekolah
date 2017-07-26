<?php $attributes = array('class' => 'form-horizontal', 'role'=>'form','name' => 'simpan', 'id' => 'simpankk', 'method' => "post", 'url' =>site_url("gurumapel/save")); ?>
<?php echo form_open("javascript:void(0)", $attributes); ?>
<input type="hidden" name="id" id="tmpegawai_id" class="form-control" value="<?php echo isset($dataform->id) ? $dataform->id:"";  ?>">
<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								 Form Edit Guru Mata Pelajaran
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
											 <label class="col-md-3 control-label" style="text-align:left"> Nama Guru <span class="required">*</span></label>
											 <div class="col-md-9">
														<?php echo isset($dataform->nama) ? $dataform->nama:"";  ?>							
											</div>
									 </div>
									 
									 <div class="table-responsive">
									   <table class="table table-hover">
									     <thead>
										   <tr>
										     <th>#</th>
										     <th>
											   <select class="form-control" id="tmpelajaran_id">
											     <option value=""> -Pilih- </option>
												 <?php 
												   $pelajaran = $this->Acuan_model->get_wherearray("public.tm_pelajaran",array("tmsekolah_id"=>$_SESSION['tmsekolah_id'],"status !="=>3));
												   
												      foreach($pelajaran as $row){
														  
														  ?><option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
													  <?php 
													  }
												  
												   ?>
											   
											   
											   </select>
											 
											 
											 </th>
										     <th>
											     <a href="javascript:void(0);" id="tambahpelajaran"  class="btn btn-success tooltips" data-container="body" data-placement="right" title="Tambah Pelajaran"><i class="fa fa-plus"></i> Tambah Mata Pelajaran</a>
								
											 </th>
											</tr>
										 </thead>
										 
										 <tbody id="loadmapel">
										   
										         <?php 
												   $mapel = $this->Acuan_model->get_wherearray("view.v_gurumapel",array("tmpegawai_id"=>$dataform->id));
												     
												      foreach($mapel as $row){
														  
														  ?>
														  <tr id="row<?php echo $row->id; ?>">
														    <td>-</td>
														    <td><?php echo $row->matapelajaran; ?></td>
														    <td><button type='button' class='btn btn-success hapusmapel'  datanya="<?php echo $row->id; ?>" ><i class='fa fa-remove'></i> </button> </td>
														 </tr>
													  <?php 
													  }
												  
												   ?>
										  
										 </tbody>
										
									  </table>
									 
									</div>
									 
									 <div class="form-actions">
										<div class="row">
											<div class="col-md-3 navbar-right">
											
												<button type="button" class="btn default" id="cancel"><i class="fa fa-repeat "></i> Selesai </button>
											</div>
										</div>
									</div>
								
								<div class="clear"><br></div>
								<div class="alert alert-info">
									<b> Keterangan </b>
									<ol type="square">
									  <li> Klik Tombol "Tambah Mata Pelajaran" Untuk Menambah Mata Pelajaran</li>
									  <li> Data Langsung Tersimpan , jika sudah selesai klik tombol "selesai"</li>
									  <li> Tanda (*) Wajib di isi</li>
									 </ol>
								</div>
						</div>
</div>
						
		</form>					
					
					<script>
					
						
						 $(document).off('click', '#tambahpelajaran').on('click', '#tambahpelajaran', function (event, messages) {
									var tmpegawai_id  = $("#tmpegawai_id").val();									
									var tmpelajaran_id     = $("#tmpelajaran_id").val();
									
									   if(tmpegawai_id =="" | tmpelajaran_id==""){
										  
										  alertify.alert("Pelajaran Di Perlukan");
										  return false;
									  }
									
									loading();
									  $.post("<?php echo site_url("gurumapel/saveubah"); ?>",{tmpegawai_id:tmpegawai_id,tmpelajaran_id:tmpelajaran_id},function(data){
										  
										  $("#loadmapel").html(data);
										  jQuery.unblockUI({ });
									  })
								
						   
						});
						
						$(document).off('click', '.hapusmapel').on('click', '.hapusmapel', function (event, messages) {
									var datanya = $(this).attr("datanya");
									alertify.confirm("Apakah anda yakin akan menghapus data ini ?",function(){
								    loading();
									  $.post("<?php echo site_url("gurumapel/hapusmapel"); ?>",{datanya:datanya},function(data){
										  
										  $("#row"+datanya).remove();
										  jQuery.unblockUI({ });
									  })
									})
						   
						});

					</script>
						
			
							
							
							