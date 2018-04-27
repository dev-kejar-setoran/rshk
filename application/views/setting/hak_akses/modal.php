<div class="ui tiny modal formUtama">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Hak Akses
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" action="#" method="POST" style="padding-top: 1rem;">
      <input type="hidden" id="id_role" name="id_role" value="">
      <input type="hidden" id="form" name="form" value="">
      <div class="ui grid">
        <div class="sixteen wide column">
          <div class="ui inline grid field">
            <label class="six wide column">Nama Role / Hak Akses</label>
            <input type="text" class="ten wide column" id="role" name="role" placeholder="Nama Hak Akses">
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Deskripsi</label>
            <textarea class="ten wide column"  id="deskripsi" name="deskripsi" placeholder="Deskripsi"> </textarea>
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
