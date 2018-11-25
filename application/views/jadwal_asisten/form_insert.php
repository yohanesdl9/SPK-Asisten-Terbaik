<div id="MInsertJAst" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Masukkan Jadwal Asisten</h4>
            </div>
            <form action="<?php echo base_url() ?>jadwal_asisten/insert" class="form_horizontal" enctype="multipart/form-data" method="POST">
            <div class="modal-body">
                <div class="form-group row">
                    <label for="mk_kelas" class="col-md-4 control-label">Matakuliah dan Kelas*</label>
                    <div class="col-md-8">
                        <select name="mk_kelas" class="form-control select2 matkul" id="matkul" style="width: 100%">
                            <option disabled selected>Pilih Matakuliah</option>
                            <?php foreach($matkul as $mk):?>
                            <option value="<?php echo $mk->kode_kelas . "-" . $mk->tipe ?>"><?php echo $mk->kodemk . " - " . $mk->namamk . " " . $mk->kelas?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="asisten" class="col-md-4 control-label">Asisten 1*</label>
                    <div class="col-md-6">
                        <select name="asisten1" class="form-control select2 asisten" id="asisten1" style="width: 100%">
                            <option disabled selected>Pilih Asisten</option>
                            <?php foreach($asisten as $ast):?>
                            <option value="<?php echo $ast->nrp . "-" . $ast->nama?>"><?php echo $ast->nama?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="asisten" class="col-md-4 control-label">Asisten 2*</label>
                    <div class="col-md-6">
                        <select name="asisten2" class="form-control select2 asisten" id="asisten2" style="width: 100%">
                            <option disabled selected>Pilih Asisten</option>
                            <?php foreach($asisten as $ast):?>
                            <option value="<?php echo $ast->nrp . "-" . $ast->nama?>"><?php echo $ast->nama?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>	
                <p style="color: red"> *Required field must be filled </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="submit"> Confirm </button>
                <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"> Cancel </button>
            </div>
            </form>
        </div>
    </div>
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
			asisten2.disabled = matkul.value.split("-")[1] == 1;
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