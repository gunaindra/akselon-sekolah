	<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-graduation"></i>
						<a href="javascript:void(0)">Nilai Siswa</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo site_url("lihatabsensiswa"); ?>">Lihat Nilai Siswa</a>
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
			  <div class="col-md-12">
			  	<!-- <div class="col-md-12">
			  		<h1>Total Absensi : </h1>
			  		<label><b>Hadir  : </b></label><br>
			  		<label><b>Absen  : </b></label><br>
			  		<label><b>Sakit  : </b></label><br>
			  		<label><b>Ijin : </b></label><br>
			  	</div> -->
				<form class="navbar-form navbar-right" role="search" method="post" id="formcaridatatables" action="javascript:void(0)">
					<div class="form-group">
						     <select class="form-control onchange "  id="semester">
							     <option value="">- Pilih Semester -</option>
								    <?php 
								 	for ($i=2017;$i<=2020;$i++) {?>
								 		<option value='<?php echo $i; ?>' <?php echo (isset($dataform)) ?  ($dataform->semester==$i) ? "selected":"" :"" ?>><?php echo $i; ?></option>"

								 		<?php
								 	}
								 ?>
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
				<th> Kode Mata Pelajaran </th>
				<th> Pelajaran </th>
				<th> Semester </th>
				<th> Aksi </th>
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
						url :"<?php echo site_url("lihatabsensiswa/grid"); ?>", 
						type: "post", 
						"data": function ( data ) {
						data.semester= $('#semester').val();
				
						
						
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
