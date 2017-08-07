<?php $attributes = array('class' => 'form-horizontal', 'role'=>'form','name' => 'simpan', 'id' => 'simpan', 'method' => "post", 'url' =>site_url("gurumapel/save")); ?>
<?php echo form_open("javascript:void(0)", $attributes); ?>

<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								 <?php echo $title; ?>
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
											 <label class="col-md-3 control-label" style="text-align:left"> Nama Siswa <span class="required">*</span></label>
											 <div class="col-md-5">
												
												    
													<input type="hidden"  name="tmsiswa_id" readonly  placeholder="" class="form-control"  id="tmsiswa_id" >
													<input type="text" data-toggle="modal" data-target="#modalsiswa"  name="" readonly id="namasiswa" placeholder="" class="loadsiswa form-control"  >
																						
											</div>
											<div class="col-md-4">
												<button type="button"  class="loadsiswa btn btn-success" data-toggle="modal" data-target="#modalsiswa"> <i class="fa fa-search"> </i> Cari Siswa </button>								
											</div>
									 </div>
									 
									  <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Jenjang <span class="required"></span></label>
											 
											<div class="col-md-9" id="jenjang">
												-						
											</div>
									 </div>
									 <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Kelas <span class="required"></span></label>
											 
											<div class="col-md-9" id="kelas">
												-						
											</div>
									 </div>
									 <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Ruang <span class="required"></span></label>
											 
											<div class="col-md-9" id="ruang">
												-						
											</div>
									 </div>
									  <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Harus Kembali <span class="required"></span></label>
											
											 <div class="col-md-3">
											 
												<input type="text" readonly class="form-control" id="harus_kembali"  value="<?php 
												$date = date("Y-m-d");
											 	$date = strtotime($date);
											 	$date = strtotime("+7 day", $date);
											 	echo date('Y-m-d', $date);  ?>">							
											    <script type="text/javascript">
												 $(document).ready(function () {
													 $('#harus_kembali').datepicker({
														 changeMonth: true,
														 changeYear: true,
														 autoclose: true,
														 dateFormat: 'yy-mm-dd',
																																
													 });
												});
                                                </script>
											
											</div>
									 </div>
									 
									 
									 
									 <div class="table-responsive">
									   <table class="table table-hover">
									     <thead>
										   <tr>
										     <th>#</th>
										     <th>
											   
											 	<input type="hidden"  id="tmbuku_id" >
											 	<input type="text"  id="barcode" data-toggle="modal" data-target="#modalbuku"   placeholder="Scan Barcode atau klik Judul Buku" class="form-control loadbuku"   >
												
											 
											 </th>
											  <th>
											   
											 	
											 	<input type="text"  id="judulbuku" readonly  placeholder="Judul Buku" data-toggle="modal" data-target="#modalbuku" class="form-control loadbuku"   >
												
											 
											 </th>
										     <th>
											     <a href="javascript:void(0);" id="tambahbuku"  class="btn btn-success tooltips" data-container="body" data-placement="right" title="Tambah Buku"><i class="fa fa-save"></i> Tambah Buku </a>
								
											 </th>
											</tr>
										 </thead>
										 
										 <tbody id="loadpeminjaman">
										  
										 </tbody>
										
									  </table>
									 
									</div>
									 
								
								
								<div class="clear"><br></div>
								<div class="alert alert-info">
									<b> Keterangan </b>
									<ol type="square">
									  <li> Klik Tombol "Tambah Buku" Untuk Memasukan Buku yang dipinjam</li>
									  <li> Tanda (*) Wajib di isi</li>
									 </ol>
								</div>
									
						</div>
</div>
						
							<?php echo form_close(); ?>
							
					<div id="modalsiswa" class="modal fade" role="dialog">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Data Siswa </h4>
								</div>
								<div class="modal-body" id="bodysiswa">
									
									loading..
									
									
							   </div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
					
					
					<div id="modalbuku" class="modal fade" role="dialog">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Data Buku </h4>
								</div>
								<div class="modal-body" id="bodybuku">
									
									loading..
									
									
							   </div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
					
					<script>
					 $("#barcode").focus();
					 
					 
					 $(document).off('click', '.loadsiswa').on('click', '.loadsiswa', function (event, messages) {
							
						   $.post("<?php echo site_url("peminjamanbuku/siswa"); ?>",function(data){
							   
							   $("#bodysiswa").html(data).show();
						   })
						});
						
						
						
						
					 $(document).off('click', '.pilihsiswa').on('click', '.pilihsiswa', function (event, messages) {
							
							
							$("#tmsiswa_id").val($(this).attr("tmsiswa_id"));
							$("#namasiswa").val($(this).attr("namasiswa"));
							$("#jenjang").text($(this).attr("jenjang"));
							$("#kelas").text($(this).attr("kelas"));
							$("#ruang").text($(this).attr("ruang"));
							
							 $('#modalsiswa').modal('toggle');
						   
						});
						
						
						
						 $(document).off('click', '.loadbuku').on('click', '.loadbuku', function (event, messages) {
							
						   $.post("<?php echo site_url("peminjamanbuku/buku"); ?>",function(data){
							   
							   $("#bodybuku").html(data).show();
						   })
						});
						
						
						
						
					 $(document).off('click', '.pilihbuku').on('click', '.pilihbuku', function (event, messages) {
							
							
							$("#tmbuku_id").val($(this).attr("tmbuku_id"));
							$("#barcode").val($(this).attr("barcode"));
							$("#judulbuku").val($(this).attr("judulbuku"));
							
							
							 $('#modalbuku').modal('toggle');
						   
						});
						
						
						 $(document).off('click', '#tambahbuku').on('click', '#tambahbuku', function (event, messages) {
									var tmsiswa_id         = $("#tmsiswa_id").val();									
									var tmbuku_id          = $("#tmbuku_id").val();
									var harus_kembali      = $("#harus_kembali").val();
									
									
									  if(tmsiswa_id =="" | tmbuku_id==""){
										  
										  alertify.alert("Pastikan anda telah memilih Nama Siswa Peminjam dan Buku Yang dipinjam");
										  return false;
									  }
									
									
									loading();
									
									  $.post("<?php echo site_url("peminjamanbuku/pinjam"); ?>",{tmsiswa_id:tmsiswa_id,tmbuku_id:tmbuku_id,harus_kembali:harus_kembali},function(data){
										  
										   $("#loadpeminjaman").html(data);
										  
										  
									       jQuery.unblockUI({ });
										  
									   })
									
									

									
									
									
									
						   
						});
						
						$(document).off('click', '.bataltambah').on('click', '.bataltambah', function (event, messages) {
									
								jumlah = $(this).attr("row");
								
						   
						});
						
						 $(document).off('click', '.batalpinjam').on('click', '.batalpinjam', function (event, messages) {
							var id = $(this).attr("datanya");
						   $.post("<?php echo site_url("peminjamanbuku/batalpinjam"); ?>",{id:id},function(data){
							   
						
							   $("#peminjaman"+id).remove();
						   })
						});

					</script>
						
			
							
							
							