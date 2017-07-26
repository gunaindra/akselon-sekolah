<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="" />
        <meta name="author" content="" />
     
        <title> Formulir Pendaftaran Peserta Didik Baru </title>

<link href="<?php echo base_url(); ?>__statics/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>__statics/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>__statics/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>__statics/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->

<link href="<?php echo base_url(); ?>__statics/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>__statics/global/css/plugins.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>__statics/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>__statics/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="<?php echo base_url(); ?>__statics/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>__statics/js/datepicker/datepicker.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>__statics/js/alertify/css/alertify.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>__statics/global/plugins/jquery.min.js" type="text/javascript"></script>

<link rel="shortcut icon" href="<?php echo base_url(); ?>__statics/img/logo/<?php echo $sekolah->logo; ?>"/>
  
<style>

.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.fileupload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}

</style>    
    </head>
				<body >
					<a href="#top" id="toTop"></a>

					<header>
						<div class="navbar navbar-default" role="navigation">
							<div class="container">
								<div class="navbar-header">
									<button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
									<a href="#" class="navbar-brand">
										<div class="header-title">
										 
											<span class="header-maintitle"></span></br>
										   
										</div>
									</a>
								</div>

							</div><!-- end .container -->
						</div><!-- end .navbar -->
					</header>

					<section id="content-main" class="no-paddtop">
						<?php  $this->load->view(isset($content) ? $content:"index"); ?>
					</section>

					<div class="clearfix"></div>

				   
				</body>

            <script src="<?php echo base_url(); ?>__statics/js/proses.js" type="text/javascript"></script>
			<script src="<?php echo base_url(); ?>__statics/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
			<script src="<?php echo base_url(); ?>__statics/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
			
			<script src="<?php echo base_url(); ?>__statics/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
			
			
			<script src="<?php echo base_url(); ?>__statics/global/scripts/metronic.js" type="text/javascript"></script>
			


			<script src="<?php echo base_url(); ?>__statics/js/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>  
			<script src="<?php echo base_url(); ?>__statics/js/alertify/alertify.js" type="text/javascript"></script>  
			<script src="<?php echo base_url(); ?>__statics/js/alertify/alertify.min.js" type="text/javascript"></script>
			
<script>
  
  
   
$(document).off('change',"input[type=file]").on('change',"input[type=file]",function(){
            var id          = $(this).attr("data-id");
            var persyaratan = $(this).attr("persyaratan");
            var namalengkap = $("#namasiswa").val();
             
			  if(namalengkap ==""){
				  
				  alertify.alert("Pastikan anda mengisi terlebih dahulu semua kolom wajib di atas");
				  return false;
			  }
            
			var file = this.files[0];
            var form = new FormData();
            form.append('id', id);
            form.append('persyaratan', persyaratan);
           
            form.append('nama', namalengkap);
            form.append('image', file);
          
			$("#upload"+id).html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i><span class="sr-only">Loading...</span> Uploading..');
            $.ajax({
                url : "<?php echo site_url("pendaftaran/savepersyaratan"); ?>",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data : form,
                success: function(response){
				    
					var data = response.split("[split]");
					  if(data[0]=="sukses"){
						  $("#upload"+id).html(data[1]).show();
						  
					  }else{
						  
						  $("#upload"+id).html('<div class="btn green btn-sm fileUpload"><i class="fa  fa-upload "></i><span>Upload </span><input type="file" name="files"  id="files" class="uploadpersyaratan fileupload" data-id="'+id+'" persyaratan="'+persyaratan+'"></div>');
				  
						  alertify.alert(data[1]);
					  }
				    
					  
                }
            });
		});

		$(document).on("click",".batalkan",function(){
			   var id     = $(this).attr("data-id");
			   var tmpersyaratan_id     = $(this).attr("tmpersyaratan_id");
			   var persyaratan     = $(this).attr("persyaratan");
			 
			   var unlink = $(this).attr("unlink");
			   $("#upload"+tmpersyaratan_id).html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i><span class="sr-only">Loading...</span> Uploading..');
			  $.post("<?php echo site_url("pendaftaran/batal_syarat"); ?>",{id:id,unlink:unlink},function(){
				  
					$("#upload"+tmpersyaratan_id).html('<div class="btn green btn-sm fileUpload"><i class="fa  fa-upload "></i><span>Upload </span><input type="file" name="files"  id="files" class="uploadpersyaratan fileupload" data-id="'+tmpersyaratan_id+'" persyaratan="'+persyaratan+'"></div>');
				  
			  });
			
		});


</script>
</html>