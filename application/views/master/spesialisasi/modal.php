<div class="ui tiny modal formUtama">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Spesialisasi
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" action="" method="POST" style="padding-top: 1rem;">
      <input type="hidden" id="id_spesialisasi" value="">
      <input type="hidden" id="form" value="">
      <div class="ui form">
        <div class="field">
          <label>Spesialisasi</label>
          <input type="text" id="nama_spesialisasi" placeholder="Nama Spesialisasi">
        </div>
        <div class="field">
          <label>Deskripsi</label>
          <textarea id="deskripsi" cols="100%" rows="5"></textarea>
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