	<style>
	.modal .modal-body {
    max-height: 420px;
    overflow-y: auto;
}
</style>
	<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-notebook"></i>
						<a href="javascript:void(0)">Users</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo site_url("grup"); ?>">Group Users</a>
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
						<div class="portlet-body">
							
					
							<div class="row">
								<div class="col-md-12 col-sm-12">
								  <div class="col-md-3">
								    <a href="javascript:void(0);" id="tambahdata"  urlnya="<?php echo site_url("grup/form"); ?>" class="btn btn-success tooltips" data-container="body" data-placement="right" title="Tambah Data"><i class="fa fa-plus"></i> Tambah Data</a>
								  </div>
								  <div class="col-md-9">
									<form class="navbar-form navbar-right" role="search" method="post" id="formcaridatatables" action="javascript:void(0)">
										
										<div class="form-group">
											<input type="text" size="30" name="keyword" id="keyword" class="form-control" placeholder="Cari disini " value="<?php echo isset($keyword) ? $keyword :""; ?>" placeholder=" ">
											
										</div>
										<button type="submit" class="btn btn-success tooltips" data-container="body" data-placement="bottom" title="Lakukan Pencarian" id="searchcustom"><span class="glyphicon glyphicon-search"></span></button>
									</form>
								 </div>
								</div>
							</div>

	
						   <div class="table-container">
							<table class="table table-striped table-bordered table-hover" id="datatableTable">

									<thead>
										<tr>
											<th width="5%"> No </th>
											<th> Nama </th>
											
											<th > Hak Akses</th>
											<th width="15%"> Aksi</th>
									   </tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							  </div>
		                </div>
</div>

<div id="modalakses" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close btn btn-default" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pengaturan Hak Akses </h4>
      </div>
      <div class="modal-body" id="bodyakses">
         <center><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span><br><small>Sedang Memuat....</small></center>
      </div>
      
    </div>

  </div>
</div>
<script type="text/javascript">
  
	  $(document).off("click",".hakakses").on("click",".hakakses",function(event){

	    var id     = $(this).attr("datanya");
	 
	 $.post("<?php echo site_url("grup/hakakses"); ?>",{id:id},function(data){
		 
		$("#bodyakses").html(data)
	 })
	 
    })
	
	
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
							 columns: [ 0,1]
							},
							customize: function (doc) {
							doc.content[1].table.widths = 
								Array(doc.content[1].table.body[0].length + 1).join('*').split('');
						  }
						},
							{
							extend: 'excelHtml5',
							exportOptions: {
							columns: [ 0,1]
							}
						},
							{
							extend: 'copyHtml5',
							exportOptions: {
							 columns: [ 0,1]
							}
						},
							{
							extend: 'csvHtml5',
							exportOptions: {
							 columns: [ 0,1]
							}
						},
						
						
						'colvis'
					],
					"ajax":{
						url :"<?php echo site_url("grup/grid"); ?>", 
						type: "post", 
						"data": function ( data ) {
						
						data.keyword = $('#keyword').val();
						
				
						
						
                    }
						
					},
					"rowCallback": function( row, data ) {
						
						
					}
				} );
				
		 $(document).on('click keyup', '#searchcustom,#keyword', function (event, messages) {			
			 
			   dataTable.ajax.reload(null,false);	        
		  
        });
	
	
	$(document).off("click",".menucek").on("click",".menucek",function(event){
		
		   if($(this).is(':checked')){ status="1"; }else { status="2"; }
			   
			   loading();
		   $.post("<?php echo site_url("grup/setprivelege"); ?>",{status:status,tmuser_id:$(this).attr("data-id"),tmmenu_id:$(this).attr("data-menu")},function(data){
			   jQuery.unblockUI({ });
			       alertify.success("Perubahan Status Berhasil");
			   
		        })
		   
		   
		   
	   })
	   
		$(document).off("click",".privelege").on("click",".privelege",function(event){
		
		   if($(this).is(':checked')){ status="1"; }else { status="0"; }
			   
			   loading();
		   $.post("<?php echo site_url("grup/setprivelegec"); ?>",{status:status,tmuser_id:$(this).attr("data-id"),tmmenu_id:$(this).attr("data-menu"),kolom:$(this).attr("dataval")},function(data){
			   jQuery.unblockUI({ });
			   
			       alertify.success("Perubahan Privelege Berhasil");
			       
		        })
		   
		   
		   
	   })
				
		
</script>
