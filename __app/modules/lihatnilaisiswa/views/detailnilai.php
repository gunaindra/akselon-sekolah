
<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								 List Nilai
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
								
								
							</div>
							<div class="actions">
								
								<a class="btn btn-icon-only btn-default btn-sm fullscreen" href="javascript:;" data-original-title="" title="">
								</a>
								
							</div>
						</div>
						<div class="portlet-body" id="headerawal">
						
						           <div class="row" style="display: none;" id="errorvalidation">
										<div class="col-md-12">
											<div class="note note-success note-bordered" id="messagevalidation"></div>
										</div>
									</div>
									
									<div class="tabbable-custom">							
										<div class="tab-content">
											<div class="tab-pane active" id="akunsiswa">
											  <div class="table-responsive">
											  	<H1>Ulangan</H1>
											     <table class="table table-hover table-stripped table-bordered">
												     <tr>
												     	<th>Tanggal Ulangan</th>
												     	<th width="20%">Nilai</th>
												     </tr>
												      <?php 
												      if(!empty($ulangan)){
												      		foreach ($ulangan as $key) {?>
													    	<tr>
													    		<td><?php echo $this->Acuan_model->postlearning($key->d_entry); ?></td>
																<td><?php echo $key->tmnilai_siswa; ?></td>
															</tr>
													    <?php 
													    }
													}
													else{?>
														<tr>
															<td colspan="2"><center>Data Nilai Kosong</center></td>
														<tr>
													<?php } ?>
													<tr>
														<th>Nilai Akhir</th>
														<td>
															<?php 
														      if(!empty($rata1)){
														      		foreach ($rata1 as $key) {
															    		echo $key->nilaiakhir; 
															    }
															}
															else{?>
																<center>Data Nilai Kosong</center>
															<?php } ?>
														</td>
													</tr>
													<tr>
														<th>Nilai Rata-rata</th>
														<td>
															<?php 
														      if(!empty($rata1)){
														      		foreach ($rata1 as $key) {
															    		echo number_format($key->rata,2);
															    }
															}
															else{?>
																<center>Data Nilai Kosong</center>
															<?php } ?>
														</td>
													</tr>
												 </table>
											  </div>
											</div>
										</div>	
										<div class="tab-content">
											<div class="tab-pane active" id="akunsiswa">
											  <div class="table-responsive">
											  	<H1>UTS</H1>
											     <table class="table table-hover table-stripped table-bordered">
												     <tr>
												     	<th>Tanggal Uts</th>
												     	<th width="20%">Nilai</th>
												     </tr>
												       <?php 
												      if(!empty($uts)){
												      		foreach ($uts as $key) {?>
													    	<tr>
													    		<td><?php echo $this->Acuan_model->postlearning($key->d_entry); ?></td>
													    		<td><?php echo $key->tmnilai_siswa; ?></td>
													    	</tr>
													    <?php 
													    }
													}
													else{?>
														<tr><td colspan="2"><center>Data Nilai Kosong</center></td><tr>
													<?php } ?>
													<tr>
														<th>Nilai Akhir</th>
														<td>
															<?php 
														      if(!empty($rata2)){
														      		foreach ($rata2 as $key) {
															    		echo $key->nilaiakhir; 
															    }
															}
															else{?>
																<center>Data Nilai Kosong</center>
															<?php } ?>
														</td>
													</tr>
													<tr>
														<th>Nilai Rata-rata</th>
														<td>
															<?php 
														      if(!empty($rata2)){
														      		foreach ($rata2 as $key) {
															    		echo number_format($key->rata,2);
															    }
															}
															else{?>
																<center>Data Nilai Kosong</center>
															<?php } ?>
														</td>
													</tr>
												 </table>
											  </div>
											</div>	
										</div>
										<div class="tab-content">
											<div class="tab-pane active" id="akunsiswa">
											  <div class="table-responsive">
											  	<H1>UAS</H1>
											     <table class="table table-hover table-stripped table-bordered">
												     <tr>
												     	<th>Tanggal Uas</th>
												     	<th width="20%">Nilai</th>
												     </tr>
												      <?php 
												      if(!empty($uas)){
												      		foreach ($uas as $key) {?>
													    	<tr>
													    		<td><?php echo $this->Acuan_model->postlearning($key->d_entry); ?></td>
													    		<td><?php echo $key->tmnilai_siswa; ?></td>
													    	</tr>
													    <?php 
													    }
													}
													else{?>
														<tr><td colspan="2"><center>Data Nilai Kosong</center></td><tr>
													<?php } ?>
													<tr>
														<th>Nilai Akhir</th>
														<td>
															<?php 
														      if(!empty($rata3)){
														      		foreach ($rata3 as $key) {
															    		echo $key->nilaiakhir; 
															    }
															}
															else{?>
																<tr><td><center>Data Nilai Kosong</center></td><tr>
															<?php } ?>
														</td>
													</tr>
													<tr>
														<th>Nilai Rata-rata</th>
														<td>
															<?php 
														      if(!empty($rata3)){
														      		foreach ($rata3 as $key) {
															    		echo number_format($key->rata,2); 
															    }
															}
															else{?>
																<tr><td><center>Data Nilai Kosong</center></td><tr>
															<?php } ?>
														</td>
													</tr>
												 </table>
											  </div>
											</div>											
										</div>
								  </div>								
								<div class="clear"><br></div>
								 <div class="form-actions">
										<div class="row">
											<div class="col-md-3 navbar-right">
												
												<button type="button" class="btn default" id="cancel"><i class="fa fa-close "></i> Tutup</button>
											</div>
										</div>
									</div>
						</div>
</div>
						
							<?php echo form_close(); ?>
						
						
				
							
							
							