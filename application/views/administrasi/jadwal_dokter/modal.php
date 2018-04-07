<div class="ui tiny modal formUtama">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Jadwal Dokter
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" method="POST" style="padding-top: 1rem;">
      <input type="hidden" id="id_jadwal_dokter" name="id_jadwal_dokter" value="">
      <input type="hidden" id="form" value="">
      <div class="ui grid">
        <div class="sixteen wide column">
          <div class="ui inline grid field">
            <label class="six wide column">Nama Dokter</label>
            <div class="ten wide column" style="padding: 0">
              <div class="ui fluid selection dropdown">
                <input type="hidden" name="nama_dokter" id="nama_dokter">
                <i class="dropdown icon"></i>
                <div class="default text">Pilih Dokter...</div>
                <div class="menu">
                  <?php foreach($dokter as $rows){

                  echo "<div class='item' data-value='$rows->id_dokter'>
                      <img class='ui mini avatar image' src='../assets/img/upload/$rows->foto'>
                      $rows->nama_dokter
                    </div>;";
                    
                  } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Hari Praktek</label>
            <div class="time five wide column" style="padding: 0">
              <div class="field">
                <select name="hari_praktek" id="hari_praktek" class="ui dropdown selection">
                  <option value="">Pilih Hari</option>
                  <option value="Senin">Senin</option>
                  <option value="Selasa">Selasa</option>
                  <option value="Rabu">Rabu</option>
                  <option value="Kamis">Kamis</option>
                  <option value="Jumat">Jumat</option>
                  <option value="Sabtu">Sabtu</option>
                  <option value="Minggu">Minggu</option>
                </select>
              </div>
            </div>
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Maksimal Kuota</label>
            <div class="time five wide column" style="padding: 0">
              <div class="field">
                <select name="kuota" id="kuota" class="ui dropdown selection">
                  <option value="">Pilih Max Kuota</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
              </div>
            </div>
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Jam Praktek</label>
            <div class="start time five wide column" style="padding-left : 0; padding-top: 0; padding-bottom: 0">
              <div class="ui right icon input" style="width: 100%; height: 100%">
                <input type="text" name="jam_mulai" id="jam_mulai" placeholder="Jam mulai">
                <i class="calendar alternate icon"></i>
              </div>
            </div>
            <div class="end time five wide column" style="padding-right: 0; padding-top: 0; padding-bottom: 0">
              <div class="ui right icon input" style="width: 100%; height: 100%">
                <input type="text" name="jam_akhir" id="jam_akhir" placeholder="Jam selesai">
                <i class="calendar alternate icon"></i>
              </div>
            </div>
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