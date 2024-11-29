<?php

    require_once __DIR__ . '/models/transaksi.php';

    $title = "Konfirmasi";

    if (! isset($_GET["transaksi_id"])){
        header("Location:donasi.php");
        exit;
    }

    $transaksi_id = $_GET['transaksi_id'];

    if (isset($_POST['submit-konfirmasi'])){
        $image = $_FILES['image']['name'];
        $tempImage = $_FILES['image']['tmp_name'];

        $randomFilename = time().'-'.md5(rand()).'-'.$image;

        $uploadPath = __DIR__ . "/upload/" . $randomFilename;

        $upload = move_uploaded_file($tempImage,$uploadPath);

        if($upload) {
            $filepath = "/upload/$randomFilename";
            Transaksi::update($transaksi_id, [null, null, null, null, null, $filepath, null, null]);
            
            header("Location:index.php");
            exit;
        } else {
            print_r($_FILES['image']['error']);
            $msg = "gagal upload";
            exit;
        }
        
    }
    
    $transaksi = Transaksi::get($transaksi_id);

    require_once 'views/layout.php';
    require_once 'views/konfirmasi.php';

?>