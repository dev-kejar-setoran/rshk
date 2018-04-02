<!DOCTYPE html>
<html>
  <?php $this->load->view('templete/head.php'); ?>
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
          <div class="active section">Kontak</div>
        </div>
        <h2 class="ui header">
          <div class="content">
            Kontak
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
                    <input name="filter[nama]" placeholder="Nama" type="text">
                  </div>
                  <div class="field">
                    <input name="filter[alamat]" placeholder="Alamat" type="text">
                  </div>
                  <div class="field">
                    <input name="filter[email]" placeholder="Email" type="text">
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
                    <th>Koordinat</th>
                    <th>Alamat</th>
                    <th class="two wide column">Telepon</th>
                    <th class="two wide column">Email</th>
                    <th>Tipe</th>
                    <th>Tanggal Entry</th>
                    <th>Oleh</th>
                    <th class="two wide column">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="center aligned">1</td>
                    <td class="center aligned">Pusat</td>
                    <td class="center aligned">5.213123, -52.139123</td>
                    <td class="center aligned">Jl. Letjen S. Parman Kav. 87, Palmerah, RT.1/RW.8, Kota Bambu Utara, Palmerah, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11420</td>
                    <td class="center aligned">(021) 5684093</td>
                    <td class="center aligned">info@pjnhk.go.id</td>
                    <td class="center aligned"><span class="ui teal label">Utama</span></td>
                    <td class="center aligned">24 Februari 2018</td>
                    <td class="center aligned">admin</td>
                    <td class="center aligned">
                      <button type="button" data-content="Ubah Data" data-id="" class="ui mini orange icon edit button" onclick="openModal()"><i class="edit icon"></i></button>
                      <button type="button" data-content="Hapus Data" data-id="" class="ui mini red icon delete button"><i class="trash icon"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td class="center aligned">2</td>
                    <td class="center aligned">RSAB</td>
                    <td class="center aligned">5.213123, -52.139123</td>
                    <td class="center aligned">Jalan Letjen. S. Parman Kav 87, Kota Bambu Utara, Palmerah, RT.1/RW.8, Kota Bambu Utara, RT.1/RW.8, Kota Bambu Utara, Palmerah, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11420</td>
                    <td class="center aligned">(021) 5668284</td>
                    <td class="center aligned">info@pjnhk.go.id</td>
                    <td class="center aligned"><span class="ui orange label">Cabang</span></td>
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

    <?php $this->load->view('templete/headerjs.php'); ?>
</body>
</html>
