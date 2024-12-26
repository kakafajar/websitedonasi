<?php

    require_once __DIR__ . '/../models/transaksi.php';
    require_once __DIR__ . '/../models/modelpembayaran.php';

    if (isset($_GET['mode'])){
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $no_hp = $_POST['no-hp'];
        $idmodel = $_POST['model'];
        $jumlah = $_POST['jumlah'];
        $pesan = $_POST['pesan'];
        $status = $_POST['status'];
        $tanggal = $_POST['tanggal'];

        switch ($_GET['mode']){
            case 'add':
                // date_default_timezone_set('Asia/Bangkok');
                Transaksi::insert([$nama, $email,$no_hp, $idmodel, $jumlah, $pesan, null, $status, $tanggal]);
                break;
            case 'edit':
                Transaksi::update($_POST['id'], [$nama, $email, $no_hp, $idmodel, $jumlah, $pesan, null, $status, $tanggal]);
                break;
            case 'edit_status_selected':
                Transaksi::update_status_from_array(json_decode($_POST['ids']), $_POST['status']);
                break;
            case 'delete':
                Transaksi::delete($_GET['id']);
                break;
            case 'deleteselected':
                Transaksi::delete_from_array(json_decode($_POST['ids']));
                break;
        }
        header("Location:" . basename(__FILE__, '.php') . ".php");
    }

    $title = "Transaksi";
    $transactions = Transaksi::get_all();
    $models = ModelPembayaran::get_all();
    
    require_once __DIR__ . '/views/layout.php';
    require_once __DIR__ . '/views/transaksi.php';
    
?>