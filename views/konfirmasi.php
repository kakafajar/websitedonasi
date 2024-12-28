<?php if ($transaksi->get_bukti_transfer() != "") : ?>
    <script>
        swal({
            title : "Bukti telah dikirim",
            icon : "warning"
        }).then(()=>{
            window.location.href = "donasi.php";
        });
    </script>
<?php endif?>
<style>
    div.has(.row-box) {
        overflow: auto;
    }

    .row-box {
        width: 100%;
    }

    .row-box p {
        display: block;
        white-space: nowrap;

    }
</style>
<section id="content">
    <!-- Header -->
    <header class="parallax-header-tn">
        <h1>DONASI</h1>
    </header>
    <section class="content-section-tn container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="p-4 rounded shadow" style="background-color: #f8f9fa;">
                    <h2 class="text-center mb-4">Konfirmasi Donasi</h2>
                    <h5 class="text-start mt-5">Data Donatur</h5>
                    <div class="mx-2 border mb-5" style="overflow: auto; ">
                        <div class="row-box row row-cols-2 text-start">

                            <p>Nama</p>
                            <p>: <?= $transaksi->get_donatur() ?></p>

                            <p>Waktu Transaksi</p>
                            <p>: <?= $transaksi->get_tanggal() ?></p>

                            <p>Email</p>
                            <p>: <?= $transaksi->get_email() ?></p>

                            <p>No Hp</p>
                            <p>: <?= $transaksi->get_no_hp() ?></p>

                            <p>Pesan</p>
                            <p>: <?= $transaksi->get_pesan() ?></p>
                        </div>
                    </div>
                    <h5 class="text-start">Metode Pembayaran</h5>
                    <div class="mx-2 border mb-3">
                        <div class="row-box row row-cols-2 text-start">
                            <p>Nama Metode</p>
                            <p>: <?= $transaksi->get_model()->get_nama() ?></p>

                            <p>Nomer Tujuan</p>
                            <p>: <?= $transaksi->get_model()->get_keterangan() ?></p>

                            <p>Nominal</p>
                            <p>: Rp.<?= number_format($transaksi->get_jumlah(), 2, ',', '.') ?></p>
                        </div>
                    </div>
                    <p class="mb-0 mt-5">silakan melakukan transfer, lalu kirim bukti transfer ke input dibawah ini.</p>
                    <p>(link halaman ini akan dikirim ke email anda)</p>
                    <form action="" method="post" enctype="multipart/form-data" id="form-konfirmasi">
                        <div class="row row-cols-2 align-items-center">
                            <div class="col text-start">
                                <label for="">Bukti Transfer</label>
                            </div>
                            <div class="col">
                                <input class="form-control" type="file" name="image" required>
                            </div>
                            <div></div>
                        </div>
                        <button class="btn btn-success px-5 py-3 fs-4 fw-bold mt-3" type="button" id="submit-btn" name="submit-konfirmasi">Konfirmasi</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>
<script src="views/js/konfirmasi.js"></script>