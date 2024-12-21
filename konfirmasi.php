<?php
 
    require_once __DIR__ . '/models/transaksi.php';

    $title = "Konfirmasi";

    if (! isset($_GET["transaksi_id"])){
        header("Location:donasi.php");
        exit;
    }

    $transaksi_id = $_GET['transaksi_id'];
    $transaksi = Transaksi::get($transaksi_id);

    if ($transaksi->get_bukti_transfer() != ""){
        header("Location:donasi.php");
        exit;
    }

    if (isset($_POST['submit-konfirmasi'])){
        require_once __DIR__ . '/functions.php';

        $image = $_FILES['image']['name'];
        $tempImage = $_FILES['image']['tmp_name'];

        $randomFilename = time().'-'.md5(rand()).'-'.$image;

        $uploadPath = __DIR__ . "/upload/" . $randomFilename;

        $upload = move_uploaded_file($tempImage,$uploadPath);

        if($upload) {
            $filepath = "/upload/$randomFilename";
            Transaksi::update($transaksi_id, [null, null, null, null, null, null, $filepath, null, null]);
            
            swal('Upload Bukti Transfer Berhasil!', 'Terima kasih atas Donasinya', 'success', 'index.php');
        } else {
            swal('Upload Bukti Transfer Gagal!', "error : {$_FILES['image']['error']}. kontak admin", 'warning', 'self');
        }
    }
    
    require_once 'views/layout.php';
    require_once 'views/konfirmasi.php';

?>