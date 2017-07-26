     

  <?php if (isset($data_grid)): 
				     if(count($data_grid) >0): 
					 ?>
					   
                    <?php
                    $i = 1;
                    foreach ($data_grid as $val):
                        ?>
						
                        <tr id="row<?php echo $val['id_now']; ?>">
                            <td> <?php echo $i; ?> </td>
                            <td> <?php echo $val['jenjang'] ?> </td>
                            <td> <?php echo $val['kelas'] ?> </td>
                            <td> <?php echo $val['nama'] ?> </td>
                            <td> <?php echo $val['sex'] ?> </td>
                            <td>
							
								<input type="hidden" value="<?php echo $val['id']; ?>" name="tmsiswa_id<?php echo $i; ?>">
								<select name="tmruang_id<?php echo $i; ?>" id="tmruang_id" class="form-control select2me input-sm">
								<?php 
								 if(count($ruang) >0):
									foreach($ruang as $row):
									  
										?><option value="<?php echo $row->id;?>" <?php  if($row->id==$val['tmruang_id']){ echo "selected"; } ?>> <?php echo $row->nama;?></option><?php
									
									endforeach;
								 endif;
								 ?>
                                </select>


							</td>
							
                           <td> <?php echo (empty($val['tmruang_id'])) ? "<span class='label label-success'> Belum ditetapkan </span>" : "<span class='label label-success'> Sudah ditetapkan </span>"; ?> </td>
							 
                        </tr>
                        <?php
                        $i++;
                    endforeach;
                    ?>
					
					<tr>
                        <td colspan="7" align="center" >
							<input type="hidden" value="<?php echo $val['tmjenjang_id']; ?>" name="tmjenjang_id">
							<input type="hidden" value="<?php echo $val['tmkelas_id']; ?>" name="tmkelas_id">
							<input type="hidden" name="jumlahdata" value="<?php echo $i; ?>">
												<button type="submit" class="btn green"><span class="fa fa-exchange"></span> Tetapkan</button>
												<button type="reset" class="btn default"><span class="fa fa-remove"></span>  Cancel</button>
											

						</td>
                    </tr>
					
			
                <?php else: ?>
                    <tr>
                        <td colspan="7">  Data Siswa Penetapan Ruang tidak ada </td>
                    </tr>
                <?php endif; else: ?>
				 <tr>
                        <td colspan="7"> Pilih Jenjang dan klik icon pencarian untuk menampilkan data </td>
                 </tr>
				<?php endif; ?>
				