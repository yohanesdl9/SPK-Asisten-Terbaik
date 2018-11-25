<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Yakin ingin menghapus data berikut?</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <label class="col-md-3 control-label"> <b> NIP </b> </label>
                <div class="col-md-5"> <?php echo $hasil->nip; ?> </div>
            </div>
            <div class="row">
                <label class="col-md-3 control-label"> <b> Nama Dosen </b> </label>
                <div class="col-md-5"> <?php echo $hasil->nama_dosen; ?> </div>
            </div>
        </div>
        <div class="modal-footer">
            <a class="btn btn-success" href="<?php echo base_url() . 'dosen/delete/' . $hasil->nip ?>"> Confirm </a>
            <a class="btn btn-danger" data-dismiss="modal" aria-hidden="true"> Cancel </a>
        </div>
    </div>
</div>