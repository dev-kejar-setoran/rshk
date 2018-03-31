<div class="ui tiny modal">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Kategori
  </div>
  <div class="content">
    <form>
      <div class="ui form">
        <div class="field">
          <label>Kategori</label>
          <input type="text" name="first-name" placeholder="Nama Kategori">
        </div>
        <div class="field">
          <label>Deskripsi</label>
          <textarea name="deskripsi" id="" cols="100%" rows="5"></textarea>
        </div>
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