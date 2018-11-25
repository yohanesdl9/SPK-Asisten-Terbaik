<div id="MRemoveAll" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Opsi Hapus Data Asisten</h4>
            </div>
            <div class="modal-body">
            <form action="<?php echo base_url() ?>asisten_dosen/delete_all" class="form_horizontal" method="POST">
                <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label class="control-label"><input type="radio" class="flat-red" name="opsi_hapus" id="jk" value="honorer"/>Hapus hanya data asisten honorer</label>	
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="control-label"><input type="radio" class="flat-red" name="opsi_hapus" id="jk" value="all"/>Hapus semua data asisten</label>
                    </div>	
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="submit"> Confirm </button>
                <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"> Cancel </button>
            </div>
            </form>
        </div>
    </div>
</div>