  <?php 
if(count($datagrid) >0){
  
    ?>
	 <table class="table table-hover table-bordered table-striped">
	   <thead>
	   <tr>
	     <th>No</th>
	     <th>Hari </th>
	     <th>Jam </th>
	     <th>Mata Pelajaran </th>
	     <th>Guru </th>
	     <th> Aksi </th>
	   </tr>
	   </thead>
	   
	   <tbody>
	   <?php 
	   $no=1;
	    $hari  = array("1"=>"Senin","2"=>"Selasa","3"=>"Rabu","4"=>"Kamis","5"=>"Jumat","6"=>"Sabtu","7"=>"Minggu");
	  
	     foreach($datagrid as $row){
		?>
	     <tr id="row<?php echo $row->id; ?>">
			 <td><?php echo $no++; ?></td>
             <td><?php echo $row->nama_hari; ?></td>
             <td><?php echo $row->jam; ?></td>
             <td><?php echo $row->pelajaran; ?></td>
             <td><?php echo $row->guru; ?></td>
			
			 <td> <a href="javascript:;" class="btn btn-success deleteone tooltips" data-container="body" data-placement="top"  title="Hapus Data" datanya="<?php echo $row->id; ?>"  ><i class="fa fa-trash-o"></i></a> </td>
	     </tr>
		<?php 
		 }
		?>
	   </tbody>
	 
	 
	 </table>
   
   
   
   <?php 
   
}

?>
						  