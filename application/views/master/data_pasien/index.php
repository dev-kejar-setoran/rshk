<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PJNHK | Backend</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->config->item('base_url_file');?>assets/img/favicon.ico">
  <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url_file');?>assets/semantic/semantic.min.css">
  <link rel="stylesheet" href="<?php echo $this->config->item('base_url_file');?>assets/plugins/sweetalert/sweetalert2.min.css">
  <link rel="stylesheet" href="<?php echo $this->config->item('base_url_file');?>assets/css/app.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

  <style type="text/css">
  .ui.file.input input[type="file"] {
    display: none;
  }
  .ui.button>.ui.floated.label {
    position: absolute;
    top: 15px;
    right: -10px;
  }
  .table tr th{
    white-space: nowrap;
  }
</style>
<!-- @yield('css') -->
<!-- @yield('styles') -->
</head>

<body id="app">

  <header>
    <?php $this->load->view('templete/header.php'); ?>
  </header>

  <div class="ui sidebar inverted visible vertical menu">
    <?php $this->load->view('templete/sidebar.php'); ?>
  </div>

  <div id="cover">
    <div class="ui active inverted dimmer">
      <div class="ui text loader">Loading</div>
    </div>
  </div>
  <div class="pusher content shown">
    <message></message>
    <div class="main ui fluid container" id="main-container">
      <div class="title-container">
        <div class="ui breadcrumb">
          <a href="#" class="section"><i class="home icon"></i></a>
          <i class="right chevron icon divider"></i>
          <a href="#" class="section">Master</a>
          <i class="right chevron icon divider"></i>
          <div class="active section">Data Pasien</div>
        </div>
        <h2 class="ui header">
          <div class="content">
            Data Pasien
            <div class="sub header"> </div>
          </div>
        </h2>
      </div>

      <div class="ui clearing divider" style="border-top: none !important; margin:10px"></div>

      <div class="ui grid">
        <div class="sixteen wide column main-content">
          <div class="ui segments">
            <div class="ui segment">
              <form class="ui filter form">
                <div class="inline fields">
                  <div class="field">
                    <input name="filter[nama]" placeholder="Nama Pasien" type="text">
                  </div>
                  <div class="field">
                    <input name="filter[no_kartu]" placeholder="Nomor Kartu" type="text">
                  </div>
                  <button type="button" class="ui teal icon filter button" data-content="Cari Data">
                    <i class="search icon"></i>
                  </button>
                  <button type="reset" class="ui icon reset button" data-content="Bersihkan Pencarian">
                    <i class="refresh icon"></i>
                  </button>
                  <div style="margin-left: auto; margin-right: 1px;">
                    <button type="button" class="ui blue add button" onclick="form_add()">
                      <i class="plus icon"></i>
                      Tambah Data
                    </button>

                  </div>
                </div>
              </form>

              <table id="tb_data" class="display ui celled tabl" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                    <th>Nama</th>
                    <th>Nomor Kartu</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Tanggal Entry</th>
                    <th>Oleh</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
              </table>

            </div>
          </div>
        </div>

      </div>
    </div>

      <?php $this->load->view('templete/footer.php'); ?>

    <div v-cloak>
      <!-- @yield('additional') -->
    </div>
  </div>
  <?php include('modal.php') ?>
  <script>
  </script>
  <!-- <script src="../../../js/es6-promise.auto.min.js"></script> -->
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
      $('.ui.modal')
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
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.5/Chart.min.js"></script>
  <script src="<?php echo $this->config->item('base_url_file');?>assets/js/dummy.js"></script>
  <?php include('js.php') ?>

<script type="text/javascript">
    $(document).ready(function() {
    } );
</script>

</body>
</html>
