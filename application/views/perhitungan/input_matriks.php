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
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 5%;" class="text-center"></th>
                                    <th style="width: 5%;" class="text-center">C1</th>
                                    <th style="width= 5%;" class="text-center">C2</th>
                                    <th style="width= 5%;" class="text-center">C3</th>
                                    <th style="width= 5%;" class="text-center">C4</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">C1</td>
                                    <td class="text-center">1</td>
                                    <td style="width: 5%;"><input type="number" class="form-control" name="C12" min="1" max="9" /></td>
                                    <td style="width: 5%;"><input type="number" class="form-control" name="C13" min="1" max="9" /></td>
                                    <td style="width: 5%;"><input type="number" class="form-control" name="C14" min="1" max="9" /></td>
                                </tr>
                                <tr>
                                    <td class="text-center">C2</td>
                                    <td></td>
                                    <td class="text-center">1</td>
                                    <td><input type="number" class="form-control" name="C23" min="1" max="9" /></td>
                                    <td><input type="number" class="form-control" name="C24" min="1" max="9" /></td>
                                </tr>
                                <tr>
                                    <td class="text-center">C3</td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">1</td>
                                    <td><input type="number" class="form-control" name="C34" min="1" max="9" /></td>
                                </tr>
                                <tr>
                                    <td class="text-center">C4</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">1</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6"> 
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
?>