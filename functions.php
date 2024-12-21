<?php
function swal($title, $text, $icon, $url = ''){
    echo "<script>
    window.addEventListener('DOMContentLoaded', event => {
        swal({
            title : '$title',
            text : '$text',
            icon : '$icon'
        }).then((clicked) => {
            if ('$url' == 'self'){
                window.location.href = window.location.href;
            } 
            else if ('$url' != '') {
                window.location.href='$url';
            }
        });
    });
    </script>
    ";
}
?>