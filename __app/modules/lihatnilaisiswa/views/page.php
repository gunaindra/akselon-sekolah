<style>
.table td,th {
	text-align: center; 
	vertical-align: middle;  
}

</style>
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="icon-graduation"></i>
			<a href="javascript:void(0)">Nilai Siswa</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="<?php echo site_url("lihatnilaisiswa"); ?>">Lihat Nilai Siswa</a>
		</li>
	</ul>
</div>
<div id="showform"> </div>
<div class="alertmsg"></div>
<div class="portlet box red">
	<div class="portlet-title">
		<div class="caption">
			 <?php echo $title; ?>
		</div>
		<div class="tools">
			<a href="javascript:;" class="collapse tooltips" data-container="body" data-placement="top" title="Collapse"></a>
			<a href="javascript:;" class="reload tooltips" data-container="body" data-placement="top" title="Mulai Ulang"></a>
			<a href="javascript:;" class="remove tooltips" data-container="body" data-placement="top" title="Hapus"></a>			
		</div>
		<div class="actions">
			<a class="btn btn-icon-only btn-default btn-sm fullscreen tooltips" data-container="body" data-placement="top" title="Layar Penuh" href="javascript:;" ></a>
		</div>
	</div>
	<div class="portlet-body">
		<?php if($_SESSION["grup"]=="7"){
				$username = $_SESSION["nama"];
				$anak = $this->Acuan_model->get_where2("v_siswa",array("username"=>$username))->row_array();
		 ?>
		<div class="col-md-12 col-sm-12">
			<div>
				<h3>Informasi Siswa</h3>
				<p>NIS : <?php echo $anak["nisn"]; ?> </p>
				<p>NAMA : <?php echo strtoupper($anak["nama"]); ?> </p>
				<p>KELAS : <?php echo strtoupper($anak["kelas"]); ?> </p>
			</div>
		</div>
		<?php } ?>
		<table class="table table-striped table-bordered table-hover responsive">
			<tr>
				<th rowspan="2" align="center">NO</th>
				<th rowspan="2" align="center">MATA PELAJARAN</th>
				<th colspan="6" align="center">NILAI</th>
			</tr>
			<tr>
				<th>ULANGAN</th>
				<th>TUGAS</th>
				<th>UTS</th>
				<th>UAS</th>
				<th>TOTAL NILAI</th>
				<th>RATA - RATA</th>
			</tr>

		<?php
			$a = $this->Model_lihatnilaisiswa->data()->result();
			$no = 1;
			foreach ($a as $key) {?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $key->mapel; ?></td>
					<td>
						<?php 
						$status = "ulangan";
						$b = $this->Model_lihatnilaisiswa->getnilai($key->idsiswa,$key->kodemapel,$status)->result();
						foreach ($b as $b) {
							if($b->nilai==null){
								echo "0";
							}
							else{
								echo $b->nilai;
							}
						}
						?>
					</td>
					<td>
						<?php 
						$status = "tugas";
						$b = $this->Model_lihatnilaisiswa->getnilai($key->idsiswa,$key->kodemapel,$status)->result();
						foreach ($b as $b) {
							if($b->nilai==null){
								echo "0";
							}
							else{
								echo $b->nilai;
							}
						}
						?>
					</td>
					<td>
						<?php 
						$status = "uts";
						$b = $this->Model_lihatnilaisiswa->getnilai($key->idsiswa,$key->kodemapel,$status)->result();
						foreach ($b as $b) {
							if($b->nilai==null){
								echo "0";
							}
							else{
								echo $b->nilai;
							}
						}
						?>
					</td>
					<td>
						<?php 
						$status = "uts";
						$b = $this->Model_lihatnilaisiswa->getnilai($key->idsiswa,$key->kodemapel,$status)->result();
						foreach ($b as $b) {
							if($b->nilai==null){
								echo "0";
							}
							else{
								echo $b->nilai;
							}
						}
						?>
					</td>
					<td>
						<?php 
						$b = $this->Model_lihatnilaisiswa->getnilaitotal($key->idsiswa,$key->kodemapel)->result();
						foreach ($b as $b) {
							if($b->nilai==null){
								echo "0";
							}
							else{
								echo $b->nilai;
							}
						}
						?>
					</td>
					<td>
						<?php 
						$b = $this->Model_lihatnilaisiswa->getnilairata($key->idsiswa,$key->kodemapel)->result();
						foreach ($b as $b) {
							if($b->nilai==null){
								echo "0";
							}
							else{
								echo number_format($b->nilai,2);
							}
						}
						?>
					</td>
				</tr>
			<?php $no++; }
		 ?>
		</table>
	</div>
</div>
<script type="text/javascript">
var dataTable = $('#datatableTable').DataTable( {
	"processing": true,
	"serverSide": true,
	"searching": false,
	"responsive": true,
	
	"ajax":{
		url :"<?php echo site_url("lihatnilaisiswa/grid"); ?>", 
		type: "post", 
		"data": function ( data ) {
		data.semester= $('#semester').val();

		
		
    }
		
	},
	"rowCallback": function( row, data ) {
		
		
	}
} );
	
$(document).on('click keyup', '#searchcustom,#keyword', function (event, messages) {			
 
   dataTable.ajax.reload(null,false);	        

});

$(document).on('change', '#tmjenjang_id,#tmkelas_id,#tmruang_id', function (event, messages) {			
 
   dataTable.ajax.reload(null,false);	        

});
	
	
</script>
