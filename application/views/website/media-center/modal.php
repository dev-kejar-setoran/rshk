<div class="ui medium modal formUtama">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Media
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" method="post">
      <input type="hidden" name="action" value="create" enctype="multipart/dataForm">
      <input type="hidden" id="id_media_center" name="id_media_center" value="">
      <input type="hidden" id="form" value="">
      
      <div class="ui grid">
        <div class="six wide column">
          <div class="field image-container">
            <span class="image-preview" style="height: 20rem"><img src="" name="image-preview" id="image-preview" style="width: 300px; height: 230px" /></span>
            <div class="ui fluid file input action">
              <input type="hidden" name="gambar_edit" id="gambar_edit">
              <input type="text" id="nama_gambar" readonly="">
              <input type="file" class="ten wide column" id="attachment" name="attachment" autocomplete="off" multiple="">
              <div class="ui blue button file">
                Cari...
              </div>
            </div>
          </div>
        </div>
        <div class="ten wide column">
          <div class="field">
            <label for="nama">Nama</label>
            <input type="text" name="nama_media_center" id="nama_media_center" placeholder="Judul media">
          </div>
          <div class="field">
            <label for="">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="5"></textarea>
          </div>
          <div class="field">
            <label for="">Tipe</label>
            <select name="id_tipe_media" id="id_tipe_media" class="ui dropdown selection">
              <option value="">Pilih tipe media</option>
              <?php foreach($combo_tipe as $rows){
                    echo "<option value='$rows->id_tipe_media'>$rows->nama_tipe_media</option>;";
                  }
                ?>
            </select>
          </div>
        </div>
      </div>

      <!-- error message -->
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