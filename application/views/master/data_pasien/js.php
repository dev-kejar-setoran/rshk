<!--  call event function -->
<script type="text/javascript">
    $(document).ready(function(){
        load(); // load tb
        $("#btn_simpan").click(function(){      // click simpan event
            insert();
        });

    });
</script>
<!-- Function detail :  -->
<script type="text/javascript">
    function test(){
        alert("The paragraph was clicked.");
    }
    // load data table
    function load(nama_pasien, nomor_kartu) {
        $("#tb_data").html('<div></div>');
        var url = "<?php echo base_url('master/data_pasien/load') ?>";
        $.ajax({
            type: "POST",
            url: url,
            dataType: "html",
            data: {
                "nama_pasien" : nama_pasien,
                "nomor_kartu" : nomor_kartu
            },
            beforeSend: function () {
                // non removable loading
                // $('#loading_modal').modal({
                //   backdrop: 'static', keyboard: false
                // });
            },
            success: function (data) {
                $("#tb_data").html(data);
            }
        });

    } 
    // tambah data
    function insert() {
        var nama_pasien=$('#nama_pasien').val();
        var nomor_kartu=$('#nomor_kartu').val();
        var jenis_kelamin=$('#jenis_kelamin').val();
        var tempat_lahir=$('#tempat_lahir').val();
        var tgl_lahir=$('#tgl_lahir').val();
        var id_kewarganegaraan=$('#id_kewarganegaraan').val();
        var asuransi=$('#asuransi').val();
        $.ajax({
            url: "<?php echo base_url('master/data_pasien/create'); ?>",
            type: "POST",
            data: {
                "nama_pasien":nama_pasien, 
                "nomor_kartu":nomor_kartu, 
                "jenis_kelamin":jenis_kelamin, 
                "tempat_lahir":tempat_lahir, 
                "tgl_lahir":tgl_lahir, 
                "id_kewarganegaraan":id_kewarganegaraan, 
                "asuransi":asuransi
            },
            beforeSubmit: function() {
                //loading
            },
            success: function(msg) {
                var msg=$.parseJSON(msg);
                if (msg.status=='sukses') {
                    alert(msg.pesan);
                }
                else if (msg.status=='gagal') {
                    alert(msg.pesan);
                }
                load();
            },
        }); 
    }

</script>