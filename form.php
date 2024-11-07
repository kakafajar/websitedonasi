<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "dbdonasi");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// // buat login
// session_start();
// if (!isset($_SESSION["loggedin"]) || $_SESSION["role"] !== "user") {
//     header("Location: login.php");
//     exit();
// }

// Ambil data model pembayaran
$metodeQuery = "SELECT id_model, metode FROM model_pembayaran";
$metodeResult = $conn->query($metodeQuery);

$donasiBerhasil = false;

// Proses penyimpanan data saat formulir dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $jumlah = $_POST["jumlah"];
    $pesan = $_POST["pesan"];
    $id_model = $_POST["id_model"];

    // Simpan data pemberi donasi di tabel donasi
    $stmtDonasi = $conn->prepare("INSERT INTO donasi (nama, email) VALUES (?, ?)");
    $stmtDonasi->bind_param("ss", $nama, $email);

    if ($stmtDonasi->execute()) {
        $donasiId = $stmtDonasi->insert_id;

        // Simpan data transaksi di tabel transaksi
        $stmtTransaksi = $conn->prepare("INSERT INTO transaksi (donasi_id, id_model, jumlah, pesan) VALUES (?, ?, ?, ?)");
        $stmtTransaksi->bind_param("iiis", $donasiId, $id_model, $jumlah, $pesan);
        $stmtTransaksi->execute();

        $donasiBerhasil = true;
    } else {
        echo "<div class='alert alert-danger'>Gagal menyimpan donasi: " . $stmtDonasi->error . "</div>";
    }

    $stmtDonasi->close();
    $stmtTransaksi->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir Donasi</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Formulir Donasi</h2>
    <div class="card shadow">
        <div class="card-body">
            <form action="form.php" method="POST">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Donasi:</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                </div>
                <div class="form-group">
                    <label for="pesan">Pesan:</label>
                    <textarea class="form-control" id="pesan" name="pesan" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="id_model">Metode Pembayaran:</label>
                    <select class="form-control" id="id_model" name="id_model" required>
                        <?php while($row = $metodeResult->fetch_assoc()): ?>
                            <option value="<?= $row['id_model'] ?>"><?= $row['metode'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Kirim Donasi</button>
            </form>
        </div>
    </div>
</div>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $donasiBerhasil): ?>
<script>
    swal({
        title: "Good job!",
        text: "Donasi berhasil dikirim!",
        icon: "success"
    }).then((value) => {
        window.location.href = "form.php"; // Redirect setelah SweetAlert ditutup
    });
</script>
<?php endif; ?>

</body>
</html>
