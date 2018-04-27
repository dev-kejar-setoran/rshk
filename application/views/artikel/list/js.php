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
        $("#btn_publish").click(function(){      
            simpan('publish');
        });

        $("#btn_draft").click(function(){      
            simpan('draft');
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
      var url = "<?php echo base_url('artikel/artikel_list/tambah') ?>";
      window.location.assign(url);
    }

    function redirect(){
      var url = "<?php echo base_url('artikel/artikel_list') ?>";
      setTimeout(function () {
        window.location.href = url; }, 1000);
    }

    function form_add(){
        //$('#dataForm')[0].reset();
        $("#form").val('add_process'); // set untuk form add
        openPage();
    }

	// load data table
    function load(judul='', deskripsi='') {
        var t_table = $('#tb_data').DataTable();
        t_table.destroy();
        t_table = $('#tb_data').DataTable( {
            "ajax": {
                "url": "<?php echo base_url('artikel/Artikel_list/load_json') ?>",
                "type": "POST",
                "data": {"judul": judul, "deskripsi": deskripsi},
            },
            "language": {
              "emptyTable": "No data available in table",
              "zeroRecords": "No records to display"
            },
            searching: false,
        } );
       // t_table.destroy();
    } 

    // proses tambah data
    function simpan(btn) {      
        var form=$('#form').val(); // cek form edit / form add
        var status = btn;
        if (form == '') {
            form = 'add_process';
        }else{
            form = 'edit_process';
        }
        var id_artikel_list=$('#id_artikel_list').val();
        // var id_artikel_kategori=$('#id_artikel_kategori').val();
        // var judul_artikel=$('#judul_artikel').val();
        // var isi=$('#isi').val();
        // var deskripsi_singkat=$('#deskripsi_singkat').val();
        //form add
        var dataForm=$('form#dataForm')[0];
        var data = new FormData(dataForm); 
        $.ajax({
            url: "<?php echo base_url('artikel/artikel_list/'); ?>" + form,
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

    // proses edit
    function form_edit(data_id=""){
        var url = "<?php echo base_url('artikel/artikel_list/show_detail') ?>";
      window.location.assign(url,data_id)
        //$("#form").val('edit_process'); // set untuk form edit
        $.ajax({// menggunakan ajax form
            url: "<?php echo base_url('artikel/Artikel_list/show_detail'); ?>",
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
                $("#id_artikel_kategori").val(output.data.id_artikel_kategori);
                $("#judul_artikel").val(output.data.judul_artikel);
                $("#isi").val(output.data.isi);
                $("#slug").val(output.data.slug);
                $("#id_artikel_kategori").val(output.data.id_artikel_kategori);

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
                url: "<?php echo base_url('artikel/Artikel_list/delete_process'); ?>",
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