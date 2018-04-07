<div class="ui tiny modal formUtama">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Tipe Media
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" action="" method="POST"">
      <input type="hidden" id="id_tipe_media" value="">
      <input type="hidden" id="form" value="">
      <div class="ui form">
        <div class="field">
          <label>Tipe Media</label>
          <input type="text" name="nama_tipe_media" id="nama_tipe_media" placeholder="Nama Tipe Media" >
        </div>
        <div class="field">
          <label>Deskripsi</label>
          <textarea name="deskripsi" id="deskripsi" cols="100%" rows="5"></textarea>
        </div>
      </div>
      <!-- tampil error -->
      <div class="ui error message">
        <ul class="list" id="msg_validation"></ul>
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
