<?php
$this->load->view('templates/header', compact('subtitle'));
if ($this->session->flashdata('success_message')){ ?>
	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-check"></i>Sukses</h4>
		<?php echo $this->session->flashdata('success_message')?>
	</div>
<?php
}
?>
<div class="box">
	<div class="box-footer">
		<table class="table table-bordered table-striped">
            <thead>
				<tr>
					<th rowspan="2" class="text-center" style="width: 350px">Kode MK - Nama Matakuliah</th>
					<th rowspan="2" class="text-center">Kelas</th>
					<th rowspan="2" class="text-center">Pertemuan</th>
                    <th rowspan="2" class="text-center" style="width: 60px">Rata-Rata Kelas</th>
                    <th colspan="7" class="text-center">Jumlah Mahasiswa dengan Nilai</th>
					<?php if ($this->session->userdata('isLogin') == TRUE){ ?>
                    <th rowspan="2" class="text-center">Opsi</th>
					<?php } ?>
                </tr>
                <tr>
                    <th class="text-center" style="width: 40px">A</th>
                    <th class="text-center" style="width: 40px">B+</th>
                    <th class="text-center" style="width: 40px">B</th>
                    <th class="text-center" style="width: 40px">C+</th>
                    <th class="text-center" style="width: 40px">C</th>
                    <th class="text-center" style="width: 40px">D</th>
                    <th class="text-center" style="width: 40px">E</th>
                </tr>
			</thead>
			<tbody>
				<?php foreach($jadwal as $jd){?>
				<tr>
					<td><?php echo $jd->kodemk . " - " . $jd->namamk; ?></td>
					<td class="text-center"><?php echo $jd->kelas; ?></td>
					<td><?php echo get_nama_hari($jd->hari) . ' ' . $jd->jam_mulai . "-" . $jd->jam_selesai . ' ' . $jd->koderuang; ?></td>
                    <td class="text-center"><?php echo $jd->avg_kelas; ?></td>
                    <td class="text-center"><?php echo $jd->jumlah_A; ?></td>
                    <td class="text-center"><?php echo $jd->jumlah_B_plus; ?></td>
                    <td class="text-center"><?php echo $jd->jumlah_B; ?></td>
                    <td class="text-center"><?php echo $jd->jumlah_C_plus; ?></td>
                    <td class="text-center"><?php echo $jd->jumlah_C; ?></td>
                    <td class="text-center"><?php echo $jd->jumlah_D; ?></td>
                    <td class="text-center"><?php echo $jd->jumlah_E; ?></td>
					<?php if ($this->session->userdata('isLogin') == TRUE){ ?>
					<td>
						<a href="<?php echo base_url() ?>isi_nilai/form_insert/<?php echo $jd->kode_kelas;?>" class="btn btn-xs btn-info">Masukkan</a>
					</td>
					<?php } ?>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<?php
$this->load->view('templates/footer');

function get_nama_hari($index){
	$nama_hari = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
	return $nama_hari[$index];
}
?>