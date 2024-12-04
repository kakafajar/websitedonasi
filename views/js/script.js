AOS.init({
    duration: 1000, // Durasi animasi dalam milidetik
    once: true // Animasi hanya berjalan sekali
  });


// js buat jumlah donasi

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

  // Script untuk menambahkan class "scrolled" saat halaman discroll
  window.addEventListener("scroll", function () {
    const navbar = document.querySelector(".navbar-transparent");
    if (window.scrollY > 50) {
      navbar.classList.add("scrolled");
    } else {
      navbar.classList.remove("scrolled");
    }
  });



         // Script untuk menandai navbar yang aktif
         const currentLocation = window.location.pathname.split('/').pop();
         const navLinks = document.querySelectorAll('.nav-link');
         navLinks.forEach(link => {
             if (link.getAttribute('href') === currentLocation) {
                 link.classList.add('active');
             } else {
                 link.classList.remove('active');
             }
         });

