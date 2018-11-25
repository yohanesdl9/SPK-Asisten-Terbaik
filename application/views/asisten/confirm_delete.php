<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Yakin ingin menghapus data berikut?</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <label class="col-md-3 control-label"> <b> NRP </b> </label>
                <div class="col-md-7"> <?php echo $asisten->nrp ?> </div>
            </div>
            <div class="row">
                <label class="col-md-3 control-label"> <b> Nama </b> </label>
                <div class="col-md-7"> <?php echo $asisten->nama ?> </div>
            </div>
            <div class="row">
                <label class="col-md-3 control-label"> <b> Alamat </b> </label>
                <div class="col-md-7"> <?php echo $asisten->alamat ?> </div>
            </div>
            <div class="row">
                <label class="col-md-3 control-label"> <b> Telepon </b> </label>
                <div class="col-md-7"> <?php echo $asisten->telepon ?> </div>
            </div>
        </div>
        <div class="modal-footer">
            <a class="btn btn-success" href="<?php echo base_url() . 'asisten/delete/' . $asisten->nrp ?>"> Confirm </a>
            <a class="btn btn-danger" data-dismiss="modal" aria-hidden="true"> Cancel </a>
        </div>
    </div>
</div>