<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Yakin ingin menghapus data berikut?</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <label class="col-md-4 control-label"> <b> Kode MK - Nama MK </b> </label>
                <div class="col-md-8"> <?php echo $hasil->kodemk . ' - ' . $hasil->namamk; ?> </div>
            </div>
            <div class="row">
                <label class="col-md-4 control-label"> <b> Kelas </b> </label>
                <div class="col-md-8"> <?php echo $hasil->kelas; ?> </div>
            </div>
            <div class="row">
                <label class="col-md-4 control-label"> <b> Dosen </b> </label>
                <div class="col-md-8"> <?php echo $hasil->nama_dosen; ?> </div>
            </div>
            <div class="row">
                <label class="col-md-4 control-label"> <b> Hari </b> </label>
                <div class="col-md-8"> <?php echo get_nama_hari($hasil->hari) ?> </div>
            </div>
            <div class="row">
                <label class="col-md-4 control-label"> <b> Jam </b> </label>
                <div class="col-md-8"> <?php echo $hasil->jam_mulai . " - " . $hasil->jam_selesai ?> </div>
            </div>
            <div class="row">
                <label class="col-md-4 control-label"> <b> Ruang </b> </label>
                <div class="col-md-8"> <?php echo $hasil->koderuang ?> </div>
            </div>
        </div>
        <div class="modal-footer">
            <a class="btn btn-success" href="<?php echo base_url() . 'jadwal_kuliah/delete/' . $hasil->kode_kelas ?>"> Confirm </a>
            <a class="btn btn-danger" data-dismiss="modal" aria-hidden="true"> Cancel </a>
        </div>
    </div>
</div>
<?php
function get_nama_hari($index){
	$nama_hari = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
	return $nama_hari[$index];
} ?>