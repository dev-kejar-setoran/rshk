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
         <a href="#" class="section">Master</a>
         <i class="right chevron icon divider"></i>
         <div class="active section">Rumah Sakit</div>
       </div>
       <h2 class="ui header">
         <div class="content">
          Rumah Sakit
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
             <div class="field">
              <input name="filter[cara_bayar]" placeholder="Rumah Sakit" type="text">
            </div>
            <button type="button" class="ui teal icon filter button" data-content="Cari Data">
              <i class="search icon"></i>
            </button>
            <button type="reset" class="ui icon reset button" data-content="Bersihkan Pencarian">
              <i class="refresh icon"></i>
            </button>
            <div style="margin-left: auto; margin-right: 1px;">
              <button type="button" class="ui blue add button" onclick="createModal();">
                <i class="plus icon"></i>
                Tambah Data
              </button>

            </div>
          </div>
        </form>

        <table class="ui celled table">
         <thead class="center aligned">
           <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. Telepon</th>
            <th>Tanggal Entry</th>
            <th>Oleh</th>
            <th class="two wide column">Aksi</th>
          </tr>
        </thead>
        <tbody>

        <?php
          $no=1;
          if (is_array($data) || is_object($data)){
            
            foreach($data as $getRS){ 
              
        ?>
          <tr>
            <td class="center aligned"><?php echo $no++; ?></td>
            <td class="center aligned"><?php echo $getRS['nama_rumah_sakit']; ?></td>
            <td class="center aligned"><?php echo $getRS['alamat']; ?></td>
            <td class="center aligned"><?php echo $getRS['no_telp']; ?></td>
            <td class="center aligned"><?php echo $getRS['created_at']; ?></td>
            <td class="center aligned"><?php echo $getRS['created_by']; ?></td>
            <td class="center aligned">
              <button type="button" data-content="Ubah Data" data-id="" class="ui mini orange icon edit button" onclick="updateModal()"><i class="edit icon"></i></button>
              <button type="button" data-content="Hapus Data" data-id="" class="ui mini red icon button" onclick="deleteModal(<?php echo $getRS['id_rumah_sakit'];?>)"><i class="trash icon"></i></button>
            </td>
          </tr>
            <?php }}; ?>
      </tbody>
    </table>
  </div>
</div>
</div>

</div>
</div>

<?php $this->load->view('templete/footer.php'); ?>

</div>

<?php include('modal.php'); ?>
  <?php $this->load->view('templete/headerjs.php'); ?>
  <script>
    function createModal(){
      $('.create')
      .modal({
        onDeny    : function(){
          window.alert('Batal Simpan ?');
          
        },
        onApprove : function() {
          $.ajax({
         type: "POST",
         url: "<?php echo base_url();?>rumah_sakit/createRS", 
         data: {
            nama: $("#nama").val(),
            alamat: $("#alamat").val(),
            no_telp: $("#no_telp").val()
          },
         dataType: "text",  
         cache:false,
         success: 
              function(data){
                window.alert('Data Berhasil Disimpan');  //as a debugging message.
              }
          });
        }
      })
      .modal('show')
      .modal("refresh");
    }
    function updateModal(){
      $('.update')
      .modal({
        onDeny    : function(){
          window.alert('Batal Simpan ?');
          
        },
        onApprove : function() {
          window.alert('Data Berhasil Disimpan');
        }
      })
      .modal('show')
      .modal("refresh");
    }
    function deleteModal(id){
      var id = id;
      console.log(id);
      $('.delete')
      .modal({
        onDeny    : function(){
          window.alert('Batal Hapus ?');
          
        },
        onApprove : function() {
          $.ajax({
         type: "POST",
         url: "<?php echo base_url();?>rumah_sakit/delete_RS", 
         data: {
            id: id
          },
         dataType: "text",  
         cache:false,
         success: 
              function(data){
                window.alert('Data Berhasil Dihapus');  //as a debugging message.
              }
          });
        }
      })
      .modal('show')
      .modal("refresh");
    }
  </script>
</body>
</html>
