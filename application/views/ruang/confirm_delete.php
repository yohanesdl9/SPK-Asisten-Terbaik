<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Yakin ingin menghapus data berikut?</h4>
        </div>
        <div class="modal-body">
            <div class="row">
				<label class="col-md-3 control-label"> <b> Kode Ruang </b> </label>
				<div class="col-md-9"> <?php echo $hasil->koderuang; ?> </div>
			</div>
			<div class="row">
				<label class="col-md-3 control-label"> <b> Nama Ruang </b> </label>
				<div class="col-md-9"> <?php echo $hasil->nama_ruang; ?> </div>
			</div>
			<div class="row">
				<label class="col-md-3 control-label"> <b> Kapasitas </b> </label>
				<div class="col-md-9"> <?php echo $hasil->kapasitas; ?> </div>
			</div>
        </div>
        <div class="modal-footer">
            <a class="btn btn-success" href="<?php echo base_url() . 'ruang/delete/' . $hasil->koderuang ?>"> Confirm </a>
            <a class="btn btn-danger" data-dismiss="modal" aria-hidden="true"> Cancel </a>
        </div>
    </div>
</div>