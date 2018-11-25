<?php $this->load->view('templates/header'); ?>
<?php
if ($this->session->flashdata('success_message')){ ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4>Sukses</h4>
        <?php echo $this->session->flashdata('success_message')?>
    </div>
<?php
}
?>
<div class="box">
    <div class="box-header with-border">
        <div class="row">
            <div class="col-md-2">
                <a href="#" class="btn btn-block btn-success" data-target="#MInsertAsisten" data-toggle="modal"><i class="fa fa-fw fa-plus"></i>Tambah</a>
            </div>
            <div class="col-md-2">
                <a href="#" class="btn btn-block btn-danger pull-right" data-target="#MRemoveAll" data-toggle="modal"><i class="fa fa-fw fa-times"></i>Hapus Semua</a>
            </div>
        </div>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-striped table-hover mytable">
            <thead>
                <tr>
                    <th class="text-center">NRP</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Telepon</th>
                    <th class="text-center">Nilai Kedisiplinan</th>
                    <th class="text-center">Opsi</th>
                </tr>
            </thead>			
            <tbody>						
                <?php foreach($asdos as $asd){?>
                <tr>
                    <td class="text-center"><?php echo $asd->nrp;?></td>
                    <td><?php echo $asd->nama;?></td>
                    <td class="text-center"><?php echo $asd->jk == 'L' ? "Laki-Laki" : "Perempuan"; ?></td>
                    <td><?php echo $asd->alamat;?></td>
                    <td class="text-center"><?php echo $asd->telepon;?></td>
                    <td class="text-center"><?php echo $asd->nilai_disiplin;?></td>
                    <td class="btn-group">								
                        <a href="#" class="open_modal btn btn-xs btn-info" id="<?php echo $asd->nrp;?>">Ubah</a>
                        <a href="#" class="delete_modal btn btn-xs btn-danger" data-id="<?php echo $asd->nrp; ?>" onclick="confirm_modal('<?php echo $asd->nrp ?>')">Hapus</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('asisten/remove_all'); ?>
<?php $this->load->view('asisten/form_insert'); ?>
<div id="MEditAsisten" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>
<div id="MDeleteAsisten" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>
<script type="text/javascript">
	$(document).ready(function () {
	$(".open_modal").click(function(e) {
		var m = $(this).attr("id");
			$.ajax({
			   url: "<?php echo base_url() ?>asisten/form_edit",
			   type: "GET",
			   data : {nrp: m,},
			   success: function (ajaxData){
      			   $("#MEditAsisten").html(ajaxData);
      			   $("#MEditAsisten").modal('show', {backdrop: 'true'});
      		   }
    		});
        });
    });
</script>
<!-- Javascript untuk popup modal Delete--> 
<script type="text/javascript">
    function confirm_modal(delete_url) {
		$.ajax({
		   url: "<?php echo base_url() ?>asisten/confirm_delete",
		   type: "GET",
		   data : {nrp: delete_url},
		   success: function (ajaxData){
			   $("#MDeleteAsisten").html(ajaxData);
			   $("#MDeleteAsisten").modal('show',{backdrop: 'static'});
		   	}
    	});
    }
</script>
<?php $this->load->view('templates/footer'); ?>