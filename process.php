<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validasi sederhana
    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required!";
        exit;
    }

    // Pengaturan email
    $to = "fajarrr1511@gmail.com"; // Ganti dengan email tujuan Anda
    $subject = "New Contact Message from $name";
    $body = "You have received a new message:\n\n" .
            "Name: $name\n" .
            "Email: $email\n\n" .
            "Message:\n$message";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Kirim email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Message sent successfully!'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Failed to send message. Please try again.'); window.location.href = 'index.php';</script>";
    }
} else {
    echo "Invalid request method.";
}
?>
