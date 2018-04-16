<!DOCTYPE html>
<html>
  <?php $this->load->view('templete/head.php'); ?>
<body id="app">
  <header>
    <?php $this->load->view('templete/header.php'); ?>
  </header>
  <div class="ui sidebar inverted visible vertical menu">
    <?php $this->load->view('templete/sidebar.php'); ?>
  </div>
  <div id="cover">
    <div class="ui active inverted dimmer">
      <div class="ui text loader">Loading</div>
    </div>
  </div>
  <div class="pusher content shown">
    <message></message>
    <div class="main ui fluid container" id="main-container">
      <div class="title-container">
        <div class="ui breadcrumb">
          <a href="#" class="section"><i class="home icon"></i></a>
          <i class="right chevron icon divider"></i>
          <a href="#" class="section">Setting</a>
          <i class="right chevron icon divider"></i>
          <a href="<?php echo base_url('setting/hak_akses/') ?>"  class="section">Hak Akses</a>
          <i class="right chevron icon divider"></i>
          <div class="active section">List Menu</div>
        </div>
        <h2 class="ui header">
          <div class="content">
            List Menu
            <div class="sub header"> </div>
          </div>
        </h2>
      </div>
      <div class="ui clearing divider" style="border-top: none !important; margin:10px"></div>
      <div class="ui grid">
        <div class="sixteen wide column main-content">
          <div class="ui segments">
            <div class="ui segment">
              <form class="ui filter form">
                <div class="inline fields">
                  <div style="margin-left: auto; margin-right: 1px;">
                    <a href="<?php echo base_url('setting/hak_akses/') ?>" class="ui blue add button">
                      <i class="arrow alternate circle left icon"></i>
                      Kembali
                    </a>
                  </div>
                </div>
              </form>
              <!-- <form id="dataForm" > -->
              <form id="dataForm" action="<?php echo base_url('setting/hak_akses/save') ?>" method="post">
                <input type="hidden" name="role" id="role" value="<?php echo $role; ?>">
                <table id="tb_data" class="display ui celled tabl" style="width:100%">
                  <thead>
                      <tr>
                      <th width="5%">No</th>
                      <th width="5%">#</th>
                      <th width="70%">Nama Menu</th>
                      <th width="20%">Urutan Menu</th>
                      </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <td colspan="4"> 
                        <button type="submit" class="ui primary right labeled icon button submit" id="btn_simpan">
                          Simpan
                          <i class="save icon"></i>
                        </button>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('templete/footer.php'); ?>
    <div v-cloak>
      <!-- @yield('additional') -->
    </div>
  </div>
  <?php $this->load->view('templete/headerjs.php'); ?>
  <?php include('modal.php') ?>
</body>
</html> 
<?php $msg = $this->session->flashdata('pesan') ?>
<?php if (!empty($msg)) : ?>
    <script type="text/javascript">
    $(document).ready(function(){
      swal("<?php echo $msg['response']['title'] ?>", "<?php echo $msg['response']['pesan'] ?>", "<?php echo $msg['response']['type'] ?>");
      
    });
    </script>
<?php endif ?>

<!--  call event function -->
<script type="text/javascript">
    $(document).ready(function(){
        load(); // load tb
        //click simpan 
        $("#btn_simpan").click(function(){   
            //closeModal();
            simpan();
        });

    });
</script>
<!-- Function detail :  -->
<script type="text/javascript">
    // load data table
    function load() {
        closeModal();
        var role = $('#role').val();
        var t_table = $('#tb_data').DataTable();
        t_table.destroy();
        t_table = $('#tb_data').DataTable( {
            "ajax": {
                "url": "<?php echo base_url('setting/hak_akses/load_menu_json') ?>",
                "type": "POST",
                "data": {"role": role },
            },
            "language": {
              "emptyTable": "No data available in table",
              "zeroRecords": "No records to display"
            },
            searching: false,
            paging: false,
        } );
       // t_table.destroy();
    } 



    // proses tambah data
    function simpan() {        
        var role = $('#role').val();
        $.ajax({
            url: "<?php echo base_url('setting/hak_akses/edit_process'); ?>",
            type: "POST",
            data : { 
                      'role': role
                    },
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
    // proses tambah data
    function simpan2() {        

        var data_fields = $("#dataForm").serialize();
        var role = $('#role').val();
        var checklist_menu = '';
        //var checklist_menu = $("input[type='checkbox']").val();
        //alert(checklist_menu);
        $.ajax({
            url: "<?php echo base_url('setting/hak_akses/edit_process'); ?>",
            type: "POST",
            data : { 
                      'role': role,
                      'checklist_menu': checklist_menu,
                    },
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
                url: "<?php echo base_url('setting/hak_akses/delete_process'); ?>",
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
                    swal(msg.title, msg.pesan, msg.type);
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