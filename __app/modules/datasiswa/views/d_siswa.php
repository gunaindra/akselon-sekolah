<div class="table-responsive">
<table class="table table-hover table-stripped table-bordered">
											     	<tr>
<td width="20%">NISN (Nomor Induk Sekolah Nasional)</td>
<td>: <?php echo isset($dataform) ? $dataform->nisn :"" ?></td>
</tr>
<tr>
<td width="20%">Nama Lengkap</td>
<td>: <?php echo isset($dataform) ? $dataform->nama :"" ?> </td>
</tr>
<tr>
<td width="20%">Nama Panggilan</td>
<td>: <?php echo isset($dataform) ? $dataform->nama_panggilan :"" ?> </td>
</tr>
<tr>
<td width="20%">Tempat/ Tanggal Lahir</td>
<td>: <?php echo isset($dataform) ? $dataform->tempat_lahir :"" , ", ",  $this->Acuan_model->formattanggalstring($dataform->tgl_lahir); ?> </td>
</tr>
<tr>
<td width="20%">Jenis Kelamin</td>
<td>: <?php echo isset($dataform) ? $dataform->sex :"" ?> </td>
</tr>
<tr>
<td width="20%">Alamat</td>
<td>: <?php echo isset($dataform) ? $dataform->alamat :"" ?> </td>
</tr>
<tr>
<td width="20%">No Handphone</td>
<td>: <?php echo isset($dataform) ? $dataform->hp :"" ?> </td>
</tr>
<tr>
<td width="20%">Email</td>
<td>: <?php echo isset($dataform) ? $dataform->email :"" ?> </td>
</tr>
<tr>
<td width="20%">Tinggi Badan</td>
<td>: <?php echo isset($dataform) ? $dataform->tinggi :"" ?> CM Berat Badan :  <?php echo isset($dataform) ? $dataform->berat :"" , " KG" ?> </td>
</tr>
<tr>
</tr>
<tr>
<td width="20%">Anak Ke</td>
<td>: <?php echo isset($dataform) ? $dataform->anakke :"" ?> dari <?php echo isset($dataform) ? $dataform->saudara :""?> bersaudara</td>
</tr>
<tr>
<td width="20%">Agama</td>
<td>: <?php echo isset($dataform) ? $dataform->agama :"" ?> </td>
</tr>
												 </table>
											  </div>