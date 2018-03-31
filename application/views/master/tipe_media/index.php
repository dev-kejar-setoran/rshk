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
          <a href="#" class="section">Master</a>
          <i class="right chevron icon divider"></i>
          <div class="active section">Tipe Media</div>
        </div>
        <h2 class="ui header">
          <div class="content">
            Tipe Media
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
                    <input name="filter[cara_bayar]" placeholder="Tipe Media" type="text">
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
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Entry</th>
                    <th>Oleh</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="center aligned">1</td>
                    <td class="center aligned">Utama</td>
                    <td>A voluptatem eveniet consectetur assumenda, magni odit odio.</td>
                    <td class="center aligned">24 Februari 2018</td>
                    <td class="center aligned">admin</td>
                    <td class="center aligned">
                      <button type="button" data-content="Ubah Data" data-id="" class="ui mini orange icon edit button" onclick="openModal()"><i class="edit icon"></i></button>
                      <button type="button" data-content="Hapus Data" data-id="" class="ui mini red icon delete button"><i class="trash icon"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td class="center aligned">2</td>
                    <td class="center aligned">Utama</td>
                    <td>Nam eaque quam eveniet aut magnam atque ratione architecto.</td>
                    <td class="center aligned">24 Februari 2018</td>
                    <td class="center aligned">admin</td>
                    <td class="center aligned">
                      <button type="button" data-content="Ubah Data" data-id="" class="ui mini orange icon edit button" onclick="openModal()"><i class="edit icon"></i></button>
                      <button type="button" data-content="Hapus Data" data-id="" class="ui mini red icon delete button"><i class="trash icon"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td class="center aligned">3</td>
                    <td class="center aligned">Utama</td>
                    <td>Quod quasi, porro.</td>
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
  <script src="../../../semantic/semantic.min.js"></script>

  <script src="../../../js/mfs-script.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.5/Chart.min.js">></script>
  <script src="../../../js/dummy.js"></script>
</body>
</html>
