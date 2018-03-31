<div class="ui tiny modal">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Kategori Diskusi
  </div>
  <div class="content">
    <form id="form_kategori">
      <div class="ui form">
        <div class="field">
          <input type="hidden" value="" name="id"/>
          <label>Kategori Diskusi</label>
          <input type="text" name="first-name" placeholder="Nama Kategori Diskusi" id="nama_kategori">
        </div>
        <div class="field">
          <label>Deskripsi</label>
          <textarea name="deskripsi" id="deskripsi" cols="100%" rows="5"></textarea>
        </div>
      </div>
    </form>
  </div>
  <div class="actions">
    <div class="ui black deny button">
      Batal
    </div>
    <div class="ui positive right labeled icon button" onclick="simpan_data()">
      Simpan
      <i class="save icon"></i>
    </div>
  </div>
</div>



<script type="text/javascript">
    function simpan_data(){
        var id = $('#id').val();
        var nama_kategori = $('#nama_kategori').val();
        var deskripsi = $('#deskripsi').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('kategori_diskusi/add_save'); ?>",
            data: {"nama_kategori":nama_kategori,"deskripsi":deskripsi},
            success: function(resp){
                   // $("#hasil").html(resp);
            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        });
    }
    
</script>