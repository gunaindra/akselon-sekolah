
<div class="table-container">
<table class="table table-striped table-bordered table-hover" id="datatablebuku">

	<thead>
		<tr>
			<th width="5%"> No </th>
			<th> Judul Buku </th>
			<th> Tanggal Pinjam  </th>
			<th> Harus Kembali  </th>
			<th> Denda  </th>
			
			<th width="10%"> Kembalikan </th>
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
			<td> <?php 
					$tgl = $this->Acuan_model->formattanggalstring($val->harus_kembali);
					$sekarang = $this->Acuan_model->formattanggalstring(date('Y-m-d'));
					if($sekarang > $tgl){
						$denda=$sekarang-$tgl;
						$subdenda = floor($denda/3);
						$status_denda = "Sudah Dibayar";
						echo "Rp".$a = $subdenda*2000;
					}
					else{
						$status_denda = "Tidak ada denda";
						echo "Rp".$a=0;
					}

			 ?> </td>
			
			<td width="10%"> <?php echo '<a href="javascript:;" class="btn btn-warning kembalikan tooltips" data-container="body" data-placement="top" title="Kembalikan Buku" datanya="'.$val->trbuku_id.'" denda="'.$a.'" status="'.$status_denda.'"><i class="fa fa-check-circle"></i></a>'; ?> </td>
	   </tr>
	   
	   <?php 
		  }
	  }
	  ?>
	</tbody>
</table>
</div>
							  
							  			
				