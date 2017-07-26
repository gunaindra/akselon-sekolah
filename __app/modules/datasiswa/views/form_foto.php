<link href="<?php echo base_url(); ?>__statics/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet"/>
<link href="<?php echo base_url(); ?>__statics/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet"/>

							 <?php $attributes = array('class' => 'form-horizontal', 'role'=>'form','name' => 'thisForm', 'id' => 'simpanfoto', 'method' => "post", 'enctype' => "multipart/form-data","url"=>site_url("datasiswa/savefoto")); ?>
                             <?php echo form_open("javascript:void(0)", $attributes); ?>
							 <input type="hidden" name="id" class="form-control" value="<?php echo isset($dataform->id) ? $dataform->id:"";  ?>">
							 <input type="hidden" name="namasiswa" class="form-control" value="<?php echo isset($dataform->nama) ? $dataform->nama:"";  ?>">
								<div class="portlet box red">
										<div class="portlet-title">
											<div class="caption">
												  Foto Siswa
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
																		<div class="note note-danger note-bordered" id="messagevalidation"></div>
																	</div>
																</div>
																
																<br>
																	<center><h4><b>Ambil atau Upload Foto </b></h4></center> <br><br>
															 
															 
													<table class="table" border="0">
													  <tr>
													   
													<td align="center" style="width:30%">
													
													<input type="hidden" name="textbox1" id="textbox1" class="form-control" readonly value="<?php echo isset($dataform->foto) ? $dataform->foto:"";  ?>"/>
													<div id="imagenya">
													 <?php 
													  if(isset($dataform->foto)):
														if($dataform->foto !=""){
															
														  $dir = "siswa/".$dataform->foto."";
														}else{
															
														 $dir = "siswa/image.jpg";
														}
															else:
															$dir = "siswa/image.jpg";
															
															endif; 
														?>
													  <img src="<?php echo base_url(); ?>__statics/img/<?php echo $dir; ?>" id="image" class="img-thumbnail img-responsive"  alt="Foto Siswa" style="height:200px;width:200px">
													</div>
													<a onclick="PopupCenterDual(document.thisForm.textbox1,'<?php echo site_url("datasiswa/camera"); ?>','Pemotretan','350','700'); " style="width:320px" class="btn btn-success " ><i class="glyphicon glyphicon-camera"></i>&nbsp;&nbsp; Ambil Foto</a>
													
													<span class="btn green fileinput-button" style="width:320px">
																	<i class="fa fa-plus"></i>
																	<span>
																	Ambil Dari Komputer </span>
																	<input type="file" name="files" id="files">
													</span>
													
													
													  
							  <!-- Modal -->
							 
							  
													
													</td>
												</tr>
												
												 <tr>
												   <td>
													 
																 <div class="form-actions">
																	<div class="row">
																		<div class="col-md-3 navbar-right">
																			<button type="submit" class="btn green"><i class="fa fa-save"></i> Simpan</button>
																			<button type="button" class="btn default" id="cancel"><i class="fa fa-repeat "></i> Batal</button>
																		</div>
																	</div>
																</div>
																
													</td>
											   </tr>
											</table>
			</div>
		</div>
							<?php echo form_close(); ?>
						
						
				
							
							
							<br>
							<br>
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ambil Foto</h4>
        </div>
        <div class="modal-body" id="bodyfoto">
		
		
			
			
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  

 <script type="text/javascript">
function PopupCenterDual(targetField,url, title, w, h) {
// Fixes dual-screen position Most browsers Firefox
var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

var left = ((width / 2) - (w / 2)) + dualScreenLeft;
var top = ((height / 2) - (h / 2)) + dualScreenTop;
var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
  newWindow.targetField = targetField;
        newWindow.focus();
// Puts focus on the newWindow
if (window.focus) {
newWindow.focus();
}


}

 function setSearchResult(targetField, returnValue){
        targetField.value = returnValue;
		$("#image").attr("src","<?php echo base_url(); ?>__statics/img/siswa/"+returnValue+"");
        window.focus();
    }
	
  
	document.getElementById("files").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};
</script>
  