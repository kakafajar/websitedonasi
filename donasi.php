<?php

require_once __DIR__ . "/models/modelpembayaran.php";
require_once __DIR__ . "/models/transaksi.php";

$title = "Donasi";

if (isset($_POST['submit-donasi'])) {
  require_once __DIR__ . '/phpmailer.php';
  require_once __DIR__ . '/functions.php';

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
    
    $jumlah = number_format($transaksi->get_jumlah(), 2, ',', '.');
    $mail->msgHTML(strtr(file_get_contents('views/emaildata.html'), array(
        '%nama%' => $transaksi->get_donatur(),
        '%tanggal%' => $transaksi->get_tanggal(),
        '%jumlah%' => $jumlah,
        '%metode%' => $transaksi->get_model()->get_nama(),
        '%metode_ket%' => $transaksi->get_model()->get_keterangan(),
        '%link%' => 'google.com' // placeholder
    )));
    $mail->AddEmbeddedImage('views/img/logo.png', 'logo', 'logo.png');
    $mail->AltBody = 'Link konfirmasi donasi';
    
    $mail->send();
  } catch (Exception $e) {
    swal("Pesan tidak bisa dikirim", "Phpmailer error : {$mail->ErrorInfo}. kontak admin.", 'warning', "konfirmasi.php?transaksi_id=" . $transaksi->get_id());
    exit;
  }

  header("Location:konfirmasi.php?transaksi_id=" . $transaksi->get_id());
  exit;
}

$models = ModelPembayaran::get_all();

require_once "views/layout.php";
require_once "views/donasi.php";
