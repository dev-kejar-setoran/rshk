<!--  call event function -->
<script type="text/javascript">
    $(document).ready(function(){
        load(); // load tb
        // click simpan 
        $("#btn_cari").click(function(){  
            var nama_pengguna=$('#filter_pengguna').val();
            load(nama_pengguna); 
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
	 // load data table
    function load(nama_pengguna='') {
        var t_table = $('#tb_data').DataTable();
        t_table.destroy();
        t_table = $('#tb_data').DataTable( {
            "ajax": {
                "url": "<?php echo base_url('setting/data_pengguna/load_json') ?>",
                "type": "POST",
                "data": {"nama_pengguna": nama_pengguna},
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

    // proses tambah data
    function simpan() {        
        var form=$('#form').val(); // cek form edit / form add
        var id_user=$('#id_user').val();
        var nama=$('#nama_pengguna').val();
        var email=$('#email').val();
        var tlp=$('#tlp').val();
        var hak_akses=$('#role').val();
        $.ajax({
            url: "<?php echo base_url('setting/data_pengguna/'); ?>" + form,
            type: "POST",
            data: {
                "id_user":id_user, 
                "nama_pengguna":nama, 
                "email":email, 
                "tlp":tlp, 
                "role":hak_akses
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

    //proses edit data
    function form_edit(data_id=""){
        $("#form").val('edit_process'); // set untuk form edit
        //alert(data_id);
        $.ajax({// menggunakan ajax form
            url: "<?php echo base_url('setting/data_pengguna/get_detail_data'); ?>",
            type: "POST",
            data: {"id_user": data_id},
            beforeSend: function () {
                // non removable loading
                // $('#loading_modal').modal({
                //     backdrop: 'static', keyboard: false
                // });
            },
            success: function (output) {
                var output = $.parseJSON(output);
                //alert(JSON.stringify(output));
                $("#id_user").val(output.data.id_user);
                $("#nama_pengguna").val(output.data.nama_lengkap);
                $("#email").val(output.data.email);
                var role = $("#role").val(output.data.role);
                openModal();
            },
        });
    }

    //proses hapus data
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
                url: "<?php echo base_url('setting/data_pengguna/delete_process'); ?>",
                type: "POST",
                data: {
                    "id_user":data_id
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

