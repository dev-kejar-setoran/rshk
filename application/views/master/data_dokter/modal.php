<div class="ui tiny modal formUtama">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Data Dokter
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" method="post"  enctype="multipart/dataForm">
      <!-- <input type="hidden" name="action" value="create"> -->
      <input type="hidden" id="id_dokter" name="id_dokter" value="">
      <input type="hidden" id="form" value="">
      <div class="ui grid">
        <div class="five wide column">
          <div class="field image-container">
            <span class="image-preview" style="height: 180px"><img src="" id="image-preview" style="width: 130px; height: 170px" /></span>
            <div class="ui fluid file input action">
              <input type="text" id="nama_foto" readonly="">
              <input type="file" class="ten wide column" id="input_gambar" name="input_gambar" autocomplete="off" multiple="">
              <div class="ui blue button file">
                Cari...
              </div>
            </div>
          </div>
        </div>
        <div class="eleven wide column">
          <div class="field">
            <label for="nama">Nama :</label>
            <input type="text" name="nama_dokter" placeholder="Nama Dokter" id="nama_dokter">
          </div>
          <div class="field">
            <label for="">Spesialisasi</label>
            <select name="id_spesialisasi" class="ui dropdown selection" id="id_spesialisasi">
              <option value="">Pilih spesialisasi</option>
                <?php foreach($combo_spesialisasi as $rows){
                    echo "<option value='$rows->id_spesialisasi'>$rows->nama_spesialisasi</option>;";
                  }
                ?>
            </select>
          </div>
          <div class="field">
            <label for="">Jabatan</label>
            <select name="id_jabatan" class="ui dropdown selection" id="id_jabatan">
              <option value="">Pilih jabatan</option>
              <?php foreach($combo_jabatan as $rows){
                  echo "<option value='$rows->id_jabatan_dokter'>$rows->nama_jabatan_dokter</option>;";
                }
              ?>
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
