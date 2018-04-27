<div class="ui tiny modal formUtama">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Kategori Diskusi
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" action="" method="POST"">
      <input type="hidden" id="id_kategori_diskusi" value="">
      <input type="hidden" id="form" value="">
      <div class="ui form">
        <div class="field">
          <label>Kategori Diskusi</label>
          <input type="text" name="first-name" placeholder="Nama Kategori Diskusi" id="nama_kategori_diskusi">
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