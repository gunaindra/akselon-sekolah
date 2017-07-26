<?php $attributes = array('class' => 'form-horizontal', 'role'=>'form','name' => 'simpan', 'id' => 'simpanberita', 'method' => "post", 'url' =>site_url("pengaturan/save")); ?>
<?php echo form_open("javascript:void(0)", $attributes); ?>
<input type="hidden" name="id" class="form-control" value="<?php echo isset($dataform->id) ? $dataform->id:"";  ?>">
<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								 Pengaturan  Sekolah
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
									
									 
									 <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Nama Sekolah  <span class="required">*</span></label>
											 <div class="col-md-9">
												
													<input type="text"  name="f[namasekolah]" value="<?php echo isset($dataform->namasekolah) ? $dataform->namasekolah:"";  ?>" placeholder="  " class="form-control"  >
																						
											</div>
									 </div>
									 
									  <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Telepon <span class="required">*</span></label>
											 <div class="col-md-9">
												
													<input type="text"  name="f[telepon]" value="<?php echo isset($dataform->telepon) ? $dataform->telepon:"";  ?>" placeholder="  " class="form-control"  >
																						
											</div>
									 </div>
									 
									   <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Email <span class="required">*</span></label>
											 <div class="col-md-9">
												
													<input type="email"  name="f[email]" value="<?php echo isset($dataform->email) ? $dataform->email:"";  ?>" placeholder="  " class="form-control"  >
																						
											</div>
									 </div>
									 
									   <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Footer <span class="required">*</span></label>
											 <div class="col-md-9">
												
													<input type="text"  name="f[footer]" value="<?php echo isset($dataform->footer) ? $dataform->footer:"";  ?>" placeholder="  " class="form-control"  >
																						
											</div>
									 </div>
									 
									   <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> alamat <span class="required">*</span></label>
											 <div class="col-md-9">
												<textarea  type="email"  name="f[alamat]"  class="form-control"  > <?php echo isset($dataform->alamat) ? $dataform->alamat:"";  ?> </textarea>
																						
											</div>
									 </div>
									 
									  <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Ucapan <span class="required">*</span></label>
											 <div class="col-md-9">
												<input type="text"  name="f[title]" value="<?php echo isset($dataform->title) ? $dataform->title:"";  ?>" placeholder="  " class="form-control"  >
																					
											</div>
									 </div>
									 
									   <div class="form-group">
											 <label class="col-md-3 control-label" style="text-align:left"> Logo     <span class="required"></span></label>
											 <div class="col-md-9">
												
													<input type="file"  name="gambar"   >
																						
											</div>
									 </div>
									 
									 
									 
									 <div class="form-actions">
										<div class="row">
											<div class="col-md-3 navbar-right">
												<button type="submit" class="btn green"><i class="fa fa-save"></i> Simpan</button>
												<button type="button" class="btn default" id="cancel"><i class="fa fa-repeat "></i> Batal</button>
											</div>
										</div>
									</div>
								
								<div class="clear"><br></div>
								<div class="alert alert-info">
									<b> Keterangan </b>
									<ol type="square">
									  <li> Tanda (*) Wajib di isi</li>
									 </ol>
								</div>
						</div>
</div>
						
							<?php echo form_close(); ?>
						
						
				
							 <script>
       $(document).on('submit', 'form#simpanberita', function (event, messages) {
	 event.preventDefault()
       var form   = $(this);
       var urlnya = $(this).attr("url");
	   var isi    = $('.summernote').code();
	   var formData = new FormData(this);
       
	  loading();
        $.ajax({
            type: "POST",
            url: urlnya,
            
			data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,    
			success: function (response, status, xhr) {
                var ct = xhr.getResponseHeader("content-type") || "";
                if (ct == "application/json") {
                    
                    $("#errorvalidation").show();
                    $("#messagevalidation").html(response.message);
                    $('html, body').animate({
                        scrollTop: $("#headerawal").offset().top
                    }, 1000);
                } else {
					
                   alertify.success("Data Berhasil Di Simpan");
				  
					
				   
				    location.href="<?php echo site_url("pengaturan/sekolah"); ?>";
				   
                }
				
				Metronic.unblockUI();
            }
        });

        return false;
    });		
		


	   
       
    </script>
							
							