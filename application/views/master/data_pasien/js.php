<!--  call event function -->
<script type="text/javascript">
    $(document).ready(function(){
        load(); // load tb
        // click simpan 
        $("#btn_cari").click(function(){  
            var nama_pasien=$('#filter_nama_pasien').val();
            var no_kartu=$('#filter_no_kartu').val();
            load(nama_pasien, no_kartu); 
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
    function load(nama_pasien='', nomor_kartu='') {
        var t_table = $('#tb_data').DataTable();
        t_table.destroy();
        t_table = $('#tb_data').DataTable( {
            "ajax": {
                "url": "<?php echo base_url('master/data_pasien/load_json') ?>",
                "type": "POST",
                "data": {"nama_pasien": nama_pasien, "nomor_kartu": nomor_kartu},
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
        var id_pasien=$('#id_pasien').val();
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
                "id_pasien":id_pasien, 
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
                url: "<?php echo base_url('master/data_pasien/delete_process'); ?>",
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