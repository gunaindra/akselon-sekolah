
<div class="table-responsive">
	<table class="table table-hover table-stripped table-bordered">
		<tr>
			<td width="20%"> NIK </td>
			<td width="20%"> <?php echo $dataform->nik; ?> </td>
		</tr>
		<tr>
			<td> NIP </td>
			<td> <?php echo $dataform->nip; ?> </td>
		</tr>
		<tr>
			<td> Nama </td>
			<td> <?php echo $dataform->nama; ?> </td>
		</tr>
		<tr>
			<td> Tempat/Tanggal Lahir </td>
			<td> <?php echo $dataform->tempat." / ". $this->Acuan_model->formattanggalstring($dataform->tgl_lahir); ?> </td>
		</tr>
		<tr>
			<td> Gender </td>
			<td> <?php echo $dataform->jk; ?> </td>
		</tr>
		<tr>
			<td> Alamat </td>
			<td> <?php echo $dataform->alamat; ?> </td>
		</tr>
		<tr>
			<td> No Handphone </td>
			<td> <?php echo $dataform->hp; ?> </td>
		</tr>
		<tr>
			<td> Email </td>
			<td> <?php echo $dataform->email; ?> </td>
		</tr>
		<tr>
			<td> Status Pegawai </td>
			<td> <?php echo $dataform->status_pegawai; ?> </td>
		</tr>
		<tr>
			<td> Status Jabatan </td>
			<td> <?php echo $dataform->status_jabatan; ?> </td>
		</tr>
			<tr>
			<td> Pendidikan Terakhir </td>
			<td> <?php echo $dataform->pendidikan; ?> </td>
	</table>
</div>      				
							
							
							