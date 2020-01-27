  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Permohonan</h1>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <section class="content">
      <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus mr-2"></i>Tambah Data Peserta</button>
      <table class="table">
        <tr>
          <th>No</th>
          <th>No. Surat</th>
          <th>Nama Peserta</th>
          <th>Gender</th>
          <th>Telepon</th>
          <th>Jurusan</th>
          <th>Status</th>
          <th>Tanggal Mulai</th>
          <th>Tanggal Berakhir</th>
          <th  colspan="2">Aksi</th>
        </tr>

        <?php 
        $no=1;
        foreach ($pengelompokan as $kelompok) : ?>
        <tr>
          <td><?= $no++ ?></td>
          <td>Nomor Surat</td>
          <td><?= $kelompok->nama_peserta ?></td>
          <td><?= $kelompok->gender ?></td>
          <td><?= $kelompok->telepon ?></td>
          <td><?= $kelompok->jurusan ?></td>
          <td><?= $kelompok->status ?></td>
          <td><?= $kelompok->tanggal_mulai ?></td>
          <td><?= $kelompok->tanggal_akhir ?></td>
          <td onclick="javascript: return confirm('Anda yakin hapus?')"><?= anchor('user/hapus/'.$kelompok->id_kelompok, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
          <td><?= anchor('user/edit/'.$kelompok->id_kelompok, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
        </tr>
      <?php endforeach; ?>
      </table>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">FORM INPUT DATA PESERTA</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('user/tambah_aksi'); ?>" method="post">
              <div class="form-group">
                <label>No Surat</label>
                <input type="text" name="no_surat" id="no_surat" class="form-control">
              </div>
              <div class="form-group">
                <label>Nama Peserta</label>
                <input type="text" name="nama_peserta" id="nama_peserta" class="form-control">
              </div>
              <div class="form-group">
                <label>Gender</label>
                <select class="custom-select mr-sm-2" name="gender" id="gender">
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label>Telepon</label>
                <input type="text" name="telepon" id="telepon" class="form-control">
              </div>
              <div class="form-group">
                <label>Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" class="form-control">
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="custom-select mr-sm-2" name="status" id="status">
                  <option value="Kerja Praktik">Kerja Praktik</option>
                  <option value="On The Job Training">On The Job Training</option>
                  <option value="Penelitian">Penelitian</option>
                </select>
              </div>
              <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control">
              </div>
              <div class="form-group">
                <label>Tanggal Berakhir</label>
                <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control">
              </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>  
    <br>
    <div class="container-fluid">
      <div>
        <p>Silahkan upload file permohonan dengan format file .pdf max 2mb</p>
        <?= $this->session->flashdata('message'); ?>
      </div>
            
        <?php echo form_open_multipart('User/create') ?>

          <label for="varchar">Upload File </label>
          <button type="submit">Upload</button>
          <input  id="filename" name="filename" type="file"  />
          <div class="embed-responsive embed-responsive-4by3">
          <iframe id="box" class="embed-responsive-1by1"></iframe>
          </div>
            
          <script type="text/javascript">
          inputBox = document.getElementById("filename"); // Mengambil elemen tempat Input gambar

           inputBox.addEventListener('change',function(input){ // Jika tempat Input Gambar berubah

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
        <?php echo form_close() ?>
        <br>
    </div>

 </div>
</div>
