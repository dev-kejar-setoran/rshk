<div class="ui tiny modal">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Jadwal Dokter
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" action="#" method="POST" style="padding-top: 1rem;">
      <div class="ui grid">
        <div class="sixteen wide column">
          <div class="ui inline grid field">
            <label class="six wide column">Nama Dokter</label>
            <div class="ten wide column" style="padding: 0">
              <div class="ui fluid selection dropdown">
                <input type="hidden" name="user">
                <i class="dropdown icon"></i>
                <div class="default text">Pilih dokter...</div>
                <div class="menu">
                  <div class="item" data-value="dr. AMIN TJUBANDI , Sp.BTKV">
                    <img class="ui mini avatar image" src="../../../img/avatar04.png">
                    dr. AMIN TJUBANDI , Sp.BTKV
                  </div>
                  <div class="item" data-value="dr ADE MEIDIAN AMBARI , SpJp">
                    <img class="ui mini avatar image" src="../../../img/avatar04.png">
                    dr ADE MEIDIAN AMBARI , SpJp
                  </div>
                  <div class="item" data-value="DR.dr. AMILIANA MARDIANI , Sp.JP(K)">
                    <img class="ui mini avatar image" src="../../../img/avatar04.png">
                    DR.dr. AMILIANA MARDIANI , Sp.JP(K)
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Hari Praktek</label>
            <div class="time five wide column" style="padding: 0">
              <div class="field">
                <select name="field[hari]" id="" class="ui dropdown selection">
                  <option value="">Pilih Hari</option>
                  <option value="1">Senin</option>
                  <option value="2">Selasa</option>
                  <option value="3">Rabu</option>
                  <option value="4">Kamis</option>
                  <option value="5">Jumat</option>
                  <option value="6">Sabtu</option>
                  <option value="7">Minggu</option>
                </select>
              </div>
            </div>
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Jam Praktek</label>
            <div class="start time five wide column" style="padding-left : 0; padding-top: 0; padding-bottom: 0">
              <div class="ui right icon input" style="width: 100%; height: 100%">
                <input type="text" name="tgl_lahir" placeholder="Jam mulai">
                <i class="calendar alternate icon"></i>
              </div>
            </div>
            <div class="end time five wide column" style="padding-right: 0; padding-top: 0; padding-bottom: 0">
              <div class="ui right icon input" style="width: 100%; height: 100%">
                <input type="text" name="tgl_lahir" placeholder="Jam selesai">
                <i class="calendar alternate icon"></i>
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
    <div class="ui positive right labeled icon button">
      Simpan
      <i class="save icon"></i>
    </div>
  </div>
</div>