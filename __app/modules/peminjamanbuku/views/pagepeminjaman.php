
<div class="table-container">
									<table class="table table-striped table-bordered table-hover" id="datatablebuku">

											<thead>
												<tr>
													<th width="5%"> No </th>
													<th> Judul Buku </th>
													<th> Tanggal Pinjam  </th>
													<th> Harus Kembali  </th>
													
													<th width="10%"> Batal </th>
											   </tr>
											</thead>
											<tbody>
											<?php 
											  if(count($peminjaman) >0){
												  $no=1;
												  foreach($peminjaman as $val){
											 ?>
											  <tr id="peminjaman<?php echo $val->trbuku_id; ?>">
													<td width="5%"> <?php echo $no++; ?> </td>
													<td> <?php echo $val->nama; ?></td>
													<td> <?php echo $this->Acuan_model->formattanggalstring($val->tgl_pinjam); ?>  </td>
													<td> <?php echo $this->Acuan_model->formattanggalstring($val->harus_kembali); ?> </td>
													
													<td width="10%"> <?php echo '<a href="javascript:;" class="btn btn-danger batalpinjam tooltips" data-container="body" data-placement="top" title="Hapus Data" datanya="'.$val->trbuku_id.'"><i class="fa fa-trash-o"></i></a>'; ?> </td>
											   </tr>
											   
											   <?php 
												  }
											  }
											  ?>
											</tbody>
										</table>
							  </div>
							  
							  			
				