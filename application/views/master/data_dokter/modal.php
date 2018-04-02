<div class="ui tiny modal formUtama">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Data Dokter
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" method="post">
      <input type="hidden" name="action" value="create" enctype="multipart/dataForm">
      <input type="hidden" id="id_dokter" value="">
      <input type="hidden" id="form" value="">
      <div class="ui grid">
        <div class="five wide column">
          <div class="field image-container">
            <span class="image-preview" style="height: 180px">Pilih Gambar</span>
            <div class="ui fluid file input action">
              <input type="text" readonly="">
              <input type="file" class="ten wide column" id="attachment" name="attachment[]" autocomplete="off" multiple="">
              <div class="ui blue button file">
                Cari...
              </div>
            </div>
          </div>
        </div>
        <div class="eleven wide column">
          <div class="field">
            <label for="nama">Nama :</label>
            <input type="text" name="nama" placeholder="Nama Dokter" id="nama_dokter">
          </div>
          <div class="field">
            <label for="">Spesialisasi</label>
            <select name="filter[spesialisasi]" class="ui dropdown selection" id="id_spesialisasi">
              <option value="">Pilih spesialisasi</option>
              <option value="1">Kardiologi</option>
              <option value="2">Anestesi</option>
            </select>
          </div>
          <div class="field">
            <label for="">Jabatan</label>
            <select name="filter[jabatan]" class="ui dropdown selection" id="id_jabatan">
              <option value="">Pilih jabatan</option>
              <option value="1">Senior Konsultan</option>
              <option value="2">Kepala Departemen</option>
              <option value="3">Jabatan 3</option>
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



  <div class="ui tiny form_hapus modal">
    <div class="header">
      Hapus Data
    </div>
    <div class="content">
      <p>Apakah anda yakin untuk menghapus <b id="data_hapus"></b> ?</p>
      <input type="hidden" id="id_hapus" name="id_hapus">
    </div>
    <div class="actions">
      <div class="ui negative button">
        No
      </div>
      <div class="ui positive right labeled icon button" id="btn_hapus">
        Yes
        <i class="checkmark icon"></i>
      </div>
    </div>
  </div>