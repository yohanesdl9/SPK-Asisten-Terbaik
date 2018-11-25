<?php
$this->load->view('templates/header');
@$jam_mulai = explode(":", @$data_ubah->jam_mulai); 
@$jam_selesai = explode(":", @$data_ubah->jam_selesai);
if ($this->session->flashdata('error_message')){
?>
<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h4><i class="icon fa fa-ban"></i>Kesalahan</h4>
	<?php echo $this->session->flashdata('error_message') ?>
</div>
<?php } ?>
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo $this->uri->segment(2) == 'form_insert' ? 'Masukkan' : 'Ubah' ?> Jadwal Kuliah</h3>
	</div>
	<form class="form-horizontal" action="<?php echo base_url();?>jadwal_kuliah/insert" method="post">
		<div class="box-body">
			<input type="hidden" name="mode" value="<?php echo $this->uri->segment(2) == 'form_insert' ? 'insert' : 'update' ?>" />
			<input type="hidden" name="old_kodekelas" value="<?php echo @$data_ubah->kode_kelas; ?>" />
			<div class="form-group">
				<label for="tahun_ajaran" class="col-md-2 control-label">Tahun Ajaran</label>
				<div class="col-md-2">
					<select name="tahun_ajaran" class="form-control select2" id="tahun_ajaran">
						<?php for ($i = 2016; $i <= 2030; $i++){ 
							$select_tahun = $i . "/" . ($i + 1);
							$tahun_selected = $this->uri->segment(2) == 'form_insert' ? $tahun_ajaran : @$data_ubah->tahun_ajaran;
							?>
							<option value="<?php echo $select_tahun ?>" <?php echo $tahun_selected == $select_tahun ? "selected" : "" ?>> <?php echo $select_tahun; ?> </option>
						<?php }?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="matkul" class="col-md-2 control-label">Matakuliah</label>
				<div class="col-md-5">
					<select name="matkul" class="form-control select2" id="matkul">
						<option disabled selected>Pilih Matakuliah</option>
						<?php foreach($matkul as $mk):?>
						<option value="<?php echo $mk->kodemk?>" <?php echo @$data_ubah->kodemk == $mk->kodemk ? "selected":""?>><?php echo $mk->kodemk . " - " . $mk->namamk ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<label for="kelas" class="col-md-1 control-label">Kelas</label>
				<div class="col-md-1">
					<input type="text" name="kelas" class="form-control" maxlength="2" value="<?php echo @$data_ubah->kelas ?>" id="kelas" />
				</div>
			</div>
			<div class="form-group">
				<label for="dosen" class="col-md-2 control-label">Dosen</label>
				<div class="col-md-4">
					<select name="dosen" class="form-control select2" id="dosen">
						<option disabled selected>Pilih Dosen</option>
						<?php foreach($dosen as $dsn):?>
						<option value="<?php echo $dsn->nip?>" <?php echo @$data_ubah->nip == $dsn->nip ? "selected":""?>><?php echo $dsn->nama_dosen ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="hari" class="col-md-2 control-label">Hari</label>
				<div class="col-md-2">
					<select name="hari" class="form-control select2" id="hari">
						<option disabled selected>Pilih Hari</option>
						<option value="1" <?php echo @$data_ubah->hari == 1 ?"selected":""?>>Senin</option>
						<option value="2" <?php echo @$data_ubah->hari == 2 ?"selected":""?>>Selasa</option>
						<option value="3" <?php echo @$data_ubah->hari == 3 ?"selected":""?>>Rabu</option>
						<option value="4" <?php echo @$data_ubah->hari == 4 ?"selected":""?>>Kamis</option>
						<option value="5" <?php echo @$data_ubah->hari == 5 ?"selected":""?>>Jumat</option>
						<option value="6" <?php echo @$data_ubah->hari == 6 ?"selected":""?>>Sabtu</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="jam" class="col-md-2 control-label">Jam </label>
				<div class="col-md-2"> <input type="time" name="jammulai" class="form-control" step="600" id="jammulai" value="<?php echo @$jam_mulai[0] . ":" . @$jam_mulai[1]; ?>"> </div>
				<label for="jamselesai" class="control-label" style="float: left"> s.d. </label>
				<div class="col-md-2"> <input type="time" name="jamselesai" class="form-control" step="600" id="jamselesai" value="<?php echo @$jam_selesai[0] . ":" . @$jam_selesai[1]; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="ruang" class="col-md-2 control-label">Ruang</label>
				<div class="col-md-2">
					<select name="ruang" class="form-control select2" id="ruang">
						<option disabled selected>Pilih Ruang</option>
						<?php foreach($ruang as $rg): ?>
						<option value="<?php echo $rg->koderuang ?>" <?php echo $rg->koderuang == @$data_ubah->koderuang ? 'selected' : '' ?>><?php echo $rg->koderuang?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="jumlah" class="col-md-2 control-label">Jumlah Peserta </label>
				<div class="col-md-1">
					<input type="number" name="jumlah" class="form-control" value="<?php echo @$data_ubah->jumlah_peserta ?>" min="1" id="jumlah" />
				</div>	
			</div>
		</div>
		<div class="box-footer">
			<a href="<?php echo base_url()?>jadwal_kuliah" class="btn btn-default">Kembali</a>
			<input type="submit" class="btn btn-info pull-right" value="Simpan" />
		</div>
	</form>
</div>
<script>
	document.getElementById('jumlah').onkeypress = function(e){
		var ev = e || window.event;
		if (ev.charCode < 48 || ev.charCode > 57){
			return false;
		} else if (this.value + ev.charCode - 48 < this.min){
			return false;
		} else {
			return true;
		}
	}
</script>
<?php
$this->load->view('templates/footer');
?>