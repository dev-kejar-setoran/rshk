<script src="<?php echo $this->config->item('base_url_file');?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="<?php echo $this->config->item('base_url_file');?>assets/plugins/jQuery/jquery.form.min.js"></script>
  <script src="<?php echo $this->config->item('base_url_file');?>assets/plugins/jQueryUI/jquery-ui.min.js"></script>
  <script src="<?php echo $this->config->item('base_url_file');?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="<?php echo $this->config->item('base_url_file');?>assets/plugins/fastclick/fastclick.js"></script>
  <script src="<?php echo $this->config->item('base_url_file');?>assets/plugins/sweetalert/sweetalert2.min.js"></script>
  <script src="<?php echo $this->config->item('base_url_file');?>assets/semantic/semantic.min.js"></script>
  <script src="<?php echo $this->config->item('base_url_file');?>assets/js/mfs-script.js"></script>
  <script>
    function openModal(){
      $('.ui.modal.formUtama')
      .modal({
        observeChanges: true,
        closable: false,
        detachable: false,
        onShow: function() {
          $('.ui.dropdown').dropdown();
        }
      })
      .modal('show')
      .modal("refresh");
    }
  </script>
  <script src="<?php echo $this->config->item('base_url_file');?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo $this->config->item('base_url_file');?>assets/js/dummy.js"></script>