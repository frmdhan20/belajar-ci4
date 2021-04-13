<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-8">
			<h2 class="my-3">Form Tambah Data Film</h2>
			<!-- form -->
			 <form action="/film/save" method="post" enctype="multipart/form-data">
			 	<?= csrf_field(); ?>
			  <div class="form-group row">
			    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" autofocus value="<?= old('judul'); ?>">
			      <!-- invalid-feedback dari bootstrap -->
			      <div class="invalid-feedback">
			      	<?= $validation->getError('judul'); ?>
				  </div>
			    </div>
			  </div>

			  <div class="form-group row my-2">
			    <label for="produser" class="col-sm-2 col-form-label">Produser</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control <?= ($validation->hasError('produser')) ? 'is-invalid' : ''; ?>" id="produser" name="produser" value="<?= old('produser'); ?>">
			      <!-- invalid-feedback dari bootstrap -->
			      <div class="invalid-feedback">
			      	<?= $validation->getError('produser'); ?>
				  </div>
			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="sutradara" class="col-sm-2 col-form-label">Sutradara</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control <?= ($validation->hasError('sutradara')) ? 'is-invalid' : ''; ?>" id="sutradara" name="sutradara" value="<?= old('sutradara'); ?>">
			      <!-- invalid-feedback dari bootstrap -->
			      <div class="invalid-feedback">
			      	<?= $validation->getError('sutradara'); ?>
				  </div>
			    </div>
			  </div>

			  <div class="form-group row my-2">
			    <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control <?= ($validation->hasError('tahun')) ? 'is-invalid' : ''; ?>" id="tahun" name="tahun" value="<?= old('tahun'); ?>">
			      <!-- invalid-feedback dari bootstrap -->
			      <div class="invalid-feedback">
			      	<?= $validation->getError('tahun'); ?>
				  </div>
			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
			    <!-- preview img -->
			    <div class="col-sm-2">
			    	<img src="/img/defa2.jpg" class="img-thumbnail img-preview">
			    </div>
			    <!-- akhir preview img -->
			    <div class="col-sm-8">
			      <!-- file browser bootstrap -->
			        <div class="custom-file">
					  <input type="file" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" onchange="previewImg()">
					  <!-- invalid-feedback dari bootstrap -->
				      <div class="invalid-feedback">
				      	<?= $validation->getError('gambar'); ?>
					  </div>
					  <label class="custom-file-label" for="gambar">Pilih gambar..</label>
					</div>
			      <!-- akhir file browser bootstrap -->
			    </div>
			  </div>
			  
			  <div class="form-group row mt-3">
			    <div class="col-sm-10">
			      <button type="submit" class="btn btn-primary">Tambah Data</button>
			    </div>
			  </div>
			</form>
			<!-- akhir form -->
		</div>
	</div>
</div>

<?= $this->endSection(); ?>