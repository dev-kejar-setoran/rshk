<div class="ui tiny modal formUtama">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Rumah Sakit
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" action="" method="POST" style="padding-top: 1rem;">
      <input type="hidden" id="id_rumah_sakit" value="">
      <input type="hidden" id="form" value="">
      <div class="ui form">
        <div class="field">
          <label>Rumah Sakit</label>
          <input type="text" id="nama_rumah_sakit" name="nama" placeholder="Nama Rumah Sakit">
        </div>
        <div class="field">
          <label>Alamat</label>
          <textarea name="alamat" id="alamat" cols="100%" rows="5"></textarea>
        </div>
        <div class="field">
          <label>No. Telepon</label>
          <input type="text" id="no_telp" name="no_telp" placeholder="Nomor Telepon">
        </div>
      </div>
    </form>
  </div>
  <div class="actions">
    <div class="ui black deny button" id="btn_batal">
      Batal
    </div>
    <div class="ui positive right labeled icon button" id="btn_simpan">
      Simpan
      <i class="save icon"></i>
    </div>
  </div>
</div>