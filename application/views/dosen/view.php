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
	<?php if ($this->session->userdata('isLogin') == TRUE){ ?>
	<div class="box-header with-border">
		<div class="row">
			<div class="col-md-2">
				<a href="#" class="btn btn-block btn-success" data-target="#MInsertDosen" data-toggle="modal"><i class="fa fa-fw fa-plus"></i>Tambah</a>
			</div>
		</div>
	</div>
	<?php } ?>
	<div class="box-footer">
		<table class="table table-bordered table-striped mytable">
            <thead>
				<tr>
					<th>NIP</th>
					<th>Nama Dosen</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>Email</th>
					<th>Telepon</th>
					<?php if ($this->session->userdata('isLogin') == TRUE){ ?>
					<th>Opsi</th>
					<?php } ?>
				</tr>
			</thead>
			<tbody>
				<?php foreach($dosen as $hasil):?>
				<tr>
					<td><?php echo $hasil->nip?></td>
					<td><?php echo $hasil->nama_dosen?></td>
					<td><?php echo $hasil->jk == 'L' ? "Laki-Laki" : "Perempuan";?></td>
					<td><?php echo $hasil->alamat?></td>
					<td><?php echo $hasil->email?></td>
					<td><?php echo $hasil->telepon?></td>
					<?php if ($this->session->userdata('isLogin') == TRUE){ ?>
					<td class="btn-group">
						<a href="#" class="open_modal btn btn-xs btn-info" id="<?php echo $hasil->nip; ?>">Ubah</a>
						<a href="#" class="delete_modal btn btn-xs btn-danger" data-id="<?php echo $hasil->nip; ?>" onclick="confirm_modal('<?php echo $hasil->nip; ?>')">Hapus</a>
					</td>
					<?php } ?>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>
<?php $this->load->view('dosen/form_insert'); ?>
<div id="MEditDosen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>
<div id="MDeleteDosen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>
<script type="text/javascript">
	$(document).ready(function () {
	$(".open_modal").click(function(e) {
		var m = $(this).attr("id");
			$.ajax({
			   url: "<?php echo base_url() ?>dosen/form_edit",
			   type: "GET",
			   data : {nip: m,},
			   success: function (ajaxData){
      			   $("#MEditDosen").html(ajaxData);
      			   $("#MEditDosen").modal('show', {backdrop: 'true'});
      		   }
    		});
        });
    });
</script>
<!-- Javascript untuk popup modal Delete--> 
<script type="text/javascript">
    function confirm_modal(delete_url) {
		$.ajax({
		   url: "<?php echo base_url() ?>dosen/confirm_delete",
		   type: "GET",
		   data : {nip: delete_url},
		   success: function (ajaxData){
			   $("#MDeleteDosen").html(ajaxData);
			   $("#MDeleteDosen").modal('show',{backdrop: 'static'});
		   	}
    	});
    }
</script>
<?php
$this->load->view('templates/footer');
?>