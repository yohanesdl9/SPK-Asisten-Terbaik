<?php
$this->load->view('templates/header', compact('subtitle'));
if ($matkul->num_rows() < 1){ ?>
	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4>Kesalahan</h4>
		Semua Jadwal Kuliah telah terisi Asisten.
	</div>
	<a href="<?php echo base_url()?>jadwal_asisten" class="btn btn-default">Kembali</a>
<?php } else {
if ($this->session->flashdata('error_message')){ ?> 
	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<?php echo $this->session->flashdata('error_message') ?>
	</div>
<?php
} ?>
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Masukkan Jadwal Asisten</h3>
	</div>
	<form class="form-horizontal" action="<?php echo base_url()?>jadwal_asisten/insert" method="post">
		<div class="box-body">
			<div class="form-group">
				<label for="mk_kelas" class="col-md-3 control-label">Matakuliah dan Kelas</label>
				<div class="col-md-5">
					<select name="mk_kelas" class="form-control select2 matkul" id="matkul">
						<option disabled selected>Pilih Matakuliah</option>
						<?php foreach($matkul->result() as $mk):?>
						<option value="<?php echo $mk->kode_kelas . "/" . $mk->tipe ?>"><?php echo $mk->kodemk . " - " . $mk->namamk . " " . $mk->kelas?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="asisten" class="col-md-3 control-label">Asisten 1</label>
				<div class="col-md-3">
					<select name="asisten1" class="form-control select2 asisten" id="asisten1">
						<option disabled selected>Pilih Asisten</option>
						<?php foreach($asisten as $ast):?>
						<option value="<?php echo $ast->nrp . "-" . $ast->nama?>"><?php echo $ast->nama?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="asisten" class="col-md-3 control-label">Asisten 2</label>
				<div class="col-md-3">
					<select name="asisten2" class="form-control select2 asisten" id="asisten2">
						<option disabled selected>Pilih Asisten</option>
						<?php foreach($asisten as $ast):?>
						<option value="<?php echo $ast->nrp . "-" . $ast->nama?>"><?php echo $ast->nama?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>	
		</div>
		<div class="box-footer">
			<a href="<?php echo base_url()?>jadwal_asisten" class="btn btn-default">Kembali</a>
			<input type="submit" class="btn btn-info pull-right" value="Simpan" />
		</div>
	</form>
</div>
<script>
	$(document).ready(function(){
		var matkul = document.getElementById("matkul");
		var asisten1 = document.getElementById("asisten1");
		var asisten2 = document.getElementById("asisten2");
		asisten1.disabled = true;
		asisten2.disabled = true;
		matkul.onchange = function(){
			asisten1.disabled = matkul.value.includes("Pilih Matakuliah");
			asisten2.disabled = matkul.value.split("/")[1] == 1;
			var $selects = $(".asisten");
			var $opts = $selects.first().children().clone();
			$selects.change(function(){
				var selectedValues = $selects.map(function(){
					var val = $(this).val();
					return val != 0 ? val : null;
				}).get();
				$selects.not(this).each(function(){
					var $sel=$(this), myVal = $sel.val() || 0;
					var $options = $opts.clone().filter(function(i){
						var val = $(this).val();
						return val == myVal || $.inArray(val, selectedValues) == -1;
					});
					$sel.html($options).val(myVal);
				})
			});
		};
	});
</script>
<?php }
$this->load->view('templates/footer');
?>