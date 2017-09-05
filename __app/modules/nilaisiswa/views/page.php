	<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-notebook"></i>
						<a href="javascript:void(0)">Nilai Siswa</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo site_url("nilaisiswa"); ?>">Daftar Kelas</a>
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
					  <div class="col-md-12">
						
					 </div>
					</div>
				</div>


			   <div class="table-container">
					<table class="table table-striped table-bordered table-hover" id="datatableTable">
						<thead>
							<tr>
								<th width="5%"> No </th>
								<th> Kelas </th>
								<th> Ruang </th>
								<th width="15%"> Aksi</th>
						   </tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
				<div class="clear"><br></div>
				<div class="alert alert-info">
					<b> Keterangan/ Tata Cara Memasukan Nilai </b>
					<ol type="square">
					  <li>Pilih Kelas dan Ruangan </li>
					  <li>Maka akan menampilkan siswa sesuai ruangan yang dipilih</li>
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
					
					"ajax":{
						url :"<?php echo site_url("nilaisiswa/grid"); ?>", 
						type: "post", 
						"data": function ( data ) {
						
						data.keyword = $('#keyword').val();
						data.tmjenjang_id = $('#tmjenjang_id').val();
						data.tmkelas_id = $('#tmkelas_id').val();
				
						
						
                    }
						
					},
					"rowCallback": function( row, data ) {
						
						
					}
				} );
				
		 $(document).on('click keyup', '#searchcustom,#keyword', function (event, messages) {			
			 
			   dataTable.ajax.reload(null,false);	        
		  
        });
		
		$(document).on('change', '#tmjenjang_id,#tmkelas_id', function (event, messages) {			
			 
			   dataTable.ajax.reload(null,false);	        
		  
        });
	
				
		
</script>
