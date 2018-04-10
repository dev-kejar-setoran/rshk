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
          <div class="active section">Perjanjian Online</div>
        </div>
        <h2 class="ui header">
          <div class="content">
            Perjanjian Online
            <div class="sub header"> </div>
          </div>
        </h2>
      </div>

      <div class="ui clearing divider" style="border-top: none !important; margin:10px"></div>
      
      <form action="" class="ui data form">
        <div class="ui centered grid">
          <div class="twelve wide column main-content">

            <div class="ui three steps">
              <div class="active step" data-tab="first">
                <i class="clipboard icon"></i>
                <div class="content">
                  <div class="title">Applicant</div>
                  <div class="description">Diisi oleh pasien atau perwakilan</div>
                </div>
              </div>
              <div class="disabled step" data-tab="second">
                <i class="user icon"></i>
                <div class="content">
                  <div class="title">Data Pasien</div>
                  <div class="description">Identitas dan keterangan pasien</div>
                </div>
              </div>
              <div class="disabled step" data-tab="third">
                <i class="calendar icon"></i>
                <div class="content">
                  <div class="title">Buat Perjanjian</div>
                  <div class="description">Pilih rumah sakit, dokter dan waktu perjanjian</div>
                </div>
              </div>
            </div>
            <div class="ui active transition fade in tab" data-tab="first">
              <?php include('steps/first.php') ?>
            </div>
            <div class="ui transition fade in tab" data-tab="second">
              <?php include('steps/second.php') ?>
            </div>
            <div class="ui transition fade in tab" data-tab="third">
              <?php include('steps/third.php') ?>
            </div>
          </div>
        </div>
      </form>
    </div>

    <?php $this->load->view('templete/footer.php'); ?>
    <div v-cloak>
      <!-- @yield('additional') -->
    </div>
  </div>

  <?php $this->load->view('templete/headerjs.php'); ?>

  <?php include('modal-confirmation.php') ?>
  <?php include('modal-history.php') ?>
  <?php include('modal.php') ?>
  <?php include('js.php') ?>

  </body>
</html>