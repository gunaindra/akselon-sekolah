	<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-graduation"></i>
						<a href="javascript:void(0)">Keg. Belajar Mengajar </a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo site_url("absenguru"); ?>"><?php echo $title; ?></a>
					</li>
				</ul>
			
			</div>
		<div id="showform"> </div>

		<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								 <?php echo $title; ?> dan Murid
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
								  <div class="col-md-2">
								   
								  </div>
								  <div class="col-md-10">
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
											  <select class="form-control tmkelas_id onchange" id="tmkelas_id" url="<?php echo site_url("ruang/selectruang"); ?>" target="tmruang_id">
												     <option value="">- Pilih Kelas -</option>
													 
												  </select>		
										</div>
										
										<div class="form-group">
											  <select class="form-control tmruang_id" id="tmruang_id">
												     <option value="">- Pilih Ruang -</option>
													 
												  </select>		
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
											<th width="2%"> No </th>
											<th> Jenjang </th>
											<th> Kelas </th>
											<th> Ruang </th>				
											
											<th width="20%"> Jadwal Pelajaran </th>
											
										
									   </tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							  </div>
		                </div>
</div>


<script type="text/javascript">
  
	
       var dataTable = $('#datatableTable').DataTable( {
					"processing": true,
					"serverSide": true,
					"searching": false,
					"responsive": true,
					"lengthMenu": [[10, 25, 50, 800000000], [10, 25, 50, "All"]],
					 "dom": 'Blfrtip',
					 "sPaginationType": "full_numbers",
					"buttons": [
					

						
						
						'colvis'
					],
					"ajax":{
						url :"<?php echo site_url("absenguru/grid"); ?>", 
						type: "post", 
						"data": function ( data ) {
						
					
						data.tmjenjang_id = $('#tmjenjang_id').val();
						data.tmkelas_id = $('#tmkelas_id').val();
						data.tmruang_id = $('#tmruang_id').val();
				
						
						
                    }
						
					},
					"rowCallback": function( row, data ) {
						
						
					}
				} );
				
		 $(document).on('click keyup', '#searchcustom,#keyword', function (event, messages) {			
			 
			   dataTable.ajax.reload(null,false);	        
		  
        });
		
		$(document).on('change', '#tmjenjang_id,#tmkelas_id,#tmruang_id', function (event, messages) {			
			 
			   dataTable.ajax.reload(null,false);	        
		  
        });
		
	
	$(document).off('click', '#simpanjadwal').on('click', '#simpanjadwal', function (event, messages) {	
      var hari         = $("#hari").val();
      var jam          = $("#jam").val();
      var mapel        = $("#mapel").val();
      var tmguru_id    = $("#tmguru_id").val();
      var tmjenjang_id = $("#tmjenjang_id").val();
      var tmkelas_id   = $("#tmkelas_id").val();
      var tmruang_id   = $("#tmruang_id").val();
	  
	  
	  
	  
	  if(hari =="" || jam =="" || mapel=="" || tmguru_id==""){
		  
		  alertify.alert("Pastikan anda telah memilih semua item");
		  return false;
	  }
	    loading();
		
        $.ajax({
            type: "POST",
            url: "<?php echo site_url("absenguru/save"); ?>",
            data: {"tmjenjang_id":tmjenjang_id,
			"tmkelas_id":tmkelas_id,
			"tmruang_id":tmruang_id,
			"hari":hari,
			"tmjam_id":jam,
			"mapel":mapel,
			"tmguru_id":tmguru_id},
			success: function (response, status, xhr) {
                var ct = xhr.getResponseHeader("content-type") || "";
                if (ct == "application/json") {
                    
                     alertify.alert(response.message);
					
					
                } else {
                   
				  $("#loaddata").html(response)
				   
                }
				
				jQuery.unblockUI({ });
            }
        });
	
   });	
   
   $(document).off('click', '.deleteone').on('click', '.deleteone', function (event, messages) {			
	
	    var id     = $(this).attr("datanya");
	 
	
	    alertify.confirm("Apakah anda yakin akan menghapus data ini ?",function(){
		 loading();
			 $.post("<?php echo site_url("absenguru/hapus"); ?>",{id:id},function(data){
				 
				 $("#row"+id).remove();
				 
					jQuery.unblockUI({ });
			 })
	    })
	
   });	
		
</script>
