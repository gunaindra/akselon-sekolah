<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-graduation"></i>
						<a href="javascript:void(0)">Kesiswaan</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo site_url("penetapanruang"); ?>">Penetapan Ruang</a>
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
									
										
									<form class="navbar-form navbar-left" role="search" method="post" id="formcari">
										<input type="hidden" id="urlcari" value="<?php echo site_url("penetapanruang/cari"); ?>">
										
										
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
											  <select class="form-control tmkelas_id " name="tmkelas_id" required>
												     <option value="">- Pilih Kelas -</option>
													 
												  </select>		
										</div>
										
										<div class="form-group">
											<input type="text" size="40" name="keyword" class="form-control" placeholder="By Nama Siswa ">
											
										</div>
										<button type="submit" class="btn btn-success "><span class="glyphicon glyphicon-search"></span> Tampilkan Data</button>
									</form>
									
									
									
									
									
									
									
									
									</div>
								</div>
							</div>
					<?php $attributes = array('class' => 'form-horizontal', 'role'=>'form', 'method' => "post"); ?>
										<?php echo form_open(site_url('penetapanruang/save'), $attributes); ?> 
					<div class="table-scrollable">
						<table class="table table-striped table-bordered table-hover table-header-fixed dataTable" role="grid">
							<thead>
								<tr>
									<th> No </th>
									<th> Jenjang</th>
									<th> Kelas</th>
									<th> Nama Lengkap</th>
									<th> Jenis Kelamin </th>
									<th> Tetapkan Di Ruang</th>
									<th> Status</th>
							  
								  
								</tr>
							</thead>
							<tbody id="loaddata">
							    <tr>
									<td colspan="7" align="center"> Klik Tombol "Tampilkan Data" </td>
								</tr>

					
								
							</tbody>
						</table>
					</div>
						<?php echo form_close(); ?>	
   
           </div>
     </div>