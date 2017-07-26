
	<ul class="page-sidebar-menu page-sidebar-menu-light" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
			
  <?php 
    $segment1 = $this->uri->segment(4);
    $segment2 = $this->uri->segment(5);
	
	$segment1  .= (!empty($segment2)) ? "/".$segment2 :"";
	
	$tmmenu_id  = $this->Acuan_model->get_kondisi($segment1,"link","public.tm_menu","parent_id");
  ?>
		
				
				<li class="<?php echo ($segment2=="dashboard") ? "active" :"" ; ?>">
					<a href="<?php echo site_url("home/dashboard"); ?>">
					<i class="icon-home"></i><span class="title">Dashboard </span>
					</a>
					
					
				</li>
			
			 <?php 
			   $menu = $this->Acuan_model->indukmenu()->result();
			     if(count($menu) >0){
					 foreach($menu as $row){
				?>
				<li class="<?php echo ($tmmenu_id==$row->id_menu) ? "active open" :"" ; ?>">
					<a href="javascript:;">
					<i class="<?php echo $row->icon; ?>"></i>
					<span class="title"> <?php echo $row->menu; ?>  </span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
					    <?php 
						   $submenu = $this->Acuan_model->submenu($row->id_menu)->result();
							 if(count($submenu) >0){
								 foreach($submenu as $rowsub){
							?>
						<li class="<?php echo ($segment1==$rowsub->link) ? "active" :"" ; ?>">
							<a href="<?php echo site_url($rowsub->link); ?>">
							<i class="icon-link"></i>
							 <?php echo $rowsub->menu; ?> </a>
						</li>
						
						  <?php 
								 }
							 }
						 ?>
						
						
						
					</ul>
				</li>
			   <?php 
					 }
				}
				
			  ?>
				
				<li class=" ">
					<a href="<?php echo site_url("home/logout"); ?>">
					<i class="icon-logout "></i><span class="title"> Keluar </span>
					</a>
					
					
				</li>
				
				
				
			</ul>
		