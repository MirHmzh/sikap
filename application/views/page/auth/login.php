<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SPN Polda Jatim 2020 </title>

    <!-- Bootstrap -->
    <link href="<?= base_url('assets/') ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('assets/') ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('assets/') ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url('assets/') ?>vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('assets/') ?>css/custom.min.css" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/images/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/images/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= base_url('assets/images/site.webmanifest') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <img src="<?= base_url('') ?>assets/images/logo.png" style="max-width: 100px; min-width: 100px;">
            <form action="" method="POST">
              <h1><B>SIKAP</B></h1>
              <p>(Sistem Informasi Kelengkapan Pendidikan)</p>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="username" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
              </div>
              <div>
                <!-- <a class="btn btn-default submit">Log in</a> -->
                <button type="submit" value="login" class="btn btn-info"> MASUK </button>
                <button type="button" value="#" class="btn btn-danger"> VERIFIKASI </button>
<!--                 <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>

              <!--<div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Verifikasi Akun Baru ?</p>
                  <p><a href="#signup" class="to_register"> Buat Akun Baru </a></p>
                <div class="clearfix"></div>-->
                <br />

                <!-- <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div> -->
                <div>
                  <p>©2021 SPN POLDA JATIM</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
