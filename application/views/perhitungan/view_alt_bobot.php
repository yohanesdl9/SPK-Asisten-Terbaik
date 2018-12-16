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
        <h3 class="box-title">Perhitungan Ranking Preferensi dengan AHP-TOPSIS</h3>
	</div>
    <div class="box-body">
		<div class="col-md-5">
		<?php if ($this->session->userdata('isLogin') == TRUE){ ?>
		<h4>Matriks Pairwise Comparison</h4>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th style="width: 5%" class="text-center"></th>
						<th style="width: 5%" class="text-center">C1</th>
						<th style="width: 5%" class="text-center">C2</th>
						<th style="width: 5%" class="text-center">C3</th>
						<th style="width: 5%" class="text-center">C4</th>
					</tr>
				</thead>
				<tbody>
					<?php for ($i = 0; $i < count($pairwise_matrix); $i++){ ?>
						<tr>
							<td class="text-center"><?php echo 'C' . ($i + 1) ?></td>
							<?php for ($j = 0; $j < count($pairwise_matrix); $j++){ ?>
								<td class="text-center"><?php echo number_format($pairwise_matrix[$i][$j], 4); ?></td>
							<?php } ?>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php } ?>
		<h4>Kriteria</h4>
			<ul>
				<li>C1 : Kedisiplinan Asisten : <?php echo number_format($result->bobot_disiplin * 100, 2); ?>%</li>
				<li>C2 : Persentase Kelulusan : <?php echo number_format($result->bobot_avg_lulus * 100, 2); ?>%</li>
				<li>C3 : Nilai Rata-Rata Kelas : <?php echo number_format($result->bobot_avg_kelas * 100, 2); ?>%</li>
				<li>C4 : Persentase Jumlah Mahasiswa dengan Nilai A : <?php echo number_format($result->bobot_avg_nilai_A * 100, 2); ?>%</li>
			</ul>
		</div>
		<div class="col-md-7">
		<h4>Alternatif</h4>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th class="text-center">Ranking</th>
						<th class="text-center">Asisten</th>
						<th class="text-center">Solusi Ideal Positif</th>
						<th class="text-center">Solusi Ideal Negatif</th>
						<th class="text-center">Nilai Preferensi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1;
					foreach($alt as $jd){ ?>
					<tr>
						<td class="text-center"><?php echo $i?></td>
						<td><?php echo $jd['nama']?></td>
						<td class="text-center"><?php echo number_format($jd['SIP'], 5); ?></td>
						<td class="text-center"><?php echo number_format($jd['SIN'], 5); ?></td>
						<td class="text-center"><?php echo number_format($jd['nilai_pref'], 5); ?></td>
					</tr>
					<?php $i++; } ?>
				</tbody>
			</table>
		</div>
    </div>
</div>			
<?php
$this->load->view('templates/footer');
?>