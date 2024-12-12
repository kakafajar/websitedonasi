<?php

  require_once __DIR__ . "/models/modelpembayaran.php";
  require_once __DIR__ . "/models/transaksi.php";
  require_once __DIR__ . '/mailconfig.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require_once __DIR__ . '/PHPMailer/src/Exception.php';
  require_once __DIR__ . '/PHPMailer/src/PHPMailer.php';
  require_once __DIR__ . '/PHPMailer/src/SMTP.php';

  $title = "Donasi";
  
  $transaksi = null;
  if (isset($_GET['transaksi_id'])){
    $transaksi = Transaksi::get($_GET['transaksi_id']);
  }

  if (isset($_POST['submit-donasi'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $idmodel = $_POST['metode_pembayaran'];
    
    $jumlah = $_POST['jumlah_donasi'];
    if ($_POST['jumlah_manual'] > 0){
      $jumlah = $_POST['jumlah_manual'];
    }

    $pesan = $_POST['pesan'];

    date_default_timezone_set('Asia/Bangkok');
    Transaksi::insert([$nama, $email, $idmodel, $jumlah, $pesan, null, 'pending', date("Y-m-d H-i-s")]);
    
    $mail = new PHPMailer(true);

    try{
      $mail->IsSMTP();
      $mail->SMTPAuth = true;
      $mail->Host = "smtp.gmail.com";
      $mail->Port = 25;
      $mail->Username = $smtp_username;
      $mail->Password = $smtp_password;

      $mail->setFrom($phpmailer_from);
      $mail->addAddress($email);
      $mail->Subject = 'Konfirmasi Donasi';
      $mail->msgHTML("
      <a href='localhost/websitedonasi/donasi.php?transaksi_id=" . $conn->insert_id. "'>Link Konfirmasi</a>"); 
      $mail->AltBody = 'HTML messaging not supported';
      $mail->send();

    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      exit;
    }

    header("Location:donasi.php?transaksi_id=" . $conn->insert_id);
    exit;
  }

  $models = ModelPembayaran::get_all();

  require_once "views/layout.php";
  require_once "views/donasi.php";

?>