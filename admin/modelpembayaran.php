<?php

    require_once __DIR__ . '/../models/modelpembayaran.php';

    if (isset($_GET['mode'])){
        switch ($_GET['mode']){
            case 'add':
                ModelPembayaran::insert([$_POST['nama'], $_POST['keterangan']]);
                break;
            case 'edit':
                ModelPembayaran::update($_POST['id'], [$_POST['nama'], $_POST['keterangan']]);
                break;
            case 'delete':
                ModelPembayaran::delete($_GET['id']);
                break;
            case 'deleteselected':
                ModelPembayaran::delete_from_array(json_decode($_POST['ids']));
                break;
        }
        header("Location:" . basename(__FILE__, '.php') . ".php");
    }

    $title = "Model Pembayaran";
    $models = ModelPembayaran::get_all();


    require_once __DIR__ . '/views/layout.php';
    require_once __DIR__ . '/views/modelpembayaran.php';
?>