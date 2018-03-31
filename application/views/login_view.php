
<div class="login-box" style="margin-left:200px; margin-top: 130px;">
  <div class="login-logo" style="margin-left: -130px;">
    <a href="" style="color: #fff;"><i class="fa fa-fw fa-industry"></i> <b>BBO</b> Support</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="">
    <p class="login-box-msg"></p>

    <form action="<?php echo base_url('auth/get_validation')?>" method="post">
      <div class="form-group has-feedback" style="background-color: #fff;">
        <input type="text" name='username' class="form-control" placeholder="Username" >
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name='password' class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">

        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>