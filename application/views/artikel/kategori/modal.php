<div class="ui tiny modal formUtama">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Kategori
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" action="" method="POST" style="padding-top: 1rem;" enctype="multipart/dataForm" >
      <input type="hidden" id="id_artikel_kategori" name="id_artikel_kategori" value="">
      <input type="hidden" id="form" value="">
      <div class="ui form">
        <div class="field">
          <label>Kategori</label>
          <input type="text" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori">
        </div>
        <div class="field">
          <label>Deskripsi</label>
          <textarea id="deskripsi" name="deskripsi" cols="100%" rows="5"></textarea>
        </div>
        <div class="field image-container">
          <span class="image-preview" style="height: 20rem"><img src="" id="image-preview" style=" height: 220px" /></span>
          <div class="ui fluid file input action">
            <input type="text" id="nama_foto" readonly="">
            <input type="file" id="input_gambar" class="ten wide column" id="input_gambar" name="input_gambar" autocomplete="off" multiple="">
            <div class="ui blue button file">
              Cari...
            </div>
          </div>
           <!-- show message error -->
          <div class="ui error message">
            <ul class="list" id="msg_validation"></ul>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="actions">
    <div class="ui black deny button" id="btn_batal">
      Batal
    </div>
    <div class="ui primary right labeled icon button" id="btn_simpan">
      Simpan
      <i class="save icon"></i>
    </div>
  </div>
</div>