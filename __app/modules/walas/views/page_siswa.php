<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-graduation"></i>
						<a href="javascript:void(0)">Kepegawaian</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo site_url("walas"); ?>">Penetapan Wali Kelas</a>
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
								<a href="javascript:;" class="collapse tooltips" data-container="body" data-placement="top" title="Collapse">
								</a>
								<a href="javascript:;" class="reload tooltips" data-container="body" data-placement="top" title="Mulai Ulang">
								</a>
								<a href="javascript:;" class="remove tooltips" data-container="body" data-placement="top" title="Hapus">
								</a>
								
								
							</div>
							<div class="actions">
								
								<a class="btn btn-icon-only btn-default btn-sm fullscreen tooltips" data-container="body" data-placement="top" title="Layar Penuh" href="javascript:;" >
								</a>
								
							</div>
						</div>
						<div class="portlet-body">
						
						
							<div class="row">
								<div class="col-md-12 col-sm-12">
								  <div class="alert alert-info" style="font-size:10px">  <?php echo isset($_GET['status']) ? $_GET['status'] :"Pilih Jenjang dan kelas kemudian kelik tampilkan data , Tetapkan Ruang , Kemudian klik tombol Tetapkan yang berada di bawah grid"; ?> </div>
								<div style="float:right">
									
										
									<form class="navbar-form navbar-left" role="search" metdod="post" id="formcari">
										<input type="hidden" id="urlcari" value="<?php echo site_url("walas/cari"); ?>">
										
										
										<div class="form-group">
											     <select class="form-control onchange " required  name="tmjenjang_id" url="<?php echo site_url("ruang/selectkelas"); ?>" target="tmkelas_id">
												     <option value="">- Pilih Jenjang -</option>
													   <?php 
													  
													     foreach($jenjang as $row){
															 
															 ?><option value='<?php echo $row->id; ?>' <?php echo (isset($dataform)) ?  ($dataform->tmjenjang_id==$row->id) ? "selected":"" :"" ?>><?php echo $row->nama; ?></option>"<?php 
														 }
													    ?>
												  </select>
										</div>
										<div class="form-group">
											  <select class="form-control tmkelas_id  onchange" name="tmkelas_id" url="<?php echo site_url("ruang/selectruang"); ?>" target="tmruang_id">
												     <option value="">- Pilih Kelas -</option>
													 
												  </select>		
										</div>
										
										<div class="form-group">
											  <select class="form-control tmruang_id " name="tmruang_id" >
												     <option value="">- Pilih Ruang -</option>
													 
												  </select>		
										</div>
										
										
										<button type="submit" class="btn btn-success "><span class="glyphicon glyphicon-search"></span> Tampilkan Data</button>
									</form>
									
									
									
									
									
									
									
									
									</div>
								</div>
							</div>
					
					<div class="table-scrollable">
						<table class="table table-striped table-bordered table-hover table-header-fixed dataTable" role="grid">
							<thead>
								<tr>
								
									<td> No </td>
									<td> Jenjang</td>
									<td> Kelas </td>
									<td> Ruang  </td>
									<td> Walas  </td>
									<td> Status Penetapan  </td>
									
							  
								  
								</tr>
							</thead>
							<tbody id="loaddata">
							 <?php 
							   $no=1;
							
							     foreach($data_grid as $row){
							 ?>
							    <tr>
								
									<td> <?php echo $no++; ?> </td>
									<td> <?php echo $row->jenjang; ?></td>
									<td> <?php echo $row->kelas; ?> </td>
									<td> <?php echo $row->ruang; ?>  </td>
									<td> <select class="form-control walas" data-id="<?php echo $row->tmruang_id; ?> ">
									   
									      <option value="">- Pilih -</option>
										     <?php 
												   $walas = $this->Acuan_model->get_wherearray("kepegawaian.tm_pegawai",array("tmsekolah_id"=>$_SESSION['tmsekolah_id'],"status_jabatan"=>'guru'));
												   
												      foreach($walas as $rw){
														  
														  ?><option value="<?php echo $rw->id; ?>" <?php echo $this->Model_data->selected($rw->id,$row->tmruang_id); ?> ><?php echo $rw->nama; ?></option>
													  <?php 
													  }
												  
												   ?>



									</td>
									<td id="status<?php echo $row->tmruang_id; ?>"> <?php echo ($this->Model_data->status($row->tmruang_id) !="") ? "<i class='label label-info'> Ditetapkan </i>" : "<i class='label label-info'> Belum </i>"; ?>  </td>
									
							  
								  
								</tr>
							 <?php 
								 }
							 ?>
					
								
							</tbody>
						</table>
					</div>
						
   
           </div>
     </div>
	 
<script type="text/javascript">

		$(document).off("change",".walas").on("change",".walas",function(){
			var id         = $(this).val();
			var tmruang_id = $(this).attr("data-id");
			if(id ==""){
				alertify.alert("Tetntukan Walikelas");
				return false;
			}
			  $("#status"+tmruang_id).html("<i class='label label-warning'> Sedang Merubah.. </i>");
			  
			    $.post("<?php echo site_url("walas/setting"); ?>",{id:id,tmruang_id:tmruang_id},function(){
					
					 $("#status"+tmruang_id).html("<i class='label label-info'> Ditetapkan </i>");
					
			  	})
			
			
		})

</script>