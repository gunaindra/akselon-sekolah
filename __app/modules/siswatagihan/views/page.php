	<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-graduation"></i>
						<a href="javascript:void(0)">Keuangan </a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo site_url("siswatagihan"); ?>">Tagihan Siswa</a>
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
										
										
										<div class="form-group">
											<input type="text" size="25" name="keyword" id="keyword" class="form-control" placeholder="cari disini " value="<?php echo isset($keyword) ? $keyword :""; ?>" placeholder=" ">
											
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
									
											<th> Nama </th>
											<th> Gender </th>
											<th> Ayah </th>
											<th> Ibu </th>
											<th width="20%"> Tagihan </th>
										
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
					

							{
							extend: 'pdfHtml5',
							exportOptions: {
							 columns: [ 0, 1, 2, 3,4,5,6,7]
							},
							customize: function (doc) {
							doc.content[1].table.widths = 
								Array(doc.content[1].table.body[0].length + 1).join('*').split('');
						  }
						},
							{
							extend: 'excelHtml5',
							exportOptions: {
							 columns: [ 0, 1, 2, 3,4,5,6,7 ]
							}
						},
							{
							extend: 'copyHtml5',
							exportOptions: {
							 columns: [ 0, 1, 2, 3,4,5,6,7 ]
							}
						},
							{
							extend: 'csvHtml5',
							exportOptions: {
							 columns: [ 0, 1, 2, 3,4,5,6,7 ]
							}
						},
						
						
						'colvis'
					],
					"ajax":{
						url :"<?php echo site_url("siswatagihan/grid"); ?>", 
						type: "post", 
						"data": function ( data ) {
						
						data.keyword = $('#keyword').val();
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
		
		$(document).off('change', '#itemtagihan').on('change', '#itemtagihan', function (event, messages) {			
			 
			  var jumlah  = $('option:selected', this).attr('data-jumlah');	 
			  $("#jumlah").val(jumlah);
		  
        });
	
	$(document).off('click', '#simpantagihan').on('click', '#simpantagihan', function (event, messages) {			
	  if($("#itemtagihan").val() =="" || $("#jumlah").val() ==""){
		  
		  alertify.alert("Pastikan anda telah memilih item dan mengisi tagihan");
		  return false;
	  }
	    loading();
		
        $.ajax({
            type: "POST",
            url: "<?php echo site_url("siswatagihan/save"); ?>",
            data: {"tmsiswa_id":$("#tmsiswa_id").val(),"tmjenjang_id":$("#tmjenjang_id").val(),"tmkeuangan_id":$("#itemtagihan").val(),"jumlah":$("#jumlah").val()},
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
			 $.post("<?php echo site_url("siswatagihan/hapus"); ?>",{id:id},function(data){
				 
				 $("#row"+id).remove();
				 
					jQuery.unblockUI({ });
			 })
	    })
	
   });	
		
</script>
