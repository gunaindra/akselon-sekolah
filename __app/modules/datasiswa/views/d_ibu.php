<div class="table-responsive">
	<table class="table table-hover table-stripped table-bordered">
		<tr>
			<td width="20%">Nama Ibu</td>
			<td>: <?php echo isset($dataform) ? $dataform->nama_ibu :"" ?> </td>
		</tr>
		<tr>
			<td width="20%">Pendidikan Ibu</td>
			<td>: <?php echo isset($dataform) ? $dataform->pendidikan_ibu :"" ?> </td>
		</tr>
		<tr>
			<td width="20%">Tempat/ Tanggal Lahir</td>
			<td>: <?php echo isset($dataform) ? $dataform->tempat_lahir_ibu :"" , ", ",  $this->Acuan_model->formattanggalstring($dataform->tgl_lahir_ibu); ?> </td>
		</tr>
		<tr>
			<td width="20%">Alamat</td>
			<td>: <?php echo isset($dataform) ? $dataform->alamat_ibu :"" ?> </td>
		</tr>
		<tr>
			<td width="20%">No Handphone</td>
			<td>: <?php echo isset($dataform) ? $dataform->hp_ibu :"" ?> </td>
		</tr>
		<tr>
			<td width="20%">Email</td>
			<td>: <?php echo isset($dataform) ? $dataform->email_ibu :"" ?> </td>
		</tr>
		<tr>
			<td width="20%">Alamat</td>
			<td>: <?php echo isset($dataform) ? $dataform->alamat_ibu :"" ?> </td>
		</tr>
	</table>
</div>