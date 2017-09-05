	<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-graduation"></i>
						<a href="javascript:void(0)">Kesiswaan</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo site_url("datasiswa"); ?>">Data Siswa</a>
					</li>
				</ul>
			
			</div>
		<div id="showform"> </div>
    <div class="alertmsg">
    </div>

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
											     <select class="form-control onchange "  id="tmpelajaran_id" url="<?php echo site_url("ruang/selectruangkelas"); ?>" target="tmkelas_id">
												     <option value="">- Pilih Mata Pelajaran -</option>
													    <?php $id = $_SESSION['user_id'];
													 	$a = $this->Acuan_model->get_where2("tr_gurumapel",array("tmpegawai_id"=>$id))->result();
													 	foreach ($a as $key) {
													 		$key->tmpelajaran_id;
													 		$b = $this->Acuan_model->get_mapel_byguru($key->tmpelajaran_id)->row();
														 		// echo json_encode($b->nama);?>
													 		<option value='<?php echo $b->id; ?>' <?php echo (isset($dataform)) ?  ($dataform->tmpelajaran_id==$b->id) ? "selected":"" :"" ?>><?php echo $b->nama; ?></option>"

													 		<?php
													 	}
													 ?>
												  </select>
										</div>
										<div class="form-group">
											  <select class="form-control tmkelas_id onchange" id="tmkelas_id">
												     <option value="">- Pilih Kelas -</option>
													 
												  </select>		
										</div>										
										
										<div class="form-group">
											<input type="text" size="25" name="keyword" id="keyword" class="form-control" placeholder="By Nama Siswa" value="<?php echo isset($keyword) ? $keyword :""; ?>" placeholder=" ">
											
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
											
											<th> Ruang </th>
									
											<th> Nama </th>

											<th> Nilai </th>

											<th> Status Nilai </th>
									   </tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							  </div>
							  <div class="clear"><br></div>
								<div class="alert alert-info">
									<b> Keterangan/ Tata Cara Melihat Nilai </b>
									<ol type="square">
									  <li>Pilih Mata Pelajaran dan Kelas terlebih dahulu untuk mendapatkan nilai sesuai yang diinginkan</li>
									  <li>Atau cari berdasarkan nama dengan mengisi Kolom Nama Siswa</li>
									</ol>
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
							  columns: [ 0, 1, 2, 3,4,5,6,7]
							}
						},
							{
							extend: 'copyHtml5',
							exportOptions: {
							  columns: [ 0, 1, 2, 3,4,5,6,7]
							}
						},
							{
							extend: 'csvHtml5',
							exportOptions: {
							  columns: [ 0, 1, 2, 3,4,5,6,7]
							}
						},
						
						
						'colvis'
					],
					"ajax":{
						url :"<?php echo site_url("lihatnilai/grid"); ?>", 
						type: "post", 
						"data": function ( data ) {
						
						data.keyword = $('#keyword').val();
						data.tmpelajaran_id = $('#tmpelajaran_id').val();
						data.tmkelas_id = $('#tmkelas_id').val();
				
						
						
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
	
				
		
</script>
