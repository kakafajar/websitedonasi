<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "dbdonasi");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah user sudah login dan memiliki role admin
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["role"] !== "admin") {
    header("Location: login.php");
    exit();
}


// Ambil data donasi, transaksi, dan model pembayaran
$sql = "SELECT donasi.donasi_id, donasi.nama, donasi.email, transaksi.transaksi_id, transaksi.jumlah, transaksi.pesan, transaksi.tanggal, model_pembayaran.metode
        FROM donasi
        JOIN transaksi ON donasi.donasi_id = transaksi.donasi_id
        LEFT JOIN model_pembayaran ON transaksi.id_model = model_pembayaran.id_model
        ORDER BY transaksi.tanggal DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Donasi</title>
    <!-- Link CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Data Donasi dan Transaksi</h2>
        
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Donasi</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>ID Transaksi</th>
                        <th>Jumlah</th>
                        <th>Pesan</th>
                        <th>Tanggal</th>
                        <th>Metode Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["donasi_id"] . "</td>";
                            echo "<td>" . $row["nama"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["transaksi_id"] . "</td>";
                            echo "<td>Rp " . number_format($row["jumlah"], 0, ',', '.') . "</td>";
                            echo "<td>" . $row["pesan"] . "</td>";
                            echo "<td>" . $row["tanggal"] . "</td>";
                            echo "<td>" . $row["metode"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>Belum ada data donasi</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Skrip JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
