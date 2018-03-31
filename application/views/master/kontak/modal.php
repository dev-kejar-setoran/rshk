<div class="ui tiny modal">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Kontak
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" action="#" method="POST" style="padding-top: 1rem;">
      <div class="ui grid">
        <div class="sixteen wide column">
          <div class="ui inline grid field">
            <label class="six wide column">Nama</label>
            <input type="text" class="ten wide column"  name="name" placeholder="Nama Kontak">
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Tipe</label>
            <select name="tipe" class="ui dropdown selection">
              <option value="">Pilih tipe</option>
              <option value="1">Utama</option>
              <option value="2">Cabang</option>
            </select>
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Telepon</label>
            <input type="text" class="ten wide column" maxlength="15" name="name" placeholder="Telepon Kontak">
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Email</label>
            <input type="email" class="ten wide column" name="name" placeholder="Email Kontak">
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Koordinat</label>
            <input type="text" class="ten wide column"  name="name" placeholder="Koordinat">
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Alamat</label>
            <textarea name="alamat" class="ten wide column" id="" cols="100%" rows="5"></textarea>
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