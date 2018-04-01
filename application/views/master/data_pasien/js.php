<!--  call event function -->
<script type="text/javascript">
    $(document).ready(function(){
        load(); // load tb
        // click simpan 
        $("#btn_simpan").click(function(){      
            simpan();
        });

    });
</script>
<!-- Function detail :  -->
<script type="text/javascript">
    function test(){
        alert("The paragraph was clicked.");
    }
    // load data table
    function load(nama_pasien='', nomor_kartu='') {
        var t_table = $('#tb_data').DataTable();
        t_table.destroy();
        t_table = $('#tb_data').DataTable( {
            "ajax": "<?php echo base_url('master/data_pasien/load_json') ?>"
        } );
       // t_table.destroy();
    } 
    function form_add(){
        $('#dataForm')[0].reset();
        $("#form").val('add_process'); // set untuk form add
        openModal();
    }

    function form_edit(data_id=""){
        $("#form").val('edit_process'); // set untuk form edit
        //alert(data_id);
        $.ajax({// menggunakan ajax form
            url: "<?php echo base_url('master/data_pasien/get_detail_data'); ?>",
            type: "POST",
            data: {"data_id": data_id},
            beforeSend: function () {
                // non removable loading
                // $('#loading_modal').modal({
                //     backdrop: 'static', keyboard: false
                // });
            },
            success: function (output) {
                var output = $.parseJSON(output);
                //alert(JSON.stringify(output));
                $("#id_pasien").val(output.data.id_pasien);
                $("#nama_pasien").val(output.data.nama_pasien);
                $("#nomor_kartu").val(output.data.nomor_kartu);
                $('input:radio[name="jenis_kelamin"]').filter('[value='+output.data.jenis_kelamin+']').attr('checked', true);
                $("#tempat_lahir").val(output.data.tempat_lahir);
                $("#tgl_lahir").val(output.data.tgl_lahir);
                $("#id_kewarganegaraan").val(output.data.id_kewarganegaraan);
                if (output.data.asuransi=='ada') { $('#asuransi').prop('checked', true);} 
                else { $('#asuransi').prop('checked', false); }
                openModal();
            },
        });
    }

    // proses tambah data
    function simpan() {        
        var form=$('#form').val(); // cek form edit / form add
        var nama_pasien=$('#nama_pasien').val();
        var nomor_kartu=$('#nomor_kartu').val();
        var jenis_kelamin=$('#jenis_kelamin').val();
        var tempat_lahir=$('#tempat_lahir').val();
        var tgl_lahir=$('#tgl_lahir').val();
        var id_kewarganegaraan=$('#id_kewarganegaraan').val();
        var asuransi=$('#asuransi').val();
        $.ajax({
            url: "<?php echo base_url('master/data_pasien/'); ?>" + form,
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

    function modal_edit(noagenda, noba, jenis_transaksi, no_tiket) {

        $.ajax({// menggunakan ajax form
            url: "<?php echo base_url('home/get_edit_value'); ?>",
            type: "POST",
            data: {"noagenda": noagenda, "noba": noba, "no_tiket": no_tiket},
            beforeSend: function () {
                // non removable loading
                $('#loading_modal').modal({
                    backdrop: 'static', keyboard: false
                });
            },
            success: function (output) {
                var output = $.parseJSON(output);
                //alert(JSON.stringify(output));
                $('#loading_modal').modal('hide');

                $("#no_tiket_new").val(output.data.NO_TIKET);
                $("#noagenda_new").val(output.data.NOAGENDA);
                $("#idpel_new").val(output.data.IDPEL);
                $("#permintaan_dari_new").val(output.data.PERMINTAAN_DARI);
                $("#jenis_transaksi_new").val(output.data.JENIS_TRANSAKSI);
                $("#perihal_new").val(output.data.PERIHAL);
                $("#no_ba_new").val(output.data.NO_BA);
                $("#id_user_new").val(output.data.ID_USER);
                $("#tgl_permintaan_new").val(output.data.TGL_PERMINTAAN);
                $("#resolution_new").val(output.data.RESULOTION);
                $("#status_data_new").val(output.data.STATUS);
                $("#action_input").val('EDIT');
                //
                $("#no_tiket_now").val(output.data.NO_TIKET);
                $("#noagenda_now").val(output.data.NOAGENDA);
                $("#idpel_now").val(output.data.IDPEL);
                $("#no_ba_now").val(output.data.NO_BA);
                // 
                $('#judul').html('FORM EDIT DATA');
                $('#modal_tambah').modal('show');
            },
        });
    }


</script>