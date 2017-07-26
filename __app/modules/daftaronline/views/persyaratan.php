  
<style>

.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.fileupload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}

</style>    

<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								 Data Persyaratan
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
						      <input type="hidden" id="namasiswa" value="<?php echo $datasiswa->nama; ?>">
						      <input type="hidden" id="tmsiswa_id" value="<?php echo $datasiswa->id; ?>">
						   
										<div class="table-responsive">
										  <table class="table table-hover table-bordered table-stripped">
										    <thead>
											  <th width="3%">No</th>
											  <th>Persyaratan</th>
											  <th>File</th>
											
											 </thead>
											 <tbody >
											 <?php 
											   if(count($dataform) >0){
												   $no=1;
												   foreach($dataform as $r){
													   
													   $row = $this->Acuan_model->get_where("akademik.tr_persyaratan","tmsiswa_id='".$tmsiswa_id."' AND tmpersyaratan_id='".$r->id."'");
												?>
													  
														 <tr>
														  <td><?php echo $no++; ?></td>
														  <td><?php echo $r->persyaratan; ?></td>
														  <td id="upload<?php echo $r->id; ?>">
														   <?php 
														     if(count($row) >0){
																?>
														        <a target="_blank" href="<?php echo base_url(); ?>__statics/upload/persyaratan/<?php echo $row->folder; ?>/<?php echo $row->file; ?>"><?php echo $row->file; ?></a>
																
																<?php 
															 }else{
																 
																 echo "";
															 }
															 
															 ?>
															 
															
														  
														   <?php 
														      if(count($row) ==0){
																?>
														        <div class="btn green btn-sm fileUpload">
																	<i class="fa  fa-upload "></i>
																	<span>
																	Upload </span>
																	<input type="file" name="files" <?php echo ($r->status==1) ? "required" :""; ?> id="files" class="uploadpersyaratan fileupload" data-id="<?php echo $r->id; ?>" persyaratan="<?php echo $r->persyaratan; ?>">
													           </div>
																<?php 
															 }else{
																?>
																<a type="button" data-id='<?php echo $row->id; ?>' tmpersyaratan_id="<?php echo $row->tmpersyaratan_id; ?>" persyaratan="<?php echo $r->persyaratan; ?>"  unlink="__statics/upload/persyaratan/<?php echo $row->folder; ?>/<?php echo $row->file; ?>" class="batalkan"><i class="fa fa-times-circle"></i> </a>
																
																
																<?php 
															 }
															 
															 ?>
														  
														  </td>
														 </tr>
														 
													<?php 
											    }
											   }
											   ?>
											 </tbody>
										  </table>
										 </div>
											   <div class="form-actions">
															<div class="row">
																<div class="col-md-3 navbar-right">
																	
																	<button type="button" class="btn default" id="cancel"><i class="fa fa-repeat "></i> Tutup </button>
																</div>
															</div>
														</div>
													
													<div class="clear"><br></div>
						
						</div>
	</div>
						
		
							
							
							