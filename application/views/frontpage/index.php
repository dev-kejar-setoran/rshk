<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Pusat Jantung Nasional Harapan Kita</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">

  <link rel="stylesheet" type="text/css" href="../plugins/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../plugins/slick/slick.css">
  <link rel="stylesheet" type="text/css" href="../plugins/slick/slick-theme.css">
  <link rel="stylesheet" type="text/css" href="../css/front.css">
  <!-- @yield('css') -->
  <!-- @yield('styles') -->
</head>

<body id="app">

  <header class="fixed-top">
    <?php include('../partials/front/header.php'); ?>
  </header>

  <!-- Begin page content -->
  <main role="main">
    <div id="home-slider">
      <div class="slider-wrap" style="background-image:url('../img/backgrounds/bg-login.jpg')">
        <div class="slider-content">
          <h1>Medical Service <b>that you can trust.</b></h1>
          <span>nobis dicta quis blanditiis tempora eum dolor, voluptatem fugit dignissimos accusantium!</span>
        </div>
      </div>
      <div class="slider-wrap" style="background-image:url('https://images.unsplash.com/photo-1516574187841-cb9cc2ca948b?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=330667c4fcdc28d6d97e7e471593628c&auto=format&fit=crop&w=1500&q=80')">
        <div class="slider-content">
          <h1>Medical Service <b>that you can trust.</b></h1>
          <span>eveniet praesentium vero! Laudantium possimus ipsam, placeat perferendis modi dignissimos, facere dolorem.</span>
        </div>
      </div>
      <div class="slider-wrap" style="background-image:url('https://images.unsplash.com/photo-1512867957657-38dbae50a35b?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=36edb9f2443a079643add2e34f712149&auto=format&fit=crop&w=1055&q=80')">
        <div class="slider-content">
          <h1>Medical Service <b>that you can trust.</b></h1>
          <span>ducimus veniam eos enim perspiciatis quos, mollitia eius? Consequatur, nesciunt.</span>
        </div>
      </div>
    </div>
    <div id="services"></div>
  </main>

  <footer class="footer">
    <?php include('../partials/front/footer.php'); ?>
  </footer>

  <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="../plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="../plugins/fastclick/fastclick.js"></script>
  <script src="../plugins/slick/slick.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#home-slider').slick({
        dots: false,
        autoplay: true,
        autoplaySpeed: 5000,
        infinite: true,
        speed: 500,
        fade: true,
        pauseOnHover: false,
        pauseOnFocus: false,
        cssEase: 'linear'
      });
    });
  </script>
</body>
</html>
