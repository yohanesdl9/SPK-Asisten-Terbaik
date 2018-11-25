<div id="MInsertRuang" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Masukkan Data Ruang</h4>
            </div>
            <form action="<?php echo base_url() ?>ruang/insert" class="form_horizontal" enctype="multipart/form-data" method="POST">
            <div class="modal-body">
                <div class="form-group row">
                    <label for="koderuang" class="col-md-3 control-label">Kode Ruang*</label>
                    <div class="col-md-3">
                        <input type="text" name="koderuang" class="form-control" value="" id="koderuang" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-md-3 control-label">Nama Ruang*</label>
                    <div class="col-md-6">
                        <input type="text" name="nama_ruang" class="form-control" value="" id="nama_ruang" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-md-3 control-label">Kapasitas*</label>
                    <div class="col-md-2">
                        <input type="number" name="kapasitas" class="form-control" value="" min="1" max="30" id="kapasitas" />
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