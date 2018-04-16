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
          <a href="#" class="section">Administasi</a>
          <i class="right chevron icon divider"></i>
          <div class="active section">Tanya Jawab</div>
        </div>
        <h2 class="ui header">
          <div class="content">
            Tanya Jawab
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
                    <input name="filter[judul]" placeholder="Judul Diskusi" type="text">
                  </div>
                  <div class="field">
                    <input name="filter[pengirim]" placeholder="Pengirim" type="text">
                  </div>
                  <div class="field">
                    <select name="field[kategori]" id="" class="ui dropdown selection">
                      <option value="">Pilih Kategori</option>
                      <option value="1">Kardiovaskuler</option>
                      <option value="2">Tips Kesehatan</option>
                    </select>
                  </div>
                  <button type="button" class="ui teal icon filter button" data-content="Cari Data">
                    <i class="search icon"></i>
                  </button>
                  <button type="reset" class="ui icon reset button" data-content="Bersihkan Pencarian">
                    <i class="refresh icon"></i>
                  </button>
                  <div style="margin-left: auto; margin-right: 1px;">
                    <!-- <button type="button" class="ui blue add button" onclick="openEditModal()">
                      <i class="plus icon"></i>
                      Tambah Data
                    </button> -->

                  </div>
                </div>
              </form>

              <table class="ui celled table">
                <thead class="center aligned">
                  <tr>
                    <th>No</th>
                    <th class="four wide column">Judul</th>
                    <th class="two wide column">User</th>
                    <th>Dokter</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Tanggal Entry</th>
                    <th class="one wide column">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="center aligned">1</td>
                    <td class="center aligned">Error iusto explicabo, molestias quos at ullam officia facere.</td>
                    <td class="center aligned">Alek Patel</td>
                    <td class="center aligned">dr. AMIN TJUBANDI , Sp.BTKV</td>
                    <td class="center aligned">Tips Kesehatan</td>
                    <td class="center aligned"><ui class="ui green fluid label">Open</ui></td>
                    <td class="center aligned">24/12/2018</td>
                    <td class="center aligned">
                      <button style="margin: .5rem 0" type="button" data-content="Ubah Data" data-id="" class="ui mini orange fluid icon edit button" onclick="openEditModal()"><i class="edit icon"></i></button>
                      <button style="margin: .5rem 0" type="button" data-content="Hapus Data" data-id="" class="ui mini red fluid icon delete button"><i class="trash icon"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td class="center aligned">2</td>
                    <td class="center aligned">Maiores ut molestias aliquam quisquam beatae quo, dolor architecto et adipisci debitis veritatis eveniet enim aliquid at placeat aperiam. Tempora, enim, magni.</td>
                    <td class="center aligned">Alek Patel</td>
                    <td class="center aligned">dr. AMIN TJUBANDI , Sp.BTKV</td>
                    <td class="center aligned">Kardiovaskuler</td>
                    <td class="center aligned"><ui class="ui red fluid label">Closed</ui></td>
                    <td class="center aligned">24/12/2018</td>
                    <td class="center aligned">
                      <button style="margin: .5rem 0" type="button" data-content="Lihat Data" data-id="" class="ui mini teal fluid icon edit button" onclick="openEditModal()"><i class="eye icon"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td class="center aligned">3</td>
                    <td class="center aligned">Nam quasi perspiciatis blanditiis, ab aspernatur quo reprehenderit!</td>
                    <td class="center aligned">Alek Patel</td>
                    <td class="center aligned">dr. AMIN TJUBANDI , Sp.BTKV</td>
                    <td class="center aligned">Kardiovaskuler</td>
                    <td class="center aligned"><ui class="ui red fluid label">Closed</ui></td>
                    <td class="center aligned">24/12/2018</td>
                    <td class="center aligned">
                      <button style="margin: .5rem 0" type="button" data-content="Jawab" data-id="i" class="ui mini blue fluid icon edit button"><i class="reply icon"></i></button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>

    <?php $this->load->view('templete/footer.php'); ?>
  </div>

  <?php include('modal.php') ?>

  <?php $this->load->view('templete/headerjs.php'); ?>

  <script>
    $(document).ready(function () {
      $('.start.time').calendar({
        type: 'time',
        ampm: false,
        onChange: function(){
          $('.end.time').calendar({
            type: 'time',
            ampm: false,
            startCalendar: $('.start.time')
          });
        }
      });
      $('.end.time').calendar({
        type: 'time',
        ampm: false,
        onChange: function(){
          $('.start.time').calendar({
            type: 'time',
            ampm: false,
            endCalendar: $('.end.time')
          });
        }
      });

     tinymce.init({
            selector: "#outside-mce",
            height: 200,
            menubar: true,
            plugins: [
              "advlist autolink lists link image charmap print preview anchor",
              "searchreplace visualblocks code fullscreen",
              "insertdatetime media table contextmenu paste code"
            ],
            toolbar: "undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            content_css: '//www.tinymce.com/css/codepen.min.css'
        });
        
        tinymce.init({
            selector: "#inside-mce",
            height: 200,
            menubar: true,
            plugins: [
              "advlist autolink lists link image charmap print preview anchor",
              "searchreplace visualblocks code fullscreen",
              "insertdatetime media table contextmenu paste code"
            ],
            toolbar: "undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            content_css: '//www.tinymce.com/css/codepen.min.css'
        });

    });

    function openEditModal(){
      $('.ui.modal')
      .modal({
        observeChanges: true,
        closable: false,
        detachable: false,
        autofocus: false,
        onVisible: function() {

          $('.ui.dropdown').dropdown();
          $(document).ready(function() {
            tinymce.init({ selector:'.editor', menubar: true});
          });
        }
      })
      .modal('show')
      .modal("refresh");
    }
  </script>
</body>
</html>
