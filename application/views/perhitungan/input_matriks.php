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
        <h3 class="box-title">Pembentukan Matriks Pairwise Comparison</h3>
	</div>
	<form action="<?php echo base_url('perhitungan/process_AHP') ?>" method="post">
		<div class="box-body">
            <div class="form-group">
				<label for="avg_kelas">Lakukan penilaian perbandingan dari kriteria-kriteria berikut</label>
                <div class="row">
                    <div class="col-md-7">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center"></th>
                                    <th class="text-center">C1</th>
                                    <th class="text-center">C2</th>
                                    <th class="text-center">C3</th>
                                    <th class="text-center">C4</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">C1</td>
                                    <td><input type="text" class="form-control" value="1" readonly></td>
                                    <td><?php selectAngka('C12'); ?></td>
                                    <td><?php selectAngka('C13'); ?></td>
                                    <td><?php selectAngka('C14'); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">C2</td>
                                    <td><input type="text" class="form-control" value="0" readonly></td>
                                    <td><input type="text" class="form-control" value="1" readonly></td>
                                    <td><?php selectAngka('C23'); ?></td>
                                    <td><?php selectAngka('C24'); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">C3</td>
                                    <td><input type="text" class="form-control" value="0" readonly></td>
                                    <td><input type="text" class="form-control" value="0" readonly></td>
                                    <td><input type="text" class="form-control" value="1" readonly></td>
                                    <td><?php selectAngka('C34'); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">C4</td>
                                    <td><input type="text" class="form-control" value="0" readonly></td>
                                    <td><input type="text" class="form-control" value="0" readonly></td>
                                    <td><input type="text" class="form-control" value="0" readonly></td>
                                    <td><input type="text" class="form-control" value="1" readonly></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-5"> 
                        <p>Keterangan kriteria : </p>
                        <ul>
                            <li>C1 : Kedisiplinan Asisten</li>
                            <li>C2 : Persentase Kelulusan</li>
                            <li>C3 : Nilai Rata-Rata Kelas</li>
                            <li>C4 : Persentase Jumlah Mahasiswa dengan Nilai A</li>
                        </ul>
                    </div>
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

function selectAngka($name){ ?>
    <select class="form-control" name="<?php echo $name ?>" id="<?php echo $name ?>">
    <?php for ($i = 1; $i <= 9; $i++){ ?>
        <option value="<?php echo $i ?>"><?php echo $i ?></option>
    <?php } ?>
    </select>
<?php }
?>