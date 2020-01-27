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
                <h3 class="card-title">Upload Berkas Persyaratan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php echo form_open_multipart('User/uploadMultiple') ?>
              <div class="card-body">
                <h4>Silahkan Upload Berkas Persyaratan</h4>

                  <div class="form-group mt-3">
                    <label for="varchar">BPJS Kesehatan</label> <br>
                    <input type="file" name="bpjs_kesehatan" id="bpjs_kesehatan">
                    <div id="bpjs_kesehatan2" class="embed-responsive embed-responsive-4by3" style="width: 0px">
                      <embed id="box" type="application/pdf" width="100%" height="500px"></embed>
                    </div>
                     <script type="text/javascript">
                      inputBox = document.getElementById("bpjs_kesehatan"); // Mengambil elemen tempat Input gambar

                       inputBox.addEventListener('change',function(input){ // Jika tempat Input Gambar berubah

                        $('#bpjs_kesehatan2').removeAttr('style');

                        var box = document.getElementById("box"); // mengambil elemen box
                        var img = input.target.files; // mengambil gambar
                        
                        var reader = new FileReader(); // memanggil pembaca file/gambar
                        reader.onload = function(e){ // ketika sudah ada
                         box.setAttribute('src',e.target.result); // membuat alamat gambar
                        }
                        reader.readAsDataURL(img[0]); // menampilkan gambar
                       }
                      ); 
                      </script>
                  </div>
                  <div class="form-group">
                    <label for="varchar">BPJS Ketenagakerjaan</label> <br>
                    <input type="file" name="bpjs_ketenagakerjaan" id="bpjs_ketenagakerjaan">
                    <div id="bpjs_ketenagakerjaan2" class="embed-responsive embed-responsive-4by3" style="width: 0px">
                      <embed id="box1" type="application/pdf" width="100%" height="500px"></embed>
                    </div>
                    <script type="text/javascript">
                      inputBox = document.getElementById("bpjs_ketenagakerjaan"); // Mengambil elemen tempat Input gambar

                       inputBox.addEventListener('change',function(input){ // Jika tempat Input Gambar berubah

                        $('#bpjs_ketenagakerjaan2').removeAttr('style');

                        var box = document.getElementById("box1"); // mengambil elemen box
                        var img = input.target.files; // mengambil gambar

                        var reader = new FileReader(); // memanggil pembaca file/gambar
                        reader.onload = function(e){ // ketika sudah ada
                         box.setAttribute('src',e.target.result); // membuat alamat gambar
                        }
                        reader.readAsDataURL(img[0]); // menampilkan gambar
                       }
                      ); 
                      </script>
                  </div>
                  <div class="form-group">
                    <label for="varchar">Surat Keterangan Berbadan Sehat</label> <br>
                    <input type="file" name="skbs" id="skbs">
                    <div id="skbs2" class="embed-responsive embed-responsive-4by3" style="width: 0px">
                      <embed id="box2" type="application/pdf" width="100%" height="500px"></embed>
                    </div>
                    <script type="text/javascript">
                      inputBox = document.getElementById("skbs"); // Mengambil elemen tempat Input gambar

                       inputBox.addEventListener('change',function(input){ // Jika tempat Input Gambar berubah

                        $('#skbs2').removeAttr('style');

                        var box = document.getElementById("box2"); // mengambil elemen box
                        var img = input.target.files; // mengambil gambar

                        var reader = new FileReader(); // memanggil pembaca file/gambar
                        reader.onload = function(e){ // ketika sudah ada
                         box.setAttribute('src',e.target.result); // membuat alamat gambar
                        }
                        reader.readAsDataURL(img[0]); // menampilkan gambar
                       }
                      ); 
                      </script>
                  </div>
                  <div class="form-group">
                    <label for="varchar">Foto Ukuran 3x4</label> <br>
                    <input type="file" name="foto" id="foto">
                    <div id="foto2" class="embed-responsive embed-responsive-4by3" style="width: 0px">
                      <embed id="box3" type="application/pdf"></embed>
                    </div>
                    <script type="text/javascript">
                      inputBox = document.getElementById("foto"); // Mengambil elemen tempat Input gambar

                       inputBox.addEventListener('change',function(input){ // Jika tempat Input Gambar berubah

                        $('#foto2').removeAttr('style');

                        var box = document.getElementById("box3"); // mengambil elemen box
                        var img = input.target.files; // mengambil gambar

                        var reader = new FileReader(); // memanggil pembaca file/gambar
                        reader.onload = function(e){ // ketika sudah ada
                         box.setAttribute('src',e.target.result); // membuat alamat gambar
                        }
                        reader.readAsDataURL(img[0]); // menampilkan gambar
                       }
                      ); 
                      </script>
                  </div>
              </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              <?php echo form_close() ?>
            </div>
            <!-- /.card -->
              </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->