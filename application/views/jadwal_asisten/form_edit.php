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
		<h3 class="box-title">Edit Jadwal Asisten</h3>
	</div>
	<form class="form-horizontal" action="<?php echo base_url()?>jadwal_asisten/edit" method="post">
		<div class="box-body">
			<div class="form-group">
				<label for="mk_kelas" class="col-md-3 control-label">Matakuliah dan Kelas</label>
				<div class="col-md-6">
					<label for="mk_kelas" class="control-label"><?php echo $mk->kodemk . " - " . $mk->namamk . "-" . $mk->kelas; ?></label>
					<input type="hidden" name="mk_kelas" class="form-control" value="<?php echo $mk->kode_kelas . "-" . $mk->tipe; ?>" id="matkul" />
				</div>
			</div>
			<div class="form-group">
				<label for="asisten" class="col-md-3 control-label">Asisten 1</label>
				<div class="col-md-3">
					<select name="asisten1" class="form-control select2 asisten" id="asisten">
						<option disabled <?php echo empty($data_ubah->nrp_1) ? "selected" : "" ?>>Pilih Asisten</option>
						<?php foreach($asisten as $ast):?>
						<option value="<?php echo $ast->nrp . "-" . $ast->nama?>" <?php echo $data_ubah->nrp_1 == $ast->nrp?"selected":""?>><?php echo $ast->nama?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="asisten" class="col-md-3 control-label">Asisten 2</label>
				<div class="col-md-3">
					<select name="asisten2" class="form-control select2 asisten" id="asisten2">
						<option disabled <?php echo empty($data_ubah->nrp_2) ? "selected" : "" ?>>Pilih Asisten</option>
						<?php foreach($asisten as $ast):?>
						<option value="<?php echo $ast->nrp . "-" . $ast->nama?>" <?php echo $data_ubah->nrp_2 == $ast->nrp?"selected":""?>><?php echo $ast->nama?></option>
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
	var $options = $("#asisten option").clone();
	$(document).ready(function(){
		var matkul = document.getElementById("matkul");
		var asisten1 = document.getElementById("asisten");
		var asisten2 = document.getElementById("asisten2");
		asisten2.disabled = matkul.value.split("-")[1] == 1;
		var $selects = $(".asisten");
		var $opts = $selects.first().children().clone();
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
	});
</script>			
<?php
$this->load->view('templates/footer'); ?>