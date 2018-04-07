<!--  call event function -->
<script type="text/javascript">
    $(document).ready(function(){
         load(); // load tb
        // click simpan 
        $("#btn_cari").click(function(){  
            var nama_dokter=$('#filter_nama_dokter').val();
            var id_spesialisasi=$('#filter_id_spesialisasi').val();
            var id_jabatan=$('#filter_id_jabatan').val();
            load(nama_dokter, id_spesialisasi, id_jabatan); 
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
    function load(nama_dokter='', id_spesialisasi='', id_jabatan='') {
        var t_table = $('#tb_data').DataTable();
        t_table.destroy();
        t_table = $('#tb_data').DataTable( {
            "ajax": {
                "url": "<?php echo base_url('master/data_dokter/load_json') ?>",
                "type": "POST",
                "data": {"nama_dokter": nama_dokter, "id_spesialisasi": id_spesialisasi, "id_jabatan": id_jabatan},
            },
            "language": {
              "emptyTable": "No data available in table",
              "zeroRecords": "No records to display"
            },
            searching: false,
        } );
       // t_table.destroy();
    } 

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#image-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#input_gambar").change(function(){
        readURL(this);
    });

    function form_add(){
        $('#dataForm')[0].reset();
        $("#form").val('add_process'); // set untuk form add
        openModal();
    }

    function form_edit(data_id=""){
        $("#form").val('edit_process'); // set untuk form edit
        //alert(data_id);
        $.ajax({// menggunakan ajax form
            url: "<?php echo base_url('master/data_dokter/get_detail_data'); ?>",
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
                $("#id_jabatan").val(output.data.id_jabatan_dokter);
                document.getElementById("image-preview").src = "../assets/img/upload/" + output.data.foto;
                openModal();
            },
        });
    }

    // proses tambah data
    function simpan() {        
        var form=$('#form').val(); // cek form edit / form add
        var dataForm=$('form#dataForm')[0];
        var data = new FormData(dataForm);   
        
        console.log(data);
        $.ajax({
            url: "<?php echo base_url('master/data_dokter/'); ?>" + form,
            type: "POST",
            data:data,
            processData: false,
            contentType: false,
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
                swal(title_msg, msg.pesan, type_msg);
                load();
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
                url: "<?php echo base_url('master/data_dokter/delete_process'); ?>",
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


    // // proses hapus data
    // function hapus() {        
    //     var id_hapus=$('#id_hapus').val();
    //     $.ajax({
    //         url: "<?php echo base_url('master/data_dokter/delete_process'); ?>",
    //         type: "POST",
    //         data: {
    //             "id_hapus":id_hapus
    //         },
    //         beforeSubmit: function() {
    //             //loading
    //         },
    //         success: function(msg) {
    //             var msg=$.parseJSON(msg);
    //             if (msg.status=='sukses') {
    //                 alert(msg.pesan);
    //             }
    //             else if (msg.status=='gagal') {
    //                 alert(msg.pesan);
    //             }
    //             load();
    //         },
    //     }); 
    // }

</script>