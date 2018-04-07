<!--  call event function -->
<script type="text/javascript">
    $(document).ready(function(){
         load(); // load tb
        // click simpan 
        $("#btn_cari").click(function(){  
            var nama_dokter=$('#filter_nama').val();
            var hari_praktek=$('#filter_hari').val();
            load(nama_dokter, hari_praktek); 
        });
        // click simpan 
        $("#btn_reset").click(function(){  
            load();
        });
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
    // load data table
    function load(nama_dokter='', hari_praktek='') {
        closeModal();
        var t_table = $('#tb_data').DataTable();
        t_table.destroy();
        t_table = $('#tb_data').DataTable( {
            "ajax": {
                "url": "<?php echo base_url('administrasi/jadwal_dokter/load_json') ?>",
                "type": "POST",
                "data": {"nama_dokter": nama_dokter, "hari_praktek": hari_praktek},
            },
            "language": {
              "emptyTable": "No data available in table",
              "zeroRecords": "No records to display"
            },
            searching: false,
        } );
       // t_table.destroy();
    } 

    function form_add(){
        $("#form").val('add_process'); // set untuk form add
        clearContent();
        openModal();
    }
    // t
    function form_edit(data_id=""){
        $("#form").val('edit_process'); // set untuk form edit
        $('#dataForm').removeClass('error');
        //alert(data_id);
        $.ajax({// menggunakan ajax form
            url: "<?php echo base_url('administrasi/jadwal_dokter/get_detail_data'); ?>",
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
                $("#id_jadwal_dokter").val(output.data.id_jadwal_dokter);
                $("#nama_dokter").val(output.data.id_dokter);
                $("#hari_praktek").val(output.data.hari_praktek);
                $("#kuota").val(output.data.max_kuota);
                $("#jam_mulai").val(output.data.jam_mulai);
                $("#jam_akhir").val(output.data.jam_akhir);
                openModal();
            },
        });
    }

    // proses tambah data
    function simpan() {        
        var form=$('#form').val(); // cek form edit / form add
        $.ajax({
            url: "<?php echo base_url('administrasi/jadwal_dokter/'); ?>" + form,
            type: "POST",
            data: $('#dataForm').serialize(),
            beforeSubmit: function() {
                //loading
            },
            success: function(msg) {
                var msg=$.parseJSON(msg);
                $('#msg_validation').html('');
                // jika form tidak valid
                if(msg.type=='success'){
                    swal(msg.title, msg.pesan, msg.type);
                    load();
                }
                else if(msg.type=='invalid'){
                    var str ="";
                    $('#dataForm').addClass('error');
                    $.each( msg.data, function( i, val ) {
                        str = "<li>" + val + "</li>";
                        $("#msg_validation").append(str);
                    });
                }else{
                    swal(msg.title, msg.pesan, msg.type);
                }
            },
        }); 
    }


    function form_hapus(data_id=""){
        swal({
              title: 'Hapus Data',
              text: "Apakah Anda ingin menghapus data ini? #" + data_id,
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#999',
              confirmButtonText: 'Hapus',
              cancelButtonText: 'Batal'
          }).then(value => {
             $.ajax({// menggunakan ajax form
                url: "<?php echo base_url('administrasi/jadwal_dokter/delete_process'); ?>",
                type: "POST",
                data: {
                    "id_hapus":data_id
                },
                beforeSend: function () {
                    // non removable loading
                    // $('#loading_modal').modal({
                    //     backdrop: 'static', keyboard: false
                    // });
                },
                success: function (msg) {
                    var msg=$.parseJSON(msg);
                    load();
                    swal(
                      'Deleted!',
                      msg.pesan,
                      'success'
                      );
                },
            });
        }).catch(swal.noop)
    }

    // untuk membersihkan form tambah / edit
    function clearContent(){
        $('#msg_validation').html('');
        $('#dataForm')[0].reset();
        $('#dataForm').removeClass('error');
    }

</script>