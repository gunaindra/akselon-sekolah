<?php $attributes = array('class' => 'form-horizontal', 'role'=>'form','name' => 'simpan', 'id' => 'simpan', 'method' => "post", 'url' =>site_url("nilaisiswa/save_nilai")); ?>
<?php echo form_open("javascript:void(0)", $attributes); ?>
<input type="hidden" name="id" class="form-control" value="<?php echo isset($dataform->id) ? $dataform->id:"";  ?>">

<div class="portlet box red">
	<div class="portlet-title">
		<div class="caption">
			List Siswa
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
		<div class="row">
			<div class="col-md-12 col-sm-12">
			  <div class="col-md-12">
				<div class="form-group col-md-12">
					<lable><b>Jenis Nilai</b></lable>
					<select class="form-control" name="nilaistatus" required="required">
						<option value="0">- Pilih Jenis Nilai -</option>
						<option value="ULANGAN">- ULANGAN -</option>
						<option value="TUGAS">- TUGAS -</option>
						<option value="UTS">- UTS-</option>
						<option value="UAS">- UAS -</option>
					</select>	
				</div>
				<?php
					if($_SESSION["grup"]==1){ ?>
					<div class="form-group col-md-12">
						<lable><b>Mata Pelajaran</b></lable>
						<select class="form-control" name="pelajaran" required="required">
							<option value="0">- Pilih Pelajaran -</option>
							 <?php 
							 	$b = $this->Acuan_model->get_mapel();
							 	foreach ($b as $b) {
							 		echo"<option value='".$b->id."'>".$b->nama."</option>";
							 	}
							 ?>
						</select>	
					</div> 
				<?php }
					else{
				 ?>
				<div class="form-group col-md-12">
					<lable><b>Mata Pelajaran</b></lable>
					<select class="form-control" name="pelajaran" required="required">
						<option value="0">- Pilih Pelajaran -</option>
						 <?php $id = $_SESSION['user_id'];
						 	$a = $this->Acuan_model->get_where2("tr_gurumapel",array("tmpegawai_id"=>$id))->result();
						 	foreach ($a as $key) {
						 		$key->tmpelajaran_id;
						 		$b = $this->Acuan_model->get_mapel_byguru($key->tmpelajaran_id)->row();
							 		// echo json_encode($b->nama);
						 		echo"<option value='".$b->id."'>".$b->nama."</option>";
						 	}
						 ?>
					</select>	
				</div> 
				<?php } ?>
				<div class="form-group col-md-12">
					<lable><b>Tanggal Ujian</b></lable>
					<input class="form-control" name="tanggal" type="date" required="required">
				</div> 
			 </div>
			</div>
		</div>

		<div class="table-container">
			<table class="table table-striped table-bordered table-hover" id="datatableTable">
				<thead>
					<tr>
						<th width="5%"> No </th>
						<th> NIS </th>
						<th> NAMA SISWA </th>
						<th> INPUT NILAI </th>
				   </tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>		
		 <div class="form-actions">
			<div class="row">
				<div class="col-md-3 navbar-right">
					<button type="submit" class="btn green"><i class="fa fa-save"></i> Simpan</button>
					<button type="button" class="btn default" id="cancel"><i class="fa fa-repeat "></i> Batal</button>
				</div>
			</div>
		</div>
		<?php
			foreach ($datasiswa as $key) {?>
			<input type="hidden" name="id" id="idkelas" value="<?php echo $id = json_decode($key); ?>">
		<?php		}
		 ?>
		<div class="clear"><br></div>
		<div class="alert alert-info">
			<b> Keterangan/ Cara memasukan Nilai Siswa </b>
			<ol type="square">
			  <li>Pilih Jenis/Kategori nilai (UTS / UAS / TUGAS / DLL)</li>
			  <li>Pilih Mata Pelajaran sesuai pelajaran yang anda pegang</li>
			  <li>Masukan seluruh nilai siswa</li>
			 </ol>
		</div>
	</div>
</div>
						
<?php echo form_close(); ?>
						
<script type="text/javascript">
  
	
       var dataTable = $('#datatableTable').DataTable( {
					"processing": true,
					"serverSide": true,
					"searching": false,
					"responsive": true,
					
					"ajax":{
						url :"<?php echo site_url("nilaisiswa/gridsiswa"); ?>", 
						type: "post", 
						"data": function ( data ) {
						data.id = $('#idkelas').val();						
                    }
						
					},
					"rowCallback": function( row, data ) {
						
						
					}
				} );
				
		
</script>						
				
							
							
							