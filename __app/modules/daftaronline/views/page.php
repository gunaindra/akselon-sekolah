	<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-graduation"></i>
						<a href="javascript:void(0)">Kesiswaan</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo site_url("daftaronline"); ?>">Daftar Online</a>
					</li>
				</ul>
			
			</div>
		<div id="showform"> </div>

		<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								 <?php echo $title; ?>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse tooltips" data-container="body" data-placement="top" title="Collapse">
								</a>
								<a href="javascript:;" class="reload tooltips" data-container="body" data-placement="top" title="Mulai Ulang">
								</a>
								<a href="javascript:;" class="remove tooltips" data-container="body" data-placement="top" title="Hapus">
								</a>
								
								
							</div>
							<div class="actions">
								
								<a class="btn btn-icon-only btn-default btn-sm fullscreen tooltips" data-container="body" data-placement="top" title="Layar Penuh" href="javascript:;" >
								</a>
								
							</div>
						</div>
						<div class="portlet-body">
							
					
							<div class="row">
								<div class="col-md-12 col-sm-12">
								 
								  <div class="col-md-12">
									<form class="navbar-form navbar-right" role="search" method="post" id="formcaridatatables" action="javascript:void(0)">
										<div class="form-group">
											     <select class="form-control onchange "  id="tmjenjang_id" url="<?php echo site_url("ruang/selectkelas"); ?>" target="tmkelas_id">
												     <option value="">- Pilih Jenjang -</option>
													   <?php 
													  
													     foreach($jenjang as $row){
															 
															 ?><option value='<?php echo $row->id; ?>' <?php echo (isset($dataform)) ?  ($dataform->tmjenjang_id==$row->id) ? "selected":"" :"" ?>><?php echo $row->nama; ?></option>"<?php 
														 }
													    ?>
												  </select>
										</div>
										<div class="form-group">
											  <select class="form-control tmkelas_id " id="tmkelas_id">
												     <option value="">- Pilih Kelas -</option>
													 
												  </select>		
										</div>
										
										<div class="form-group">
											  <select class="form-control " id="status">
												     <option value="">- Pilih Status -</option>
												     <option value="1">Pendaftaran Online</option>
												     <option value="99">Menunggu Proses Pembayaran</option>
												     <option value="98">Di Proses</option>
												     <option value="97">Di Kembalikan</option>
												     <option value="96">Tidak Di Terima</option>
													 
												  </select>		
										</div>
										
										
										<div class="form-group">
											<input type="text" size="25" name="keyword" id="keyword" class="form-control" placeholder="Cari disini" value="">
											
										</div>
										<button type="submit" class="btn btn-success tooltips" data-container="body" data-placement="bottom" title="Cari" id="searchcustom"><span class="glyphicon glyphicon-search"></span></button>
									</form>
								 </div>
								</div>
							</div>

	
						   <div class="table-container">
							<table class="table table-striped table-bordered table-hover" id="datatableTable">

									<thead>
										<tr>
											<th> No  </th>
											<th> Tgl  </th>
											
											<th> Jenjang </th>
											<th> Kelas </th>			
											<th> Nama </th>
											<th> Gender </th>
											
											<th> Status </th>
											
											<th width="18%">Detail</th>
										
											<th width="5%">Verif</th>
									   </tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							  </div>
							  <div class="alert alert-info">
							    Note :
								<br>
								 <ol type="square">
								    <li>Siswa yang mendaftar secara online akan tampil di sini</li>
								    
								    <li>Lakukan Verif / Verifikasi untuk menjadikan siswa pendaftar aktif dan masuk ke data siswa</li>
								    
								 </ol>
		                </div>
</div>
<div id="verifikasimodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Verifikasi Siswa</h4>
      </div>
      <div class="modal-body">
	  <div class="clear"><br></div>
         <a href="javascript:;" class="btn btn-success btn-block verifstatus" data="99"> Menunggu Proses Pembayaran</a>
         <a href="javascript:;" class="btn btn-success btn-block verifstatus" data="98"> Di Proses</a>
         <a href="javascript:;" class="btn btn-success btn-block verifstatus" data="97"> Di Kembalikan</a>
         <a href="javascript:;" class="btn btn-success btn-block verifstatus" data="2"> Di Terima</a>
         <a href="javascript:;" class="btn btn-success btn-block verifstatus" data="96"> Tidak Di Terima</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
  
	
       var dataTable = $('#datatableTable').DataTable( {
					"processing": true,
					"serverSide": true,
					"searching": false,
					"responsive": true,
					
					"ajax":{
						url :"<?php echo site_url("daftaronline/grid"); ?>", 
						type: "post", 
						"data": function ( data ) {
						
						data.keyword = $('#keyword').val();
						data.tmjenjang_id = $('#tmjenjang_id').val();
						data.tmkelas_id = $('#tmkelas_id').val();
						data.status = $('#status').val();
						
						data.tmsiswa_id = "<?php echo $tmsiswa_id; ?>";
				
						
						
                    }
						
					},
					"rowCallback": function( row, data ) {
						
						
					}
				} );
				
		 $(document).on('click keyup', '#searchcustom,#keyword', function (event, messages) {			
			 
			   dataTable.ajax.reload(null,false);	        
		  
        });
		
		$(document).on('change', '#tmjenjang_id,#tmkelas_id,#status', function (event, messages) {			
			 
			   dataTable.ajax.reload(null,false);	        
		  
        });
		
		 $(document).on("click",".approv",function(){
			 
			 var id     = $(this).attr("datanya");
			 $(".verifstatus").attr("tmsiswa_id",id);
			 //var urlnya = $(this).attr("urlnya");
			
			
				 //loading();
			// $.post(urlnya,{id:id},function(data){
				 
				// dataTable.ajax.reload(null,false);
				 
					//jQuery.unblockUI({ });
					//alertify.success("Verifikasi Berhasil");
			// })
			// })
			
			 
		 })
	
	$(document).off('click',".verifstatus").on('click',".verifstatus",function(){
	
			 
			 var id     = $(this).attr("tmsiswa_id");
			
			 var val    = $(this).attr("data");
			
			 $('#verifikasimodal').modal('toggle');
				
		
				loading();
			$.post("<?php echo site_url("daftaronline/approv"); ?>",{id:id,val:val},function(data){
				
				dataTable.ajax.reload(null,false);
				 
					jQuery.unblockUI({ });
					
					alertify.success("Perubahan Status Berhasil");
						jQuery.unblockUI({ });
			 });
			 
			
		
		
 })
				
		
</script>

		
<script>
  
  
   
$(document).off('change',"input[type=file]").on('change',"input[type=file]",function(){
            var id          = $(this).attr("data-id");
            var persyaratan = $(this).attr("persyaratan");
            var namalengkap = $("#namasiswa").val();
            var tmsiswa_id  = $("#tmsiswa_id").val();
            
            
			var file = this.files[0];
            var form = new FormData();
            form.append('id', id);
            form.append('persyaratan', persyaratan);
           
            form.append('nama', namalengkap);
            form.append('tmsiswa_id', tmsiswa_id);
            form.append('image', file);
          
			$("#upload"+id).html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i><span class="sr-only">Loading...</span> Uploading..');
            $.ajax({
                url : "<?php echo site_url("daftaronline/savepersyaratan"); ?>",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data : form,
                success: function(response){
				    
					var data = response.split("[split]");
					  if(data[0]=="sukses"){
						  $("#upload"+id).html(data[1]).show();
						  
					  }else{
						  
						  $("#upload"+id).html('<div class="btn green btn-sm fileUpload"><i class="fa  fa-upload "></i><span>Upload </span><input type="file" name="files"  id="files" class="uploadpersyaratan fileupload" data-id="'+id+'" persyaratan="'+persyaratan+'"></div>');
				  
						  alertify.alert(data[1]);
					  }
				    
					  
                }
            });
		});

		   
$(document).off('click',".batalkan").on('click',".batalkan",function(){
		
			   var id     = $(this).attr("data-id");
			   var tmpersyaratan_id     = $(this).attr("tmpersyaratan_id");
			   var persyaratan     = $(this).attr("persyaratan");
			 
			   var unlink = $(this).attr("unlink");
			   $("#upload"+tmpersyaratan_id).html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i><span class="sr-only">Loading...</span> Uploading..');
			  $.post("<?php echo site_url("pendaftaran/batal_syarat"); ?>",{id:id,unlink:unlink},function(){
				  
					$("#upload"+tmpersyaratan_id).html('<div class="btn green btn-sm fileUpload"><i class="fa  fa-upload "></i><span>Upload </span><input type="file" name="files"  id="files" class="uploadpersyaratan fileupload" data-id="'+tmpersyaratan_id+'" persyaratan="'+persyaratan+'"></div>');
				  
			  });
			
		});


</script>
