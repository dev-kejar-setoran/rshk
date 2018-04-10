<div class="ui tiny modal formUtama">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Cara Bayar
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" action="#" method="POST" style="padding-top: 1rem;">
      <input type="hidden" id="id_cara_bayar" name="id_cara_bayar" value="">
      <input type="hidden" id="form" name="form" value="">
      <div class="ui grid">
        <div class="sixteen wide column">
          <div class="ui inline grid field">
            <label class="six wide column">Nama Cara Bayar</label>
            <input type="text" class="ten wide column"  id="nama_cara_bayar" name="nama_cara_bayar" placeholder="Nama Cara Bayar">
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Alamat</label>
            <textarea name="alamat" class="ten wide column" id="alamat" cols="100%" rows="3"></textarea>
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="ten wide column"  cols="100%" rows="3"></textarea>
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
