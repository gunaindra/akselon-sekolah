<script type="text/javascript">
    // return the value to the parent window
    function returnYourChoice(choice){
        opener.setSearchResult(targetField, choice);
        window.close();
    }
</script>
<script src="<?php echo base_url();?>__statics/global/plugins/jquery.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>__statics/global/plugins/jcrop/css/jquery.Jcrop.min.css" rel="stylesheet"/>
<link href="<?php echo base_url();?>__statics/admin/pages/css/image-crop.css" rel="stylesheet"/>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>__statics/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>__statics/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>__statics/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>__statics/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo base_url();?>__statics/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>__statics/global/css/plugins.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>__statics/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>__statics/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="<?php echo base_url();?>__statics/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
            <script type="text/javascript">
			var base_url =' <?php echo base_url(); ?>';
			</script>
            <script type="text/javascript" src="<?php echo base_url();?>__statics/js/cam/webcam.js"></script>
             
    <script>
        webcam.set_api_url( '<?php echo site_url("datasiswa/ambilfoto"); ?>' );
        webcam.set_quality( 100 ); // JPEG quality (1 - 100)
        webcam.set_shutter_sound( true ); // play shutter click sound
        
        webcam.set_hook( 'onComplete', 'my_completion_handler' );
        
        function take_snapshot() {
            // take snapshot and upload to server
            document.getElementById('upload_results').innerHTML = 'Snapshot<br>'+
            '<img src="<?php echo base_url(); ?>__statics/js/cam/uploading.gif">';
            webcam.snap();
        }
        
        function my_completion_handler(msg) {
            // extract URL out of PHP output
            
              $('#upload_results').html(msg) 
              
            
            
        }
		
		   function batal() {
            // extract URL out of PHP output
            
      
                webcam.reset();
				   document.getElementById('upload_results').innerHTML = 'Snapshot<br>'+
            '<img src="<?php echo base_url(); ?>__statics/img/image.jpg">';
            
            
        }
    </script>
	
			<div class="row">
				<div class="col-md-3">
					<!-- BEGIN Portlet PORTLET-->
					<div class="portlet box green-meadow">
						<div class="portlet-title">
							<div class="caption">
								<span class="glyphicon glyphicon-camera"></span> Pemotretan 
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body">
	            
                <script>
                document.write( webcam.get_html(320, 200) );
                </script>
                </div>
                <button type="button" class="snap btn btn-large danger"  onClick="take_snapshot()"><span class="glyphicon glyphicon-camera"></span> Ambil Foto </button>
                <button type="button" class="snap btn btn-large green"  onClick="batal()"><span class="glyphicon glyphicon-remove-circle"></span> Batal </button>
				</div>
				</div>
				</div>
				</div>
            
           
				<div class="row">
				<div class="col-md-3">
					<!-- BEGIN Portlet PORTLET-->
					<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Hasil Foto
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body">
						
						
								<div id="upload_results" class="border">
									
										<img src="<?php echo base_url();?>__statics/js/cam/logo.jpg" id="demo8" alt="Ambil Foto" />
											
								   
								</div>
		</div>
					</div>
					</div>
					</div>
       
