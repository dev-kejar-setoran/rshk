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
          <div class="active section">Jadwal Dokter</div>
        </div>
        <h2 class="ui header">
          <div class="content">
            Jadwal Dokter
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
                    <input name="filter[nama]" placeholder="Nama Dokter" type="text">
                  </div>
                  <div class="field">
                    <select name="field[hari]" id="" class="ui dropdown selection">
                      <option value="">Pilih Hari</option>
                      <option value="1">Senin</option>
                      <option value="2">Selasa</option>
                      <option value="3">Rabu</option>
                      <option value="4">Kamis</option>
                      <option value="5">Jumat</option>
                      <option value="6">Sabtu</option>
                      <option value="7">Minggu</option>
                    </select>
                  </div>
                  <button type="button" class="ui teal icon filter button" data-content="Cari Data">
                    <i class="search icon"></i>
                  </button>
                  <button type="reset" class="ui icon reset button" data-content="Bersihkan Pencarian">
                    <i class="refresh icon"></i>
                  </button>
                  <div style="margin-left: auto; margin-right: 1px;">
                    <button type="button" class="ui blue add button" onclick="openModal()">
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
                    <th>Nama Dokter</th>
                    <th>Hari Praktek</th>
                    <th>Jam Praktek</th>
                    <th>Tanggal Entry</th>
                    <th>Oleh</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="center aligned">1</td>
                    <td class="center aligned">dr. AMIN TJUBANDI , Sp.BTKV</td>
                    <td class="center aligned">Senin</td>
                    <td class="center aligned">17:00 - 19:00</td>
                    <td class="center aligned">24 Februari 2018</td>
                    <td class="center aligned">admin</td>
                    <td class="center aligned">
                      <button type="button" data-content="Ubah Data" data-id="" class="ui mini orange icon edit button" onclick="openModal()"><i class="edit icon"></i></button>
                      <button type="button" data-content="Hapus Data" data-id="" class="ui mini red icon delete button"><i class="trash icon"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td class="center aligned">2</td>
                    <td class="center aligned">dr. AMIN TJUBANDI , Sp.BTKV</td>
                    <td class="center aligned">Rabu</td>
                    <td class="center aligned">12:00 - 14:00</td>
                    <td class="center aligned">24 Februari 2018</td>
                    <td class="center aligned">admin</td>
                    <td class="center aligned">
                      <button type="button" data-content="Ubah Data" data-id="" class="ui mini orange icon edit button" onclick="openModal()"><i class="edit icon"></i></button>
                      <button type="button" data-content="Hapus Data" data-id="" class="ui mini red icon delete button"><i class="trash icon"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td class="center aligned">3</td>
                    <td class="center aligned">dr. AMIN TJUBANDI , Sp.BTKV</td>
                    <td class="center aligned">Kamis</td>
                    <td class="center aligned">17:00 - 19:00</td>
                    <td class="center aligned">24 Februari 2018</td>
                    <td class="center aligned">admin</td>
                    <td class="center aligned">
                      <button type="button" data-content="Ubah Data" data-id="" class="ui mini orange icon edit button" onclick="openModal()"><i class="edit icon"></i></button>
                      <button type="button" data-content="Hapus Data" data-id="" class="ui mini red icon delete button"><i class="trash icon"></i></button>
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
  </script>
</body>
</html>
