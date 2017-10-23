<!DOCTYPE html>
<html lang="en" class="">

<head>
<meta charset="utf-8"/>
<title><?php echo $data->title; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>


<link href="<?php echo base_url(); ?>__statics/_start/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url(); ?>__statics/_start/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>__statics/_start/main.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url(); ?>__statics/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>__statics/global/css/plugins-md.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>__statics/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>__statics/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="<?php echo base_url(); ?>__statics/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">

<link href="<?php echo base_url(); ?>__statics/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>__statics/global/plugins/select2/select2.css"/>
<link rel="shortcut icon" href="<?php echo site_url(); ?>__statics/img/logo/<?php echo $data->logo; ?>"/>
</head>

<body quick-markup_injected="true">
	<div class="navbar navbar-inverse navbar-fixed-top" style1="display:none" role="navigation">
	  <div class="container">
	    <div class="navbar-header">
			<div class="page-logo">
				<a class="navbar-brand" href="<?php echo site_url(); ?>"><img style="width:30px;height:30px" class="img-responsive" src="<?php echo base_url(); ?>__statics/img/logo/<?php echo $data->logo; ?>"></a>
			</div>
	    </div>
	  </div>
	</div>
	<br>
	<br>
	<section class="section-page section--intro fill-img" style="background-image:url(<?php echo base_url(); ?>__statics/img/logo/background.png);" >
		<div class="container">
	        <div class="row">
	    		<div class="col-md-8">
	    			<div class="portlet box green">
	    				<div class="portlet-title">
	    					<div class="caption">
	    						<i class="fa fa-book font-white-sharp"></i>
	    						<span class="caption-subject font-white-sharp bold uppercase">Informasi</span>
							</div>
						</div>
					<div class="portlet-body" style="min-height:357px">
						<div class="tabbable-custom ">
							<ul class="nav nav-tabs ">
								<li class="active">
									<a href="#tab_5_0" data-toggle="tab">
									Pembukaan </a>
								</li>
								<li >
									<a href="#tab_5_1" data-toggle="tab">
									Pengumuman </a>
								</li>
								
								<li>
									<a href="#tab_5_2" data-toggle="tab">
									Daftar Online  </a>
								</li>
							</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_5_0">
								<div id="myCarousel" class="carousel slide" data-ride="carousel">
								<!-- Indicators -->
								<!-- Wrapper for slides -->
									<div class="carousel-inner" role="listbox">
										<div class="item active" style="min-height:200px">
											<center><h3><b> Selamat Datang di Sistem Informasi Sekolah </b></h3></center>
											<center><h4> <b> <?php echo $data->namasekolah; ?> </b></h4></center>
											<ol type="square">
												<li> Silahkan  masuk menggunakan akun anda</li>
											</ol>
										</div>							  
									</div>
								<!-- Left and right controls -->
									<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
										<span class="sr-only"></span>
									</a>
									<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
										<span class="sr-only"></span>
									</a>
								</div>
							</div>
							<div class="tab-pane " id="tab_5_1">
							<br>
								<div id="pengumuman" class="carousel slide" data-ride="carousel">
								<!-- Indicators -->
								<!-- Wrapper for slides -->
								
									<div class="carousel-inner" role="listbox">
											<div class="item active" style="min-height:200px">
												<center><h4><b> PENDAFTARAN ONLINE SUDAH DI BUKA, SILAHKAN UNTUK MELAKUKAN PENDAFTARAN </b></h4><br>
												<p>  Pendaftaran Online sudah di buka, silahkan lakukan pendaftaran</p>
												</center>
											</div>
										<?php $pengumuman = $this->Acuan_model->get_pengumuman();
										foreach ($pengumuman as $p) { ?>
											<div class="item" style="min-height:200px">
												<center><h4><b> <?php echo $p->judul; ?></b></h4><br>
												<p> <?php echo $p->isi; ?></p>
												</center>
											</div>
										<?php } ?>
										<!-- <div class="item" style="min-height:200px">
											<center><h4><b> UJIAN NASIONAL </b></h4><br>
											<p> Untuk ujian nasional , akan di selenggarakan pada bulan April </p>
											</center>
										</div> -->
									</div>
									<!-- Left and right controls -->
									<a class="left carousel-control" href="#pengumuman" role="button" data-slide="prev">
									  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									  <span class="sr-only">Previous</span>
									</a>
									<a class="right carousel-control" href="#pengumuman" role="button" data-slide="next">
									  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									  <span class="sr-only">Next</span>
									</a>
								</div>	
							</div>
							<div class="tab-pane" id="tab_5_2">
							<br>
								<div id="donline" class="carousel slide" data-ride="carousel">
								<!-- Indicators -->
								<!-- Wrapper for slides -->
									<div class="carousel-inner" role="listbox">
										<div class="item active">
											<center><h3><b>Pendaftaran Online Siswa </b></h3></center>
											<ol type="square">
												<li> Untuk melakukan pendaftaran online siswa , silahkan klik tombol di bawah </li>
												<li> Sebelum melakukan pendaftaran online , pastikan anda sudah menyiapkan persyaratan yang harus di upload </li>
												<li> Admin akan memverifikasi pendaftaran anda</li>
												<li> Jika pendaftaran anda di terima, kami akan memberitahu anda melalui nomor handphone atau email yang anda cantumkan </li>
											</ol>
											<div class="btn-purchase">
												<a href="<?php echo site_url("pendaftaran"); ?>" target="_blank" class="btn circle btn-success" >Pendaftaran Online</a> 
											</div>
										</div>
									</div>				
								 </div>
							</div>
						</div>
						</div>
					</div>
					</div>
				</div>
				<div class="col-md-4">
				    <div class="login-user" style="height:400px">
				        <h3 class="title title--mod title--iconic">
				            <span>
				                  <span class="fa fa-sign-in "></span>
				                <span class="title-text">Silahkan Masuk</span>
				            </span>
				        </h3>
						 <?php echo (isset($status)) ? $status :""; ?>
						 <div class="clear"></div>
						  <br>
				        <form action="<?php echo site_url("home/do_login"); ?>" class="form" method="post">
				            <fieldset>
							
				                <div class="form__row">
				                    <label for="" class="sr-only">Enter Username</label>
				                    <input name="username" id="username" type="text" autocomplete="yes" class="form-input form-input--larger form-input--block" placeholder="Enter Username" />
				                </div>
				                <div class="form__row">
				                    <label for="" class="sr-only">Enter Password</label>
				                    <input type="password" id="password" name="password" autocomplete="no" class="form-input form-input--larger form-input--block" placeholder="Enter Password" />
				                </div>
				                <div class="form__row form__row--action">
				                    <button type="submit" class="btn btn-success" id="login">
				                         Masuk 
				                        <span class="fa fa-sign-in "></span>
				                    </button>
				                </div>
				            </fieldset>
				        </form>
				    </div>
				</div>
	      	</div>
		</div>
	</section>

    <!-- Main jumbotron for a primary marketing message or call to action -->
<footer>
	<p><center> &copy; copyright <?php echo date("Y"); ?> <?php echo $data->footer;  ?> </center></p>
</footer>
</div> <!-- /container -->

<!-- BEGIN JAVASCRIPTS -->
<!-- BEGIN CORE PLUGINS -->
<script src="<?php echo base_url(); ?>__statics/_start/plugins/jquery.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo base_url(); ?>__statics/_start/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>__statics/global/plugins/select2/select2.min.js" type="text/javascript"></script>
<script>
        window.myPrefix = '<?php echo base_url(); ?>';
    </script>


<script src="<?php echo base_url(); ?>__statics/global/scripts/metronic.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
  

});
</script>
<!-- END CORE PLUGINS -->
<script>
	jQuery(document).ready(function() {    
		$('[data-toggle="tooltip"]').tooltip();
		
		$(document).on("click","#login",function(){
			
			
			 
			  if($("#username").val()==""){
				 
				 $("#username").focus();
				 return false;
			 }
			 
			  if($("#password").val()==""){
				 
				 $("#password").focus();
				 return false;
			 }
			
		})
	});
	
	
</script>
<!-- END JAVASCRIPTS -->
</body> 
<!-- END BODY -->
</html>