
<div class="portlet box red">
	<div class="portlet-title">
		<div class="caption">
			 Absen Siswa
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
	<div class="portlet-body" id="headerawal">

	       <div class="row" style="display: none;" id="errorvalidation">
				<div class="col-md-12">
					<div class="note note-success note-bordered" id="messagevalidation"></div>
				</div>
			</div>
			
			<div class="tabbable-custom">							
				<div class="tab-content">
					<div class="tab-pane active" id="akunsiswa">
					  <div class="table-responsive">
					  	<H1>Absen</H1>
					  	<?php
					  		echo json_encode($absen);
					  	 ?>
					  </div>
					</div>
				</div>	
		  </div>								
		<div class="clear"><br></div>
		 <div class="form-actions">
				<div class="row">
					<div class="col-md-3 navbar-right">
						
						<button type="button" class="btn default" id="cancel"><i class="fa fa-close "></i> Tutup</button>
					</div>
				</div>
			</div>
	</div>
</div>
<?php echo form_close(); ?>
						
						
				
							
							
							