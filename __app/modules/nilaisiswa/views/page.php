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
					  <div class="col-md-3">
		                  <?php if (isset($privileges->c_create) && $privileges->c_create == '1'): ?>
		                    <a href="javascript:void(0);" id="tambahdata"  urlnya="<?php echo site_url("nilaisiswa/form"); ?>" class="btn btn-success tooltips" data-container="body" data-placement="right" title="Tambah Data"><i class="fa fa-plus"></i> Tambah Data</a>
		                  <?php endif; ?>
					  </div>
					  <div class="col-md-9">
						<form class="navbar-form navbar-right" role="search" method="post" id="formcaridatatables" action="javascript:void(0)">
							<div class="form-group">
						     <select class="form-control onchange "  id="tmjenjang_id" url="<?php echo site_url("nilaisiswa/selectkelas"); ?>" target="tmkelas_id">
							     <option value="">- Pilih Jenjang -</option>
								   <?php 
								  
								     foreach($jenjang as $row){
										 
										 ?><option value='<?php echo $row->id; ?>' <?php echo (isset($dataform)) ?  ($dataform->tmjenjang_id==$row->id) ? "selected":"" :"" ?>><?php echo $row->nama; ?></option>"<?php 
									 }
								    ?>
							  </select>
							</div>
							<div class="form-group">
							  	<select class="form-control tmkelas_id" id="tmkelas_id">
								    <option value="">- Pilih Kelas -</option>
										 
								</select>		
							</div>
							<div class="form-group">
								<input type="text" size="30" name="keyword" id="keyword" class="form-control" placeholder="Cari disini " value="<?php echo isset($keyword) ? $keyword :""; ?>" placeholder=" ">
								
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
