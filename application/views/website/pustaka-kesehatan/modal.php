<div class="ui tiny file modal">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Berkas Pustaka Kesehatan
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" action="" method="POST">
      <div class="hidden field">
        <label>ID</label>
        <input type="text" name="id" placeholder="ID" disabled>
      </div>
      <div class="ui grid">
        <div class="sixteen wide column">
          <div class="ui inline grid field" style="width: 100%">
            <label class="five wide column">Judul</label>
            <input type="text" class="ten wide column" name="judul" placeholder="Judul">
          </div>
          <div class="ui inline grid field" style="width: 100%">
            <label class="five wide column">Tipe Dokumen</label>
            <select name="kategori_dokumenk3_id" class="ui fluid search selection dropdown ten wide column">
              <option value="">Pilih Tipe Dokumen</option>
              <option value="">Dokumen A</option>
              <option value="">Dokumen B</option>
              <option value="">Dokumen C</option>
            </select>
          </div>
          <div class="ui inline grid field" style="width: 100%">
            <label class="five wide column">Versi</label>
            <input class="ten wide column numeric" type="text" name="versi" placeholder="Versi">
          </div>
          <div class="ui inline grid field" style="width: 100%">
            <label class="five wide column">Kontributor</label>
            <input type="text" class="ten wide column" value="">
          </div>
          <div class="ui inline grid field" style="width: 100%">
            <label class="five wide column">Lampiran</label>
            <div class="ten wide column" style="padding: 0">
              <div class="ui fluid file input action">
                <input type="text" readonly>
                <input type="file" class="ten wide column" id="attachment" name="attachment[]" autocomplete="off" multiple>
                <div class="ui button file">
                  Cari...
                </div>
              </div>
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
    <div class="ui positive right labeled icon save button">
      Simpan
      <i class="save icon"></i>
    </div>
  </div>
</div>