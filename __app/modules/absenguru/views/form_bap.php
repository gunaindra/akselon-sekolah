<form id="guru-bap">
    <div class="portlet box red">
        <div class="portlet-title">
            <div class="caption">
                Berita Acara Keg. Belajar Mengajar
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
            <div class="row" id="guru-bap-errorvalidation">
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input type="hidden" name="jadwal_id" value="<?php echo $jadwal_id; ?>">
                    <textarea class="form-control" rows="5" name="bap" placeholder="Catatan Selama Keg. Belajar Mengajar..."></textarea>
                </div>
            </div>
            <div class="form-group">
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-3 navbar-right">
                        <button type="submit" class="btn green" id="guru-bap-submit"><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn default" id="cancel"><i class="fa fa-repeat "></i> Batal</button>
                    </div>
                </div>
            </div>
            <div class="clear"><br></div>
        </div>
    </div>
</form>
