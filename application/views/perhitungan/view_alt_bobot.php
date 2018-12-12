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
        <h3 class="box-title">Perhitungan Ranking Preferensi dengan TOPSIS</h3>
	</div>
    <div class="box-body">
        <h4>Kriteria</h4>
        <ul>
            <li>C1 : Kedisiplinan Asisten : <?php echo number_format($result['bobot'][0] * 100, 2); ?>%</li>
            <li>C2 : Persentase Kelulusan : <?php echo number_format($result['bobot'][1] * 100, 2); ?>%</li>
            <li>C3 : Nilai Rata-Rata Kelas : <?php echo number_format($result['bobot'][2] * 100, 2); ?>%</li>
            <li>C4 : Persentase Jumlah Mahasiswa dengan Nilai A : <?php echo number_format($result['bobot'][3] * 100, 2); ?>%</li>
        </ul>
        <h4>Alternatif</h4>
        <table class="table table-bordered table-striped">
            <thead>
				<tr>
					<th class="text-center">Asisten</th>
					<th class="text-center">C1</th>
					<th class="text-center">C2</th>
					<th class="text-center">C3</th>
					<th class="text-center">C4</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($alternatives as $jd){?>
				<tr>
					<td><?php echo $jd->nama?></td>
					<td class="text-center"><?php echo $jd->nilai_disiplin; ?></td>
					<td class="text-center"><?php echo number_format($jd->avg_lulus, 1); ?></td>
					<td class="text-center"><?php echo number_format($jd->avg_kelas, 1); ?></td>
					<td class="text-center"><?php echo number_format($jd->avg_nilai_A, 1); ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
    </div>
</div>			
<?php
$this->load->view('templates/footer');
?>