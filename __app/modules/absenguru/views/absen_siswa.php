<form id="absen-siswa">
    <div class="portlet box red">
        <div class="portlet-title">
            <div class="caption">
                Absensi Siswa
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
            <div class="row" id="absen-siswa-errorvalidation">
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-highlight">
                    <thead>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                    <?php foreach ($siswa as $sis) : ?>
                        <tr>
                            <td><?php echo $sis->NISN; ?></td>
                            <td><?php echo $sis->nama; ?></td>
                            <td>
                                <label class="radio-inline">
                                    <input type="radio" name="status[<?php echo $sis->id; ?>]" value="hadir">Hadir
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status[<?php echo $sis->id; ?>]" value="absen">Absen/tanpa keterangan
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status[<?php echo $sis->id; ?>]" value="ijin">Ijin
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status[<?php echo $sis->id; ?>]" value="sakit">Sakit
                                </label> 
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="clear"><br></div>
            <div class="alert alert-info">
                <b> Keterangan </b>
                <ol type="square">
                  <li> Sebelum klik submit isi terlebih dahulu seluruh absen siswa</li>
                 </ol>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-3 navbar-right">
                        <input type="hidden" name="jadwal_id" value="<?php echo $jadwal_id; ?>">
                        <input type="hidden" name="ajaran" value="<?php echo $sis->ajaran; ?>">
                        <input type="hidden" name="idsekolah" value="<?php echo $_SESSION['tmsekolah_id'];  ?>">

                        <button type="submit" class="btn green" id="absen-siswa-submit"><i class="fa fa-save"></i> Submit</button>
                        <button type="button" class="btn default" id="cancel"><i class="fa fa-repeat "></i> Batal</button>
                    </div>
                </div>
            </div>
            <div class="clear"><br></div>
        </div>
    </div>
</form>
