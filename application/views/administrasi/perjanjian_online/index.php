<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PJNHK | Backend</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="shortcut icon" type="image/x-icon" href="../../../favicon.ico">

  <link rel="stylesheet" type="text/css" href="../../../semantic/semantic.min.css">
  <link rel="stylesheet" href="../../../plugins/sweetalert/sweetalert2.min.css">
  <link rel="stylesheet" href="../../../plugins/semanticui-calendar/calendar.min.css">

  <link rel="stylesheet" href="../../../css/app.css">
  <style type="text/css">
  .ui.file.input input[type="file"] {
    display: none;
  }
  .ui.button>.ui.floated.label {
    position: absolute;
    top: 15px;
    right: -10px;
  }
  .table tr th{
    white-space: nowrap;
  }
  label.bold {
    font-weight: bold
  }
  .center-label {
    display: flex!important;
    align-items: center;
  }
  .center-label label {
    flex: auto
  }
</style>
<!-- @yield('css') -->
<!-- @yield('styles') -->
</head>

<body id="app">

  <header>
    <?php include('../../../partials/header.php'); ?>
  </header>

  <!-- <div class="ui sidebar inverted visible vertical menu">
    <?php include('../../../partials/sidebar.php'); ?>
  </div> -->

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

    <?php include('../../../partials/footer.php'); ?>

    <div v-cloak>
      <!-- @yield('additional') -->
    </div>
  </div>

  <?php include('modal-confirmation.php') ?>

  <script>
  </script>
  <!-- <script src="../../../js/es6-promise.auto.min.js"></script> -->

  <script src="../../../plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="../../../plugins/jQuery/jquery.form.min.js"></script>
  <script src="../../../plugins/jQueryUI/jquery-ui.min.js"></script>
  <script src="../../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="../../../plugins/fastclick/fastclick.js"></script>
  <script src="../../../plugins/sweetalert/sweetalert2.min.js"></script>
  <script src="../../../plugins/semanticui-calendar/calendar.min.js"></script>
  <script src="../../../semantic/semantic.min.js"></script>

  <script src="../../../js/mfs-script.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.5/Chart.min.js">></script>
  <script src="../../../js/dummy.js"></script>

  <script>
    openConfirmationModal = function(){
      $('.ui.confirmation.modal').modal({
        observeChanges: true,
        closable: false,
        detachable: false,
        autofocus: false
      })
      .modal('show')
      .modal("refresh");
    }
    
    $(document).ready(function () {
      $('.pusher').removeClass('shown')
      $('.toggler').hide()

      $('.menu .item').tab()
      $('.date').calendar({
        type: 'date',
        formatter: {
          date: function (date, settings) {
            if (!date) return '';
            var day = date.getDate() + '';
            if (day.length < 2) {
              day = '0' + day;
            }
            var month = (date.getMonth() + 1) + '';
            if (month.length < 2) {
              month = '0' + month;
            }
            var year = date.getFullYear();
            return day + '/' + month + '/' + year;
          },
        }
      })
      $('.time').calendar({
        type: 'time',
        ampm: false
      })

      $('.first.button').on('click', function() {
        $.tab('change tab', 'first');
        $('.step[data-tab="first"]').removeClass('completed').addClass('active')
        $('.step[data-tab="second"]').addClass('disabled').removeClass('active')
      });
      $('.second.button').on('click', function() {
        $.tab('change tab', 'second');
        if($('.step[data-tab="first"]').hasClass('active')){
          $('.step[data-tab="first"]').addClass('completed').removeClass('active')
          $('.step[data-tab="second"]').addClass('active').removeClass('disabled')
        }else{
          $('.step[data-tab="third"]').addClass('disabled').removeClass('active')
          $('.step[data-tab="second"]').addClass('active').removeClass('completed disabled')
        }
      });
      $('.third.button').on('click', function() {
        $.tab('change tab', 'third');
        $('.step[data-tab="second"]').addClass('completed').removeClass('active')
        $('.step[data-tab="third"]').addClass('active').removeClass('disabled')
      });
    });
  </script>
</body>
</html>
