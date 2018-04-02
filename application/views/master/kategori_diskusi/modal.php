<div class="ui tiny modal formUtama">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Kategori Diskusi
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" action="" method="POST"">
      <input type="hidden" id="id_kategori_diskusi" value="">
      <input type="hidden" id="form" value="">
      <div class="ui form">
        <div class="field">
          <label>Kategori Diskusi</label>
          <input type="text" name="first-name" placeholder="Nama Kategori Diskusi" id="nama_kategori_diskusi">
        </div>
        <div class="field">
          <label>Deskripsi</label>
          <textarea name="deskripsi" id="deskripsi" cols="100%" rows="5"></textarea>
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