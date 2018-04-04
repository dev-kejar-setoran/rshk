<!DOCTYPE html>
<html>
  <?php $this->load->view('templete/head.php'); ?>s
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
          <a href="#" class="section">Website</a>
          <i class="right chevron icon divider"></i>
          <div class="active section">Slider</div>
        </div>
        <h2 class="ui header">
          <div class="content">
            Slider
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
                  <div class="field">
                    <select name="filter[tipe]" class="ui dropdown selection">
                      <option value="">Pilih Tipe</option>
                      <option value="1">Event</option>
                      <option value="2">Pengumuman</option>
                      <option value="2">Misc</option>
                    </select>
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

              <table class="ui celled table">
                <thead class="center aligned">
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Posisi</th>
                    <th>Status</th>
                    <th>Tanggal Entry</th>
                    <th>Oleh</th>
                    <th class="two wide column">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="center aligned">1</td>
                    <td class="center aligned">Consequatur nesciunt sunt.</td>
                    <td class="center aligned"><img src="../assets/img/avatar04.png" alt="icon" width="80"></td>
                    <td class="center aligned">Kiri</td>
                    <td class="center aligned"><span class="ui fluid green label">Published</span></td>
                    <td class="center aligned">24 Februari 2018</td>
                    <td class="center aligned">admin</td>
                    <td class="center aligned">
                      <button type="button" data-content="Ubah Data" data-id="" class="ui mini orange icon edit button" onclick="openModal()"><i class="edit icon"></i></button>
                      <button type="button" data-content="Hapus Data" data-id="" class="ui mini red icon delete button"><i class="trash icon"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td class="center aligned">2</td>
                    <td class="center aligned">Illo beatae!</td>
                    <td class="center aligned"><img src="../assets/img/avatar04.png" alt="icon" width="80"></td>
                    <td class="center aligned">Kanan</td>
                    <td class="center aligned"><span class="ui fluid orange label">Draft</span></td>
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

    <?php $this->load->view('templete/footer.php'); ?>

    <div v-cloak>
      <!-- @yield('additional') -->
    </div>
  </div>

  <?php include('modal.php') ?>
  
  <?php $this->load->view('templete/headerjs.php'); ?>
    <?php include('js.php') ?>
</body>
</html>
