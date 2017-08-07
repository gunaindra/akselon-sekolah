<?php $attributes = array('class' => 'form-horizontal', 'role'=>'form','name' => 'simpan', 'id' => '', 'method' => "post", 'url' =>site_url("datasiswa/save")); ?>
<?php echo form_open("javascript:void(0)", $attributes); ?>


<input type="hidden" id="tmsiswa_id" class="form-control" value="<?php echo isset($dataform->id) ? $dataform->id:"";  ?>">
<input type="hidden" id="tmjenjang_id" class="form-control" value="<?php echo isset($dataform->tmjenjang_id) ? $dataform->tmjenjang_id:"";  ?>">



<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								 Form Tagihan Siswa
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
							     <td style="font-weight:bold" width="10%"> Nama Siswa </td>
							     <td>: <?php echo isset($dataform->nama) ? $dataform->nama:"";  ?></td>
								 
								 <td style="font-weight:bold"  width="10%"> Jenjang  </td>
							     <td>: <?php echo isset($dataform->jenjang) ? $dataform->jenjang:"";  ?></td>
						
						         <td style="font-weight:bold"  width="10%"> Kelas  </td>
							     <td>:<?php echo isset($dataform->kelas) ? $dataform->kelas:"";  ?></td>
						
						      </tr>
							 </table>
						
						
						  </div>
						  
						  
						  <div class="table-responsive">
						    <table class="table table-hover">
							  <tr>
							     <td style="font-weight:bold" width="10%"> Kategori  </td>
							     <td> <input type="radio" value="1" name="kategori"  id="reguler" style="cursor:pointer"><label for="reguler" style="cursor:pointer"> Reguler </label> &nbsp;&nbsp;
								      <input type="radio" value="2" name ="kategori" id="beasiswa" style="cursor:pointer"><label for="beasiswa" style="cursor:pointer"> Beasiswa </label>
								 </td>
								 <td> <span class="label label-info"> Silahkan Pilih Kategori Siswa </span></td>
						
						      </tr>
							 </table>
						
						
						  </div>
						  
						  <div id="jikareguler">
						  <center><h4> Item Tagihan </h4></center>
						  
						    <div class="table-responsive">
						    <table class="table table-hover">
							  <tr>
							   <td>
							     <select class="form-control" id="itemtagihan">
								  <option value=""> Pilih Tagihan </option>
								    <?php 
									   if(count($item) >0){
										   foreach($item as $rt){
											   
											   ?><option value="<?php echo $rt->id; ?>" data-jumlah="<?php echo $this->Acuan_model->formatuang2($rt->jumlah); ?>"><?php echo $rt->nama; ?></option><?php 
											   
										   }
										   
									   }
									  ?>
								 
								 </select>


							   </td>
						
						       <td> <input type="text" class="form-control" name="jumlah" id="jumlah" onkeyup="FormatCurrency(this)" placeholder="Jumlah Tagihan"></td>
						       <td> <button type="button" class="btn green" id="simpantagihan"><i class="fa fa-save"></i> Tambah </button></td>
						      </tr>
							 </table>
						
						
						  </div>
						  
						  <div class="table-responsive" id="loaddata">
                             <?php 
							   if(count($data) >0){
								    ?>
									 <table class="table table-hover table-bordered table-striped">
									   <thead>
									   <tr>
									     <th>No</th>
									     <th>Nama Tagihan</th>
									     <th>Jumlah Tagihan</th>
									     <th> Status </th>
									     <th> Aksi </th>
									   </tr>
									   </thead>
									   
									   <tbody>
									   <?php 
									   $no=1;
									   $status = array("0"=>"Belum Lunas","1"=>"Belum verifikasi","2"=>"Sudah di bayar");
									     foreach($data as $row){
										?>
									     <tr id="row<?php echo $row->id; ?>">
											 <td><?php echo $no++; ?></td>
											 <td><?php echo $this->Acuan_model->get_kondisi_a($row->tmkeuangan_id,"id","tm_keuangan","nama"); ?></td>
											 <td><?php echo $this->Acuan_model->formatuang($row->tagihan); ?> </td>
											 <td><span class="label label-info"><?php echo $status[$row->status]; ?> </span> </td>
											 <td> <?php echo ($row->status !=2 && isset($privileges->c_delete) && $privileges->c_delete == '1') ? '<a href="javascript:;" class="btn btn-success deleteone tooltips" data-container="body" data-placement="top"  title="Hapus Data" datanya="'.$row->id.'"  ><i class="fa fa-trash-o"></i></a>' :'<span class="label label-warning"> Tidakk Tersedia </span>'; ?> </td>
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
						
						
				
							
							
							