<!--  call event function -->
<script type="text/javascript">
    $(document).ready(function(){
        load(); // load tb
        // btn cari
        $("#btn_cari").click(function(){  
            var nama_kategori_diskusi=$('#filter_nama_kategori_diskusi').val();
            load(nama_kategori_diskusi); 
        });
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
    function load(nama_kategori_diskusi='') {
        var t_table = $('#tb_data').DataTable();
        t_table.destroy();
        t_table = $('#tb_data').DataTable( {
            "ajax": { 
            "url": "<?php echo base_url('master/kategori_diskusi/load_json') ?>",
            "type": "POST",
            "data": {"nama_kategori_diskusi": nama_kategori_diskusi},
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
            url: "<?php echo base_url('master/kategori_diskusi/get_detail_data'); ?>",
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
                $("#id_kategori_diskusi").val(output.data.id_kategori_diskusi);
                $("#nama_kategori_diskusi").val(output.data.nama_kategori_diskusi);
                $("#deskripsi").val(output.data.deskripsi);
                $("#id_jabatan").val(output.data.id_jabatan);

                openModal();
            },
        });
    }

    // proses tambah data
    function simpan() {        
        var form=$('#form').val(); // cek form edit / form add
        var id_kategori_diskusi=$('#id_kategori_diskusi').val();
        var nama_kategori_diskusi=$('#nama_kategori_diskusi').val();
        var deskripsi=$('#deskripsi').val();
        $.ajax({
            url: "<?php echo base_url('master/kategori_diskusi/'); ?>" + form,
            type: "POST",
            data: {
                "id_kategori_diskusi":id_kategori_diskusi, 
                "nama_kategori_diskusi":nama_kategori_diskusi, 
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
                url: "<?php echo base_url('master/kategori_diskusi/delete_process'); ?>",
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