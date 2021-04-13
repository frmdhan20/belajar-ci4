<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-8">
			<h1 class="mt-2">Daftar Penduduk Probolinggo 2020</h1>
		<form action="#" method="post">
			<!-- button addons bootstrap -->
		 <div class="input-group mb-3">
		  <input type="text" class="form-control" autofocus placeholder="Masukkan keyword pencarian.." name="keyword" autocomplete="off">
		  <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
		 </div>
		</div>
			<!-- akhir button addons bootstrap -->
	  </form>
	</div>
	<div class="row">
		<div class="col">
			<!-- table -->
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">No</th>
			      <th scope="col">Nama</th>
			      <th scope="col">Alamat</th>
			      <th scope="col">Aksi</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $i = 1 + (7 * ($currentPage - 1)); ?>
			  	<?php foreach($penduduk as $p ) : ?>
				    <tr>
				      <th scope="row"><?= $i++; ?></th>
				      <td><?= $p['nama']; ?></td>
				      <td><?= $p['alamat']; ?></td>
				      <td>
				      	<a href="/Penduduk/edit" class="btn btn-success">Edit</a>
				      	<a href="/Penduduk/delete" class="btn btn-danger">Hapus</a>
				     
				      </td>
				    </tr>
				<?php endforeach; ?>
			  </tbody>
			</table>
			<!-- akhir table -->

			<!-- paginate -->
			<?= $pager->links('penduduk', 'penduduk_pagination'); ?>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>