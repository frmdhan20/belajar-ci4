<!-- halaman ini akan menggunakan file template yang ada dihalaman layout -->
 <?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- class container supaya agak ketengah -->
<div class="container mt-2">
  <div class="row">
    <div class="col">
  <h1>About Me</h1>

  <!-- blockquote -->
            <figure>
              <blockquote class="blockquote italic quote">
                <p>"Tak perlu mematikan cahaya orang lain hanya untuk<br>membuat dirimu bercahaya, karena pribadi yang baik<br>akan tetap bersinar walau dimanapun dia berada"</p>
              </blockquote>
              <figcaption class="blockquote-footer">
                fjr_rmdhan <cite title="Source Title">| frmdhan10@gmail.com</cite>
              </figcaption>
            </figure>
          <!-- akhir blockquote -->
    </div>
  </div>
</div>
<?= $this->endSection(); ?>