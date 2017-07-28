<?php $attributes = array('class' => 'form-horizontal', 'role'=>'form','name' => 'simpan', 'id' => '', 'method' => "post", 'url' =>site_url("/save")); ?>
<?php echo form_open("javascript:void(0)", $attributes); ?>


<input type="hidden" id="tmjenjang_id" class="form-control" value="<?php echo isset($dataform->tmjenjang_id) ? $dataform->tmjenjang_id:"";  ?>">
<input type="hidden" id="tmkelas_id" class="form-control" value="<?php echo isset($dataform->tmkelas_id) ? $dataform->tmkelas_id:"";  ?>">
<input type="hidden" id="tmruang_id" class="form-control" value="<?php echo isset($dataform->tmruang_id) ? $dataform->tmruang_id:"";  ?>">



<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								 Penjadwalan Pelajaran
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
						  <div class="table-responsive">
						    <table class="table table-hover">
							  <tr>
							     <td style="font-weight:bold" width="20%"> Jenjang </td>
							     <td>: <?php echo isset($dataform->jenjang) ? $dataform->jenjang:"";  ?></td>
								 
								 <td style="font-weight:bold"  width="20%"> Kelas  </td>
							     <td>: <?php echo isset($dataform->kelas) ? $dataform->kelas:"";  ?></td>
						
						         <td style="font-weight:bold"  width="20%"> Ruang  </td>
							     <td>:<?php echo isset($dataform->ruang) ? $dataform->ruang:"";  ?></td>
								 
								
						
						      </tr>
							  <tr>
							     <td style="font-weight:bold"  width="20%"> Ajaran  </td>
							     <td>:<?php echo $this->Acuan_model->ajaran() ?>/<?php echo $this->Acuan_model->ajaran()+1 ?></td>
								 
								  <td style="font-weight:bold"  width="20%"> Semester  </td>
							     <td colspan="4">:<?php echo $this->Acuan_model->semester() ?></td>
								</tr>
							 </table>
						
						
						  </div>
						  
						  
						
						  
						  <div id="jikareguler">
						  <center><h4> Buat Jadwal Pelajaran </h4></center>
						  
						    <div class="table-responsive">
						    <table class="table table-hover">
							  <tr>
							   <td>
							     <select class="form-control" id="hari">
								  <option value=""> Pilih Hari </option>
								    <?php 
									  $data['hari']   = array("1"=>"Senin","2"=>"Selasa","3"=>"Rabu","4"=>"Kamis","5"=>"Jumat","6"=>"Sabtu","7"=>"Minggu");
									  
										   foreach($data['hari'] as $index=>$hr){
											   
											   ?><option value="<?php echo $index ?>" ><?php echo $hr ?></option><?php 
											   
										   }
										   
									   
									  ?>
								 
								 </select>


							   </td>
							   
							      <td>
							     <select class="form-control" id="jam">
								  <option value=""> Pilih Jam </option>
								    <?php 
									  $jam   =  $this->Acuan_model->get_where2("tm_jam",array("tmsekolah_id"=>$_SESSION['tmsekolah_id']))->result();
									  
										   foreach($jam as $j){
											   
											   ?><option value="<?php echo $j->id ?>" ><?php echo $j->nama ?></option><?php 
											   
										   }
										   
									   
									  ?>
								 
								 </select>


							   </td>
							   
							    <td>
							    <select class="form-control onchange "  id="mapel" url="<?php echo site_url("penjadwalan/changeguru"); ?>" target="tmguru_id">
								  <option value=""> Pilih Pelajaran </option>
								    <?php 
									  $jam   =  $this->Acuan_model->get_where2("tm_pelajaran",array("tmsekolah_id"=>$_SESSION['tmsekolah_id']))->result();
									  
										   foreach($jam as $j){
											   
											   ?><option value="<?php echo $j->id ?>" ><?php echo $j->nama ?></option><?php 
											   
										   }
										   
									   
									  ?>
								 
								 </select>


							   </td>
							   
							    <td>
							    <select class="form-control  tmguru_id"  id="tmguru_id" >
								  <option value=""> Pilih Guru  </option>
								    
								 
								 </select>


							   </td>
						
						      <td> <button type="button" class="btn green" id="simpanjadwal"><i class="fa fa-save"></i> Tambah  </button></td>
						      </tr>
							 </table>
						
						
						  </div>
						  
						  <div class="table-responsive" id="loaddata">
                             <?php 
							   if(count($datagrid) >0){
								  
								    ?>
									 <table class="table table-hover table-bordered table-striped">
									   <thead>
									   <tr>
									     <th>No</th>
									     <th>Hari </th>
									     <th>Jam </th>
									     <th>Mata Pelajaran </th>
									     <th>Guru </th>
									     <th> Aksi </th>
									   </tr>
									   </thead>
									   
									   <tbody>
									   <?php 
									   $no=1;
									  
									     foreach($datagrid as $row){
										?>
									     <tr id="row<?php echo $row->id; ?>">
											 <td><?php echo $no++; ?></td>
											 <td><?php echo $row->nama_hari; ?></td>
											 <td><?php echo $row->jam; ?></td>
											 <td><?php echo $row->pelajaran; ?></td>
											 <td><?php echo $row->guru; ?></td>
											
											 <td> <a href="javascript:;" class="btn btn-success deleteone tooltips" data-container="body" data-placement="top"  title="Hapus Data" datanya="<?php echo $row->id; ?>"  ><i class="fa fa-trash-o"></i></a> </td>
									     </tr>
										<?php 
										 }
										?>
									   </tbody>
									 
									 
									 </table>
								   
								   
								   
								   <?php 
								   
							   }
							   
							  ?>
						  
						  </div>
						  
						  
						 </div>
						  
						  	
								
								<div class="clear"><br></div>
								<div class="alert alert-info">
									<b> Keterangan </b>
									<ol type="square">
									  <li> Silahkan Buat Tagihan Siswa</li>
									  <li> Item Tagihan di ambil dari master Item Tagihan</li>
									 </ol>
								</div>
								  <div class="form-actions">
										<div class="row">
											<div class="col-md-3 navbar-right">
												
												<button type="button" class="btn default" id="cancel"><i class="fa fa-repeat "></i> Selesai </button>
											</div>
										</div>
									</div>
						  
						</div>
</div>
						
							<?php echo form_close(); ?>
						
						
				
							
							
							