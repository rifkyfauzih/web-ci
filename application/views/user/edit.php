<div class="content-wrapper">
	<section class="content">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				
		<?php foreach($pengelompokan as $kelompok) { ?>
		<form method="post" action="<?= base_url('user/update') ?>">
			<div class="row">
				
			<div class="col-lg">
				
			<div class="form-group">
				<label>Nama Peserta</label>
				<input type="hidden" name="id_kelompok" id="id_kelompok" class="form-control" value="<?= $kelompok->id_kelompok ?>">
				<input type="text" name="nama_peserta" id="nama_peserta" class="form-control" value="<?= $kelompok->nama_peserta ?>">
			</div>

			<div class="form-group">
				<label>Gender</label>
				<select class="custom-select mr-sm-2" name="gender" id="gender" value="<?= $kelompok->gender ?>">
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
			</div>

			<div class="form-group">
				<label>Telepon</label>
				<input type="text" name="telepon" id="telepon" class="form-control" value="<?= $kelompok->telepon ?>">
			</div>

			<div class="form-group">
				<label>Jurusan</label>
				<input type="text" name="jurusan" id="jurusan" class="form-control" value="<?= $kelompok->jurusan ?>">
			</div>

			<div class="form-group">
				<label>Status</label>
				 <select class="custom-select mr-sm-2" name="status" id="status" value="<?= $kelompok->status ?>">
                  <option value="Kerja Praktik">Kerja Praktik</option>
                  <option value="On The Job Training">On The Job Training</option>
                  <option value="Penelitian">Penelitian</option>
                </select>
			</div>

			<div class="form-group">
				<label>Tanggal Mulai</label>
				<input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" value="<?= $kelompok->tanggal_mulai ?>">
			</div>

			<div class="form-group">
				<label>Tanggal Berakhir</label>
				<input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" value="<?= $kelompok->tanggal_akhir ?>">
			</div>

			<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
			</div>
		</form>
	    <?php } ?>
			</div>
	</div>
	</section>
</div>