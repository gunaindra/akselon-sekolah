<div class="table-container">
									<table class="table table-striped table-bordered table-hover" id="datatableguru">

											<thead>
												<tr>
													<th width="5%"> No </th>
													<th> NIK </th>
													
													<th> Nama   </th>													
													<th> Status  </th>										
													
													<th width="10%"> Pilih </th>
											   </tr>
											</thead>
											<tbody>
											</tbody>
										</table>
							  </div>
							  
							  			
				
<script type="text/javascript">
  
	
       var dataTableguru = $('#datatableguru').DataTable( {
					"processing": true,
					"serverSide": true,
					"searching": false,
					"responsive": true,
				
					
					"ajax":{
						url :"<?php echo site_url("gurumapel/gridguru"); ?>", 
						type: "post", 
						"data": function ( data ) {
						
						data.keyword = $('#keyword').val();
				
						
						
                    }
						
					},
					"rowCallback": function( row, data ) {
						
						
					}
				} );
				
		 $(document).on('click keyup', '#searchcustom,#keyword', function (event, messages) {			
			 
			   dataTableguru.ajax.reload(null,false);	        
		  
        });
	
				
		
</script>
