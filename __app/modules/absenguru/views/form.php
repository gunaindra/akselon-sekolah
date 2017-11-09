<?php $attributes = array('class' => 'form-horizontal', 'role'=>'form','name' => 'simpan', 'id' => '', 'method' => "post", 'url' =>site_url("/save")); ?>
<?php echo form_open("javascript:void(0)", $attributes); ?>


<input type="hidden" id="tmjenjang_id" class="form-control" value="<?php echo isset($dataform->tmjenjang_id) ? $dataform->tmjenjang_id:"";  ?>">
<input type="hidden" id="tmkelas_id" class="form-control" value="<?php echo isset($dataform->tmkelas_id) ? $dataform->tmkelas_id:"";  ?>">
<input type="hidden" id="tmruang_id" class="form-control" value="<?php echo isset($dataform->tmruang_id) ? $dataform->tmruang_id:"";  ?>">



<div class="portlet box red">
	<div class="portlet-title">
		<div class="caption">
			 Masuk Kelas
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
	  <div class="table-responsive">
	    <table class="table table-hover">
		  <tr>
		     <td style="font-weight:bold" width="20%"> Jenjang </td>
		     <td>: <?php echo isset($dataform->jenjang) ? $dataform->jenjang:"";  ?></td>
			 
			 <td style="font-weight:bold"  width="20%"> Kelas  </td>
		     <td>: <?php echo isset($dataform->kelas) ? $dataform->kelas:"";  ?></td>
	
	         <td style="font-weight:bold"  width="20%"> Ruang  </td>
		     <td>:<?php echo isset($dataform->ruang) ? $dataform->ruang:"";  ?></td>

	
	      </tr>
		  <tr>
		     <td style="font-weight:bold"  width="20%"> Ajaran  </td>
		     <td>:<?php echo $this->Acuan_model->ajaran() ?>/<?php echo $this->Acuan_model->ajaran()+1 ?></td>
			 
			  <td style="font-weight:bold"  width="20%"> Semester  </td>
		     <td colspan="4">:<?php echo $this->Acuan_model->semester() ?></td>
			</tr>
		 </table>
	
	
	  </div>
	  
	  
	
	  
	  <div id="jikareguler">
	  <center><h4>Jadwal Pelajaran </h4></center>
	  
	  <div class="table-responsive">

	
	  </div>
	  
	  <div class="table-responsive" id="loaddata">
         <?php 
		   if(count($datagrid) >0){
			  
			    ?>
				 <table class="table table-hover table-bordered table-striped">
				   <thead>
				   <tr>
				     <th>No</th>
				     <th>Kode Jadwal </th>
				     <th>Hari </th>
				     <th>Jam </th>
				     <th>Mata Pelajaran </th>
				     <th>Guru </th>
				     <th>Ajaran </th>
				     <th> Aksi </th>
				   </tr>
				   </thead>
				   
				   <tbody>
				   <?php 
				   $no=1;
				  
				     $idguru = $this->session->userdata("user_id");
				     foreach($datagrid as $row){
				     	$a = json_decode($row->idguru);
				     	if(!empty($a == $idguru)){
					?>
				     <tr id="row<?php echo $row->id; ?>">
						 <td><?php echo $no++; ?></td>
							 <td><?php echo $row->id; ?></td>
						 <td><?php echo $row->nama_hari; ?></td>
						 <td><?php echo $row->jam; ?></td>
						 <td><?php echo $row->pelajaran; ?></td>
						 <td><?php echo $row->guru; ?></td>
						 <td><?php echo $row->ajaran; ?></td>
						
						 <td>
                            <?php if ($row->checked_in && !$row->checked_out) : ?>
                                <a href="javascript:;" class="btn btn-success guru-absen-siswa tooltips" data-container="body" data-placement="top" title="Absen Siswa" data-id="<?php echo $row->id; ?>">Absen Siswa</a>
                                <a href="javascript:;" class="btn btn-success guru-check-out tooltips" data-container="body" data-placement="top" title="Check out" data-id="<?php echo $row->id; ?>">Check out</a>
                            <?php elseif (!$row->checked_in) : ?>
                                <a href="javascript:;" class="btn btn-success guru-check-in tooltips" data-container="body" data-placement="top" title="Check in" data-id="<?php echo $row->id; ?>">Check in</a>
                            <?php endif; ?>
                         </td>
				     </tr>
					<?php }
					}
					?>
				   </tbody>
				 
				 
				 </table>
			   
			   
			   
			   <?php 
			   
		   }
		   
		  ?>
	  
	  </div>
	  
	  
	 </div>
	  
	  	
			
			<div class="clear"><br></div>
			<div class="alert alert-info">
				<b> Keterangan </b>
				<ol type="square">
				  <li> Ini adalah jadwal pelajaran di kelas tersebut</li>
				  <li> Sesuai dengan pelajaran anda</li>
				 </ol>
			</div>
			  <div class="form-actions">
					<div class="row">
						<div class="col-md-3 navbar-right">
							
							<button type="button" class="btn default" id="cancel"><i class="fa fa-repeat "></i> Selesai </button>
						</div>
					</div>
				</div>
	  
	</div>
</div>
<?php echo form_close(); ?>
						
						
				
							
							
							