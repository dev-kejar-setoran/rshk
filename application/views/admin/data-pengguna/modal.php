<div class="ui tiny modal formUtama">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Data Pengguna
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" action="#" method="POST" style="padding-top: 1rem;">
      <input type="hidden" id="id_user" value="">
      <input type="hidden" id="form" value="">
      <div class="ui grid">
        <div class="sixteen wide column">
          <div class="ui inline grid field">
            <label class="six wide column">Nama</label>
            <input type="text" class="ten wide column"  id="nama_pengguna" placeholder="Nama lengkap pengguna">
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Email</label>
            <input type="email" class="ten wide column"  id="email" placeholder="Alamat email pengguna">
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Nomor Telepon</label>
            <input type="text" class="ten wide column"  id="tlp" maxlength="15" placeholder="Nomor telepon pengguna">
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Hak Akses</label>
            <select name="hak_akses" id="role" class="ui selection dropdown">
              <option value="Admin">Admin</option>
              <option value="Dokter">Dokter</option>
            </select>
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