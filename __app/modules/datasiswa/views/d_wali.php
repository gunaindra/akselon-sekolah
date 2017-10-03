<div class="table-responsive">
	<table class="table table-hover table-stripped table-bordered">
		<tr>
			<td width="20%">Nama Wali</td>
			<td>: <?php echo isset($dataform) ? $dataform->nama_wali :"" ?> </td>
		</tr>
		<tr>
			<td width="20%">Pekerjaan Wali</td>
			<td>: <?php echo isset($dataform) ? $dataform->pekerjaan_wali :"" ?> </td>
		</tr>
		<tr>
			<td width="20%">Pendidikan Wali</td>
			<td>: <?php echo isset($dataform) ? $dataform->pendidikan_wali :"" ?> </td>
		</tr>
		<tr>
			<td width="20%">Tempat/ Tanggal Lahir</td>
			<td>: <?php echo isset($dataform) ? $dataform->tempat_lahir_wali :"" , ", ",  $this->Acuan_model->formattanggalstring($dataform->tgl_lahir_wali); ?> </td>
		</tr>
		<tr>
			<td width="20%">Alamat</td>
			<td>: <?php echo isset($dataform) ? $dataform->alamat_wali :"" ?> </td>
		</tr>
		<tr>
			<td width="20%">No Handphone</td>
			<td>: <?php echo isset($dataform) ? $dataform->hp_wali :"" ?> </td>
		</tr>
		<tr>
			<td width="20%">Email</td>
			<td>: <?php echo isset($dataform) ? $dataform->email_wali :"" ?> </td>
		</tr>
	</table>
</div>