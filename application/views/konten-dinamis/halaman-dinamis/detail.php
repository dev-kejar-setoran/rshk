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

  <!-- <link rel="stylesheet" href="../../../plugins/tinymce/summernote.css"> -->
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
  .mce-tinymce {
    border: 1px solid rgba(34,36,38,.15)!important;
    box-shadow: none!important; 
    border-radius: 4px;
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
          <a href="#" class="section">Konten Dinamis</a>
          <i class="right chevron icon divider"></i>
          <div class="active section">Halaman Dinamis</div>
        </div>
        <h2 class="ui header">
          <div class="content">
            Form Halaman Dinamis
            <div class="sub header"> </div>
          </div>
        </h2>
      </div>

      <div class="ui clearing divider" style="border-top: none !important; margin:10px"></div>

      <div class="ui grid">
        <div class="sixteen wide column main-content">
          <div class="ui attached top segment">

            <form class="ui data form" id="dataForm" action="#" method="POST"">
              <div class="ui grid">
                <div class="ten wide column">
                  <div class="field">
                    <div class="ui big input">
                      <input type="text" name="judul" placeholder="Judul Halaman Dinamis">
                    </div>
                  </div>
                  <div class="field">
                    <textarea name="isi" id="" class="editor" style="min-height: 24rem"></textarea>
                  </div>
                </div>
                <div class="six wide column">
                  <div class="field image-container">
                    <span class="image-preview" style="height: 180px">Pilih Gambar</span>
                    <div class="ui fluid file input action">
                      <input type="text" readonly="">
                      <input type="file" class="ten wide column" id="attachment" name="attachment[]" autocomplete="off" multiple="">
                      <div class="ui blue button file">
                        Cari...
                      </div>
                    </div>
                  </div>
                  <div class="field">
                    <textarea name="short_desc" id="" cols="30" rows="10" class="short-desc" placeholder="Deskripsi Singkat"></textarea>
                  </div>
                </div>
              </div>
            </form>

          </div>
          <div class="ui attached bottom segment">
            <div class="ui two column grid">
              <div class="left aligned column">
                <div class="ui labeled icon button" onclick="window.history.back()">
                  <i class="chevron left icon"></i>
                  Kembali
                </div>
              </div>
              <div class="right aligned column">
                <div class="ui buttons">
                  <button type="button" class="ui button save as drafting positive">Draft</button>
                  <div class="or"></div>
                  <button type="button" class="ui button save as publicity teal">Publish</button>
                </div>
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
  <script src="../../../plugins/tinymce/tinymce.min.js"></script>
  <script src="../../../plugins/tinymce/jquery.tinymce.min.js"></script>
  <!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script> -->

  <script>
    function openPage(){
      var url = window.location.origin + '/pjnhk-new-mockup/pages/website/pelayanan/detail.php'
      window.location.assign(url)

    }
    $(document).ready(function() {
      tinymce.init({ selector:'.editor', menubar: false});
    });
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.5/Chart.min.js">></script>
  <script src="../../../js/dummy.js"></script>
</body>
</html>
