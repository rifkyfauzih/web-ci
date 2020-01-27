<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
       
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->
    <section class="content">
       <div class="row justify-content-center">
      <div class="col-lg-7">   
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <?= $this->session->flashdata('message'); ?>
                   <!-- general form elements -->
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Profil Institusi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="<?= base_url('user/profil') ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="varchar">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?= set_value('alamat'); ?>" placeholder="Masukkan Alamat">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="varchar">PIC</label>
                    <input type="text" class="form-control" name="pic" id="pic" value="<?= set_value('pic'); ?>" placeholder="Masukkan Nama PIC">
                    <?= form_error('pic', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="varchar">NIP PIC</label>
                    <input type="text" class="form-control" name="nip_pic" id="nip_pic" value="<?= set_value('pic'); ?>" placeholder="Masukkan NIP PIC">
                    <?= form_error('pic', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="varchar">Telepon / WA PIC</label>
                    <input type="text" class="form-control" name="telepon" id="telepon" value="<?= set_value('telepon'); ?>" placeholder="Masukkan Nomor Telepon PIC">
                    <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="varchar">Profil Institusi</label> <br>
                    <input type="file" name="profil_kampus" id="profil_kampus">
                    <?= form_error('profil_kampus', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
              </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->