<!--  call event function -->
<script type="text/javascript">
    $(document).ready(function(){
        load(); // load tb
        // click simpan 
        $("#btn_cari").click(function(){  
            var judul=$('#filter_judul').val();
            var status=$('#filter_status').val();
            load(judul, status); 
        });
        // click simpan 
        $("#btn_reset").click(function(){  
            load();
        });
        // click simpan 
        $("#btn_draft").click(function(){
            simpan('Draft');
        });

        $("#btn_publish").click(function(){
            simpan('Published');
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
    function load(judul='', status='') {
        var t_table = $('#tb_data').DataTable();
        t_table.destroy();
        t_table = $('#tb_data').DataTable( {
            "ajax": {
                "url": "<?php echo base_url('website/slider/load_json') ?>",
                "type": "POST",
                "data": {"judul": judul, "status": status},
            },
            "language": {
              "emptyTable": "No dssata available in table",
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
                $("#id_slider").val(output.data.id_slider);
                $("#judul").val(output.data.judul);
                $("#sub_judul").val(output.data.sub_judul);
                $("#deskripsi").val(output.data.deskripsi);
                $('input:radio[name="posisi"]').filter('[value='+output.data.posisi+']').attr('checked', true);
                $("#link").val(output.data.link);
                openModal();
            },
        });
    }

    // proses tambah data
    function simpan(btn) {  
        var form=$('#form').val(); // cek form edit / form add
        var dataForm=$('form#dataForm')[0];
        var data = new FormData(dataForm);   
        // var id_slider=$('#id_slider').val();
        // var judul=$('#judul').val();
        // var sub_judul=$('#sub_judul').val();
        // var deskripsi=$('#deskripsi').val();
        // var posisi=$("input[name='posisi']:checked").val();
        // var link=$('#link').val();
        // var status = btn;
        // var gambar=$('#gambar').val();
        $.ajax({
            url: "<?php echo base_url('website/slider/'); ?>" + form,
            type: "POST",
            data: data,
            processData: false,
            contentType: false,
            // data: {
            //     "id_slider":id_slider, 
            //     "judul":judul, 
            //     "sub_judul":sub_judul, 
            //     "deskripsi":deskripsi, 
            //     "posisi":posisi, 
            //     "link":link, 
            //     "status": status
            //     // "gambar":gambar,
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
                url: "<?php echo base_url('website/slider/delete_process'); ?>",
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