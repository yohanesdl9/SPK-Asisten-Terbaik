<?php
$this->load->view('templates/header');
if ($this->session->flashdata('error_message')){ ?> 
	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<?php echo $this->session->flashdata('error_message') ?>
	</div>
<?php }
?>
<div class="box">
	<div class="box-header with-border">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <label class="col-md-4 control-label"> <b> Kode MK </b> </label>
                    <div class="col-md-8"> <?php echo $hasil->kodemk; ?> </div>
                </div>
                <div class="row">
                    <label class="col-md-4 control-label"> <b> Nama Matakuliah </b> </label>
                    <div class="col-md-8"> <?php echo $hasil->namamk; ?> </div>
                </div>
                <div class="row">
                    <label class="col-md-4 control-label"> <b> Kelas </b> </label>
                    <div class="col-md-8"> <?php echo $hasil->kelas; ?> </div>
                </div>
                <div class="row">
                    <label class="col-md-4 control-label"> <b> Pertemuan </b> </label>
                    <div class="col-md-8"> <?php echo get_nama_hari($hasil->hari) . ' ' . $hasil->jam_mulai . "-" . $hasil->jam_selesai . ' ' . $hasil->koderuang; ?> </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <label class="col-md-4 control-label"> <b> Jumlah Peserta </b> </label>
                    <div class="col-md-8"> <?php echo $hasil->jumlah_peserta; ?> </div>
                </div>
                <div class="row">
                    <label class="col-md-4 control-label"> <b> Dosen </b> </label>
                    <div class="col-md-8"> <?php echo $hasil->nama_dosen; ?> </div>
                </div>
                <div class="row">
                    <label class="col-md-4 control-label"> <b> Asisten </b> </label>
                    <div class="col-md-8"> <?php echo $asisten->asisten_1 . '<br/>' . $asisten->asisten_2;  ?> </div>
                </div>
            </div>
        </div>
	</div>
	<form class="form-horizontal" action="<?php echo base_url()?>isi_nilai/isi" method="post">
		<div class="box-body">
            <div class="form-group">
				<label for="avg_kelas" class="col-md-2 control-label">Rata-Rata Kelas</label>
				<div class="col-md-1">
					<input type="text" class="form-control" name="avg_kelas" />
				</div>
			</div>
            <div class="form-group">
				<label for="avg_kelas" class="col-md-2 control-label">Jumlah Mahasiswa Dengan Nilai</label>
				<div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <td style="width: 5%;" class="text-center">A</td>
                            <td style="width: 10%;">
                                <input type="text" class="form-control" name="jumlah_A" />
                            </td>
                            <td style="width: 5%;" class="text-center">B+</td>
                            <td style="width: 10%;">
                                <input type="text" class="form-control" name="jumlah_B_plus" />
                            </td>
                            <td style="width: 5%;" class="text-center">B</td>
                            <td style="width: 10%;">
                                <input type="text" class="form-control" name="jumlah_B" />
                            </td>
                            <td style="width: 5%;"></td>
                            <td style="width: 10%;"></td>
                        </tr>
                        <tr>
                            <td class="text-center">C+</td>
                            <td>
                                <input type="text" class="form-control" name="jumlah_C_plus" />
                            </td>
                            <td class="text-center">C</td>
                            <td>
                                <input type="text" class="form-control" name="jumlah_C" />
                            </td>
                            <td class="text-center">D</td>
                            <td>
                                <input type="text" class="form-control" name="jumlah_D" />
                            </td>
                            <td class="text-center">E</td>
                            <td>
                                <input type="text" class="form-control" name="jumlah_E" />
                            </td>
                        </tr>
                    </table>
                </div>
			</div>
		</div>
		<div class="box-footer">
			<a href="<?php echo base_url()?>isi_nilai" class="btn btn-default">Kembali</a>
			<input type="submit" class="btn btn-info pull-right" value="Simpan" />
		</div>
	</form>
</div>			
<?php
$this->load->view('templates/footer');

function get_nama_hari($index){
	$nama_hari = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
	return $nama_hari[$index];
} 
?>