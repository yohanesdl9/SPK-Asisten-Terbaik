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
	<div class="box-header with-border">
		<div class="row">
			<div class="col-md-2">
				<a href="#" class="btn btn-block btn-success" data-target="#MInsertJAst" data-toggle="modal"><i class="fa fa-fw fa-plus"></i>Tambah</a>
			</div>
		</div>
	</div>
	<div class="box-footer">
		<table class="table table-bordered table-striped mytable">
            <thead>
				<tr>
					<th>KodeMK - Nama Matakuliah</th>
					<th>Kelas</th>
					<th>Ruang</th>
					<th>Hari</th>
					<th style="width: 150px">Jam</th>
					<th>Asisten 1</th>
					<th>Asisten 2</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($jadwal as $jd){?>
				<tr>
					<td><?php echo $jd->kodemk . " - " . $jd->namamk?></td>
					<td><?php echo $jd->kelas?></td>
					<td><?php echo $jd->koderuang?></td>
					<td><?php echo get_nama_hari($jd->hari)?></td>
					<td><?php echo $jd->jam_mulai . " - " . $jd->jam_selesai?></td>
					<td><?php echo $jd->asisten_1?></td>
					<td><?php echo $jd->asisten_2?></td>
					<td class="btn-group">
						<a href="<?php echo base_url()?>jadwal_asisten/form_edit/<?php echo $jd->kode_kelas ?>" class="btn btn-xs btn-info">Ubah</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<?php $this->load->view('jadwal_asisten/form_insert');
$this->load->view('templates/footer');

function get_nama_hari($index){
	$nama_hari = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
	return $nama_hari[$index];
}
?>