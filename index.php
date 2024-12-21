<?php 
    $title = "";

    if (isset($_POST['submit-message'])) {
        require_once __DIR__ . '/phpmailer.php';
        require_once __DIR__ . '/functions.php';

        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        try {
            $mail = get_phpmailer();
        
            $mail->setFrom($phpmailer_from);
            $mail->addAddress($phpmailer_from);
            $mail->Subject = 'Pesan Pengguna';
            
            $mail->msgHTML("
                <h5>Data Pengirim</h5>
                <p>Nama : $name</p>
                <p>Email : $email</p>
                <br>
                <p>Pesan : $message</p>
            ");
            $mail->AltBody = 'Message Contact';
            
            $mail->send();
            
            swal('Pesan telah dikirim', '', 'success', 'self');
        } catch (Exception $e) {
            swal("Pesan tidak bisa dikirim", "Phpmailer error : {$mail->ErrorInfo}. kontak admin.", 'warning', 'self');
        }
    }

    require_once "views/layout.php";
    require_once "views/index.php";

?>