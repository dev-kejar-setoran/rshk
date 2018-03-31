<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PJNHK | Backend</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="shortcut icon" type="image/x-icon" href="../../../favicon.ico">

  <link rel="stylesheet" type="text/css" href="../../../semantic/semantic.min.css">
  <link rel="stylesheet" href="../../../plugins/sweetalert/sweetalert2.min.css">

  <link rel="stylesheet" href="../../../css/app.css">
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

  .container .ui.accordion .accordion {
    padding-left: 2rem;
  }
  .container .ui.accordion .accordion .content {
    padding-top: 0;
    padding-bottom: 0
  }
  .container .ui.accordion .accordion .list {
    margin: 0
  }
  .card {
    position: relative;
    overflow: hidden;
  }
  .card .three.buttons {
    position: absolute;
    bottom: 0; left: 0;
  }
  .up-folder .header {
    display: flex!important;
    align-items: center;
    height: 100%
  }
  .up-folder .header i {
    flex: auto;
  }

</style>
<!-- @yield('css') -->
<!-- @yield('styles') -->
</head>

<body id="app">

  <header>
    <?php include('../../../partials/header.php'); ?>
  </header>

  <div class="ui sidebar inverted visible vertical menu">
    <?php include('../../../partials/sidebar.php'); ?>
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
          <a href="#" class="section">Website</a>
          <i class="right chevron icon divider"></i>
          <div class="active section">Pustaka Kesehatan</div>
        </div>
        <h2 class="ui header">
          <div class="content">
            Pustaka Kesehatan
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
                    <input name="filter[judul]" placeholder="Judul" type="text">
                  </div>
                  <div class="field">
                    <input name="filter[deskripsi]" placeholder="Deskripsi" type="text">
                  </div>
                  <button type="button" class="ui teal icon filter button" data-content="Cari Data">
                    <i class="search icon"></i>
                  </button>
                  <button type="reset" class="ui icon reset button" data-content="Bersihkan Pencarian">
                    <i class="refresh icon"></i>
                  </button>
                  <div style="margin-left: auto; margin-right: 1px;">
                    <button type="button" class="ui blue add button" onclick="openFolderModal()">
                      <i class="folder icon"></i>
                      Tambah Folder
                    </button>
                    <button type="button" class="ui blue add button" onclick="openFileModal()">
                      <i class="plus icon"></i>
                      Tambah Data
                    </button>

                    <div class="ui icon layout buttons">
                      <button class="ui button" data-tab="block" data-content="Tile layout"><i class="block layout icon"></i></button>
                      <button class="ui button" data-tab="grid" data-content="Grid layout"><i class="list layout icon"></i></button>
                    </div>

                  </div>
                </div>
              </form>

              <div class="ui active tab" data-tab="block">
                <?php include('layout/block.php'); ?>
              </div>
              <div class="ui tab" data-tab="grid">
                <?php include('layout/grid.php'); ?>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <?php include('../../../partials/footer.php'); ?>

    <div v-cloak>
      <!-- @yield('additional') -->
    </div>
  </div>

  <?php include('modal.php') ?>
  <?php include('modal-folder.php') ?>
  
  <script>
  </script>
  <!-- <script src="../../../js/es6-promise.auto.min.js"></script> -->

  <script src="../../../plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="../../../plugins/jQuery/jquery.form.min.js"></script>
  <script src="../../../plugins/jQueryUI/jquery-ui.min.js"></script>
  <script src="../../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="../../../plugins/fastclick/fastclick.js"></script>
  <script src="../../../plugins/sweetalert/sweetalert2.min.js"></script>
  <script src="../../../semantic/semantic.min.js"></script>

  <script src="../../../js/mfs-script.js"></script>

  <script>
    $(document).on('click', '.ulangi', function(e){
      window.location.reload();
    });

    function openFolderModal(){
      $('.ui.folder.modal')
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
    function openFileModal(){
      $('.ui.file.modal')
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

    $('.card').find('.three.buttons').slideUp(1)
    $('.layout.buttons button').tab()
    $('a.card').hover(function() {
      $(this).find('.three.buttons').slideDown(100)
    }, function(){
      $(this).find('.three.buttons').slideUp(100)
    });
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.5/Chart.min.js">></script>
  <script src="../../../js/dummy.js"></script>
</body>
</html>
