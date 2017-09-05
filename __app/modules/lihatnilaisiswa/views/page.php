	<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-graduation"></i>
						<a href="javascript:void(0)">Nilai Siswa</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo site_url("lihatnilaisiswa"); ?>">Lihat Nilai Siswa</a>
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
				<div clas="col-md-12 col-sm-12">
					<div class="form-group col-sm-12 col-md-12">
						<label class="col-md-3 control-label" style="text-align:left"> Nama Siswa :</label>
						<div class="col-md-9">
							<?php $id = $_SESSION['user_id']; 
								$siswa = $this->Model_lihatnilaisiswa->get_siswa($id)->result();
								foreach ($siswa as $key) {
									echo $key->nama;?>
						</div>
			 		</div>
			 		<div class="form-group col-sm-12 col-md-12">
						<label class="col-md-3 control-label" style="text-align:left"> Kelas : </label>
						<div class="col-md-9">
							<?php
								echo $this->Acuan_model->get_kondisi_a($key->tmkelas_id,"id","tm_kelas","nama");?>
						</div>
			 		</div>
			 		<div class="form-group col-sm-12 col-md-12">
						<label class="col-md-3 control-label" style="text-align:left"> Ruang : </label>
						<div class="col-md-9">
							<?php
								echo $this->Acuan_model->get_kondisi_a($key->tmruang_id,"id","tm_ruang","nama");
								}
							?>
						</div>
			 		</div>
				</div>		 
			</div>
			<div class="col-md-12 col-sm-12">
			  <div class="col-md-2">
                  <?php if (isset($privileges->c_create) && $privileges->c_create == '1'): ?>
                    <a href="javascript:void(0);" id="tambahdata"  urlnya="<?php echo site_url("datasiswa/form"); ?>" class="btn btn-success tooltips" data-container="body" data-placement="right" title="Tambah Data"><i class="fa fa-plus"></i> Tambah Data</a>
                  <?php endif; ?>
			  </div>
			  <div class="col-md-10">
			 </div>
			</div>
		</div>


	   <div class="table-container">
		<table class="table table-striped table-bordered table-hover" id="datatableTable">

				<thead>
					<tr>
						<th width="2%"> No </th>
						<th> Pelajaran </th>
						<th> Nilai </th>
						<th> Status Nilai </th>
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
						url :"<?php echo site_url("lihatnilaisiswa/grid"); ?>", 
						type: "post", 
						"data": function ( data ) {
						data.tmpelajaran_id = $('#tmpelajaran_id').val();
				
						
						
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
