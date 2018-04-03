<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>PJNHK</title>

  <link rel="shortcut icon" href="favicon.ico">
  <?php if(isset($_headercss)){echo $_headercss;}?>

  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>assets/img/apple-touch-icon.png?v=zXr4R5YArk">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>assets/img/favicon-32x32.png?v=zXr4R5YArk">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>assets/img/favicon-16x16.png?v=zXr4R5YArk">
  <link rel="manifest" href="/manifest.json?v=zXr4R5YArk">
  <link rel="mask-icon" href="/safari-pinned-tab.svg?v=zXr4R5YArk" color="#5bbad5">
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.ico?v=zXr4R5YArk">
  <meta name="theme-color" content="#ffffff">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <style type="text/css">
  .description.logo {
    text-transform: uppercase;
  }
</style>

</head>

<body>
  <!-- Top content -->
  <div class="top-content">

    <div class="inner-bg">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-8">
            <div class="description logo">
              <h1>WEB PORTAL<br><small>PUSAT JANTUNG NASIONAL HARAPAN KITA</small></h1>
            </div>
            <img class="logo" src="<?php echo base_url();?>assets/img/icon.png" height="240" alt="Logo"/>
          </div>
          <div class="col-sm-6 col-md-4 form-box">
            <div class="form-bottom">
              <div class="">
                <div class="wrapper text-center">
                  <h4>LOGIN</h4>
                  <?php $message = $this->session->flashdata('message_login'); ?>
                  <?php if (!empty($message)): ?>
                    <div class="text-center m-t m-b"><a href="#" class="forget margin"><?php echo $message ?></a></div>
                  <?php endif ?>
                </div>
                <form role="form" action="<?php echo base_url();?>Auth/get_validation" method="post" class="login-form clearfix">
                  <div class="form-group">
                    <input type="email" name="email" placeholder="Email..." class="form-username form-control no-border" id="form-username" value="" pattern=".{2,40}" required title="2 to 40 characters" maxlength="40">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" placeholder="Kata Sandi..." class="form-password form-control no-border" id="form-password" pattern=".{2,30}" required title="2 to 30 characters" maxlength="30">
                  </div>
                  <label class="i-checks">
                    <input type="checkbox" name="remember" id="form-remember"> Biarkan saya tetap masuk
                  </label>
                  <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
                  <div class="text-center m-t m-b"><a href="#" class="forget margin">Lupa Kata Sandi?</a></div>
                </form>
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3 social-login">
              <!-- @yield('link') -->
            </div>
          </div>
        </div>
      </div>

    </div>
    
    <?php if(isset($_headerjs)){echo $_headerjs;}?>



</body>

</html>


