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
          <a href="#" class="section">Website</a>
          <i class="right chevron icon divider"></i>
          <div class="active section">Pelayanan</div>
        </div>
        <h2 class="ui header">
          <div class="content">
            Form Pelayanan
            <div class="sub header"> </div>
          </div>
        </h2>
      </div>

      <div class="ui clearing divider" style="border-top: none !important; margin:10px"></div>

      <div class="ui grid">
        <div class="sixteen wide column main-content">
          <div class="ui attached top segment">
            
            <form class="ui data form" id="dataForm" action="#" method="POST" enctype="multipart/dataForm">
              <input type="hidden" id="id_pelayanan" name="id_pelayanan" value="<?php echo $detail['id_pelayanan'] ?>">
              <input type="hidden" id="form" name="form" value="<?php echo $form ?>">
              <div class="ui grid">
                <div class="ten wide column">
                  <div class="field">
                    <input type="text" id="judul" name="judul" value="<?php echo $detail['judul'] ?>" placeholder="Judul Pelayanan">
                  </div>
                  <div class="field">
                    <textarea name="isi" id="isi" class="editor" style="min-height: 24rem"><?php echo $detail['isi']?></textarea>
                  </div>
                  <!-- show message error -->
                  <div class="ui error message">
                    <ul class="list" id="msg_validation"></ul>
                  </div>
                </div>
                <div class="six wide column">
                  <div class="field image-container">
                    <span class="image-preview" style="height: 180px"><img src="" id="image-preview" style=" height: 170px" /></span>
                    <div class="ui fluid file input action">
                      <input type="text" id="nama_foto" readonly="" value="<?php echo $detail['icon'] ?>">
                      <input type="file" class="ten wide column" id="input_gambar" name="input_gambar" autocomplete="off" multiple="">
                      <div class="ui blue button file">
                        Cari...
                      </div>
                    </div>
                  </div>
                  <div class="field">
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="short-desc" placeholder="Deskripsi Singkat"><?php echo $detail['deskripsi']?></textarea>
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
                <div class="ui right labeled blue icon button" id="btn_simpan">
                  <i class="save icon"></i>
                  Simpan
                </div>
              </div>
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
  <?php $this->load->view('templete/headerjs.php'); ?>
  
  <?php include('js.php') ?>
</body>
</html>
