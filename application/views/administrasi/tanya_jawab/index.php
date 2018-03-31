<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PJNHK | Backend</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="shortcut icon" type="image/x-icon" href="../../../favicon.ico">

  <link rel="stylesheet" type="text/css" href="../../../semantic/semantic.min.css">
  <link rel="stylesheet" href="../../../plugins/sweetalert/sweetalert2.min.css">
  <link rel="stylesheet" href="../../../plugins/semanticui-calendar/calendar.min.css">

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
          <a href="#" class="section">Administasi</a>
          <i class="right chevron icon divider"></i>
          <div class="active section">Tanya Jawab</div>
        </div>
        <h2 class="ui header">
          <div class="content">
            Tanya Jawab
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
                    <input name="filter[judul]" placeholder="Judul Diskusi" type="text">
                  </div>
                  <div class="field">
                    <input name="filter[pengirim]" placeholder="Pengirim" type="text">
                  </div>
                  <div class="field">
                    <select name="field[kategori]" id="" class="ui dropdown selection">
                      <option value="">Pilih Kategori</option>
                      <option value="1">Kardiovaskuler</option>
                      <option value="2">Tips Kesehatan</option>
                    </select>
                  </div>
                  <button type="button" class="ui teal icon filter button" data-content="Cari Data">
                    <i class="search icon"></i>
                  </button>
                  <button type="reset" class="ui icon reset button" data-content="Bersihkan Pencarian">
                    <i class="refresh icon"></i>
                  </button>
                  <div style="margin-left: auto; margin-right: 1px;">
                    <!-- <button type="button" class="ui blue add button" onclick="openEditModal()">
                      <i class="plus icon"></i>
                      Tambah Data
                    </button> -->

                  </div>
                </div>
              </form>

              <table class="ui celled table">
                <thead class="center aligned">
                  <tr>
                    <th>No</th>
                    <th class="four wide column">Judul</th>
                    <th class="two wide column">User</th>
                    <th>Dokter</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Tanggal Entry</th>
                    <th class="one wide column">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="center aligned">1</td>
                    <td class="center aligned">Error iusto explicabo, molestias quos at ullam officia facere.</td>
                    <td class="center aligned">Alek Patel</td>
                    <td class="center aligned">dr. AMIN TJUBANDI , Sp.BTKV</td>
                    <td class="center aligned">Tips Kesehatan</td>
                    <td class="center aligned"><ui class="ui green fluid label">Open</ui></td>
                    <td class="center aligned">24/12/2018</td>
                    <td class="center aligned">
                      <button style="margin: .5rem 0" type="button" data-content="Ubah Data" data-id="" class="ui mini orange fluid icon edit button" onclick="openEditModal()"><i class="edit icon"></i></button>
                      <button style="margin: .5rem 0" type="button" data-content="Hapus Data" data-id="" class="ui mini red fluid icon delete button"><i class="trash icon"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td class="center aligned">2</td>
                    <td class="center aligned">Maiores ut molestias aliquam quisquam beatae quo, dolor architecto et adipisci debitis veritatis eveniet enim aliquid at placeat aperiam. Tempora, enim, magni.</td>
                    <td class="center aligned">Alek Patel</td>
                    <td class="center aligned">dr. AMIN TJUBANDI , Sp.BTKV</td>
                    <td class="center aligned">Kardiovaskuler</td>
                    <td class="center aligned"><ui class="ui red fluid label">Closed</ui></td>
                    <td class="center aligned">24/12/2018</td>
                    <td class="center aligned">
                      <button style="margin: .5rem 0" type="button" data-content="Lihat Data" data-id="" class="ui mini teal fluid icon edit button" onclick="openEditModal()"><i class="eye icon"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td class="center aligned">3</td>
                    <td class="center aligned">Nam quasi perspiciatis blanditiis, ab aspernatur quo reprehenderit!</td>
                    <td class="center aligned">Alek Patel</td>
                    <td class="center aligned">dr. AMIN TJUBANDI , Sp.BTKV</td>
                    <td class="center aligned">Kardiovaskuler</td>
                    <td class="center aligned"><ui class="ui red fluid label">Closed</ui></td>
                    <td class="center aligned">24/12/2018</td>
                    <td class="center aligned">
                      <button style="margin: .5rem 0" type="button" data-content="Jawab" data-id="" class="ui mini blue fluid icon edit button" onclick="openEditModal()"><i class="reply icon"></i></button>
                    </td>
                  </tr>
                </tbody>
              </table>
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

  <script>
  </script>
  <!-- <script src="../../../js/es6-promise.auto.min.js"></script> -->

  <script src="../../../plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="../../../plugins/jQuery/jquery.form.min.js"></script>
  <script src="../../../plugins/jQueryUI/jquery-ui.min.js"></script>
  <script src="../../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="../../../plugins/fastclick/fastclick.js"></script>
  <script src="../../../plugins/sweetalert/sweetalert2.min.js"></script>
  <script src="../../../plugins/semanticui-calendar/calendar.min.js"></script>
  <script src="../../../semantic/semantic.min.js"></script>
  
  <script src="../../../plugins/tinymce/tinymce.min.js"></script>
  <script src="../../../plugins/tinymce/jquery.tinymce.min.js"></script>

  <script src="../../../js/mfs-script.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.5/Chart.min.js">></script>
  <script src="../../../js/dummy.js"></script>

  <script>
    $(document).ready(function () {
      $('.start.time').calendar({
        type: 'time',
        ampm: false,
        onChange: function(){
          $('.end.time').calendar({
            type: 'time',
            ampm: false,
            startCalendar: $('.start.time')
          });
        }
      });
      $('.end.time').calendar({
        type: 'time',
        ampm: false,
        onChange: function(){
          $('.start.time').calendar({
            type: 'time',
            ampm: false,
            endCalendar: $('.end.time')
          });
        }
      });
    });

    function openEditModal(){
      $('.ui.modal')
      .modal({
        observeChanges: true,
        closable: false,
        detachable: false,
        autofocus: false,
        onVisible: function() {

          $('.ui.dropdown').dropdown();
          $(document).ready(function() {
            tinymce.init({ selector:'.editor', menubar: false});
          });
        }
      })
      .modal('show')
      .modal("refresh");
    }
  </script>
</body>
</html>
