<!--  call event function -->
<script type="text/javascript">
    $(document).ready(function(){
        load(); // load tb
        // click simpan 
        $("#btn_cari").click(function(){  
            var nama_media_center=$('#filter_nama_media_center').val();
            var deskripsi=$('#filter_deskripsi').val();
            var id_tipe_media=$('#filter_id_tipe_media').val();
            load(nama_media_center, deskripsi, id_tipe_media); 
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
    function test(){
        alert("The paragraph was clicked.");
    }
    // load data table
    function load(nama_media_center='', deskripsi='', id_tipe_media='') {
        var t_table = $('#tb_data').DataTable();
        t_table.destroy();
        t_table = $('#tb_data').DataTable( {
            "ajax": {
                "url": "<?php echo base_url('website/media_center/load_json') ?>",
                "type": "POST",
                "data": {"nama_media_center": nama_media_center, "deskripsi": deskripsi, "id_tipe_media": id_tipe_media},
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
            url: "<?php echo base_url('website/media_center/get_detail_data'); ?>",
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
                $("#id_media_center").val(output.data.id_media_center);
                $("#nama_media_center").val(output.data.nama_media_center);
                $("#deskripsi").val(output.data.deskripsi);
                $("#nama_tipe_media").val(output.data.nama_tipe_media);
                openModal();
            },
        });
    }

    // proses tambah data
    function simpan() {        
        var form=$('#form').val(); // cek form edit / form add
        // var id_media_center=$('#id_media_center').val();
        // var nama_media_center=$('#nama_media_center').val();
        // var deskripsi=$('#deskripsi').val();
        // var gambar=$('#gambar').val();
        // var id_tipe_media=$('#id_tipe_media').val();
        $.ajax({
            url: "<?php echo base_url('website/media_center/'); ?>" + form,
            type: "POST",
            data: $('#dataForm').serialize(),
            // data: {
            //     "id_media_center":id_media_center, 
            //     "nama_media_center":nama_media_center, 
            //     "deskripsi":deskripsi, 
            //     // "gambar":gambar,
            //     "id_tipe_media":id_tipe_media 
            // },
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
                url: "<?php echo base_url('website/media_center/delete_process'); ?>",
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