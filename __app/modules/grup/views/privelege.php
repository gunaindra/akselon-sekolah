<?php $attributes = array('class' => 'form-horizontal', 'role'=>'form','name' => 'simpan', 'id' => 'simpanpopup', 'method' => "post", 'url' =>site_url("/save")); ?>
<?php echo form_open("javascript:void(0)", $attributes); ?>
<input type="hidden" name="id" class="form-control" value="<?php echo isset($dataform->id) ? $dataform->id:"";  ?>">
<div class="box box-success">
						
						<div class="box-body" id="headerawal">
						
						           <div class="table-reaponsive">
									   <table class="table table-hover table-bordered table-striped">
									     <thead> 
										   <tr>
										     <th>Menu</th>
											 <th>Read</th>
											 <th>create</th>
											 <th>update</th>
											 <th>delete</th>
										   </tr>
										  </thead>
										  
										  <tbody>
										    <?php
											
											  foreach($datamenu as $row):
											  ?>
											   <tr>
											     <td><?php echo ($row->parent_id==0) ? "" : "---- "; ?><?php echo $row->nama; ?></td>
											     <td><input type="checkbox" <?php echo  $this->Model_data->cekprivelege($dataform->id,$row->id); ?> class="menucek" data-menu="<?php echo $row->id; ?>" data-id="<?php echo $dataform->id; ?>" value="<?php echo $row->id; ?>"></td>
											     <td><input type="checkbox" <?php echo  $this->Model_data->cekprivelegec($dataform->id,$row->id,"c_create"); ?> class="privelege" dataval="c_create" data-menu="<?php echo $row->id; ?>" data-id="<?php echo $dataform->id; ?>"></td>
											     <td><input type="checkbox" <?php echo  $this->Model_data->cekprivelegec($dataform->id,$row->id,"c_update"); ?> class="privelege" dataval="c_update" data-menu="<?php echo $row->id; ?>" data-id="<?php echo $dataform->id; ?>"></td>
											     <td><input type="checkbox" <?php echo  $this->Model_data->cekprivelegec($dataform->id,$row->id,"c_delete"); ?> class="privelege" dataval="c_delete" data-menu="<?php echo $row->id; ?>" data-id="<?php echo $dataform->id; ?>"></td>
											    
												</tr>
											  
											  
											  
											<?php 
											 endforeach;
											?>
										  
										  </tbody>
										  
										</table>
									</div>
									 
											    
									
									 
									 
									
								
								
						</div>
</div>
						
							<?php echo form_close(); ?>
						
						
				
						
							  
							 