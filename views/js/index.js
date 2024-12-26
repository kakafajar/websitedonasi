document.addEventListener('DOMContentLoaded', function () {
    const form_msg = document.getElementById("form-msg");

    document.getElementById("submit-btn").addEventListener("click", (e) => {
        if (form_msg.checkValidity()){
            process_submit(e.target);
        }else{
            form_msg.reportValidity();
        }
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
            swal({
                title: "Pesan telah terkirim!",
                icon : "success"
                }).then(() => {
                location.reload();
                })
            }else{
            swal({
                title: "Pesan tidak terkirim!",
                text: xhttp.response,
                icon : "warning"
            });
            }
        }
        xhttp.send(new FormData(form_msg), button);
    }
});