
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
							<div class="tabbable-custom nav-justified">
								<ul class="nav nav-tabs nav-justified">
									<li class="active" >
										<a href="#tugas" data-toggle="tab">
										 	TUGAS 
										</a>
									</li>
									<li >
										<a href="#ulangan" data-toggle="tab">
											ULANGAN
										 </a>
									</li>
									<li >
										<a href="#uts" data-toggle="tab">
											UTS
										 </a>
									</li>
									<li >
										<a href="#uas" data-toggle="tab">
											UAS
										 </a>
									</li>
								</ul>
								
								<div class="tab-content">
									<div class="tab-pane active" id="tugas">
										<div class="table-responsive">
											<H1>TUGAS</H1>
										     <table class="table table-hover table-stripped table-bordered">
											     <tr>
											     	<th>Tanggal Tugas</th>
											     	<th width="20%">Nilai</th>
											     </tr>
											      <?php 
											      if(!empty($tugas)){
											      		foreach ($tugas as $key) {?>
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
													      if(!empty($rata4)){
													      		foreach ($rata4 as $key) {
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

									<div class="tab-pane" id="ulangan">
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
									<div class="tab-pane" id="uts">
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
									<div class="tab-pane" id="uas">
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
</div><?php echo form_close(); ?>
						
						
				
							
							
							