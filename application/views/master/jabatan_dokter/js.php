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
         //click simpan 
        $("#btn_batal").click(function(){      
            clearContent();
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
		$('#form').val('add_process');
        clearContent();
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
        var data_fields = $("#dataForm").serialize();
        $.ajax({
            url: "<?php echo base_url('master/jabatan_dokter/'); ?>" + form,
            type: "POST",
            data: data_fields,
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
                    closeModal();
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

    function clearContent(){

        $('#msg_validation').html('');
        $('#dataForm')[0].reset();
        $('#dataForm').removeClass('error');
    }
</script>