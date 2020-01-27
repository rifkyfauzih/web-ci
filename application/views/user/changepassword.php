<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah Password</h1>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
     <div class="row justify-content-center">
      <div class="col-lg-4">   
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
      <div class="login-box">
        <div class="login-logo">
          <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
          <div class="card-body login-card-body">
            <?= $this->session->flashdata('message'); ?>
            <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
              <form action="<?= base_url('user/changepassword') ?>" method="post">
                <div class="form-group mb-3">
                  <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password">
                <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <input type="password" class="form-control" id="new_password1" name="new_password1" placeholder="New Password">
                <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="new_password2" name="new_password2" placeholder="Confirm Password">
                </div>
                <div class="row">
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Change password</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
            </div>
            <!-- /.login-card-body -->
          </div>
        </div>
        <!-- /.login-box -->
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->