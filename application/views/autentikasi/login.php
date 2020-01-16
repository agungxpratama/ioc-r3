<!DOCTYPE html>
<html>
<head>
 <?php $this->load->view("admin/_patrials/head.php") ?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo site_url(); ?>"><b>SI</b>EMPRE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login untuk masuk ke Aplikasi.</p>
      <font style="font-size: 10pt;color: red;"><?=$this->session->flashdata('alert');?></font>
      <form action="<?=base_url()?>index.php/autentikasi/cek_autentikasi" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
            <button type="submit" class="btn btn-primary btn-block"><a href="<?php echo site_url('index.php/home/') ?>">Link</a></button>
          </div>
          <!-- /.col -->
        </div>
      </form>


<?php $this->load->view("admin/_patrials/js.php") ?>

</body>
</html>
