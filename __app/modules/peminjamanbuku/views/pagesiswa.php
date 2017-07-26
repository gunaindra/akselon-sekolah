	<div class="row">
								<div class="col-md-12 col-sm-12">
								  
								  <div class="col-md-12">
									<form class="navbar-form navbar-right" role="search" method="post" id="formcaridatatables" action="javascript:void(0)">
										<div class="form-group">
											     <select class="form-control onchange "  id="tmjenjang_id" url="<?php echo site_url("ruang/selectkelas"); ?>" target="tmkelas_id">
												     <option value="">- Jenjang -</option>
													   <?php 
													  
													     foreach($jenjang as $row){
															 
															 ?><option value='<?php echo $row->id; ?>' <?php echo (isset($dataform)) ?  ($dataform->tmjenjang_id==$row->id) ? "selected":"" :"" ?>><?php echo $row->nama; ?></option>"<?php 
														 }
													    ?>
												  </select>
										</div>
										<div class="form-group">
											  <select class="form-control tmkelas_id onchange" id="tmkelas_id" url="<?php echo site_url("ruang/selectruang"); ?>" target="tmruang_id">
												     <option value="">- Kelas -</option>
													 
												  </select>		
										</div>
										
										<div class="form-group">
											  <select class="form-control tmruang_id" id="tmruang_id">
												     <option value="">- Ruang -</option>
													 
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
									<table class="table table-striped table-bordered table-hover" id="datatablesiswa">

											<thead>
												<tr>
													<th width="5%"> No </th>
													<th> Jenjang </th>
													<th> Kelas </th>
													<th> Ruang </th>
													<th> Nis </th>													
													<th> Nama   </th>	
													<th width="10%"> Pilih </th>
											   </tr>
											</thead>
											<tbody>
											</tbody>
										</table>
							  </div>
							  
							  			
				
<script type="text/javascript">
  
	
       var datatablesiswa = $('#datatablesiswa').DataTable( {
					"processing": true,
					"serverSide": true,
					"searching": false,
					"responsive": true,
				
					
					"ajax":{
						url :"<?php echo site_url("peminjamanbuku/gridsiswa"); ?>", 
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
			 
			   datatablesiswa.ajax.reload(null,false);	        
		  
        });
		
		$(document).on('change', '#tmjenjang_id,#tmkelas_id,#tmruang_id', function (event, messages) {			
			 
			   datatablesiswa.ajax.reload(null,false);	        
		  
        });
	
				
		
</script>
