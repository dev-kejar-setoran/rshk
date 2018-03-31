<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>
    RS Harapan Kita
  </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->config->item('base_url_file');?>assets/img/favicon.ico">

  <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url_file');?>assets/semantic/semantic.min.css">
  <link rel="stylesheet" href="<?php echo $this->config->item('base_url_file');?>assets/plugins/sweetalert/sweetalert2.min.css">

  <link rel="stylesheet" href="<?php echo $this->config->item('base_url_file');?>assets/css/app.css">
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
         <div class="active section">Rumah Sakit</div>
       </div>
       <h2 class="ui header">
         <div class="content">
          Rumah Sakit
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
              <input name="filter[cara_bayar]" placeholder="Rumah Sakit" type="text">
            </div>
            <button type="button" class="ui teal icon filter button" data-content="Cari Data">
              <i class="search icon"></i>
            </button>
            <button type="reset" class="ui icon reset button" data-content="Bersihkan Pencarian">
              <i class="refresh icon"></i>
            </button>
            <div style="margin-left: auto; margin-right: 1px;">
              <button type="button" class="ui blue add button" onclick="createModal();">
                <i class="plus icon"></i>
                Tambah Data
              </button>

            </div>
          </div>
        </form>

        <table class="ui celled table">
         <thead class="center aligned">
           <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. Telepon</th>
            <th>Tanggal Entry</th>
            <th>Oleh</th>
            <th class="two wide column">Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $no=1;
          if (is_array($data) || is_object($data)){
            
            foreach($data as $getRS){ 
              
        ?>
          <td class="center aligned"><?php echo $no++; ?></td>
          <td class="center aligned"><?php echo $getRS['nama']; ?></td>
          <td class="center aligned"><?php echo $getRS['alamat']; ?></td>
          <td class="center aligned"><?php echo $getRS['no_telp']; ?></td>
          <td class="center aligned"><?php echo $getRS['created_at']; ?></td>
          <td class="center aligned"><?php echo $getRS['created_by']; ?></td>
          <td class="center aligned">
            <button type="button" data-content="Ubah Data" data-id="" class="ui mini orange icon edit button" onclick="updateModal()"><i class="edit icon"></i></button>
            <button type="button" data-content="Hapus Data" data-id="" class="ui mini red icon delete button"><i class="trash icon"></i></button>
          </td>
            <?php }}; ?>
      </tbody>
    </table>
  </div>
</div>
</div>

</div>
</div>

<?php $this->load->view('templete/footer.php'); ?>

</div>

<?php include('modal.php'); ?>

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
    function createModal(){
      $('.create')
      .modal({
        onDeny    : function(){
          window.alert('Batal Simpan ?');
          
        },
        onApprove : function() {
          $.ajax({
         type: "POST",
         url: "<?php echo base_url();?>rumah_sakit/createRS", 
         data: {
            nama: $("#nama").val(),
            alamat: $("#alamat").val(),
            no_telp: $("#no_telp").val()
          },
         dataType: "text",  
         cache:false,
         success: 
              function(data){
                window.alert('Data Berhasil Disimpan');  //as a debugging message.
              }
          });
        }
      })
      .modal('show')
      .modal("refresh");
    }
    function updateModal(){
      $('.update')
      .modal({
        onDeny    : function(){
          window.alert('Batal Simpan ?');
          
        },
        onApprove : function() {
          window.alert('Data Berhasil Disimpan');
        }
      })
      .modal('show')
      .modal("refresh");
    }
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.5/Chart.min.js"></script>
  <script src="<?php echo $this->config->item('base_url_file');?>assets/js/dummy.js"></script>
</body>
</html>
