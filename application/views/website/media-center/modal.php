<div class="ui medium modal">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Media
  </div>
  <div class="content">
    <form class="ui data form" id="form-data" method="post">
      <input type="hidden" name="action" value="create" enctype="multipart/form-data">
      
      <div class="ui grid">
        <div class="six wide column">
          <div class="field image-container">
            <span class="image-preview" style="height: 20rem">Pilih Gambar</span>
            <div class="ui fluid file input action">
              <input type="text" readonly="">
              <input type="file" class="ten wide column" id="attachment" name="attachment[]" autocomplete="off" multiple="">
              <div class="ui blue button file">
                Cari...
              </div>
            </div>
          </div>
        </div>
        <div class="ten wide column">
          <div class="field">
            <label for="nama">Nama</label>
            <input type="text" name="nama" placeholder="Judul media">
          </div>
          <div class="field">
            <label for="">Deskripsi</label>
            <textarea name="deskripsi" id="" rows="5"></textarea>
          </div>
          <div class="field">
            <label for="">Tipe</label>
            <select name="filter[tipe]" id="" class="ui dropdown selection">
              <option value="">Pilih tipe media</option>
              <option value="1">Event</option>
              <option value="2">Pengumuman</option>
              <option value="3">Misc</option>
            </select>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="actions">
    <div class="ui black deny button">
      Batal
    </div>
    <div class="ui positive right labeled icon button">
      Simpan
      <i class="save icon"></i>
    </div>
  </div>
</div>