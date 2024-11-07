<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Donation Cards</title>

    <style>
          .links-white :is(a, li a) {
      color: white !important;
      text-decoration: none;
    }

      .cards-container {
        margin-top: -150px; /* Allows cards to overlap with jumbotron */
      }

      .donation-card {
        border: 1px solid #ddd;
        transition: transform 0.3s ease;
      }

      .donation-card:hover {
        transform: scale(1.05);
      }

      /* Adjust z-index so cards cover jumbotron when scrolling */
      .cards-container {
        z-index: 10;
        position: relative;
      }

      .progress-bar-custom {
        background-color: red;
      }
            /* Custom button style */
      .btn-custom {
        margin-top: 15px;
        background-color: white; /* Warna default */
        border-color: #007bff;
        color: #007bff;
      }

      /* Mengubah warna tombol saat di-hover */
      .btn-custom:hover {
        background-color: #007bff; /* Ganti warna sesuai keinginan */
        border-color: #007bff; /* Sesuaikan border agar serasi */
        color: white; /* Warna teks pada tombol saat hover */
      }
    </style>
  </head>
  <body>
    <nav
    class="navbar navbar-expand-lg navbar-light bg-primary fixed-top" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); "
  >
    <div class="container links-white">
      <a class="" href="#">Peduli Rakyat</a>
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
            <a class="nav-link active" aria-current="page" href="home1.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#donasi">Donasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <!-- Navbar -->

    <!-- Jumbotron -->
    <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://i.pinimg.com/enabled/564x/02/e7/07/02e7072b08889e5a18d66e0de678ac1c.jpg" class="d-block w-100" alt="..." style="height: 700px;">
        </div>
        <div class="carousel-item">
          <img src="..." class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="..." class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- Cards Section -->
  <div class="container cards-container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Card 1 -->
        <div class="col  ">
          <div class="card donation-card">
            <img src="https://i.pinimg.com/736x/af/53/72/af53728e5c54402c8b3fb53d3659409b.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Peduli Bencana Nusantara</h5>
              <div class="progress">
                <div class="progress-bar progress-bar-custom" role="progressbar" style="width: 73%;" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100">73%</div>
              </div>
              <p class="card-text mt-2">Terkumpul: Rp 366.424.995,00</p>
              <p class="card-text">Target: Rp 500.000.000,00</p>
              <div class="text-center">
                <a data-mdb-ripple-init class="btn btn-outline-primary btn-lg btn-custom" href="#!" role="button">DONATE NOW</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="col">
          <div class="card donation-card">
            <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Bantuan Medis</h5>
              <div class="progress">
                <div class="progress-bar progress-bar-custom" role="progressbar" style="width: 2%;" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100">2%</div>
              </div>
              <p class="card-text mt-2">Terkumpul: Rp 12.404.978,00</p>
              <p class="card-text">Target: Rp 500.000.000,00</p>
              <div class="text-center">
                <a data-mdb-ripple-init class="btn btn-outline-primary btn-lg btn-custom" href="#!" role="button">DONATE NOW</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Card 2 -->
        <div class="col">
          <div class="card donation-card">
            <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Bantuan Medis</h5>
              <div class="progress">
                <div class="progress-bar progress-bar-custom" role="progressbar" style="width: 2%;" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100">2%</div>
              </div>
              <p class="card-text mt-2">Terkumpul: Rp 12.404.978,00</p>
              <p class="card-text">Target: Rp 500.000.000,00</p>
              <div class="text-center">
                <a data-mdb-ripple-init class="btn btn-outline-primary btn-lg btn-custom" href="#!" role="button">DONATE NOW</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Card 2 -->
        <div class="col">
          <div class="card donation-card">
            <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Bantuan Medis</h5>
              <div class="progress">
                <div class="progress-bar progress-bar-custom" role="progressbar" style="width: 2%;" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100">2%</div>
              </div>
              <p class="card-text mt-2">Terkumpul: Rp 12.404.978,00</p>
              <p class="card-text">Target: Rp 500.000.000,00</p>
            </div>
          </div>
        </div>
        <!-- Card 2 -->
        <div class="col">
          <div class="card donation-card">
            <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Bantuan Medis</h5>
              <div class="progress">
                <div class="progress-bar progress-bar-custom" role="progressbar" style="width: 2%;" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100">2%</div>
              </div>
              <p class="card-text mt-2">Terkumpul: Rp 12.404.978,00</p>
              <p class="card-text">Target: Rp 500.000.000,00</p>
            </div>
          </div>
        </div>
        <!-- Card 2 -->
        <div class="col">
          <div class="card donation-card">
            <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Bantuan Medis</h5>
              <div class="progress">
                <div class="progress-bar progress-bar-custom" role="progressbar" style="width: 2%;" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100">2%</div>
              </div>
              <p class="card-text mt-2">Terkumpul: Rp 12.404.978,00</p>
              <p class="card-text">Target: Rp 500.000.000,00</p>
            </div>
          </div>
        </div>
        <!-- Card 2 -->
        <div class="col">
          <div class="card donation-card">
            <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Bantuan Medis</h5>
              <div class="progress">
                <div class="progress-bar progress-bar-custom" role="progressbar" style="width: 2%;" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100">2%</div>
              </div>
              <p class="card-text mt-2">Terkumpul: Rp 12.404.978,00</p>
              <p class="card-text">Target: Rp 500.000.000,00</p>
            </div>
          </div>
        </div>
      </div>
        
        <!-- Add more cards as needed -->
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
