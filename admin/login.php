<?php require_once("config.php"); ?>
<?php require_once("database.php"); ?>
<?php require_once("user.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("session.php"); ?>
<?php
  if($session->is_logged_in()) {
    redirect_to("index.php");
  }
?>
<?php include("header.php"); ?>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a ><b>RIT ADMISSION</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Administrator Login</p>

    <form action="login_process.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
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
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="../static/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../static/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../static/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
