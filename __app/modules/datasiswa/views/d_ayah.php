<div class="table-responsive">
	<table class="table table-hover table-stripped table-bordered">
		<tr>
			<td width="20%">Nama Ayah</td>
			<td>: <?php echo isset($dataform) ? $dataform->nama_ayah :"" ?> </td>
		</tr>
		<tr>
			<td width="20%">Pekerjaan Ayah</td>
			<td>: <?php echo isset($dataform) ? $dataform->pekerjaan_ayah :"" ?> </td>
		</tr>
		<tr>
			<td width="20%">Pendidikan Ayah</td>
			<td>: <?php echo isset($dataform) ? $dataform->nama_ayah :"" ?> </td>
		</tr>
		<tr>
			<td width="20%">Tempat/ Tanggal Lahir</td>
			<td>: <?php echo isset($dataform) ? $dataform->tempat_lahir_ayah :"" , ", ",  $this->Acuan_model->formattanggalstring($dataform->tgl_lahir_ayah); ?> </td>
		</tr>
		<tr>
			<td width="20%">Alamat</td>
			<td>: <?php echo isset($dataform) ? $dataform->alamat_ayah :"" ?> </td>
		</tr>
		<tr>
			<td width="20%">No Handphone</td>
			<td>: <?php echo isset($dataform) ? $dataform->hp_ayah :"" ?> </td>
		</tr>
		<tr>
			<td width="20%">Email</td>
			<td>: <?php echo isset($dataform) ? $dataform->email_ayah :"" ?> </td>
		</tr>
	</table>
</div>