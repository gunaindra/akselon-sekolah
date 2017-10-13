<style>
.required{
	 
	 color:red;
	 font-size:10px;
 }

.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
.containera {
	width: 100%;
	padding: 40px;
}
</style>
<div class="col-md-8 col-sm-8 col-sm-offset-2 content-box" style="box-shadow: 0px 3px 2px 3px  #888888;margin-bottom: 50px;">

<div class="portlet-body form">
 <div class="row">
 	<br>
	<div class="row">
		<div class="col-md-12">
			<center>
				<h2><b><?php echo $sekolah->namasekolah; ?></b></h2><small> <b><?php echo $sekolah->alamat; ?> <br><br> Telepon : <?php echo $sekolah->telepon; ?> Email : <?php echo $sekolah->email; ?> </b></small>
			</center>
		</div>
	</div>
	<hr style="border-top: 2px double #8c8b8b">
	<center>
		<h4>
			<b>FORMULIR  PENDAFTARAN CALON PESERTA DIDIK BARU 
		</h4>	 
			<b>TAHUN PELAJARAN <?php echo $sekolah->ajaran; ?> / <?php echo $sekolah->ajaran+1; ?> </b>
	</center>
	<br>
	<?php $attributes = array('class' => 'form-horizontal', 'role'=>'form','name' => 'pendaftaran', 'id' => 'pendaftaran', 'method' => "post", 'action' => "javascript:void(0)","url"=>site_url("pendaftaran/save")); ?>
	<?php echo form_open(site_url('javascript:void(0)'), $attributes); ?>
	<input type="hidden" name="tmsekolah_id" value="<?php echo $sekolah->id; ?>">
	<div  id="headerawal">	 
	<div class="row" style="display: none;" id="errorvalidation">
		<div class="col-md-12">
			<div class="note note-danger note-bordered" id="messagevalidation"></div>
		</div>
	</div>
	<div class="containera">
	<div class="stepwizard">
	    <div class="stepwizard-row setup-panel">
	        <div class="stepwizard-step">
	            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
	            <p style="font-weight: bold;font-size:12px"><b>DATA KELAS</b></p>
	        </div>
	        <div class="stepwizard-step">
	            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
	            <p style="font-weight: bold;font-size:12px"><b>IDENTITAS SISWA</b></p>
	        </div>
	        <div class="stepwizard-step">
	            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
	            <p style="font-weight: bold;font-size:12px"><b>IDENTITAS ORANG TUA/WALI</b></p>
	        </div>
	        <div class="stepwizard-step">
	            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
	            <p style="font-weight: bold;font-size:12px"><b>RIWAYAT KESEHATAN</b></p>
	        </div>
	        <div class="stepwizard-step">
	            <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
	            <p style="font-weight: bold;font-size:12px"><b>PERSYARATAN</b></p>
	        </div>
	    </div>
	</div>
	    <div class="row setup-content" id="step-1">
	        <div class="col-xs-12">
	            <div class="col-md-12">
	                <h3>Data Kelas</h3>
	                <span class="required">*</span> Wajib Diisi
	                <div class="form-group">
						<label class="col-md-3 control-label" style="text-align:left"> a. Jenjang Pendidikan <span class="required">*</span></label>
						<div class="col-md-9">
							<select class="form-control  onchange" name="k[tmjenjang_id]" id="tmjenjang_id" url="<?php echo site_url("ruang/selectkelas"); ?>" target="tmkelas_id" required="required">
								<option value="">- Pilih Jenjang -</option>
							   	<?php foreach($jenjang as $row){ ?>
							   		<option value='<?php echo $row->id; ?>' >
							   			<?php echo $row->nama; ?>
									</option>"
								<?php } ?>
						  	</select>								
						</div>
					</div>								 
					<div class="form-group">
						<label class="col-md-3 control-label" style="text-align:left"> b. Kelas <span class="required">*</span></label>
						<div class="col-md-9">
							<select class="form-control tmkelas_id " name="k[tmkelas_id]" >
								<option value="" required="required">- Pilih Kelas -</option>
							</select>									
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" style="text-align:left"> c. NISN <span class="required">*</span></label>
						<div class="col-md-9">
							<input type="text" class="form-control" placeholder="NISN" name="f[nisn]" id="nisn" value="" required="required">
						</div>
					</div>
	                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
	            </div>
	        </div>
	    </div>
	    <div class="row setup-content" id="step-2">
	        <div class="col-xs-12">
	            <div class="col-md-12">
	                <h3>IDENTITAS SISWA</h3>
	                <div class="form-group">
						<label class="col-md-3 control-label;float:left;">a. Nama Lengkap  <span class="required">*</span></label>
						<div class="col-md-9">
							<input type="text" class="form-control" placeholder="Nama Lengkap" name="f[nama]" id="namasiswa" value="" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label;float:left;">b. Nama Panggilan  <span class="required">* </span></label>
						<div class="col-md-9">
							<input type="text" class="form-control" placeholder="Nama Panggilan" name="f[nama_panggilan]" value="" required="required">
							<span class="help-block">
							 </span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label;float:left;">c. Jenis Kelamin <span class="required">* </span></label>
						<div class="col-md-7">
							<div class="input-group">
								
								<select class="form-control" name="f[sex]" required="required">
								
								  
								  <option value="Laki-Laki" > Laki - Laki  </option>
								  <option value="Perempuan" >  Perempuan  </option>
								 </select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label;float:left;">d. Tempat, Tgl Lahir <span class="required">* </span></label>
						<div class="col-md-4">
							<input type="text" class="form-control" placeholder="Tempat Lahir" name="f[tempat_lahir]" required="required">
						</div>
						<div class="col-md-3">
							<input name="f[tgl_lahir]" io="tgl_lahir_siswa"  type="date" class="form-control" size="10" value="<?php echo date("Y-m-d"); ?>" required="required"/>
						</div>
					</div>									
					<div class="form-group">
						<label class="col-md-3 control-label;float:left;">e. Agama </label>
						<div class="col-md-9">
							<select class="form-control" name="f[agama]">
								<option value=""> - Pilih - </option>
								<?php  
									$agama = $this->Acuan_model->agama();			
									foreach($agama as $val): ?>
										<option value="<?php echo $val; ?>" > <?php echo $val; ?> </option>
								<?php endforeach; ?>
							</select>		
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label;float:left;">f. Anak Ke <span class="required">* </span></label>
						<div class="col-md-3">
							<input type="number" class="form-control" min="1" value="1" name="f[anakke]" required="required">
						</div>
						<label class="col-md-3 control-label;float:left;">g. Jumlah Sudara <span class="required">* </span></label>
						<div class="col-md-3">
							<input type="number" class="form-control" min="1" value="1" name="f[saudara]" required="required">
						</div>
					</div>		
					<div class="form-group">
						<label class="col-md-3 control-label;float:left;">h. Tinggi Badan (cm)</label>
						<div class="col-md-3">
							<input type="number" class="form-control" placeholder="" name="f[tinggi]">
							<span class="help-block">
							 </span>
						</div>
						<label class="col-md-3 control-label;float:left;"> Berat Badan (KG) </label>
						<div class="col-md-3">
							<input type="number" class="form-control" placeholder="" name="f[berat]">
							<span class="help-block">
							 </span>
						</div>
					</div>								
					<div class="form-group">
						<label class="col-md-12 control-label;float:left;">i. Riwayat Pendidikan </label>
						<div class="form-group">
							<label class="col-md-3 control-label;" style="padding:0px 0px 0px 50px">- Masuk Sebagai </label>
							<div class="col-md-9">
								<select class="form-control" name="f[status_masuk]">
									<option value=""> - Pilih - </option>
									<option value="Siswa Baru"> Siswa Baru </option>
									<option value="Siswa Pindahan"> Siswa Pindahan</option>
								</select>		
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label;" style="padding:0px 0px 0px 50px">- Asal Sekolah </label>
							<div class="col-md-9">
								<input type="text" class="form-control" placeholder="" name="f[sekolah_asal]">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label;" style="padding:0px 0px 0px 50px">- Alamat Sekolah </label>
							<div class="col-md-9">
								<textarea class="form-control" placeholder="" name="f[alamat_sekolah_asal]"></textarea>	
							</div>
						</div>				
					</div>							
					<div class="form-group">
						<label class="col-md-3 control-label;float:left;">j. No HP Siswa</label>
						<div class="col-md-9">
							<input type="text" class="form-control" placeholder="" name="f[hp]" id="hp" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label;float:left;">k. Email Siswa</label>
						<div class="col-md-9">
							<input type="email" name="f[email]" class="form-control" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label;float:left;">l. Alamat</label>
						<div class="col-md-9">
							<textarea class="form-control" name="f[alamat]" cols="70"> </textarea>
						</div>
					</div>
					<br>
	                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
	            </div>
	        </div>
	    </div>
	    <div class="row setup-content" id="step-3">
	        <div class="col-xs-12">
	            <div class="col-md-12">
	                <h3> Data Orang Tua/Wali</h3>
					<div class="form-group">
						<label class="col-md-10 control-label;float:left;">&nbsp; &nbsp; 1. ayah </label>
					</div>
														
					<div class="form-group">
						<label class="col-md-4 control-label;float:left;" style="padding:0px 0px 0px 70px">1.1. Nama <span class="required"> * </span></label>
						<div class="col-md-8">
							<input type="text" class="form-control" placeholder="" name="p[nama_ayah]" value="" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label;float:left;" style="padding:0px 0px 0px 70px">1.2. Pekerjaan </label>
						<div class="col-md-8">
							<select class="form-control" name="p[pekerjaan_ayah]" id="pekerjaan_ayah">
								<option value=""> - Pilih - </option>
								<?php foreach($pekerjaan as $val): ?>
									<option value="<?php echo $val->id; ?>"> <?php echo $val->nama; ?> </option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label;float:left;" style="padding:0px 0px 0px 70px">1.3. Pendidikan ayah </label>
						<div class="col-md-8">
							<select class="form-control" name="p[pendidikan_ayah]">
								<option value=""> - Pilih - </option>
								<?php foreach($pendidikan as $val):	?>
									<option value="<?php echo $val->id; ?>"> <?php echo $val->nama; ?> </option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>									 
					<div class="form-group">
						<label class="col-md-4 control-label;float:left;" style="padding:0px 0px 0px 70px">1.4. Tempat, Tgl Lahir <span class="required"> </span></label>
						<div class="col-md-4">
							<input type="text" class="form-control" placeholder="Tempat Lahir" name="p[tempat_lahir_ayah]" value="">
						</div>
						<div class="col-md-3">
							<input name="f[tgl_lahir]" readonly id="tgl_lahir_ayah"  type="text" class="form-control" size="10" value="<?php echo date("Y-m-d"); ?>" />
							<script>
								$(document).ready(function () {
									$('#tgl_lahir_ayah').datepicker({
										 changeMonth: true,
										 changeYear: true,
										 autoclose: true,
										 dateFormat: 'yy-mm-dd',
										 yearRange: '1900:2050',
									});
								});
							</script>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label;float:left;" style="padding:0px 0px 0px 70px">1.5. No. Handphone <span class="required"> * </span></label>
						<div class="col-md-8">
							<input type="text" class="form-control" placeholder="" name="p[hp_ayah]" value="" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label;float:left;" style="padding:0px 0px 0px 70px">1.6. Email <span class="required"> * </span></label>
						<div class="col-md-8">
							<input type="email" class="form-control" placeholder="" name="p[email_ayah]" value="" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-10 control-label;float:left;">&nbsp; &nbsp; 2. ibu </label>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label;float:left;" style="padding:0px 0px 0px 70px">1.1. Nama <span class="required"> * </span></label>
						<div class="col-md-8">
							<input type="text" class="form-control" placeholder="" name="p[nama_ibu]" value="" required="required">
						</div>
					</div>	
					<div class="form-group">
						<label class="col-md-4 control-label;float:left;" style="padding:0px 0px 0px 70px">1.2. Pekerjaan </label>
						<div class="col-md-8">
							<select class="form-control" name="p[pekerjaan_ibu]" id="pekerjaan_ibu">
								<option value=""> - Pilih - </option>
								<?php foreach($pekerjaan as $val): ?>
									<option value="<?php echo $val->id; ?>"> <?php echo $val->nama; ?> </option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>	
					<div class="form-group">
						<label class="col-md-4 control-label;float:left;" style="padding:0px 0px 0px 70px">1.3. Pendidikan ibu </label>
						<div class="col-md-8">
							<select class="form-control" name="p[pendidikan_ibu]">
								<option value=""> - Pilih - </option>
								<?php foreach($pendidikan as $val): ?>
									<option value="<?php echo $val->id; ?>"> <?php echo $val->nama; ?> </option>
								<?php endforeach; ?>
							</select>				
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label;float:left;" style="padding:0px 0px 0px 70px">1.4. Tempat, Tgl Lahir <span class="required"></span></label>
						<div class="col-md-4">
							<input type="text" class="form-control" placeholder="Tempat Lahir" name="p[tempat_lahir_ibu]" value="">
						</div>
						<div class="col-md-3">
							<input name="f[tgl_lahir]" readonly id="tgl_lahir_ibu"  type="text" class="form-control" size="10" value="<?php echo date("Y-m-d"); ?>" />
							<script>
								$(document).ready(function () {
									$('#tgl_lahir_ibu').datepicker({
										 changeMonth: true,
										 changeYear: true,
										 autoclose: true,
										 dateFormat: 'yy-mm-dd',
										 yearRange: '1900:2050',
									});
								});
							</script>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label;float:left;" style="padding:0px 0px 0px 70px">1.5. No. Handphone <span class="required"> * </span></label>
						<div class="col-md-8">
							<input type="text" class="form-control" placeholder="" name="p[hp_ibu]" value="" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label;float:left;" style="padding:0px 0px 0px 70px">1.6. Email <span class="required"> * </span></label>
						<div class="col-md-8">
							<input type="email" class="form-control" placeholder="" name="p[email_ibu]" value="" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-10 control-label;float:left;">&nbsp; &nbsp; 3. wali </label>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label;float:left;" style="padding:0px 0px 0px 70px">1.1. Nama <span class="required">  </span></label>
						<div class="col-md-8">
							<input type="text" class="form-control" placeholder="" name="p[nama_wali]" value="" >		
						</div>
					</div>	
					<div class="form-group">
						<label class="col-md-4 control-label;float:left;" style="padding:0px 0px 0px 70px">1.2. Pekerjaan </label>
						<div class="col-md-8">
							<select class="form-control" name="p[pekerjaan_wali]" id="pekerjaan_wali">
								<option value=""> - Pilih - </option>
								<?php foreach($pekerjaan as $val): ?>
									<option value="<?php echo $val->id; ?>"> <?php echo $val->nama; ?> </option>
								<?php endforeach; ?>
							</select>				
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label;float:left;" style="padding:0px 0px 0px 70px">1.3. Pendidikan wali </label>
						<div class="col-md-8">
							<select class="form-control" name="p[pendidikan_wali]">
								<option value=""> - Pilih - </option>
								<?php foreach($pendidikan as $val): ?>
									<option value="<?php echo $val->id; ?>"> <?php echo $val->nama; ?> </option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
														
													 
					<div class="form-group">
						<label class="col-md-4 control-label;float:left;" style="padding:0px 0px 0px 70px">1.4. Tempat, Tgl Lahir <span class="required"> </span></label>
						<div class="col-md-4">
							<input type="text" class="form-control" placeholder="Tempat Lahir" name="p[tempat_lahir_wali]" value="">
						</div>
						<div class="col-md-3">
							<input name="f[tgl_lahir]" readonly id="tgl_lahir_wali"  type="text" class="form-control" size="10" value="<?php echo date("Y-m-d"); ?>" />
							<script>
								$(document).ready(function () {
									$('#tgl_lahir_wali').datepicker({
										 changeMonth: true,
										 changeYear: true,
										 autoclose: true,
										 dateFormat: 'yy-mm-dd',
										 yearRange: '1900:2050',
									});
								});
							</script>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label;float:left;" style="padding:0px 0px 0px 70px">1.5. No. Handphone <span class="required">  </span></label>
						<div class="col-md-8">
							<input type="text" class="form-control" placeholder="" name="p[hp_wali]" value="" >
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label;float:left;" style="padding:0px 0px 0px 70px">1.6. Email <span class="required">  </span></label>
						<div class="col-md-8">
							<input type="email" class="form-control" placeholder="" name="p[email_wali]" value="" >
						</div>
					</div>
					<br>
					<br>
	                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
	            </div>
	        </div>
	    </div>
	    <div class="row setup-content" id="step-4">
	        <div class="col-xs-12">
	            <div class="col-md-12">
	                <h3> Step 3</h3>
	                <br>
	                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
	            </div>
	        </div>
	    </div>
	    <div class="row setup-content" id="step-5">
	        <div class="col-xs-12">
	            <div class="col-md-12">
	                <h3> PERSYARATAN YANG HARUS DI LENGKAPI </h3>
					<div class="table-responsive">
						<table class="table table-hover table-bordered table-stripped">
							<thead>
								<th width="3%">No</th>
								<th>Persyaratan</th>
								<th>File</th>
							</thead>
								<tbody id="lengkapipersyaratan">
								<td colspan="3" align="center">Untuk menampilkan persyaratan, silahkan pilih Jenjang terlebih dahulu</td>
							</tbody>
						</table>
					</div>
	                <div>
						<div class="row">
							<div class="col-md-offset-4 col-md-9">
								<button type="submit" class="btn green" id="btn-kirim"><span class="fa fa-send-o"></span> Kirim</button>
								<button type="reset" class="btn default" id="btn-reset"><span class="fa fa-remove"></span> Reset</button>
								<a href="<?php echo site_url(); ?>" id="btn-selesai" style="display:none" class="btn btn-info"><span class="fa fa-bank"></span> Selesai</a>
								<a href="<?php echo site_url(""); ?>" id="btn-cetak" style="display:none" class="btn btn-info"><span class="fa fa-print"></span> Cetak </a>
								
							</div>
						</div>
					</div>
	            </div>
	        </div>
	    </div>
	<?php echo form_close(); ?>
</div>
	</div>
</div>
</div>
</div>
<script>
	$(document).off("change","#tmjenjang_id").on("change","#tmjenjang_id",function(){
	 var tmjenjang_id = $(this).val();
        $("#lengkapipersyaratan").html("Sedang Mengambil Data, Mohon Tunggu....").show();
       $.post("<?php echo site_url("pendaftaran/persyaratan"); ?>",{tmjenjang_id:tmjenjang_id},function(data){
		   
		   $("#lengkapipersyaratan").html(data).show();
		   
	   }) 
	   
	   
	   
   })
	
	$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>

