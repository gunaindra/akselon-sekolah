
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>__statics/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>__statics/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>__statics/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>__statics/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo base_url(); ?>__statics/global/plugins/jcrop/css/jquery.Jcrop.min.css" rel="stylesheet"/>
<link href="<?php echo base_url(); ?>__statics/admin/pages/css/image-crop.css" rel="stylesheet"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo base_url(); ?>__statics/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>__statics/global/css/plugins.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>__statics/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>__statics/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="<?php echo base_url(); ?>__statics/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">


                       <div class="row">
					   
									<div class="col-md-7 responsive-1024" id="resultcrop">
										<!-- This is the image we're attaching Jcrop to -->
										<img src="<?php echo base_url(); ?>__statics/img/siswa/<?php echo $gambar; ?>" id="demo8" alt="loading.."/>
									</div>
									</div>
									<div class="row">
									<div class="col-md-5 responsive-1024">
									
										<!-- This is the form that our event handler fills -->
										<form action="javascript:void(0)" name="demo8_form"  method="post" id="demo8_form">
											<input type="hidden" id="crop_x" name="x"/>
											<input type="hidden" id="crop_y" name="y"/>
											<input type="hidden" id="crop_w" name="w"/>
											<input type="hidden" id="crop_h" name="h"/>
											<input type="hidden" id="namafile" name="namafile" value="<?php echo $gambar; ?>"/>
											<br>
											<div class="alert alert-info"> Letakan cursor di area foto untuk melakukan cropping pada foto, kemudian klik Pilih foto</div>
											
											<input type="submit" value="Pilih Foto" onClick="returnYourChoice('<?php echo $gambar; ?>')" class="btn btn-large green"/>
										</form>
									</div>
									</div>
								</div>
<script src="<?php echo base_url();?>__statics/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>__statics/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo base_url();?>__statics/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>__statics/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>__statics/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>__statics/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>__statics/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>__statics/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>__statics/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url();?>__statics/global/plugins/jcrop/js/jquery.color.js"></script>
<script src="<?php echo base_url();?>__statics/global/plugins/jcrop/js/jquery.Jcrop.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>__statics/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>__statics/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>__statics/admin/layout3/scripts/demo.js" type="text/javascript"></script>
	
<script src="<?php echo base_url();?>__statics/admin/pages/scripts/form-image-crop.js"></script>
<script>
jQuery(document).ready(function() {
// initiate layout and plugins
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
FormImageCrop.init();
});


</script>

	


<script type="text/javascript">
 $(document).on('click', 'form#demo8_form', function (event, messages) {
       var form   = $(this);
    
        $.ajax({
            type: "POST",
            url: '<?php echo site_url("datasiswa/crop"); ?>',
            data: form.serialize(),
			success: function (response, status, xhr) {
                var ct = xhr.getResponseHeader("content-type") || "";
                
				alert("Foto Berhasil Tersimpan");
				CloseMySelf("dendi");
            }
        });

        return false;
    });
	function HandlePopupResult(result) {
    alert("result of popup is: " + result);
	
}
	function CloseMySelf(sender) {
		alert("sd")
    try {
		
        window.opener.HandlePopupResult(sender.getAttribute("result"));
    }
    catch (err) {}
    window.close();
    return false;
}
</script>