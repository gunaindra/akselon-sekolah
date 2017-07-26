 <?php $attributes = array('class' => 'form-horizontal', 'role'=>'form', 'method' => "post", 'action' => "javascript:void(0)"); ?>
                             <?php echo form_open(site_url('laporanpembayaran/kwitansi'), $attributes); ?>


<input type="hidden" id="tmsiswa_id" class="form-control" value="<?php echo isset($dataform->id) ? $dataform->id:"";  ?>">




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
						  
						  
						
						  
						 	<div class="table-responsive">
									            
									  <table class="table table-striped">
										<thead>
										  <tr>
											<th style="width:5%">No</th>
											<th style="width:25%">Nama Item</th>
										    <th style="width:3%">Quantity</th>
											<th style="width:16%">Price</th>
											<th style="width:10%"><input type="checkbox" class="check form-control" ></th>
											
											
											
										  </tr>
										</thead>
										
										
										 <input type="hidden" name="jumlah" id="jumlah" value="<?php  if(count($datakeuangan) >0) { echo count($datakeuangan); }else{ echo 0; } ?>">
										 <input type="hidden" name="tmsiswa_id" id="tmsiswa" value="<?php echo isset($dataform->id) ? $dataform->id:"";  ?>">
										
										<div id="ubah">
										    <?php 
											
											  if(count($datakeuangan) >0):
											      $no=0;
												  $i_entry=0;
												  $d_entry=0;
												  $i_update=0;
												  $d_update=0;
												  $total_tagihan =0;
												  $total_dibayar =0;
											      foreach($datakeuangan as $datval):
												  $no++;
												  $i_entry	=	$datval->i_entry;
												  $d_entry	=	$datval->d_entry;
												  $i_update	=	$datval->i_update;
												  $d_update	=	$datval->d_update;
												 
												   $total_tagihan = $total_tagihan + $datval->tagihan;
												   $total_dibayar = $total_dibayar + $datval->dibayar;
												  ?>
												   <tr id="row<?php echo $no; ?>">
													<td ><?php echo $no; ?></td>
													<td ><input type='hidden' name='id<?php echo $no; ?>' value='<?php echo $datval->id; ?>'>
													<input type='hidden' name='tmkeuangan_id<?php echo $no; ?>' value='<?php echo $datval->tmkeuangan_id; ?>'><?php echo $this->Acuan_model->get_kondisi($datval->tmkeuangan_id,"id","tm_keuangan","nama"); ?></td>
													<td style="width:5%"><?php echo $this->Acuan_model->formatuang($datval->tagihan); ?></td>
													<td><?php echo $this->Acuan_model->formatuang($datval->dibayar); ?> </td>
													<td><input  type="checkbox" class="form-control" name="item[]" value="<?php echo $datval->id; ?>">
												  </tr>
												  <?php 
												  endforeach;
												  ?>
												   <tr style="font-weight:bold">
													<td colspan="5">Total Tagihan : <?php echo "Rp. ". number_format($total_tagihan, 0 , ',' , '.'); ?> </td>
													
												  </tr>
												  
												   <tr style="font-weight:bold">
													<td colspan="5">Total Dibayar : <?php echo "Rp. ". number_format($total_dibayar, 0 , ',' , '.'); ?> </td>
													
												  </tr>
												  
												  
												    
												  
												  <?php 
												  else:
												  ?>
												  
												   <tr style="font-weight:bold">
													<td colspan="5">Belum ada Item yang di bayar oleh siswa ybs </td>
													
												  </tr>
												  
												  <?php
											   endif;
											?>
												
										</div>
										
									  </table>
									</div>
						  	
								
								<div class="clear"><br></div>
								<div class="alert alert-info">
									<b> Keterangan </b>
									<ol type="square">
									  <li> Silahkan Pilih Item mana saja yang akan di cetak</li>
									  <li> Jika ingin mencetak seluruh item, anda tidak perlu memilih item</li>
									 
									 </ol>
								</div>
								  <div class="form-actions">
										<div class="row">
											<div class="col-md-3 navbar-right">
												
												<button type="submit" class="btn btn-success" ><i class="fa fa-print "></i> Cetak </button>
												<button type="button" class="btn default" id="cancel"><i class="fa fa-repeat "></i> Tutup </button>
											</div>
										</div>
									</div>
						  
						</div>
</div>
						
							<?php echo form_close(); ?>
						
						
				
							
							
							