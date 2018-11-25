<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Ubah Data Matakuliah</h4>
        </div>
        <form action="<?php echo base_url() ?>matakuliah/update" class="form_horizontal" enctype="multipart/form-data" method="POST">
        <div class="modal-body">
            <div class="form-group row">
                <label for="koderuang" class="col-md-3 control-label">Kode MK</label>
                <div class="col-md-3">
                <input type="text" name="kodemk" class="form-control" value="<?php echo $hasil->kodemk; ?>" id="kodemk" />
                    <input type="hidden" name="old_kodemk" class="form-control" value="<?php echo $hasil->kodemk; ?>" id="kodemk" />
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-md-3 control-label">Nama Matakuliah*</label>
                <div class="col-md-9">
                    <input type="text" name="namamk" class="form-control" value="<?php echo $hasil->namamk ?>" id="namamk" />
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-md-3 control-label">SKS*</label>
                <div class="col-md-2">
                    <input type="number" name="sks" class="form-control" value="<?php echo $hasil->sks ?>" min="1" max="6" id="sks" />
                </div>		
            </div>
            <div class="form-group row">
                <label for="jabatan" class="col-md-3 control-label">Jenis Matakuliah*</label>
                <div class="col-md-9">
                    <label class="control-label"><input type="radio" class="minimal" name="tipe" value="1" <?php echo $hasil->tipe == 1 ? "checked" : "" ?>/>Kelas Lab</label>
                    <label class="control-label"><input type="radio" class="minimal" name="tipe" value="2" <?php echo $hasil->tipe == 2 ? "checked" : "" ?>/>Praktikum</label>
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