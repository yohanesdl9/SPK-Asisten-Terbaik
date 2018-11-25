<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Ubah Data Asisten</h4>
        </div>
        <form action="<?php echo base_url() ?>asisten/update" class="form_horizontal" enctype="multipart/form-data" method="POST">
        <div class="modal-body">
            <div class="form-group row">
                <label for="nrp" class="col-sm-4 control-label">NRP*</label>
                <div class="col-sm-3">
                    <input type="text" name="nrp" class="form-control nrp" value="<?php echo $asisten->nrp ?>" maxlength="9" id="nrp" />
                    <input type="hidden" name="old_nrp" value="<?php echo $asisten->nrp ?>"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-4 control-label">Nama*</label>
                <div class="col-sm-8">
                    <input type="text" name="nama" class="form-control" value="<?php echo $asisten->nama ?>" id="nama" />
                </div>
            </div>
            <div class="form-group row">
                <label for="jk" class="col-sm-4 control-label">Jenis Kelamin*</label>
                <div class="col-sm-8">
                    <label class="control-label"><input type="radio" class="minimal" name="jk" id="jk" value="L" <?php echo $asisten->jk == 'L' ? 'checked' : ''; ?>/>Laki-laki</label>
                    <label class="control-label"><input type="radio" class="minimal" name="jk" id="jk" value="P" <?php echo $asisten->jk == 'P' ? 'checked' : ''; ?>/>Perempuan</label>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-4 control-label">Alamat*</label>
                <div class="col-sm-8">
                    <input type="text" name="alamat" class="form-control" value="<?php echo $asisten->alamat; ?>" id="alamat" />
                </div>
            </div>
            <div class="form-group row">
                <label for="telepon" class="col-sm-4 control-label">Telepon*</label>
                <div class="col-sm-3">
                    <input type="text" name="telepon" class="form-control telepon" value="<?php echo $asisten->telepon; ?>" maxlength="12" id="telepon" />
                </div>
            </div>
            <div class="form-group row">
                <label for="nrp" class="col-sm-4 control-label">Nilai Kedisiplinan*</label>
                <div class="col-sm-3">
                    <input type="number" name="nilai_disiplin" class="form-control nrp" value="<?php echo $asisten->nilai_disiplin; ?>" min="0" max="100" id="nilai_disiplin" />
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