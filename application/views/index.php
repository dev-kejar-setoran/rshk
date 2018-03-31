<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PJNHK</title>

    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css" type="text/css" />

    <link rel="stylesheet" href="css/login-style.css">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=zXr4R5YArk">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v=zXr4R5YArk">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v=zXr4R5YArk">
    <link rel="manifest" href="/manifest.json?v=zXr4R5YArk">
    <link rel="mask-icon" href="/safari-pinned-tab.svg?v=zXr4R5YArk" color="#5bbad5">
    <link rel="shortcut icon" href="/favicon.ico?v=zXr4R5YArk">
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
                        <img class="logo" src="img/icon.png" height="240" alt="Logo"/>
                    </div>
                    <div class="col-sm-6 col-md-4 form-box">

                        <div class="form-bottom">
                            <div class="">
                                <div class="wrapper text-center">
                                    <h4>LOGIN</h4>
                                </div>
                                <form role="form" action="pages/dashboard.php" method="post" class="login-form clearfix">
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

    </body>

</html>
