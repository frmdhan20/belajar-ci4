 <!-- halaman ini akan menggunakan file template yang ada dihalaman layout -->
 <?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
 <!-- class container supaya agak ketengah -->
 <div class="container mt-2">
 	<div class="row">
 		<div class="col">
 			<!-- jumbotron -->
 			 <div class="jumbotron">
			  <h1 class="display-4">Hallo Indonesia!</h1>
			  	<p class="lead">Saya sedang belajar CodeIgniter 4</p>
			  <hr class="my-4">
			  	<!-- blockquote -->
		  	  	<figure>
				  <blockquote class="blockquote quote">
				    <p>"Selama kau masih hidup kau memerlukan sebuah tujuan, <br> kalau kau tidak memiliki itu sama saja dengan mati sebelum <br> benar-benar mati"</p>
				  </blockquote>
				  <figcaption class="blockquote-footer">
				    fjr_rmdhan <cite title="Source Title">| frmdhan10@gmail.com</cite>
				  </figcaption>
			  	</figure>
			  	<!-- akhir blockquote -->
			  <a class="btn btn-primary btn-lg" href="/pages/about" role="button">About</a>
			</div>
 			<!-- akhir jumbotron -->
 		</div>
 	</div>
 </div>
<?= $this->endSection(); ?>