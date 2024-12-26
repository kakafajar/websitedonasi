<?php

    require_once __DIR__ . '/../models/transaksi.php';
    require_once __DIR__ . '/../models/modelpembayaran.php';

    if (isset($_GET['mode'])){
        $nama = $email = $no_hp = $idmodel = $jumlah = $pesan = $status = $tanggal = '';
        if (isset($_POST["nama"])){
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $no_hp = $_POST['no-hp'];
            $idmodel = $_POST['model'];
            $jumlah = $_POST['jumlah'];
            $pesan = $_POST['pesan'];
            $status = $_POST['status'];
            $tanggal = $_POST['tanggal'];
        }

        switch ($_GET['mode']){
            case 'add':
                // date_default_timezone_set('Asia/Bangkok');
                try{
                    Transaksi::insert([$nama, $email,$no_hp, $idmodel, $jumlah, $pesan, null, $status, $tanggal]);
                }
                catch(Exception $e){
                    http_response_code(500);
                    echo json_encode($conn->error);
                }
                break;
            case 'edit':
                try{
                    Transaksi::update($_POST['id'], [$nama, $email, $no_hp, $idmodel, $jumlah, $pesan, null, $status, $tanggal]);
                }
                catch(Exception $e){
                    http_response_code(500);
                    echo json_encode($conn->error);
                }
                break;
            case 'edit_status_all_selected':
                try{
                    Transaksi::update_status_from_array(json_decode($_POST['ids']), $_POST['status']);
                }
                catch(Exception $e){
                    http_response_code(500);
                    echo json_encode($conn->error);
                }
                break;
            case 'delete':
                try{
                    Transaksi::delete($_GET['id']);
                }
                catch(Exception $e){
                    http_response_code(500);
                    echo json_encode($conn->error);
                }
                break;
            case 'delete_all_selected':
                try{
                    Transaksi::delete_from_array(json_decode($_POST['ids']));
                }
                catch(Exception $e){
                    http_response_code(500);
                    echo json_encode($conn->error);
                }
                break;
            default:
                http_response_code(404);
                echo $_GET['mode'] . " does not exist!";
                break;
        }
        exit;
    }

    $title = "Transaksi";
    $transactions = Transaksi::get_all();
    $models = ModelPembayaran::get_all();
    
    require_once __DIR__ . '/views/layout.php';
    require_once __DIR__ . '/views/transaksi.php';
    
?>