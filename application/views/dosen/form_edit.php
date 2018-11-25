<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Ubah Data Dosen</h4>
        </div>
        <form action="<?php echo base_url() ?>dosen/update" class="form_horizontal" enctype="multipart/form-data" method="POST">
        <div class="modal-body">
            <div class="form-group row">
                <label for="nip" class="col-md-3 control-label">NIP*</label>
                <div class="col-md-3">
                    <input type="text" name="nip" class="form-control" value="<?php echo $hasil->nip ?>" maxlength="6" id="nip" />
                    <input type="hidden" name="old_nip" class="form-control" value="<?php echo $hasil->nip ?>" id="nip" />
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_dosen" class="col-md-3 control-label">Nama Dosen*</label>
                <div class="col-md-9">
                    <input type="text" name="nama_dosen" class="form-control" value="<?php echo $hasil->nama_dosen ?>" id="nama_dosen" />
                </div>
            </div>	
            <div class="form-group row">
                <label for="jk" class="col-md-3 control-label">Jenis Kelamin*</label>
                <div class="col-md-9">
                    <label class="control-label"><input type="radio" class="minimal" name="jk" id="jk" value="L" <?php echo $hasil->jk == 'L' ? 'checked':'' ?>/>Laki-laki</label>
                    <label class="control-label"><input type="radio" class="minimal" name="jk" id="jk" value="P" <?php echo $hasil->jk == 'P' ? 'checked':'' ?>/>Perempuan</label>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-3 control-label">Email*</label>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" name="email" class="form-control" value="<?php $email = explode('@', $hasil->email); echo $email[0] ?>" id="email" />
                        <span class="input-group-addon">@stiki.ac.id</span>
                    </div>
                </div>		
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-md-3 control-label">Alamat*</label>
                <div class="col-md-9">
                    <input type="text" name="alamat" class="form-control" value="<?php echo $hasil->alamat ?>" id="alamat" />
                </div>		
            </div>
            <div class="form-group row">
                <label for="telepon" class="col-md-3 control-label">Telepon*</label>
                <div class="col-md-3">
                    <input type="text" name="telepon" class="form-control" value="<?php echo $hasil->telepon ?>" maxlength="12" id="telepon" />
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