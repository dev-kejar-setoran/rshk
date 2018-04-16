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
          <a href="#" class="section">Website</a>
          <i class="right chevron icon divider"></i>
          <div class="active section">Pustaka Kesehatan</div>
        </div>
        <h2 class="ui header">
          <div class="content">
            Pustaka Kesehatan
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
                    <input name="filter[judul]" placeholder="Judul" type="text">
                  </div>
                  <div class="field">
                    <input name="filter[deskripsi]" placeholder="Deskripsi" type="text">
                  </div>
                  <button type="button" class="ui teal icon filter button" data-content="Cari Data">
                    <i class="search icon"></i>
                  </button>
                  <button type="reset" class="ui icon reset button" data-content="Bersihkan Pencarian">
                    <i class="refresh icon"></i>
                  </button>
                  <div style="margin-left: auto; margin-right: 1px;">
                    <button type="button" class="ui blue add button" onclick="openFolderModal()">
                      <i class="folder icon"></i>
                      Tambah Folder
                    </button>
                    <button type="button" class="ui blue add button" onclick="openFileModal()">
                      <i class="plus icon"></i>
                      Tambah Data
                    </button>

                    <div class="ui icon layout buttons">
                      <button class="ui button" data-tab="block" data-content="Tile layout"><i class="block layout icon"></i></button>
                      <button class="ui button" data-tab="grid" data-content="Grid layout"><i class="list layout icon"></i></button>
                    </div>

                  </div>
                </div>
              </form>

              <div class="ui active tab" data-tab="block">
                <?php include('layout/block.php'); ?>
              </div>
              <div class="ui tab" data-tab="grid">
                <?php include('layout/grid.php'); ?>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <?php $this->load->view('templete/footer.php'); ?>
  </div>

  <?php include('modal.php') ?>
  <?php include('modal-folder.php') ?>
  
  <script>
  </script>

  <?php $this->load->view('templete/headerjs.php'); ?>
    

  <script>
    $(document).on('click', '.ulangi', function(e){
      window.location.reload();
    });

    function openFolderModal(){
      $('.ui.folder.modal')
      .modal({
        observeChanges: true,
        closable: false,
        detachable: false,
        onShow: function() {
          $('.ui.dropdown').dropdown();
        }
      })
      .modal('show')
      .modal("refresh");
    }
    function openFileModal(){
      $('.ui.file.modal')
      .modal({
        observeChanges: true,
        closable: false,
        detachable: false,
        onShow: function() {
          $('.ui.dropdown').dropdown();
        }
      })
      .modal('show')
      .modal("refresh");
    }

    $('.card').find('.three.buttons').slideUp(1)
    $('.layout.buttons button').tab()
    $('a.card').hover(function() {
      $(this).find('.three.buttons').slideDown(100)
    }, function(){
      $(this).find('.three.buttons').slideUp(100)
    });
  </script>
</body>
</html>
