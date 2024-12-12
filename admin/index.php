<?php

    require_once __DIR__ . '/../models/transaksi.php';

    $title = "Dashboard";

    $total_donasi_uang = 0;
    $total_pending = 0;
    $total_konfirmasi = 0;
    
    $transaksis = Transaksi::get_all();
    
    if (isset($_GET['tahun-perbulan'])){
        $tahun = $_GET['tahun-perbulan'];
        $datas = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        foreach($transaksis as $transaksi){
            $tahun_transaksi = substr($transaksi->get_tanggal(), 0, 4);
            $bulan_transaksi = (int) substr($transaksi->get_tanggal(), 5, 2);
            
            if ($transaksi->get_status() == "finished" and $tahun_transaksi == $tahun){
                $datas[$bulan_transaksi-1] += $transaksi->get_jumlah();
            }
        }

        header('Content-Type: text/xml; charset=utf-8');
        echo '<?xml version="1.0" encoding="UTF-8"?>';
        echo "<response>";
        foreach($datas as $data){
            echo "<DATA>" . $data . "</DATA>";
        }
        echo "</response>";
        exit;
    }
    
    $tahunDonasiList = [];
    foreach($transaksis as $transaksi){
        $tahun_transaksi = (int)substr($transaksi->get_tanggal(), 0, 4);
        
        if (! in_array($tahun_transaksi, $tahunDonasiList)){
            $tahunDonasiList[] = $tahun_transaksi;
        }

        if ($transaksi->get_status() == "finished"){
            $total_donasi_uang += $transaksi->get_jumlah();
            $total_konfirmasi += 1;

        }
        $total_pending += 1;
    }

    require_once __DIR__ . '/views/layout.php';
    require_once __DIR__ . '/views/index.php';
?>