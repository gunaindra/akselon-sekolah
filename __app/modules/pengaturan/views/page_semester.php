	<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-notebook"></i>
						<a href="javascript:void(0)">Pengaturan</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo site_url("pengaturan/semester"); ?>"><?php echo $title; ?></a>
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
                    <th style="width:80%"> Semester </th>
                    <th style="width:15%"> Aktifkan </th>
                </tr>
				
            </thead>
			<?php 
			  $sekolah = $this->Acuan_model->get_where("tm_sekolah",array("id"=>$_SESSION['tmsekolah_id']));
			?>
            <tbody id="loaddata">
               <?php 
			   $i=1;
                    for ($a= 1; $a <=2 ; $a++):
                        ?>
                        <tr id="row">
                            <td> <?php echo $i++; ?> </td>
                            <td> Semester <?php echo $a; ?>   </td>                           
                            <td> 
                           <input type="radio" style="cursor:pointer" class="form-control aktifkan" <?php if($sekolah->semester==$a){ echo  "checked"; } ?> name="semester" value="<?php echo $a; ?>" >
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
	  var semester = $(this).val();
	  
	  
	  alertify.confirm("Yakin ? Anda akan Merubah semester ",function(){
		  loading();
	 $.post("<?php echo site_url("pengaturan/aktifkansemester");  ?>",{semester:semester},function(data){
	
		
		 
		  alertify.success("Semester Berhasil di rubah");
		 Metronic.unblockUI();
		 location.href="<?php echo site_url("pengaturan/semester"); ?>";
	 })
	 })
       
    })
	
</script>