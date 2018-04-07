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
          <a href="#" class="section">Artikel</a>
          <i class="right chevron icon divider"></i>
          <div class="active section">List</div>
        </div>
        <h2 class="ui header">
          <div class="content">
            Form Artikel
            <div class="sub header"> </div>
          </div>
        </h2>
      </div>

      <div class="ui clearing divider" style="border-top: none !important; margin:10px"></div>

      <div class="ui grid">
        <div class="sixteen wide column main-content">
          <div class="ui attached top segment">
           
            <form class="ui data form" id="dataForm" action="#" method="POST" enctype="multipart/dataForm">
              <input type="hidden" id="id_artikel_list" name="id_artikel_list" value="<?php echo $artikel['id_artikel_list'] ?>">
              <input type="hidden" id="form" name="form" value="<?php echo $form ?>">
              <div class="ui grid">
                <div class="ten wide column">
                  <div class="field">
                    <div class="ui big input">
                      <input type="text" name="judul_artikel" value="<?php echo $artikel['judul_artikel'] ?>" id="judul_artikel"  placeholder="Judul Artikel">
                    </div>
                  </div>
                  <div class="field">
                    <textarea name="isi" id="isi" class="editor" style="min-height: 24rem"><?php echo $artikel['isi'] ?></textarea>
                  </div>
                  <!-- show message error -->
                  <div class="ui error message">
                    <ul class="list" id="msg_validation"></ul>
                  </div>
                </div>
                <div class="six wide column">
                  <div class="field">
                    <select name="id_artikel_kategori"  id="id_artikel_kategori"  class="ui selection dropdown">
                      <option value="">Pilih kategori artikel</option>
                      <option value="1" <?php if ($artikel['id_artikel_kategori'] == 1) { echo "selected";} ?>>Kategori 1</option>
                      <option value="2" <?php if ($artikel['id_artikel_kategori'] == 2) { echo "selected";} ?>>Kategori 2</option>
                      <option value="3" <?php if ($artikel['id_artikel_kategori'] == 3) { echo "selected";} ?>>Kategori 3</option>
                    </select>
                  </div>
                  <!-- <div class="field">
                    <select name="kategori" id="" class="ui selection dropdown">
                      <option value="">Pilih status</option>
                      <option value="1">Draft</option>
                      <option value="2">Published</option>
                    </select>
                  </div> -->
                  <div class="field image-container">
                    <span class="image-preview" style="height: 180px"><img src="" id="image-preview" style=" height: 170px" /></span>
                    <div class="ui fluid file input action">
                      <input type="text" id="nama_foto" value="<?php echo $artikel['gambar'] ?>" readonly="">
                      <input type="file" class="ten wide column" id="input_gambar" name="input_gambar" autocomplete="off" multiple="">
                      <div class="ui blue button file">
                        Cari...
                      </div>
                    </div>
                  </div>
                  <div class="field">
                    <textarea name="deskripsi_singkat" id="deskripsi_singkat" cols="30" rows="10" class="short-desc" placeholder="Deskripsi Singkat"><?php echo $artikel['deskripsi_singkat'] ?></textarea>
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
                  <button type="button" id="btn_draft" class="ui button save as drafting positive">Draft</button>
                  <div class="or"></div>
                  <button type="button" id="btn_publish" class="ui button primary save as publicity teal">Publish</button>
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
