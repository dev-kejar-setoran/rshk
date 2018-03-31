<div class="ui tiny modal">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Data Pengguna
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" action="#" method="POST" style="padding-top: 1rem;">
      <div class="ui grid">
        <div class="sixteen wide column">
          <div class="ui inline grid field">
            <label class="six wide column">Nama</label>
            <input type="text" class="ten wide column"  name="name" placeholder="Nama lengkap pengguna">
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Email</label>
            <input type="email" class="ten wide column"  name="email" placeholder="Alamat email pengguna">
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Nomor Telepon</label>
            <input type="text" class="ten wide column"  name="no_telp" maxlength="15" placeholder="Nomor telepon pengguna">
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Hak Akses</label>
            <select name="hak_akses" id="" class="ui selection dropdown">
              <option value="">Pilih hak akses</option>
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