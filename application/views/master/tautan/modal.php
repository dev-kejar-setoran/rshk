
<form class="ui form" action="return simpan();" method="POST">
  <div class="ui tiny modal">
    <!-- <i class="close icon"></i> -->
    <div class="header">
      Form Tautan
    </div>

    <div class="content">

      <div class="ui form">
        <div class="field">
          <label>Nama</label>
          <input type="text" name="nama_tautan" placeholder="Nama Tautan">
        </div>
        <div class="field">
          <label>Tautan</label>
          <input type="text" name="tautan" placeholder="URL, misal: http://www.google.com">
        </div>
        <div class="field">
          <label>Deskripsi</label>
          <textarea name="deskripsi" cols="100%" rows="5"></textarea>
        </div>
      </div>
      <div class="ui error message"></div>
    </div>

    <div class="actions">
      <div class="ui black deny button">
        Batal
      </div>
      <!-- <div class="ui positive right labeled icon button"> -->
      <div class="ui  right labeled icon button submit primary ">
        Simpan
        <i class="save icon"></i>
      </div>
    </div>
  </div>
</form>
<script type="text/javascript">
  function simpan()() {
    alert('sdfgh');
  }
</script>