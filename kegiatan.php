<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="styles.css">

    <title></title>

    <style>

      /* gallery */
      .gallery-img {
        transition: transform 0.3s ease, opacity 0.3s ease;
        opacity: 0.9;
      }

      .gallery-img:hover {
        transform: scale(1.1); /* Zoom-in effect */
        opacity: 1; /* Gambar lebih terang */
        cursor: pointer; /* Mengubah kursor menjadi tangan */
      }


    </style>
  </head>
  <body>
      <!-- Navbar Section -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); background-color: #3C552D;">
  <div class="container links-white">
  <a class="Logo" href="#"><img src="img/logo.png" alt="logo" style="width: 70px;"></a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto links-white">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tentang.php">tentang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">Program</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="kegiatan.php">kegiatan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="donasi.php">Donasi</a>
        </li>
    </div>
  </div>
</nav>
    <!-- Navbar -->
<!-- Header -->
<header class="parallax-header">
    <h1>KEGIATAN</h1>
  </header>
  <section class="content-section">
    <!-- Gallery Section -->
    <section class="gallery-section py-5" id="gallery">
      <div class="container">
        <h2 class="text-center mb-4">Galeri Kegiatan</h2>
        <div class="row g-3">
          <!-- Image 1 -->
          <div class="col-lg-4 col-md-6 col-sm-12">
            <a href="img/kegiatan1.jpg" data-lightbox="gallery" data-title="Kegiatan 1">
              <img src="img/kegiatan1.jpg" alt="Kegiatan 1" class="img-fluid gallery-img">
            </a>
          </div>
          <!-- Image 2 -->
          <div class="col-lg-4 col-md-6 col-sm-12">
            <a href="img/kegiatan2.jpg" data-lightbox="gallery" data-title="Kegiatan 2">
              <img src="img/kegiatan2.jpg" alt="Kegiatan 2" class="img-fluid gallery-img">
            </a>
          </div>
          <!-- Image 3 -->
          <div class="col-lg-4 col-md-6 col-sm-12">
            <a href="img/kegiatan3.jpg" data-lightbox="gallery" data-title="Kegiatan 3">
              <img src="img/kegiatan3.jpg" alt="Kegiatan 3" class="img-fluid gallery-img">
            </a>
          </div>
          <!-- Add more images as needed -->
        </div>
      </div>
    </section>

  </section>
  <!-- end header -->
  
  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
