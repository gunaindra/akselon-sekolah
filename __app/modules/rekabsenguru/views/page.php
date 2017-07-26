	<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-notebook"></i>
						<a href="javascript:void(0)">Keg. Belajar Mengajar</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo site_url("rekabsenguru"); ?>">Rekap Absensi Guru </a>
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
								 	  </div>
								  <div class="col-md-9">
									<form class="navbar-form navbar-right" role="search" method="post" id="formcaridatatables" action="javascript:void(0)">
										<div class="form-group">
										<input type="text" readonly class="form-control" id="tgl" name="tgl" value="<?php echo  date("Y-m-d") ; ?>">							
											    <script type="text/javascript">
												 $(document).ready(function () {
													 $('#tgl').datepicker({
														 changeMonth: true,
														 changeYear: true,
														 autoclose: true,
														 dateFormat: 'yy-mm-dd',
																																
													 });
												});
                                                </script>
												
										</div>		
										<div class="form-group">
											<input type="text" size="30" name="keyword" id="keyword" class="form-control" placeholder="Nama Siswa " value="<?php echo isset($keyword) ? $keyword :""; ?>" placeholder=" ">
											
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
											<th> Tanggal</th>
											<th> Nama Siswa</th>
											<th> Status Absensi</th>
											
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
					 "dom": 'Bfrtip',
					"buttons": [
					

							{
							extend: 'pdfHtml5',
							exportOptions: {
							 columns: [ 0, 1, 2,3]
							},
							customize: function (doc) {
							doc.content[1].table.widths = 
								Array(doc.content[1].table.body[0].length + 1).join('*').split('');
						  }
						},
							{
							extend: 'excelHtml5',
							exportOptions: {
							 columns: [ 0, 1, 2,3 ]
							}
						},
							{
							extend: 'copyHtml5',
							exportOptions: {
							 columns: [ 0, 1, 2 ,3]
							}
						},
							{
							extend: 'csvHtml5',
							exportOptions: {
							 columns: [ 0, 1, 2 ,3]
							}
						},
						
						
						'colvis'
					],
					
					"ajax":{
						url :"<?php echo site_url("rekabsensiswa/grid"); ?>", 
						type: "post", 
						"data": function ( data ) {
						
						data.keyword = $('#keyword').val();
						data.tanggal = $('#tgl').val();
				
						
						
                    }
						
					},
					"rowCallback": function( row, data ) {
						
						
					}
				} );
				
		 $(document).on('click keyup', '#searchcustom,#keyword', function (event, messages) {			
			 
			   dataTable.ajax.reload(null,false);	        
		  
        });
	
				
		
</script>
