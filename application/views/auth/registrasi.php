<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="<?= base_url('assets') ?>/index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="<?= base_url('auth/registrasi'); ?>" method="post">
        <div class="form-group mb-4">
        <div class="input-group mb-2">
          <input type="text" class="form-control" name="nama_institusi" id="nama_institusi" value="<?= set_value('nama_institusi'); ?>" placeholder="Nama Institusi">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
          <?= form_error('nama_institusi', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="form-group mb-4">
        <div class="input-group mb-2">
          <input type="text" id="email_institusi" name="email_institusi" value="<?= set_value('email_institusi'); ?>" class="form-control" placeholder="Email Institusi">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
          <?= form_error('email_institusi', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="form-group mb-4">
        <div class="input-group mb-2">
          <input type="text" class="form-control" id="telepon_institusi" name="telepon_institusi" value="<?= set_value('telepon_institusi'); ?>" placeholder="Nomor Telpon Institusi">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
          <?= form_error('telepon_institusi', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="input-group mb-2">
          <select class="form-control" id="status" name="status">
            <option>Pilih Institusi..</option>
            <option value="universitas">Universitas</option>
            <option value="sekolah">Sekolah</option>
            <option value="lembaga">Lembaga</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-university"></span>
            </div>
          </div>
        </div>
       
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      <a href="<?= base_url('auth'); ?>" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js"></script>
</body>
</html>