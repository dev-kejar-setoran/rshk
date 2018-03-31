<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PJNHK | Backend</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="shortcut icon" type="image/x-icon" href="../../../favicon.ico">

  <link rel="stylesheet" type="text/css" href="../../../semantic/semantic.min.css">
  <link rel="stylesheet" href="../../../plugins/sweetalert/sweetalert2.min.css">
  <link rel="stylesheet" href="../../../plugins/nestable/jquery.nestable.css">

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
          <div class="active section">Menu Website</div>
        </div>
        <h2 class="ui header">
          <div class="content">
            Menu Website
            <div class="sub header"> </div>
          </div>
        </h2>
      </div>

      <div class="ui clearing divider" style="border-top: none !important; margin:10px"></div>

      <div class="ui grid main-content">
        <div class="ten wide column">
          <div class="ui top attached segment">
            <h4 class="ui header">Sumber Menu</h4>
          </div>
          <div class="ui bottom attached segment">
            <div class="ui styled fluid accordion">
              <div class="active title">
                <i class="dropdown icon"></i>
                Halaman Khusus
              </div>
              <div class="active content">
                <div class="clearing transition">
                  <form action="#">
                    <div class="ui form">
                      <div class="two fields">
                        <div class="field">
                          <input type="text" name="judul" placeholder="Judul Menu">
                        </div>
                        <div class="field">
                          <select class="ui selection dropdown">
                            <option value="">Pilih halaman</option>
                            <option value="1">Pelayanan</option>
                            <option value="2">Rujukan Nasional</option>
                            <option value="3">Media Center</option>
                            <option value="4">Pustaka Nasional</option>
                            <option value="5">Slider</option>
                          </select>
                        </div>
                      </div>
                      <div class="field">
                        <input type="text" name="tautan" placeholder="Tautan akan di-generate dan ditampilkan disini" readonly>
                      </div>
                      <div class="ui clearing basic segment" style="padding: 0">
                        <button class="ui blue icon right floated labeled button"><i class="plus icon"></i> Tambah menu</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="title">
                <i class="dropdown icon"></i>
                Halaman Dinamis
              </div>
              <div class="content">
                <div class="transition hidden">
                  <form action="#">
                    <div class="ui form">
                      <div class="two fields">
                        <div class="field">
                          <input type="text" name="judul" placeholder="Judul Menu">
                        </div>
                        <div class="field">
                          <select class="ui selection dropdown">
                            <option value="">Pilih halaman</option>
                            <option value="1">Halaman Dinamis 1</option>
                            <option value="2">Halaman Dinamis 2</option>
                            <option value="3">Halaman Dinamis 3</option>
                            <option value="4">Halaman Dinamis 4</option>
                          </select>
                        </div>
                      </div>
                      <div class="field">
                        <input type="text" name="tautan" placeholder="Tautan akan di-generate dan ditampilkan disini" readonly>
                      </div>
                      <div class="ui clearing basic segment" style="padding: 0">
                        <button class="ui blue icon right floated labeled button"><i class="plus icon"></i> Tambah menu</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="title">
                <i class="dropdown icon"></i>
                Kategori Artikel
              </div>
              <div class="content">
                <div class="transition hidden">
                  <form action="#">
                    <div class="ui form">
                      <div class="two fields">
                        <div class="field">
                          <input type="text" name="judul" placeholder="Judul Menu">
                        </div>
                        <div class="field">
                          <select class="ui selection dropdown">
                            <option value="">Pilih halaman</option>
                            <option value="1">Artikel A</option>
                            <option value="2">Artikel B</option>
                            <option value="3">Artikel C</option>
                          </select>
                        </div>
                      </div>
                      <div class="field">
                        <input type="text" name="tautan" placeholder="Tautan akan di-generate dan ditampilkan disini" readonly>
                      </div>
                      <div class="ui clearing basic segment" style="padding: 0">
                        <button class="ui blue icon right floated labeled button"><i class="plus icon"></i> Tambah menu</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="title">
                <i class="dropdown icon"></i>
                Tautan
              </div>
              <div class="content">
                <div class="transition hidden">
                  <form action="#">
                    <div class="ui form">
                      <div class="field">
                        <input type="text" name="judul" placeholder="Judul Menu">
                      </div>
                      <div class="field">
                        <input type="text" name="tautan" placeholder="Masukkan tautan di sini" readonly>
                      </div>
                      <div class="ui clearing basic segment" style="padding: 0">
                        <button class="ui blue icon right floated labeled button"><i class="plus icon"></i> Tambah menu</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="six wide column">
          <div class="ui top attached segment">
            <h4 class="ui header">Menu Website</h4>
          </div>
          <div class="ui bottom attached segment">
            <div class="dd">
              <ol class="dd-list">
                <li class="dd-item dd3-item" data-id="1">
                  <div class="dd-handle dd3-handle">Drag</div>
                  <div class="dd3-content">
                    <button type="button" class="ui mini right floated red icon button" onclick="deleteMenu(1)"><i class="close icon"></i></button>
                    Item 1
                  </div>
                </li> 
                <li class="dd-item dd3-item" data-id="2">
                  <div class="dd-handle dd3-handle">Drag</div>
                  <div class="dd3-content">
                    <button type="button" class="ui mini right floated red icon button" onclick="deleteMenu(2)"><i class="close icon"></i></button>
                    Item 2
                  </div>
                </li> 
                <li class="dd-item dd3-item" data-id="3">
                  <div class="dd-handle dd3-handle">Drag</div>
                  <div class="dd3-content">
                    <button type="button" class="ui mini right floated red icon button" onclick="deleteMenu(3)"><i class="close icon"></i></button>
                    Item 3
                  </div>
                  <ol class="dd-list">
                    <li class="dd-item" data-id="4">
                      <div class="dd-handle dd3-handle">Drag</div>
                      <div class="dd3-content">
                        <button type="button" class="ui mini right floated red icon button" onclick="deleteMenu(4)"><i class="close icon"></i></button>
                        Item 4
                      </div>
                    </li>
                    <li class="dd-item" data-id="5">
                      <div class="dd-handle dd3-handle">Drag</div>
                      <div class="dd3-content">
                        <button type="button" class="ui mini right floated red icon button" onclick="deleteMenu(5)"><i class="close icon"></i></button>
                        Item 5
                      </div>
                    </li>
                  </ol>
                </li>        
              </ol>

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
  <script src="../../../plugins/nestable/jquery.nestable.js"></script>
  <script src="../../../semantic/semantic.min.js"></script>

  <script src="../../../js/mfs-script.js"></script>

  <script>
    function openPage(){
      var url = window.location.origin + '/pjnhk-new-mockup/pages/konten-dinamis/halaman-dinamis/detail.php'
      window.location.assign(url)
    }

    reloadMenu = function(){
      var container = $("#menu-container");

      openLoading(container);

      $.get("{{url($pageUrl).'/load'}}", function(response) {
        container.html(response);
        $('.dd').nestable({
          callback: function(l,e){
            var json = $('.dd').nestable('serialize');

            $.ajax({
              url: '{{url($pageUrl)}}',
              type: 'post',
              data: { _token: "{{ csrf_token() }}", data:json },
              success: function(e){
                reloadMenu();
              },
              error: function(e) {
                swal(
                  'Gagal!',
                  e.responseJSON.error,
                  'error'
                  ).then(function(e){
                    reloadMenu();
                  });
                }
              });   
          }
        });
      });
    }

    deleteMenu = function(id){
      swal({
        title: "Peringatan!",
        text: "Yakin ingin menghapus data?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus Data',
        cancelButtonText: 'Batalkan',
        allowOutsideClick: false
      }).then((result) => {
        if (result.value){
          $.ajax({
            url: '{{url($apiUrl)}}/'+id,
            headers: {
              'Authorization':"Bearer {{ session('access_token') }}"
            },
            method: 'delete',
            success: function(e){
              swal(
                'Berhasil!',
                'Data anda telah terhapus.',
                'success'
                ).then(function(e){
                  reloadMenu();
                });
              },
              error: function(e) {
                swal(
                  'Gagal!',
                  e.responseJSON.error,
                  'error'
                  ).then(function(e){
                    reloadMenu();
                  });
                }
              });   
        }
      })
    }

    $('.dd').nestable();
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.5/Chart.min.js">></script>
  <script src="../../../js/dummy.js"></script>
</body>
</html>
