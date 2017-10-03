<tr>
<td width="20%">NIS (Nomor Induk Sekolah)</td>
<td>: <?php echo isset($dataform) ? $dataform->nis :"" ?></td>
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
<tr>
<td width="20%">Sekolah Asal</td>
<td>: <?php echo isset($dataform) ? $dataform->sekolah_asal :"" ?> </td>
</tr>
<tr>
<td width="20%">Alamat Sekolah Asal</td>
<td>: <?php echo isset($dataform) ? $dataform->alamat_sekolah_asal :"" ?> </td>
</tr>
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
