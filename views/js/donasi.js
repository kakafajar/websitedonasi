document.addEventListener('DOMContentLoaded', function () {
    const form_donasi = document.getElementById("real-form-donasi");

    const donasiLainnya = document.getElementById('donasiLainnya');
    const inputLainnya = document.getElementById('inputLainnya');
    const jumlahManual = document.getElementById('jumlah_manual');

    document.getElementById("submit-btn").addEventListener("click", (e) => {
        e.preventDefault();
        if (form_donasi.checkValidity()){
            process_submit(e.target);
        }else{
            form_donasi.reportValidity();
        }
    });

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

    function process_submit(button){
        swal({
            title : "sedang memproses",
            button : {
                closeModal : false
            },
            closeOnClickOutside: false
        });

        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "");
        xhttp.onload = function() {
            swal.stopLoading();
            swal.close();

            if (xhttp.status == 200){
                window.location.replace(xhttp.responseText.replace(/['"]+/g, ''));
            }else{
                swal({
                    title: "Pesan tidak terkirim!",
                    text: xhttp.response,
                    icon : "warning"
                });
            }
        }
        xhttp.send(new FormData(form_donasi));
    }
});