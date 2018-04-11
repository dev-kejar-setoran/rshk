<div class="ui tiny modal">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Perjanjian Online
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" action="#" method="POST" style="padding-top: 1rem;">
      <div class="ui grid">
        <div class="sixteen wide column">
          <div class="ui inline grid field">
            <label class="six wide column">Nomor Urut</label>
            <div class="ten wide column" style="padding: 0">
              <input type="text" name="nomor_urut" value="EKO-1">
            </div>
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Nama User</label>
            <div class="ten wide column" style="padding: 0">
              <input type="text" name="username" value="apatel04">
            </div>
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Nama Pasien</label>
            <div class="ten wide column" style="padding: 0">
              <input type="text" name="nama_pasien" value="Alek Patel">
            </div>
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Nama Dokter</label>
            <div class="ten wide column" style="padding: 0">
              <div class="ui fluid selection dropdown">
                <input type="hidden" name="user">
                <i class="dropdown icon"></i>
                <div class="default text">Pilih dokter...</div>
                <div class="menu">
                  <div class="item active" data-value="dr. AMIN TJUBANDI , Sp.BTKV">
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
          <div class="ui grid field">
            <label class="six wide column">Jadwal</label>
            <div class="six wide column" style="padding-top: 0; padding-bottom: 0; padding-left: 0">
              <div class="field">
                <div class="ui left icon date input">
                  <i class="calendar icon"></i>
                  <input type="text" name="tgl_perjanjian" value="12/02/2018" placeholder="dd/mm/yyyy">
                </div>
              </div>
            </div>
            <div class="four wide column" style="padding-top: 0; padding-bottom: 0; padding-right: 0">
              <div class="field">
                <div class="ui left icon time input">
                  <i class="clock icon"></i>
                  <input type="text" name="tgl_perjanjian" value="17:05" placeholder="hh:mm">
                </div>
              </div>
            </div>
          </div>
          <div class="ui inline grid field">
            <label class="six wide column">Konfirmasi</label>
            <div class="ten wide column" style="padding: 0">
              <div class="ui fluid selection dropdown">
                <input type="hidden" name="user">
                <i class="dropdown icon"></i>
                <div class="default text">Pilih dokter...</div>
                <div class="menu">
                  <div class="active item" data-value="1">
                    Sudah
                  </div>
                  <div class="item" data-value="0">
                    Belum
                  </div>
                </div>
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