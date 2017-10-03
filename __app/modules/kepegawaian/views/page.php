<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="icon-notebook"></i>
			<a href="javascript:void(0)">Kepegawaian</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="<?php echo site_url("kepegawaian"); ?>">Data Pegawai</a>
		</li>
	</ul>
</div>
<div id="showform"> </div>
<div class="alertmsg"></div>

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
                  <?php if (isset($privileges->c_create) && $privileges->c_create == '1'): ?>
                    <a href="javascript:void(0);" id="tambahdata"  urlnya="<?php echo site_url("kepegawaian/form"); ?>"class="btn btn-success tooltips" data-container="body" data-placement="right" title="Tambah Data"><i class="fa fa-plus"></i> Tambah Data</a>
                  <?php endif; ?>
			  </div>
			  <div class="col-md-9">
				<form class="navbar-form navbar-right" role="search" method="post" id="formcaridatatables" action="javascript:void(0)">
					
					<div class="form-group">
						<input type="text" size="30" name="keyword" id="keyword" class="form-control" placeholder="Cari Berdasarkan nama " value="<?php echo isset($keyword) ? $keyword :""; ?>" placeholder=" ">
						
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
						<th> Nama Lengkap </th>
						<th> Gender</th>
						<th> No. Hp</th>
						<th> Email </th>
						<th> Status Pegawai </th>
						<!-- <th> Username</th>
						<th> Password  </th> -->
						<th width="20%"> Aksi</th>
				   	</tr>
				</thead>
				<tbody></tbody>
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
					"dom": 'Bfrtip',
					"buttons": [
					

							{
							extend: 'pdfHtml5',
							exportOptions: {
							 columns: [ 0, 1, 2, 3,4,5,6,7 ]
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
						url :"<?php echo site_url("kepegawaian/grid"); ?>", 
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
</script>
