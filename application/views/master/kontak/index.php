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
                    <input id="filter_nama_kontak" placeholder="Nama Kontak" type="text">
                  </div>
                  <div class="field">
                    <input id="filter_alamat" placeholder="Alamat" type="text">
                  </div>
                  <div class="field">
                    <input id="filter_email" placeholder="Email" type="text">
                  </div>
                  <button type="button" id="btn_cari" class="ui teal icon filter button" data-content="Cari Data">
                    <i class="search icon"></i>
                  </button>
                  <button type="reset" id="btn_reset" class="ui icon reset button" data-content="Bersihkan Pencarian">
                    <i class="refresh icon"></i>
                  </button>
                  <div style="margin-left: auto; margin-right: 1px;">
                    <button type="button" class="ui blue add button" onclick="form_add();">
                      <i class="plus icon"></i>
                      Tambah Data
                    </button>

                  </div>
                </div>
              </form>

              <table id="tb_data" class="display ui celled tabl" style="width:100%">
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
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('templete/footer.php'); ?>
  </div>

  <?php include('modal.php'); ?>
  <?php $this->load->view('templete/headerjs.php'); ?>
  <?php include('js.php') ?>
</body>
</html>
