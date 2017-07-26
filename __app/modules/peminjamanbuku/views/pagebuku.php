	<div class="row">
								<div class="col-md-12 col-sm-12">
								  
								
										
									 	
										<div class="form-group col-md-8">
											<input type="text" size="25" name="keyword" id="keyword" class="form-control" placeholder="By Judul Buku" value="<?php echo isset($keyword) ? $keyword :""; ?>" placeholder=" ">
											
										</div>
										<button type="submit" class="btn btn-success tooltips" data-container="body" data-placement="bottom" title="Cari" id="searchcustom"><span class="glyphicon glyphicon-search"></span></button>
									</form>
								 </div>
								</div>
							</div>
<div class="table-container">
									<table class="table table-striped table-bordered table-hover" id="datatablebuku">

											<thead>
												<tr>
													<th width="5%"> No </th>
													<th> Judul Buku </th>
													<th> Subjek  </th>
													<th> Pengarang  </th>
													<th> Penerbit </th>													
													<th> ISBN   </th>	
													<th width="10%"> Pilih </th>
											   </tr>
											</thead>
											<tbody>
											</tbody>
										</table>
							  </div>
							  
							  			
				
<script type="text/javascript">
  
	
       var datatablebuku = $('#datatablebuku').DataTable( {
					"processing": true,
					"serverSide": true,
					"searching": false,
					"responsive": true,
				
					
					"ajax":{
						url :"<?php echo site_url("peminjamanbuku/gridbuku"); ?>", 
						type: "post", 
						"data": function ( data ) {
						
						data.keyword = $('#keyword').val();
					
						
						
                    }
						
					},
					"rowCallback": function( row, data ) {
						
						
					}
				} );
				
		 $(document).on('click keyup', '#searchcustom,#keyword', function (event, messages) {			
			 
			   datatablebuku.ajax.reload(null,false);	        
		  
        });
		
		
				
		
</script>
