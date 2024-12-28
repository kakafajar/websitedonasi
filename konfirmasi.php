<?php
 
    require_once __DIR__ . '/models/transaksi.php';

    $transaksi;
    try{
        $transaksi_id = openssl_decrypt($_GET['transaksi_id'], "AES-128-ECB", "A");
        
        $transaksi = Transaksi::get($transaksi_id);
    }catch(Exception $e){
        header("Location:donasi.php");
        exit;
    }

    if (isset($_FILES['image'])){
        $image = $_FILES['image']['name'];
        $tempImage = $_FILES['image']['tmp_name'];

        $randomFilename = time().'-'.md5(rand()).'-'.$image;

        $uploadPath = __DIR__ . "/upload/" . $randomFilename;
        try{
            $upload = move_uploaded_file($tempImage,$uploadPath);
            
            $filepath = "/upload/$randomFilename";
            Transaksi::update($transaksi_id, [null, null, null, null, null, null, $filepath, null, null]);
        }catch(Exception $e){
            http_response_code(500);
            echo json_encode($_FILES['image']['error']);
        }

        exit;
    }

    $title = "Konfirmasi";

    require_once 'views/layout.php';
    require_once 'views/konfirmasi.php';

?>