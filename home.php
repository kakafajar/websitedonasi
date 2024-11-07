<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/contacts/contact-5/assets/css/contact-5.css">
<link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  </head>
  <style>
          /* about section */
      .about-section {
        padding: 40px 20px;
        border-radius: 10px;
        margin-top: 20px;
      }
      .about-title {
        font-size: 2rem;
        font-weight: bold;
      }
      .about-description {
        font-size: 1.2rem;
        color: #555;
      }
      .about-image {
        width: 100%;
        border-radius: 10px;
      }
    .links-white :is(a, li a) {
      color: white !important;
      text-decoration: none;
    }
    /* jumbotron section */
    .btn-custom:hover {
    background-color: #027ed6; /* Ubah warna background saat hover */
    border-color: #027ed6; /* Ubah warna border saat hover */
    color: white; /* Ubah warna teks saat hover */
  }

  .btn-masuk {
    background-color: #007bff; /* Warna tombol */
    border-color: #007bff; /* Warna border tombol */
    color: white; /* Warna teks tombol */
    font-size: 1rem; /* Ubah ukuran font tombol */
    padding: 10px 20px; /* Ubah padding tombol */
    border-radius: 5px; /* Ubah radius border tombol */
  }

  .btn-masuk:hover {
    background-color: #7fbde9; /* Ubah warna background saat hover */
    border-color: #027ed6; /* Ubah warna border saat hover */
    color: white; /* Ubah warna teks saat hover */
  }
  </style>
  <body>
    <!-- Navbar Section -->
<nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
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
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="donasi.html">Donasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
        </li>
        <!-- Tambahkan tombol Masuk dan Daftar di sini -->
        <li class="nav-item">
          <a class="btn btn-masuk mx-1" href="login.php">Masuk</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-custom mx-1" href="">Daftar</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Jumbotron Section -->
<!-- Jumbotron -->
<div class="p-5 text-center bg-image rounded-3  w-80 mx-auto" style="
    background-image: url('https://i.pinimg.com/564x/51/57/9a/51579ab90620cb36fb8592b19cd4280f.jpg');
    background-size: cover; background-position: center;
    height: 500px; margin-top: 70px; box-shadow: #555;
  ">
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="text-white">
        <h1 class="mb-3">AYO PEDULI</h1>
        <h4 class="mb-3">Satu tindakan kebaikan dapat mengubah jalan hidup seseorang.<br>
            Mari bersama-sama hadir untuk mereka yang paling membutuhkan.</h4>
        <a data-mdb-ripple-init class="btn btn-outline-light btn-lg btn-custom" href="#!" role="button">DONATE NOW</a>
      </div>
    </div>
  </div>
</div>
<!-- Jumbotron -->
    <!-- About Section -->
     <p id="about"></p>
    <div class="container about-section bg-light" style="margin-top: 90px;">
      <div class="row">
          <div class="col-md-6 shadow-sm">
            <img
            src="https://i.pinimg.com/564x/29/28/5f/29285f907626ba790fa80ec565fa6143.jpg"
            class="about-image"
            alt="About Us Image"
            />
          </div>
          <div class="col-md-6">
            <h2 class="about-title">About Us</h2>
            <p class="about-description">
              Peduli Rakyat adalah sebuah gerakan sosial yang berfokus pada peningkatan kesejahteraan masyarakat melalui donasi dan aksi nyata. Kami percaya bahwa setiap individu berhak mendapatkan kehidupan yang layak, tanpa terkecuali. Dengan semangat kebersamaan dan gotong royong, kami mengajak seluruh lapisan masyarakat untuk turut berkontribusi dalam membantu mereka yang membutuhkan.
            </p>
          </div>
        </div>
      </div>
    <!-- Misi Organisasi -->
    <section class="mission text-center">
      <div class="container" style="margin-top: 110px;">
        <h2 class="mb-4">Misi Kami</h2>
        <p class="lead">
          Kami percaya bahwa setiap orang memiliki hak untuk hidup yang lebih
          baik. Misi kami adalah membantu mereka yang paling membutuhkan dengan
          memberikan akses ke pendidikan, kesehatan, dan bantuan darurat.
        </p>

        <div class="row justify-content-center">
          <div class="col-md-4 mb-4">
            <div class="card shadow p-4">
              <h4>Pendidikan</h4>
              <p>
                Meningkatkan akses pendidikan untuk anak-anak di daerah
                terpencil.
              </p>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card shadow p-4">
              <h4>Kesehatan</h4>
              <p>
                Menyediakan layanan kesehatan dan akses air bersih untuk
                komunitas yang kurang terlayani.
              </p>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card shadow p-4">
              <h4>Bantuan Darurat</h4>
              <p>
                Memberikan bantuan darurat kepada korban bencana alam di
                berbagai wilayah.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="sustainable-donation text-center py-5" id="donasi">
      <div class="container" style="margin-top: 20px;">
        <h2 class="mb-5">Donasi Berkelanjutan</h2>

        <div
          id="donationCarousel"
          class="carousel slide w-75 mx-auto"
          data-bs-ride="carousel"
        >
          <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
              <img
                src="https://i.pinimg.com/564x/37/48/a5/3748a5583cf64bc5cf504a2100eb1a31.jpg"
                class="d-block w-100"
                alt="Donasi Pendidikan"
              />
              <div class="carousel-caption">
                <h5>Donasi Pendidikan</h5>
              </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
              <img
                src="https://i.pinimg.com/564x/69/e4/10/69e4108c93faf43faa209340d3903730.jpg"
                class="d-block w-100"
                alt="Donasi Kesehatan"
              />
              <div class="carousel-caption">
                <h5>Donasi Kesehatan</h5>
              </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
              <img
                src="https://i.pinimg.com/564x/ed/2d/ed/ed2ded218b6bb2f73249b15c337b8616.jpg"
                class="d-block w-100"
                alt="Donasi Bencana Alam"
              />
              <div class="carousel-caption">
                <h5>Donasi Bencana Alam</h5>
              </div>
            </div>
          </div>

          <!-- Controls -->
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#donationCarousel"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#donationCarousel"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>


  <!-- Contact Section-->
  <section class="bg-light py-3 py-md-5" style="margin-top: 170px;" id="contact">
    <div class="container">
      <div class="row gy-3 gy-md-4 gy-lg-0 align-items-md-center">
        <div class="col-12 col-lg-6">
          <div class="row justify-content-xl-center">
            <div class="col-12 col-xl-11">
              <h2 class="h1 mb-3">Contact</h2>
              <p class="lead fs-4 text-secondary mb-5">Kami selalu mencari untuk bekerja dengan klien baru. Jika Anda tertarik untuk bekerja sama dengan kami, silakan menghubungi salah satu cara berikut.</p>
              <div class="d-flex mb-5">
                <div class="me-4 text-primary">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-geo" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
                  </svg>
                </div>
                <div>
                  <h4 class="mb-3">Address</h4>
                  <address class="mb-0 text-secondary">Karawang, Jawa Barat, Indonesia</address>
                </div>
              </div>
              <div class="row mb-5">
                <div class="col-12 col-sm-6">
                  <div class="d-flex mb-5 mb-sm-0">
                    <div class="me-4 text-primary">
                      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-telephone-outbound" viewBox="0 0 16 16">
                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z" />
                      </svg>
                    </div>
                    <div>
                      <h4 class="mb-3">Phone</h4>
                      <p class="mb-0">
                        <a class="link-secondary text-decoration-none" href="tel:+15057922430">085890558653</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 mt-5" style="margin-right: 10px;">
                  <div class="d-flex mb-0">
                    <div class="me-4 text-primary">
                      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                        <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                        <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                      </svg>
                    </div>
                    <div>
                      <h4 class="mb-3 text-start">E-Mail</h4>
                      <p class="mb-0">
                        <a class="link-secondary text-decoration-none" href="mailto:demo@yourdomain.com">if23.fajarherlambang@mhs.ubpkarawang.ac.id</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex">
                <div class="me-4 text-primary">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                    <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z" />
                    <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z" />
                  </svg>
                </div>
                <div>
                  <h4 class="mb-3">Opening Hours</h4>
                  <div class="d-flex mb-1">
                    <p class="text-secondary fw-bold mb-0 me-5">Mon - Fri</p>
                    <p class="text-secondary mb-0">9am - 5pm</p>
                  </div>
                  <div class="d-flex">
                    <p class="text-secondary fw-bold mb-0 me-5">Sat - Sun</p>
                    <p class="text-secondary mb-0">9am - 2pm</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="bg-white border rounded shadow-sm overflow-hidden">

            <form action="#!">
              <div class="row gy-4 gy-xl-5 p-4 p-xl-5">
                <div class="col-12">
                  <label for="fullname" class="form-label">Full Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="fullname" name="fullname" value="" required>
                </div>
                <div class="col-12 col-md-6">
                  <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                      </svg>
                    </span>
                    <input type="email" class="form-control" id="email" name="email" value="" required>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <label for="phone" class="form-label">Phone Number</label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                      </svg>
                    </span>
                    <input type="tel" class="form-control" id="phone" name="phone" value="">
                  </div>
                </div>
                <div class="col-12">
                  <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="subject" name="subject" value="" required>
                </div>
                <div class="col-12">
                  <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                  <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button class="btn btn-primary btn-lg" type="submit">Send Message</button>
                  </div>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>



    <footer class="bg-light text-center text-lg-start mt-5">
      <div class="text-center p-3">
        © 2024 fajar herlambang| All rights reserved.
      </div>
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
