<!--  call event function -->
<script type="text/javascript">
    $(document).ready(function(){
        load(); // load tb
        // click simpan 
        $("#btn_simpan").click(function(){      
            simpan();
        });
        // click hapus 
        $("#btn_hapus").click(function(){      
            hapus();
        });

    });
</script>
<!-- Function detail :  -->
<script type="text/javascript">
    function test(){
        alert("The paragraph was clicked.");
    }
    // load data table
    function load(nama_dokter='', spesialisasi='', jabatan='') {
        var t_table = $('#tb_data').DataTable();
        t_table.destroy();
        t_table = $('#tb_data').DataTable( {
            "ajax": "<?php echo base_url('website/slider/load_json') ?>"
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
            url: "<?php echo base_url('website/slider/get_detail_data'); ?>",
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
                $("#id_dokter").val(output.data.id_dokter);
                $("#nama_dokter").val(output.data.nama_dokter);
                $("#id_spesialisasi").val(output.data.id_spesialisasi);
                $("#id_jabatan").val(output.data.id_jabatan);

                openModal();
            },
        });
    }

    // proses tambah data
    function simpan() {        
        var form=$('#form').val(); // cek form edit / form add
        var id_dokter=$('#id_dokter').val();
        var nama_dokter=$('#nama_dokter').val();
        var id_spesialisasi=$('#id_spesialisasi').val();
        var id_jabatan=$('#id_jabatan').val();
        $.ajax({
            url: "<?php echo base_url('website/slider/'); ?>" + form,
            type: "POST",
            data: {
                "id_dokter":id_dokter, 
                "nama_dokter":nama_dokter, 
                "id_spesialisasi":id_spesialisasi,
                "id_jabatan":id_jabatan
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


    function form_hapus(data_id=""){
        $("#form").val('edit_process'); // set untuk form edit
        //alert(data_id);
        $.ajax({// menggunakan ajax form
            url: "<?php echo base_url('website/slider/get_detail_data'); ?>",
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
                $("#data_hapus").text(output.data.nama_dokter);
                $("#id_hapus").val(output.data.id_dokter);
                modal_hapus();
            },
        });
    }


    // proses tambah data
    function hapus() {        
        var id_hapus=$('#id_hapus').val();
        $.ajax({
            url: "<?php echo base_url('website/slider/delete_process'); ?>",
            type: "POST",
            data: {
                "id_hapus":id_hapus
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