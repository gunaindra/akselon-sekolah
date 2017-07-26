 <?php 
							   $no=1;
							
							     foreach($data_grid as $row){
							 ?>
							    <tr>
								
									<td> <?php echo $no++; ?> </td>
									<td> <?php echo $row->jenjang; ?></td>
									<td> <?php echo $row->kelas; ?> </td>
									<td> <?php echo $row->ruang; ?>  </td>
									<td> <select class="form-control walas" data-id="<?php echo $row->tmruang_id; ?> ">
									   
									      <option value="">- Pilih -</option>
										     <?php 
												   $walas = $this->Acuan_model->get_wherearray("kepegawaian.tm_pegawai",array("tmsekolah_id"=>$_SESSION['tmsekolah_id'],"status_jabatan"=>'guru'));
												   
												      foreach($walas as $rw){
														  
														  ?><option value="<?php echo $rw->id; ?>" <?php echo $this->Model_data->selected($rw->id,$row->tmruang_id); ?> ><?php echo $rw->nama; ?></option>
													  <?php 
													  }
												  
												   ?>



									</td>
									<td id="status<?php echo $row->tmruang_id; ?>"> <?php echo ($this->Model_data->status($row->tmruang_id) !="") ? "<i class='label label-info'> Ditetapkan </i>" : "<i class='label label-info'> Belum </i>"; ?>  </td>
									
							  
								  
								</tr>
							 <?php 
								 }
							 ?>
					