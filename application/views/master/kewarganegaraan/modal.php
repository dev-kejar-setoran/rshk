<div class="ui tiny modal formUtama">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Kewarganegaraan
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" action="" method="POST" style="padding-top: 1rem;">
      <input type="hidden" id="id_kewarganegaraan" value="">
      <input type="hidden" id="form" value="">
      <div class="ui grid">
        <div class="sixteen wide column">
          <div class="ui inline grid field">
            <label class="six wide column">Kewarganegaraan</label>
            <input class="ten wide column" type="text" id="nama_kewarganegaraan" placeholder="Nama Kewarganegaraan">
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Deskripsi</label>
            <textarea class="ten wide column" id="deskripsi" cols="100%" rows="5"></textarea>
          </div>
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