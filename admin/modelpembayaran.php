<?php

    require_once __DIR__ . '/../models/modelpembayaran.php';

    if (isset($_GET['mode'])){
        switch ($_GET['mode']){
            case 'add':
                try{
                    ModelPembayaran::insert([$_POST['nama'], $_POST['keterangan']]);
                }
                catch(Exception $e){
                    http_response_code(500);
                    echo json_encode($conn->error);
                }
                break;
            case 'edit':
                try{
                    ModelPembayaran::update($_POST['id'], [$_POST['nama'], $_POST['keterangan']]);
                }
                catch(Exception $e){
                    http_response_code(500);
                    echo json_encode($conn->error);
                }
                break;
            case 'delete':
                try{
                    ModelPembayaran::delete($_GET['id']);
                }
                catch(Exception $e){
                    http_response_code(500);
                    echo json_encode($conn->error);
                }
                break;
            case 'deleteselected':
                try{
                    ModelPembayaran::delete_from_array(json_decode($_POST['ids']));
                }
                catch(Exception $e){
                    http_response_code(500);
                    echo json_encode($conn->error);
                }
                break;
        }
        exit;
    }

    $title = "Model Pembayaran";
    $models = ModelPembayaran::get_all();


    require_once __DIR__ . '/views/layout.php';
    require_once __DIR__ . '/views/modelpembayaran.php';
?>