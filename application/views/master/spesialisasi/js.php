<script type="text/javascript">
    $(document).ready(function(){
        load(); // load tb
        // click simpan 
        $("#btn_cari").click(function(){  
            var nama_spesialisasi=$('#filter_nama_spesialisasi').val();
            load(nama_spesialisasi);
            console.log(nama_spesialisasi); 
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

<script type="text/javascript">
    function test(){
        alert("The paragraph was clicked.");
    }
    // load data table
    function load(nama_spesialisasi='') {
        var t_table = $('#tb_data').DataTable();
        t_table.destroy();
        t_table = $('#tb_data').DataTable( {
            "ajax": {
                "url": "<?php echo base_url('master/Spesialisasi/load_json') ?>",
                "type": "POST",
                "data": {"nama_spesialisasi": nama_spesialisasi},
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
        $('#dataForm')[0].reset();
        $("#form").val('add_process'); // set untuk form add
        openModal();
    }

    function form_edit(data_id=""){
        $("#form").val('edit_process'); // set untuk form edit
        //alert(data_id);
        $.ajax({// menggunakan ajax form
            url: "<?php echo base_url('master/Spesialisasi/get_detail_data'); ?>",
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
                $("#id_spesialisasi").val(output.data.id_spesialisasi);
                $("#nama_spesialisasi").val(output.data.nama_spesialisasi);
                $("#deskripsi").val(output.data.deskripsi);
                openModal();
            },
        });
    }

    // proses tambah data
    function simpan() {        
        var form=$('#form').val(); // cek form edit / form add
        var id_spesialisasi=$('#id_spesialisasi').val();
        var nama_spesialisasi=$('#nama_spesialisasi').val();
        var deskripsi=$('#deskripsi').val();
        $.ajax({
            url: "<?php echo base_url('master/Spesialisasi/'); ?>" + form,
            type: "POST",
            data: {
                "id_spesialisasi":id_spesialisasi, 
                "nama_spesialisasi":nama_spesialisasi, 
                "deskripsi":deskripsi
            },
            beforeSubmit: function() {
                //loading
            },
            success: function(msg) {
                var msg=$.parseJSON(msg);
                if (msg.status=='sukses') {
                    title_msg = 'Tersimpan!',
                    type_msg = 'success'
                }
                else if (msg.status=='gagal') {
                    title_msg = 'Gagal Tersimpan!',
                    type_msg = 'warning'
                }
                load();
                swal(title_msg, msg.pesan, type_msg);
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
                url: "<?php echo base_url('master/Spesialisasi/delete_process'); ?>",
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
</script>