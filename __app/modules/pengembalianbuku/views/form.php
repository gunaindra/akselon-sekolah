<?php $attributes = array('class' => 'form-horizontal', 'role'=>'form','name' => 'simpan', 'id' => 'simpan', 'method' => "post", 'url' =>site_url("/save")); ?>
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
									 
									 
									 
									 
									 <div class="table-responsive" id="loadpeminjaman">
									  
									 
									</div>
									 
								
								
								<div class="clear"><br></div>
								
									
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
					
					
					
					<script>
					
					 $(document).off('click', '.loadsiswa').on('click', '.loadsiswa', function (event, messages) {
							
						   $.post("<?php echo site_url("pengembalianbuku/siswa"); ?>",function(data){
							   
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
							
							 
							 loading();
									
									  $.post("<?php echo site_url("pengembalianbuku/datapeminjaman"); ?>",{tmsiswa_id:$(this).attr("tmsiswa_id")},function(data){
										  
										   $("#loadpeminjaman").html(data);
										  
										  
									       jQuery.unblockUI({ });
										  
									   })
									   
									   
						   
						});
						
						
						
						
						
						 $(document).off('click', '.kembalikan').on('click', '.kembalikan', function (event, messages) {
							var id = $(this).attr("datanya");
							var denda= $(this).attr("denda");
							var status= $(this).attr("status");
						   $.post("<?php echo site_url("pengembalianbuku/kembalikan"); ?>",{id:id, denda:denda, status:status},
						   	function(data){
							   	$("#peminjaman"+id).remove();
						   })
						});
						
						
						

					</script>
						
			
							
							
							