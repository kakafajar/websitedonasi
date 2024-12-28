<?php

require_once __DIR__ . "/models/modelpembayaran.php";
require_once __DIR__ . "/models/transaksi.php";

$title = "Donasi";
if (isset($_POST['email'])) {
  require_once __DIR__ . '/phpmailer.php';

  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $no_hp = $_POST['no-hp'];
  $idmodel = $_POST['metode_pembayaran'];

  $jumlah = $_POST['jumlah_donasi'];
  if ($_POST['jumlah_manual'] > 0) {
    $jumlah = $_POST['jumlah_manual'];
  }

  $pesan = $_POST['pesan'];

  date_default_timezone_set('Asia/Bangkok');
  Transaksi::insert([$nama, $email, $no_hp, $idmodel, $jumlah, $pesan, null, 'pending', date("Y-m-d H-i-s")]);
  $transaksi = Transaksi::get($conn->insert_id);

  try {
    $mail = get_phpmailer();

    $mail->setFrom($phpmailer_from);
    $mail->addAddress($email);
    $mail->Subject = 'Konfirmasi Donasi';
    
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
      $link = "https://";   
    else  
      $link = "http://";

    // Append the host(domain name, ip) to the URL.   
    $link.= $_SERVER['HTTP_HOST'];   
    // Append the requested resource location to the URL   
    $link .= "/websitedonasi/konfirmasi.php?transaksi_id=" . urlencode(openssl_encrypt($transaksi->get_id(), "AES-128-ECB", "A"));
    
    $jumlah = number_format($transaksi->get_jumlah(), 2, ',', '.');
    $mail->msgHTML(strtr(file_get_contents('views/emaildata.html'), array(
        '%nama%' => $transaksi->get_donatur(),
        '%tanggal%' => $transaksi->get_tanggal(),
        '%jumlah%' => $jumlah,
        '%metode%' => $transaksi->get_model()->get_nama(),
        '%metode_ket%' => $transaksi->get_model()->get_keterangan(),
        '%link%' => $link,
    )));
    $mail->AddEmbeddedImage('views/img/logo.png', 'logo', 'logo.png');
    $mail->AltBody = 'Link konfirmasi donasi';
    
    $mail->send();
    echo json_encode($link);
  } catch (Exception $e) {
    http_response_code(500);
    echo json_encode($e);
    Transaksi::delete($transaksi->get_id());
  }
  exit;
}

$models = ModelPembayaran::get_all_active();

require_once "views/layout.php";
require_once "views/donasi.php";
