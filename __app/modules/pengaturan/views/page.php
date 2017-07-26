	<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-notebook"></i>
						<a href="javascript:void(0)">Master</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo site_url("pengaturan/tahun"); ?>">Setting Tahun Pelajaran</a>
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
          
           
            
        </div>
    </div>
    <div class="table-scrollable">
        <table class="table table-striped table-bordered table-hover table-header-fixed dataTable" role="grid">
            <thead>
                <tr>
                    <th style="width:7%"> No </th>
                    <th style="width:80%"> Tahun </th>
                    <th style="width:15%"> Aktifkan </th>
                </tr>
				
            </thead>
            <tbody id="loaddata">
               <?php 
			   $i=1;
                    for ($date= date("Y"); $date > 2007 ; $date--):
                        ?>
                        <tr id="row">
                            <td> <?php echo $i++; ?> </td>
                            <td> Tahun Ajaran <?php echo $date ?>  / <?php echo $date+1 ?>  </td>
                            
                           
                            <td> 
                           <input type="radio" style="cursor:pointer" class="form-control aktifkan" <?php if($this->Acuan_model->ajaran()==$date){ echo  "checked"; } ?> name="tahun" value="<?php echo $date; ?>" >
                           </td>
                        </tr>
                        <?php
                        $i++;
                    endfor;
                    ?>
               
            </tbody>
        </table>
    </div>
 
</div>
</div>

<script>
	
 $(document).on('click', '.aktifkan', function (event, messages) {
	  var tahun = $(this).val();
	  
	  
	  alertify.confirm("Yakin ? Anda akan menampilkan data tahun Pelajaran dan input pada tahun ini ?",function(){
		  loading();
	 $.post("<?php echo site_url("pengaturan/aktifkan");  ?>",{tahun:tahun},function(data){
	
		
		 
		  alertify.success("Tahun Pelajaran Berhasil di Aktifkan");
		 Metronic.unblockUI();
		 location.href="<?php echo site_url("pengaturan/tahun"); ?>";
	 })
	 })
       
    })
	
</script>