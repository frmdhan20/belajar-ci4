<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
	<div class="row">
		<div class="col">
			<h2 class="mt-2">Detail Film</h2>
			<!-- card -->
			   <div class="card mb-2" style="max-width: 540px;">
				  <div class="row g-0 my-2 ms-2">
				    <div class="col-md-4">
				       <img img src="/img/<?= $film['gambar']; ?>" class="card-img">
				    </div>
				    <div class="col-md-8">
				      <div class="card-body">
				        <h5 class="card-title"><?= $film['judul']; ?></h5>
				        <p class="card-text"><b>Produser : </b> <?= $film['produser']; ?></p>
				        <p class="card-text"><small class="text-muted"><b>Tahun : </b><?= $film['tahun']; ?></small></p>

				        <a href="/film/edit/<?= $film['slug']; ?>" class="btn btn-success">Edit</a>

				        <!-- form delete -->
				         <form action="/film/<?= $film['id']; ?>" method="post" class="d-inline">
				         	<?= csrf_field(); ?>
				         	<input type="hidden" name="_method" value="DELETE">
				         	<button type="submit" class="btn btn-danger" onclick="return confirm('Yaakin data ini dihapus ?');">Hapus</button>
				         </form>
				        <!-- akhir form delete -->
				        <a href="/film" class="text-decoration-none">Kembali ke daftar film</a>
				      </div>
				    </div>
				  </div>
				</div>
			<!-- alhir card -->
		</div>
	</div>
</div>
<?= $this->endsection(); ?>