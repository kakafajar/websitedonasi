document.addEventListener('DOMContentLoaded', function () {
    const form_konfirmasi = document.getElementById("form-konfirmasi");

    document.getElementById("submit-btn").addEventListener("click", (e) => {
        if (form_konfirmasi.checkValidity()){
            process_submit(e.target);
        }else{
            form_konfirmasi.reportValidity();
        }
    })

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
                swal({
                    title : "Upload Bukti Transfer Berhasil!",
                    // text : "Terima kasih atas donasinya",
                    text : xhttp.response,
                    icon: "success"
                }).then(() => {
                    location.replace("index.php");
                })
            }else{
                swal({
                    title: "Upload Bukti Transfer tidak berhasil!",
                    text : xhttp.response,
                    icon : "warning"
                });
            }
        }
        xhttp.send(new FormData(form_konfirmasi));
    }
});