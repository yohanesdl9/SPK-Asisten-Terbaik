<div id="MInsertAsisten" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Masukkan Data Asisten</h4>
            </div>
            <form action="<?php echo base_url() ?>asisten/insert" class="form_horizontal" enctype="multipart/form-data" method="POST">
            <div class="modal-body">
                <div class="form-group row">
                    <label for="nrp" class="col-sm-4 control-label">NRP*</label>
                    <div class="col-sm-3">
                        <input type="text" name="nrp" class="form-control nrp" value="" maxlength="9" id="nrp" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-4 control-label">Nama*</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama" class="form-control" value="" id="nama" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jk" class="col-sm-4 control-label">Jenis Kelamin*</label>
                    <div class="col-sm-8">
                        <label class="control-label"><input type="radio" class="minimal" name="jk" id="jk" value="L"/>Laki-laki</label>
                        <label class="control-label"><input type="radio" class="minimal" name="jk" id="jk" value="P"/>Perempuan</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-4 control-label">Alamat*</label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="" id="alamat" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telepon" class="col-sm-4 control-label">Telepon*</label>
                    <div class="col-sm-3">
                        <input type="text" name="telepon" class="form-control telepon" value="" maxlength="12" id="telepon" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jabatan" class="col-sm-4 control-label">Jabatan*</label>
                    <div class="col-sm-8">
                        <label class="control-label"><input type="radio" class="minimal" name="jabatan" value="Honorer" checked />Honorer</label>
                        <label class="control-label"><input type="radio" class="minimal" name="jabatan" value="Tetap"/>Tetap</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nrp" class="col-sm-4 control-label">Nilai Kedisiplinan*</label>
                    <div class="col-sm-3">
                        <input type="number" name="nilai_disiplin" class="form-control nrp" value="" min="0" max="100" id="nilai_disiplin" />
                    </div>
                </div>
            <p style="color: red"> *Required field must be filled </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="submit"> Confirm </button>
                <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"> Cancel </button>
            </div>
            </form>
        </div>
    </div>
</div>