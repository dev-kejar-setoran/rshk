<div class="ui tiny modal formUtama">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Jabatan Dokter
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" action="" method="POST" style="padding-top: 1rem;"> 
      <input type="hidden" id="id_jabatan_dokter" name="id_jabatan_dokter" value="">
      <input type="hidden" id="form" value="">
        <div class="field">
          <label>Jabatan Dokter</label>
          <input type="text" id="nm_jabatan" name="nm_jabatan" placeholder="Nama Jabatan Dokter">
        </div>
        <div class="field">
          <label>Deskripsi</label>
          <textarea id="deskripsi" name="deskripsi" cols="100%" rows="5"></textarea>
        </div>
        <!-- show message error -->
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