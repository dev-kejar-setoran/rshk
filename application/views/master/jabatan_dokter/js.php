<script type="text/javascript">
    $(document).ready(function(){
        load(); // load tb
        // click simpan 
        $("#btn_cari").click(function(){  
            var nama_jabatan=$('#filter_jabatan').val();
            load(nama_jabatan); 
        });
        //click simpan 
        $("#btn_reset").click(function(){  
            load();
        });
        //click simpan 
        $("#btn_simpan").click(function(){      
            simpan();
        });
        //click hapus 
        $("#btn_hapus").click(function(){      
            hapus();
        });

    });
</script>

<script type="text/javascript">
    // load data table
     function load(filter_jabatan='') {
        var t_table = $('#tb_data_jabatan').DataTable();
        t_table.destroy();
        t_table = $('#tb_data_jabatan').DataTable( {
            "ajax": {
                "url": "<?php echo base_url('master/jabatan_dokter/load_json'); ?>",
                "type": "POST",
                "data": {"filter_jabatan": filter_jabatan},
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
		$('#form').val('add_process');
		openModal();
	}
</script>

<script type="text/javascript">
    //proses edit
    function form_edit(data_id=""){
        $("#form").val('edit_process'); // set untuk form edit
        //alert(data_id);
        $.ajax({// menggunakan ajax form
            url: "<?php echo base_url('master/jabatan_dokter/get_detail_data'); ?>",
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
                $("#id_jabatan_dokter").val(output.data.id_jabatan_dokter);
                $("#nm_jabatan").val(output.data.nama_jabatan_dokter);
                $("#deskripsi").val(output.data.deskripsi);
                openModal();
            },
        });
    }

	 // proses tambah data
    function simpan() {        
        var form=$('#form').val(); // cek form edit / form add
        var id_jabatan=$('#id_jabatan_dokter').val();
        var deskripsi=$('#deskripsi').val();
        var nm_jabatan=$('#nm_jabatan').val();
        $.ajax({
            url: "<?php echo base_url('master/jabatan_dokter/'); ?>" + form,
            type: "POST",
            data: {
                "nm_jabatan":nm_jabatan,
                "id_jabatan_dokter":id_jabatan,
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

    //proses hapus
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
                url: "<?php echo base_url('master/jabatan_dokter/delete_process'); ?>",
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