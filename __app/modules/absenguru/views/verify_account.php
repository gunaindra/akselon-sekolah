<form id="guru-verify-account">
    <div class="portlet box red">
        <div class="portlet-title">
            <div class="caption">
                Verifikasi Akun
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
            <div class="row" id="guru-verify-errorvalidation">
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" style="text-align:left">Masukkan Password</label>
                <div class="col-md-9">
                    <input type="hidden" name="jadwal_id" value="<?php echo $jadwal_id; ?>">
                    <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
            </div>
            <div class="form-group">
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-3 navbar-right">
                        <button type="submit" class="btn green" id="guru-verify-account-submit"><i class="fa fa-save"></i> Verifikasi</button>
                        <button type="button" class="btn default" id="cancel"><i class="fa fa-repeat "></i> Batal</button>
                    </div>
                </div>
            </div>
            <div class="clear"><br></div>
        </div>
    </div>
</form>
