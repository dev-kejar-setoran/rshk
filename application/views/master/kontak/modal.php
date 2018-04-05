<div class="ui tiny modal formUtama">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Kontak
  </div>
  <div class="content">
  <form class="ui data form" id="dataForm" action="" method="POST" style="padding-top: 1rem;">
      <input type="hidden" id="id_kontak" value="">
      <input type="hidden" id="form" value="">
      <div class="ui grid">
        <div class="sixteen wide column">
          <div class="ui inline grid field">
            <label class="six wide column">Nama</label>
            <input type="text" class="ten wide column"  id="nama_kontak" name="nama_kontak" placeholder="Nama Kontak">
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Tipe</label>
            <select id="tipe" class="ui dropdown selection">
              <option value="">Pilih tipe</option>
              <option value="Utama">Utama</option>
              <option value="Cabang">Cabang</option>
            </select>
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Telepon</label>
            <input type="text" class="ten wide column" maxlength="15" id="no_tlp" placeholder="Telepon Kontak">
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Email</label>
            <input type="email" class="ten wide column" id="email" placeholder="Email Kontak">
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Koordinat</label>
            <input type="text" class="ten wide column" id="kordinat" placeholder="Koordinat">
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Alamat</label>
            <textarea class="ten wide column" id="alamat" cols="100%" rows="5"></textarea>
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