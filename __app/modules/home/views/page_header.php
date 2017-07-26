<!DOCTYPE html>
<html lang="en" class="no-js">
<?php 
  $sekolah = $this->Acuan_model->sekolah();
  // die(var_dump($sekolah));
?>
<head>
<meta charset="utf-8"/>
<title><?php echo isset($title) ? $title:" Dashboard ".$data->title; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>

<link href="<?php echo base_url(); ?>__statics/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>__statics/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>__statics/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>__statics/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>__statics/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>__statics/js/summernote/summernote.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>__statics/js/summernote/summernote-bs3.css" rel="stylesheet">

<link href="<?php echo base_url(); ?>__statics/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>__statics/global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>__statics/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>__statics/admin/layout/css/themes/blue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo base_url(); ?>__statics/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>__statics/js/datatable/button.css" rel="stylesheet" type="text/css"/>
<!-- include -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>__statics/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>__statics/js/datepicker/datepicker.css"/>
<link href="<?php echo base_url(); ?>__statics/js/datatable/datatables.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>__statics/js/datatable/table.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>__statics/js/alertify/css/alertify.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>__statics/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>__statics/js/proses.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>__statics/js/datatable/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>__statics/js/datatable/datatable.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>__statics/js/datatable/bootstrap.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>__statics/js/datatable/button.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>__statics/js/datatable/jszip.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>__statics/js/datatable/pdf.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>__statics/js/datatable/font.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>__statics/js/datatable/html5.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>__statics/js/datatable/colvis.js" type="text/javascript"></script>

<style type="text/css">

    @media screen and (min-width: 768px) {

        .modal-dialog {

          width: 700px; /* New width for default modal */

        }

        .modal-sm {

          width: 350px; /* New width for small modal */

        }

    }

    @media screen and (min-width: 992px) {

        .modal-lg {

          width: 950px; /* New width for large modal */

        }

    }

</style>






<!-- END THEME STYLES -->

<link rel="shortcut icon" href="<?php echo site_url(); ?>__statics/img/logo/<?php echo $sekolah->logo; ?>"/>
</head>

<body class="page-md page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo ">
<!-- BEGIN HEADER -->
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo" style="width:300px" >
			<a href="javascript:void(0)" class="sidebar-toggler" style="color:white;text-decoration:none">
			 <h4 style="color:white;text-decoration:none"><b><?php echo $sekolah->namasekolah; ?> </b></h4>
			</a>
			
					
					
					
				
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="" >
						<a href="<?php echo site_url("pengaturan/tahun"); ?>" style="color:white">
						<span class=" 	glyphicon glyphicon-off"></span> Academic Year <?php echo $sekolah->ajaran; ?>/<?php echo $sekolah->ajaran+1; ?> </a>
			     </li>
				  
				  <li class="">
						<a href="<?php echo site_url("pengaturan/semester"); ?>" style="color:white" >
						<span class=" 	glyphicon glyphicon-off"></span> Semester <?php echo $sekolah->semester; ?></a>
			      </li>
				  
				  
				<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
					<a href="javascript:;" class="dropdown-toggle apemberitahuan" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" id="">
					<i class="icon-bell"></i>
					<span class="badge badge-default" id="pemberitahuan"> </span>
					</a>
					<ul class="dropdown-menu">
						<li class="external">
							<h3>Notification</h3>
							
						</li>
						<li>
							<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283" id="loadpemberitahuan">
								
								
							</ul>
						</li>
					</ul>
				</li>
			
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="<?php echo base_url(); ?>__statics/img/logo/<?php echo $sekolah->logo; ?>"/>
					<span class="username username-hide-on-mobile">
					 <?php echo $_SESSION['nama']; ?> </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
					
						
						
						<li>
							<a href="<?php echo site_url("home/logout"); ?>">
							<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
				<!-- BEGIN QUICK SIDEBAR TOGGLER -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-quick-sidebar-toggler">
					<a href="<?php echo site_url("home/logout"); ?>" class="dropdown-toggle">
					<i class="icon-logout"></i>
					</a>
				</li>
				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		
		<div class="page-sidebar navbar-collapse collapse">
		<?php $this->load->view("page_menu"); ?>
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
	  <div class="page-content">
              <?php $this->load->view(isset($konten) ? $konten :"page_default"); ?>
	  </div>
	</div>

	<a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>
	<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		<?php echo date("Y"); ?> &copy; copyright by <?php echo $sekolah->footer; ?>
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>


<script src="<?php echo base_url(); ?>__statics/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>__statics/js/alertify/alertify.js"></script>
<script src="<?php echo base_url(); ?>__statics/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>__statics/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>__statics/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>__statics/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>__statics/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>__statics/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>__statics/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>__statics/global/plugins/select2/select2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>__statics/js/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>__statics/js/summernote/summernote.min.js"></script>

<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<!-- include -->



<!-- end include -->

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url(); ?>__statics/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>__statics/admin/layout/scripts/layout.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   
});

function ceknotif(){
	   
	   $.post("<?php echo site_url("home/cek"); ?>",function(data){
			$("#pemberitahuan").text(data);
			
		})
  
    }
setInterval(ceknotif,1000);
 
 $(document).on("mouseenter",".apemberitahuan",function(){
	 
	  $.post("<?php echo site_url("home/get_pemberitahuan"); ?>",function(data){
			$("#loadpemberitahuan").html(data);
			
		})
	 
	 
 })
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>