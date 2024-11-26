<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="styles.css">
    <title></title>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const donasiLainnya = document.getElementById('donasiLainnya');
            const inputLainnya = document.getElementById('inputLainnya');
            const jumlahManual = document.getElementById('jumlah_manual');

            document.querySelectorAll('input[name="jumlah_donasi"]').forEach(radio => {
                radio.addEventListener('change', function () {
                if (donasiLainnya.checked) {
                    inputLainnya.style.display = 'block';
                    jumlahManual.required = true;
                } else {
                    inputLainnya.style.display = 'none';
                    jumlahManual.required = false;
                    jumlahManual.value = '';
                }
                });
            });
});

    </script>
  </head>
  <body>
    <!-- navbar section -->
    <nav
      class="navbar navbar-expand-lg fixed-top navbar-transparent"
      style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);"
      data-aos="fade-down"
    >
      <div class="container">
        <a class="Logo" href="#">
          <img src="img/logo.png" alt="logo" style="width: 40px;">
        </a>
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
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.html" style="color: white;">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tentang.html" >Tentang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">Program</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="kegiatan.html">Kegiatan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="donasi.php">Donasi</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->
<!-- Header -->
<header class="parallax-header-tn">
    <h1>DONASI</h1>
  </header>
  <section class="content-section-tn container my-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="p-4 rounded shadow" style="background-color: #f8f9fa;">
        <h2 class="text-center mb-4">Formulir Donasi</h2>
        <form action="proses_donasi.php" method="POST">
          <div class="mb-3 text-start">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
          </div>
          <div class="mb-3 text-start">
            <label for="no_hp" class="form-label">Nomor HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan nomor HP Anda" required>
          </div>
          <div class="mb-3 text-start">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea class="form-control" id="pesan" name="pesan" rows="3" placeholder="Pesan untuk penerima donasi"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label d-block">Metode Pembayaran</label>
            <div class="d-flex flex-wrap gap-3">
              <div class="form-check d-inline-block">
                <input class="form-check-input" type="radio" name="metode_pembayaran" id="metodeBRI" value="BRI" required>
                <label class="form-check-label" for="metodeBRI">BRI</label>
              </div>
              <div class="form-check d-inline-block">
                <input class="form-check-input" type="radio" name="metode_pembayaran" id="metodeBCA" value="BCA">
                <label class="form-check-label" for="metodeBCA">BCA</label>
              </div>
              <div class="form-check d-inline-block">
                <input class="form-check-input" type="radio" name="metode_pembayaran" id="metodeGopay" value="Gopay">
                <label class="form-check-label" for="metodeGopay">Gopay</label>
              </div>
              <div class="form-check d-inline-block">
                <input class="form-check-input" type="radio" name="metode_pembayaran" id="metodeOVO" value="OVO">
                <label class="form-check-label" for="metodeOVO">OVO</label>
              </div>
            </div>
          </div>
          <div class="mb-3 text-start">
            <label class="form-label d-block">Pilih Jumlah Donasi</label>
            <div class="d-flex flex-wrap gap-3">
              <div class="form-check d-inline-block">
                <input class="form-check-input" type="radio" name="jumlah_donasi" id="donasi50" value="50000" required>
                <label class="form-check-label" for="donasi50">Rp50.000</label>
              </div>
              <div class="form-check d-inline-block">
                <input class="form-check-input" type="radio" name="jumlah_donasi" id="donasi100" value="100000">
                <label class="form-check-label" for="donasi100">Rp100.000</label>
              </div>
              <div class="form-check d-inline-block">
                <input class="form-check-input" type="radio" name="jumlah_donasi" id="donasi200" value="200000">
                <label class="form-check-label" for="donasi200">Rp200.000</label>
              </div>
              <div class="form-check d-inline-block">
                <input class="form-check-input" type="radio" name="jumlah_donasi" id="donasiLainnya" value="lainnya">
                <label class="form-check-label" for="donasiLainnya">Lainnya</label>
              </div>
            </div>
          </div>
          <div class="mb-3" id="inputLainnya" style="display: none;">
            <label for="jumlah_manual" class="form-label">Masukkan Jumlah Donasi</label>
            <input type="number" class="form-control" id="jumlah_manual" name="jumlah_manual" placeholder="Masukkan jumlah donasi">
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-success">Kirim Donasi</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>




    <!-- Footer -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted">
      <!-- Section: Social media -->
      <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
          <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-google"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-linkedin"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-github"></i>
          </a>
        </div>
        <!-- Right -->
      </section>
      <!-- Section: Social media -->

      <!-- Section: Links  -->
      <section class="">
        <div class="container text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold mb-4">
                <i class="fas fa-gem me-3"></i>Company name
              </h6>
              <p>
                Here you can use rows and columns to organize your footer content. Lorem ipsum
                dolor sit amet, consectetur adipisicing elit.
              </p>
            </div>
            <!-- Grid column -->
            

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
              <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
              <p>
                <i class="fas fa-envelope me-3"></i>
                info@example.com
              </p>
              <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
              <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2024 Copyright:
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">UBP karawang</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </section>

  <!-- end header -->
  
  <!-- Bootstrap JS -->
  <!-- AOS JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script src="script.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
  </body>
</html>
