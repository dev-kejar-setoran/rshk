<div class="ui tiny modal formUtama">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Jabatan Dokter
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" action="" method="POST" style="padding-top: 1rem;"> 
      <input type="hidden" id="id_jabatan_dokter" value="">
      <input type="hidden" id="form" value="">
        <!-- <div class="field">
          <label>Spesialisasi</label>
          <select name="spesialisasi" class="ui selection dropdown" id="id_spesialisasi">
            <option value="">Pilih spesialisasi</option>
                      <?php foreach($spesialisasi->result() as $rows){
                          echo "<option value='$rows->id_spesialisasi'>$rows->nama_spesialisasi</option>;";
                        }
                      ?>
            </select>
        </div> -->
        <div class="field">
          <label>Jabatan Dokter</label>
          <input type="text" id="nm_jabatan" name="nm_jabatan" placeholder="Nama Jabatan Dokter">
        </div>
        <div class="field">
          <label>Deskripsi</label>
          <textarea id="deskripsi" name="deskripsi" cols="100%" rows="5"></textarea>
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