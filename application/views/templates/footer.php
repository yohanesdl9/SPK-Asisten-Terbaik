</section>
  </div>
  <div class="modal modal-default fade" id="modal-logout">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Yakin mau keluar?</h4>
        </div>
        <div class="modal-body">
          <p>Apakah Anda yakin mau keluar?</p>
        </div>
        <div class="modal-footer">
          <a href="<?php echo base_url() ?>login/logout" class="btn btn-danger">Keluar</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
</div>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script>
  $(document).ready(function () {
    $('.select2').select2()

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })

    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })

    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
    
    var datatable = $('.mytable').DataTable({
      paging      : true,
      lengthChange: true,
      searching   : true,
      ordering    : true,
      info        : true,
      autoWidth   : false
    })
  })
</script>
</body>
</html>