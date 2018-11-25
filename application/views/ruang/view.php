<?php
$this->load->view('templates/header');
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
				<a href="#" class="btn btn-block btn-success" data-target="#MInsertRuang" data-toggle="modal"><i class="fa fa-fw fa-plus"></i>Tambah</a>
			</div>
		</div>
	</div>
	<div class="box-footer">
		<table class="table table-bordered table-striped mytable">
			<thead>
				<tr>
					<th>Kode Ruang</th>
					<th>Nama Ruang</th>
					<th>Kapasitas</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>						
			<?php foreach($ruang as $asd):?>
				<tr>
					<td><?php echo $asd->koderuang?></td>
					<td><?php echo $asd->nama_ruang?></td>
					<td><?php echo $asd->kapasitas?></td>
					<td class="btn-group">								
						<a href="#" class="open_modal btn btn-xs btn-info" id="<?php echo $asd->koderuang;?>">Ubah</a>
						<a href="#" class="delete_modal btn btn-xs btn-danger" data-id="<?php echo $asd->koderuang; ?>" onclick="confirm_modal('<?php echo $asd->koderuang ?>')">Hapus</a>
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>
<?php $this->load->view('ruang/form_insert'); ?>
<div id="MEditRuang" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>
<div id="MDeleteRuang" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>
<script type="text/javascript">
	$(document).ready(function () {
	$(".open_modal").click(function(e) {
		var m = $(this).attr("id");
			$.ajax({
			   url: "<?php echo base_url() ?>ruang/form_edit",
			   type: "GET",
			   data : {koderuang: m,},
			   success: function (ajaxData){
      			   $("#MEditRuang").html(ajaxData);
      			   $("#MEditRuang").modal('show', {backdrop: 'true'});
      		   }
    		});
        });
    });
</script>
<!-- Javascript untuk popup modal Delete--> 
<script type="text/javascript">
    function confirm_modal(delete_url) {
		$.ajax({
		   url: "<?php echo base_url() ?>ruang/confirm_delete",
		   type: "GET",
		   data : {koderuang: delete_url},
		   success: function (ajaxData){
			   $("#MDeleteRuang").html(ajaxData);
			   $("#MDeleteRuang").modal('show',{backdrop: 'static'});
		   	}
    	});
    }
</script>
<?php
$this->load->view('templates/footer');
?>