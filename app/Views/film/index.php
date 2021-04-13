<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
	<div class="row">
		<div class="col">
			<!-- table -->
			<a href="/film/create" class="btn btn-primary mt-3">Tambah data film</a>
			<h1 class="mt-2">Daftar Rekomendasi Film</h1>

			<!-- flash atau pemberitahuan menggunakan alert -->
			<?php if (session()->getFlashdata('pesan')) : ?>
				<div class="alert alert-success" role="alert">
  				 <?= session()->getFlashdata('pesan'); ?>
				</div>
			<?php endif; ?>

			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">No</th>
			      <th scope="col">Gambar</th>
			      <th scope="col">Judul</th>
			      <th scope="col">Aksi</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $i = 1; ?>
			  	<?php foreach($film as $f ) : ?>
				    <tr>
				      <th scope="row"><?= $i++; ?></th>
				      <td><img src="img/<?= $f['gambar']; ?>" class="sampul"></td>
				      <td><?= $f['judul']; ?></td>
				      <td>
				      	<a href="/film/<?= $f['slug']; ?>" class="btn btn-success">Detail</a>
				      </td>
				    </tr>
				<?php endforeach; ?>
			  </tbody>
			</table>
			<!-- akhir table -->
		</div>
	</div>
</div>
<?= $this->endSection(); ?>