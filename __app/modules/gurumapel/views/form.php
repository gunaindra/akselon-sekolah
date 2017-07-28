<?php $attributes = array('class' => 'form-horizontal', 'role'=>'form','name' => 'simpan', 'id' => 'simpan', 'method' => "post", 'url' =>site_url("gurumapel/save")); ?>
<?php echo form_open("javascript:void(0)", $attributes); ?>
<input type="hidden" name="id" class="form-control" value="<?php echo isset($dataform->id) ? $dataform->id:"";  ?>">
<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								 Form Guru Mata Pelajaran
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
												<div class="input-icon right">
												    <i class="fa fa-search"></i>
													<input type="hidden"  name="tmpegawai_id" readonly value="<?php echo isset($dataform->id) ? $dataform->id:"";  ?>" placeholder="" class="form-control"  id="tmpegawai_id" >
													<input type="text"  name="" readonly value="<?php echo isset($dataform->nama) ? $dataform->nama:"";  ?>" placeholder="" class="form-control"  id="loadguru" class="btn btn-success" data-toggle="modal" data-target="#modalguru">
												</div>										
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
												   $pelajaran = $this->Acuan_model->get_wherearray("tm_pelajaran",array("tmsekolah_id"=>$_SESSION['tmsekolah_id'],"status !="=>3));
												   
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
										  
										 </tbody>
										 <input type="hidden" id="jumlah" name="jumlah" value="0">
									  </table>
									 
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
									  <li> Klik Tombol "Tambah Mata Pelajaran" Untuk Memasukan Mata Pelajaran</li>
									  <li> Tanda (*) Wajib di isi</li>
									 </ol>
								</div>
						</div>
</div>
						
							<?php echo form_close(); ?>
							
					<div id="modalguru" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Data Guru </h4>
								</div>
								<div class="modal-body" id="bodyguru">
									
									loading..
									
									
							   </div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
					
					<script>
					 $(document).off('click', '#loadguru').on('click', '#loadguru', function (event, messages) {
							var id = $(this).attr("guru");
						   $.post("<?php echo site_url("gurumapel/guru"); ?>",{id:id},function(data){
							   
							   $("#bodyguru").html(data).show();
						   })
						});
						
					 $(document).off('click', '.pilih').on('click', '.pilih', function (event, messages) {
							var tmpegawai_id  = $(this).attr("datanya");
							var namanya       = $(this).attr("namanya");
							
							$("#tmpegawai_id").val(tmpegawai_id);
							$("#loadguru").val(namanya);
							
							 $('#modalguru').modal('toggle');
						   
						});
						
						
						 $(document).off('click', '#tambahpelajaran').on('click', '#tambahpelajaran', function (event, messages) {
									var tmpegawai_id  = $("#tmpegawai_id").val();									
									var tmpelajaran_id     = $("#tmpelajaran_id").val();
									var jumlah 			= parseInt($("#jumlah").val()) +1;
									var namapelajaran	= $("#tmpelajaran_id option:selected").text();
									
									  if(tmpegawai_id =="" | tmpelajaran_id==""){
										  
										  alertify.alert("Nama Guru dan Pelajaran Di Perlukan");
										  return false;
									  }
									
									
									var html = "<tr id='row"+jumlah+"'>";
									html +="<td>-</td>";
									html +="<td><input type='hidden' name='tmpelajaran_id"+jumlah+"' value='"+tmpelajaran_id+"'>"+namapelajaran+"</td>";
									
									html +="<td><button type='button' class='btn btn-success bataltambah'  row='"+jumlah+"' ><i class='fa fa-remove'></i> </button> </td>";
									html +="</tr>";
								$("#jumlah").val(jumlah);
								$("#loadmapel").append(html);
						   
						});
						
						$(document).off('click', '.bataltambah').on('click', '.bataltambah', function (event, messages) {
									
								jumlah = $(this).attr("row");
								$("#row"+jumlah).remove();
						   
						});

					</script>
						
			
							
							
							