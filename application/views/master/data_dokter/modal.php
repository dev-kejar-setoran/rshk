<div class="ui tiny modal">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Data Dokter
  </div>
  <div class="content">
    <form class="ui data form" id="form-data" method="post">
      <input type="hidden" name="action" value="create" enctype="multipart/form-data">
      
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
            <select name="filter[spesialisasi]" class="ui dropdown selection" id="spesialisasi">
              <option value="">Pilih spesialisasi</option>
              <option value="1">Kardiologi</option>
              <option value="2">Anestesi</option>
            </select>
          </div>
          <div class="field">
            <label for="">Jabatan</label>
            <select name="filter[jabatan]" class="ui dropdown selection" id="jabatan">
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
    <div class="ui black deny button">
      Batal
    </div>
    <div class="ui positive right labeled icon button" onclick="simpan_data()">
      Simpan <i class="save icon"></i>
    </div>
  </div>
</div>


<script type="text/javascript">
    function simpan_data(){
        var nama_dokter = $('#nama_dokter').val();
        var spesialisasi = $('#spesialisasi').val();
        var jabatan = $('#jabatan').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('data_dokter/add_save'); ?>",
            data: {"nama_dokter":nama_dokter,"spesialisasi":spesialisasi
                    ,"jabatan":jabatan},
            success: function(resp){
                    alert('Sukses' + resp);
                    // $("#hasil").html(resp);
            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        });
    }
    
</script>