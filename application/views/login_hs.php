<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Login HOTSPOT by ME
  </title>
  <!-- Favicon -->
  <link href="<?php echo base_url('template/assets/img/brand/favicon.png')?>" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="<?php echo base_url('template/assets/js/plugins/nucleo/css/nucleo.css')?>" rel="stylesheet" />
  <link href="<?php echo base_url('template/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="<?php echo base_url('template/assets/css/argon-dashboard.css?v=1.1.0')?>" rel="stylesheet" />
</head>

<body class="bg-default">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <a class="navbar-brand" href="#">
          <img src="<?php echo base_url('template/assets/img/brand/white.png')?>" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="#">
                  <img src="<?php echo base_url('template/assets/img/brand/blue.png')?>">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <!-- Navbar items -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="#">
                <i class="ni ni-planet"></i>
                <span class="nav-link-inner--text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="#">
                <i class="ni ni-circle-08"></i>
                <span class="nav-link-inner--text">Register</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="#">
                <i class="ni ni-key-25"></i>
                <span class="nav-link-inner--text">Login</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="#">
                <i class="ni ni-single-02"></i>
                <span class="nav-link-inner--text">Profile</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Welcome!</h1>
              <p class="text-lead text-light">Use these awesome forms to login or create new account in your project for free.</p>
              <form role="form" name="login" action="<?php echo base_url('mikrotik/login'); ?>" method="post">
                <div class="text-center">
                      <!-- hidden params -->
                  <input type="hidden" name="external-login" value="login">
                      <input type="hidden" name="mac" value="<?= $_POST['mac'] ?>">
                      <input type="hidden" name="ip" value="<?= $_POST['ip'] ?>">
                      <input type="hidden" name="link-login" value="<?= $_POST['link-login'] ?>">
                      <input type="hidden" name="link-orig" value="<?= $_POST['link-orig'] ?>">
                      <input type="hidden" name="error" value="<?= $_POST['error'] ?>">
                      <input type="hidden" name="chap-id" value="<?= $_POST['chap-id'] ?>">
                      <input type="hidden" name="chap-challenge" value="<?= $_POST['chap-challenge'] ?>">
                      <input type="hidden" name="link-login-only" value="<?= $_POST['link-login-only'] ?>">
                      <input type="hidden" name="link-orig-esc" value="<?= $_POST['link-orig-esc'] ?>">
                      <input type="hidden" name="mac-esc" value="<?= $_POST['mac-esc'] ?>">
                      <!-- end hidden params -->

                      <input style="width: 80px" name="username" type="hidden" value="<?= $_POST['mac'] ?>">
                      <input style="width: 80px" name="password" type="hidden" value="<?= $_POST['mac'] ?>">

                      <!--input type="submit" value="LOGINSSSS" /-->

                  <button type="submit" class="btn btn-secondary my-4">Log In</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>

    <footer class="py-5">
      <div class="container">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              © 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core   -->
  <script src="<?php echo base_url('template/assets/js/plugins/jquery/dist/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('template/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')?>"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="<?php echo base_url('template/assets/js/argon-dashboard.min.js?v=1.1.0')?>"></script>
  <!--
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
-->
</body>

</html>
