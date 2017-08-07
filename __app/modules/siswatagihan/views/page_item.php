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
									   $status = array("0"=>"Belum Lunas","1"=>"Belum verifikasi","2"=>"Sudah di Bayar");
									     foreach($data as $row){
										?>
									     <tr id="row<?php echo $row->id; ?>">
											 <td><?php echo $no++; ?></td>
											 <td><?php echo $this->Acuan_model->get_kondisi_a($row->tmkeuangan_id,"id","tm_keuangan","nama"); ?></td>
											 <td><?php echo $this->Acuan_model->formatuang($row->tagihan); ?>  </td>
											 <td><span class="label label-info"><?php echo $status[$row->status]; ?> </span> </td>
											 <td> <?php echo ($row->status !=2 && isset($privileges->c_delete) && $privileges->c_delete == '1') ? '<a href="javascript:;" class="btn btn-success deleteone tooltips" data-container="body" data-placement="top"  title="Hapus Data" datanya="'.$row->id.'"  ><i class="fa fa-trash-o"></i></a>' :'<span class="label label-warning"> Tidakk Tersedia </span>'; ?> </td>
									     </tr>
										<?php 
										 }
										?>
									   </tbody>
									 
									 
									 </table>
								   