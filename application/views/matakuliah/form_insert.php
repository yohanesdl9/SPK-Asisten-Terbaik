<div id="MInsertMK" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Masukkan Data Matakuliah</h4>
            </div>
            <form action="<?php echo base_url() ?>matakuliah/insert" class="form_horizontal" enctype="multipart/form-data" method="POST">
            <div class="modal-body">
                <div class="form-group row">
                    <label for="kodemk" class="col-md-3 control-label">Kode MK*</label>
                    <div class="col-md-3">
                        <input type="text" name="kodemk" class="form-control" value="" id="kodemk" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namamk" class="col-md-3 control-label">Nama Mata Kuliah*</label>
                    <div class="col-md-8">
                        <input type="text" name="namamk" class="form-control" value="" id="nama" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sks" class="col-md-3 control-label">SKS*</label>
                    <div class="col-md-2">
                        <input type="number" name="sks" class="form-control" value="" min="1" max="6" id="sks" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jabatan" class="col-md-3 control-label">Jenis Matakuliah*</label>
                    <div class="col-md-8">
                        <label class="control-label"><input type="radio" class="minimal" name="tipe" value="1" checked />Kelas Lab</label>
                        <label class="control-label"><input type="radio" class="minimal" name="tipe" value="2"/>Praktikum</label>
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