<div class="portlet box red">
<div class="portlet-title">
    <div class="caption">
         Akun Pegawai
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
            
            <div class="tabbable-custom nav-justified">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active">
                        <a href="#detail" data-toggle="tab">
                        Detail Pegawai
                         </a>
                    </li>
                    <li>
                        <a href="#akunpegawai" data-toggle="tab">
                         Akun Pegawai  </a>
                    </li>
                </ul>
                
                <div class="tab-content">
                <div class="tab-pane active" id="detail">
                      <div class="table-responsive">
                         <table class="table ">                           
                             <tr>
                             	<td><?php $this->load->view("detail"); ?></td>
                             </tr>
                         </table>
                      </div>                                            
                    </div>
                    <div class="tab-pane" id="akunpegawai">
                      <div class="table-responsive">
                         <table class="table table-hover table-stripped table-bordered">
                             <tr>
                                <td width="20%"> Username </td>
                                <td width="20%"> <?php echo $dataform->username; ?> </td>
                             </tr>
                              <tr>
                                <td> Password </td>
                                <td> <?php echo $dataform->password; ?> </td>
                             </tr>
                         </table>
                      </div>                                            
                    </div>
                </div>
          </div>        
        <div class="clear"><br></div>
        <div class="alert alert-info">
            <b> Keterangan </b>
            <ol type="square">
              <li>Akun Pegawai akan digunakan login oleh pegawai</li>
             </ol>
        </div>
        
         <div class="form-actions">
                <div class="row">
                    <div class="col-md-3 navbar-right">
                        
                        <button type="button" class="btn default" id="cancel"><i class="fa fa-repeat "></i> Tutup</button>
                    </div>
                </div>
            </div>
</div>
</div>
<?php echo form_close(); ?>