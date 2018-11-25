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
				<a href="#" class="btn btn-block btn-success" data-target="#MInsertMK" data-toggle="modal"><i class="fa fa-fw fa-plus"></i>Tambah</a>
			</div>
		</div>
	</div>
	<div class="box-footer">
		<table class="table table-bordered table-striped mytable">
			<thead>
				<tr>
					<th>Kode MK</th>
					<th>Nama Matakuliah</th>
					<th>Jenis Matakuliah</th>
					<th>SKS</th>
					<th>Opsi</th>
				</tr>
			</thead>				
			<tbody>						
				<?php foreach($matkul as $mk):?>
				<tr>
					<td><?php echo $mk->kodemk?></td>
					<td><?php echo $mk->namamk?></td>
					<td><?php echo $mk->tipe == 1 ? 'Reguler' : 'Praktikum' ?></td>
					<td><?php echo $mk->sks?></td>
					<td class="btn-group">								
						<a href="#" class="open_modal btn btn-xs btn-info" id="<?php echo $mk->kodemk;?>">Edit</a>
						<a href="#" class="delete_modal btn btn-xs btn-danger" data-id="<?php echo $mk->kodemk; ?>" onclick="confirm_modal('<?php echo $mk->kodemk; ?>')">Hapus</a>
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>
<?php $this->load->view('matakuliah/form_insert'); ?>
<div id="MEditMK" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>
<div id="MDeleteMK" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>
<script type="text/javascript">
	$(document).ready(function () {
	$(".open_modal").click(function(e) {
		var m = $(this).attr("id");
			$.ajax({
			   url: "<?php echo base_url() ?>matakuliah/form_edit",
			   type: "GET",
			   data : {kodemk: m,},
			   success: function (ajaxData){
      			   $("#MEditMK").html(ajaxData);
      			   $("#MEditMK").modal('show', {backdrop: 'true'});
      		   }
    		});
        });
    });
</script>
<!-- Javascript untuk popup modal Delete--> 
<script type="text/javascript">
    function confirm_modal(delete_url) {
		$.ajax({
		   url: "<?php echo base_url() ?>matakuliah/confirm_delete",
		   type: "GET",
		   data : {kodemk: delete_url},
		   success: function (ajaxData){
			   $("#MDeleteMK").html(ajaxData);
			   $("#MDeleteMK").modal('show',{backdrop: 'static'});
		   	}
    	});
    }
</script>
<?php
$this->load->view('templates/footer');
?>