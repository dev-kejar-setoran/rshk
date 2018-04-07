<div class="ui tiny modal formUtama">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Pasien
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" action="#" method="POST" style="padding-top: 1rem;">
      <input type="hidden" id="id_tautan" name="id_tautan" value="">
      <input type="hidden" id="form" name="form" value="">
      <div class="ui grid">
        <div class="sixteen wide column">
          <div class="ui inline grid field">
            <label class="six wide column">Nama Tautan</label>
            <input type="text" class="ten wide column"  id="nama_tautan" name="nama_tautan" placeholder="Nama Tautan">
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Tautan</label>
            <input type="text" class="ten wide column"  id="tautan" name="tautan" placeholder="Tautan">
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Deskripsi</label>
            <input type="text" class="ten wide column"  id="deskripsi" name="deskripsi" placeholder="Deskripsi">
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
