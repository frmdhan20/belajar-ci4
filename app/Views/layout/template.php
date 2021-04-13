<!-- gabungan header & footer -->
<!-- header -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- My CSS / Eksternal CSS -->
    <link rel="stylesheet" href="/mycss/style.css">

    <title><?= $title; ?></title>
  </head>
  <body>

  	<!-- memanggil navbar -->
  	<?= $this->include('layout/navbar'); ?>

  	<!-- memanggil content/isi -->
   <?= $this->renderSection('content'); ?>

  <!-- footer -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- js untuk preview gambar -->
    <script>
    	function previewImg() {
    	const gambar 	  = document.querySelector('#gambar');
    	const gambarLabel = document.querySelector('.custom-file-label');
    	const imgPreview  = document.querySelector('.img-preview');

    	gambarLabel.textContent = gambar.files[0].name;


    	const fileGambar = new FileReader();
    	fileGambar.readAsDataURL(gambar.files[0]);

    	fileGambar.onload  = function(e) {
    		imgPreview.src = e.target.result;
    	  }
    	}
    </script>

  </body>
</html>