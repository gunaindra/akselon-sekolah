<div class="alertmsg">
    </div>

		<div class="portlet box red">
			<div class="portlet-title">
				<div class="caption">Absen
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
			<?php if($_SESSION["grup"]=="7"){
				$username = $_SESSION["nama"];
				$anak = $this->Acuan_model->get_where2("v_siswa",array("username"=>$username))->row_array();
			 ?>
			<div class="col-md-12 col-sm-12">
				<div class="alert alert-info">
					<h3>Informasi Siswa</h3>
					<p>NIS : <b><?php echo $anak["nis"]; ?></b> </p>
					<p>NAMA :  <b><?php echo $anak["nama"]; ?></b> </p>
				</div>
			</div>
			<?php } ?>
			<div class="col-md-12 col-sm-12">
			  <div class="col-md-12 alert">
			  	<div class="col-md-6">
			  		 <?php
						$id = (explode(",",$det));
						$idsiswa = json_decode($id[0]);
						$idpel = json_decode($id[1]);
						$idjadwal = json_decode($id[2]); 						
					?>

			  		<h1>Total Absensi : <?php echo $totalhadir = $this->Model_lihatabsensiswa->get_absen_row($det,"hadir")->num_rows(); ?></h1>
			  		<label><b>Hadir  : <?php echo $totalhadir = $this->Model_lihatabsensiswa->get_absen_row($det,"hadir")->num_rows(); ?></b></label><br>
			  		<label><b>Absen  : <?php echo $totalhadir = $this->Model_lihatabsensiswa->get_absen_row($det,"absen")->num_rows(); ?></b></label><br>
			  		<label><b>Sakit  : <?php echo $totalhadir = $this->Model_lihatabsensiswa->get_absen_row($det,"sakit")->num_rows(); ?></b></label><br>
			  		<label><b>Ijin : <?php echo $totalhadir = $this->Model_lihatabsensiswa->get_absen_row($det,"ijin")->num_rows(); ?></b></label><br>
			  	</div>
			  	<div class="col-md-6">
					<form class="navbar-form navbar-right" role="search" method="post" id="formcaridatatables" action="javascript:void(0)">
						<label><b>Filter Tanggal : </b></label>
						<input type="date" class="form-control"  id="start" placeholder="start">
						<input type="date" class="form-control"  id="finish" placeholder="finish">
						<br>
						<label><b>Filter Status  : </b></label>
						<div class="form-group">
							     <select class="form-control"  id="status">
								     <option value="">- Pilih Status Kehadiran -</option>
									 		<option value="hadir">Hadir</option>
									 		<option value="sakit">Sakit</option>
									 		<option value="alfa" >Alfa</option>
								  </select>
						</div>
						<br>
						<button type="submit" class="btn btn-success tooltips" data-container="body" data-placement="bottom" title="Cari" id="searchcustom"><span class="glyphicon glyphicon-search"></span></button>
					</form>
				</div>
			 </div>
			</div>
		</div>

		
		<input type="hidden" id="idsiswa" value="<?php echo$idsiswa; ?>">
		<input type="hidden" id="idpel" value="<?php echo$idpel; ?>">
		<input type="hidden" id="idjadwal" value="<?php echo$idjadwal; ?>">
	   	<div class="table-container">
			<table class="table table-striped table-bordered table-hover" id="datatableTable">
				<thead>
					<tr>
						<th width="2%"> No </th>
						<th> Pelajaran </th>
						<th> Tanggal </th>
						<th> Status Kehadiran </th>
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
					
					"ajax":{
						url :"<?php echo site_url("lihatabsensiswa/grid2"); ?>", 
						type: "post", 
						"data": function ( data ) {
						data.idsiswa= $('#idsiswa').val();
						data.idpel= $('#idpel').val();
						data.idjadwal= $('#idjadwal').val();
						data.status= $('#status').val();
				
						
						
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
