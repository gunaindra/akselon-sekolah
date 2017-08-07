<?php $attributes = array('class' => 'form-horizontal', 'role'=>'form','name' => 'simpan', 'id' => '', 'method' => "post", 'url' =>site_url("datasiswa/save")); ?>
<?php echo form_open("javascript:void(0)", $attributes); ?>


<input type="hidden" id="tmsiswa_id" class="form-control" value="<?php echo isset($dataform->id) ? $dataform->id:"";  ?>">
<input type="hidden" id="tmjenjang_id" class="form-control" value="<?php echo isset($dataform->tmjenjang_id) ? $dataform->tmjenjang_id:"";  ?>">



<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								 Form Pembayaran Siswa
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
						  
						  
						
						  
						  <div id="jikareguler">
						  
						  
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
									     <th>Jumlah Bayar </th>
									     <th>Sisa Tagihan </th>
									     <th>Status </th>
									   
									   </tr>
									   </thead>
									   
									   <tbody>
									   <?php 
									   $no=1;
									   $status = array("0"=>"Belum Lunas","1"=>"Belum verifikasi","2"=>"Lunas");
									     foreach($data as $row){
										?>
									     <tr id="row<?php echo $row->id; ?>">
											 <td><?php echo $no++; ?></td>
											 <td><?php echo $this->Acuan_model->get_kondisi_a($row->tmkeuangan_id,"id","tm_keuangan","nama"); ?></td>
											 <td><?php echo $this->Acuan_model->formatuang($row->tagihan); ?> </td>
											 <td><input type="text"  id="bayar" value="<?php echo ($row->dibayar !=0) ? $this->Acuan_model->formatuang2($row->dibayar) :""; ?>" class="form-control dibayar" data-id="<?php echo $row->id; ?>" data-tagihan="<?php echo $row->tagihan; ?>" onkeyup="FormatCurrency(this)"></td>
											 <td id="sisa<?php echo $row->id; ?>"><?php echo $this->Acuan_model->formatuang(($row->tagihan-$row->dibayar)); ?> </td>
											 <td ><span class="label label-info" id="status<?php echo $row->id; ?>"> <?php echo ($row->dibayar >= $row->tagihan)  ? "Lunas " :"Belum Lunas"; ?> </span> </td>
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
						
						
				
							
							
							