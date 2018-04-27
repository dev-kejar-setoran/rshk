<!--  call event function -->
<script type="text/javascript">
    $(document).ready(function(){
        load(); // load tb
        // click simpan 
        $("#btn_cari").click(function(){  
            var judul=$('#judul_filter').val();
            var deskripsi=$('#deskripsi_filter').val();
            load(judul, deskripsi); 
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

    });
</script>

<script type="text/javascript">
	function openPage(){
      var url = "<?php echo base_url('website/pelayanan/tambah') ?>";
      window.location.assign(url);
    }

    function redirect(){
      var url = "<?php echo base_url('website/pelayanan') ?>";
      setTimeout(function () {
        window.location.href = url; }, 1000);
    }

    // load data table
    function load(judul='', deskripsi='') {
        var t_table = $('#tb_data').DataTable();
        t_table.destroy();
        t_table = $('#tb_data').DataTable( {
            "ajax": {
                "url": "<?php echo base_url('website/pelayanan/load_json') ?>",
                "type": "POST",
                "data": {"judul": judul, "deskripsi": deskripsi},
            },
            "language": {
              "emptyTable": "No data available in table",
              "zeroRecords": "No records to display"
            },
            searching: false,
        });
    } 

    // proses tambah data
    function simpan() {      
        var form=$('#form').val(); // cek form edit / 

        if (form == '') {
            form = 'add_process';
        }else{
            form = 'edit_process';
        }
         // var id_pelayanan=$('#id_pelayanan').val();
        var dataForm=$('form#dataForm')[0];
        var data = new FormData(dataForm); 
        $.ajax({
            url: "<?php echo base_url('website/pelayanan/'); ?>" + form,
            type: "POST",
            data:data,
            processData: false,
            contentType: false,
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
                    redirect();
                    clearContent();
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
                url: "<?php echo base_url('website/pelayanan/delete_process'); ?>",
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