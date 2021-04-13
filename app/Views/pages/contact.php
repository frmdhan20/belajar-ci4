<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-2">
	<div class="row">
		<div class="col">
			<h2>Contact Us</h2>

			<!-- looping -->
			<?php foreach ($alamat as $alm) : ?>
				<ul class="list-group col-5 mt-3">
				  <li class="list-group-item active" aria-current="true"><?= $alm['tipe']; ?></li>
				  <li class="list-group-item"><?= $alm['alamat']; ?></li>
				  <li class="list-group-item"><?= $alm['kota']; ?></li>
				</ul>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>