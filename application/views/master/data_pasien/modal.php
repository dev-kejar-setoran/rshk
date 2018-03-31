<div class="ui tiny modal">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Pasien
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" action="<?php echo site_url('master/data_pasien/add_process'); ?>" method="POST" style="padding-top: 1rem;">
      <div class="ui grid">
        <div class="sixteen wide column">
          <div class="ui inline grid field">
            <label class="six wide column">Nama Pasien</label>
            <input type="text" class="ten wide column"  id="nama_pasien" placeholder="Nama Pasien">
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Nomor Kartu Pasien</label>
            <input type="text" class="ten wide column"  id="nomor_kartu" placeholder="Nomor registrasi kartu pasien">
          </div>
          <div class="ui inline grid fields">
            <label class="six wide column" style="margin-right: 0">Jenis Kelamin</label>
            <div class="four wide column field">
              <div class="ui radio checkbox">
                <input type="radio" id="jenis_kelamin" checked="checked">
                <label>Laki-laki</label>
              </div>
            </div>
            <div class="four wide column field">
              <div class="ui radio checkbox">
                <input type="radio" id="jenis_kelamin">
                <label>Perempuan</label>
              </div>
            </div>
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Tempat Lahir Pasien</label>
            <input type="text" class="ten wide column"  id="tempat_lahir" placeholder="Tempat lahir pasien sesuai akta">
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Tanggal Lahir Pasien</label>
            <div class="date eight wide column" style="padding: 0">
              <div class="ui icon input" style="width: 100%; height: 100%">
                <input type="text" id="tgl_lahir" placeholder="Tanggal lahir pasien sesuai akta">
                <i class="calendar alternate icon"></i>
              </div>
            </div>
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Kewarganegaraan</label>
            <select id="id_kewarganegaraan" class="ui dropdown selection">
              <option value="">Pilih</option>
              <option value="1">WNI</option>
              <option value="2">WNA</option>
            </select>
          </div>
          <div class="ui inline grid fields">
            <label class="six wide column" style="margin-right: 0">Asuransi?</label>
            <div class="four wide column field">
              <div class="ui checkbox">
                <input type="checkbox" id="asuransi" value="ada">
                <label>Ada</label>
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
