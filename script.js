AOS.init({
    duration: 1500, // Durasi animasi dalam milidetik
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
