<?php

    require_once __DIR__ . '/../models/transaksi.php';

    $title = "Dashboard";

    $total_donasi_uang = 0;
    $total_pending = 0;
    $total_konfirmasi = 0;
    
    $transaksis = Transaksi::get_all();
    foreach($transaksis as $transaksi){
        if ($transaksi->get_status() == "finished"){
            $total_donasi_uang += $transaksi->get_jumlah();
            $total_konfirmasi += 1;
        }
        $total_pending += 1;
    }

    require_once __DIR__ . '/views/layout.php';
    require_once __DIR__ . '/views/index.php';
?>