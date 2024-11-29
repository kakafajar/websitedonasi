<section id="content">
    <!-- Header -->
    <header class="parallax-header-tn">
        <h1>DONASI</h1>
    </header>
    <section class="content-section-tn container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="p-4 rounded shadow" style="background-color: #f8f9fa;">
            <h2 class="text-center mb-4">Formulir Donasi</h2>
            <?php if ($submit_model == '-1') { ?>
                <form action="" method="POST">
                    <div class="mb-3 text-start">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="pesan" class="form-label">Pesan</label>
                        <textarea class="form-control" id="pesan" name="pesan" rows="3" placeholder="Pesan untuk penerima donasi"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-block">Metode Pembayaran</label>
                        <div class="d-flex flex-wrap gap-3">
                            <?php foreach($models as $model) { ?>
                                <div class="form-check d-inline-block">
                                    <input class="form-check-input" type="radio" name="metode_pembayaran" id="<?= $model->get_id() ?>" value="<?= $model->get_id() ?>" required>
                                    <label class="form-check-label" for="<?= $model->get_id() ?>"><?= $model->get_nama() ?></label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label d-block">Pilih Jumlah Donasi</label>
                        <div class="d-flex flex-wrap gap-3">
                        <div class="form-check d-inline-block">
                            <input class="form-check-input" type="radio" name="jumlah_donasi" id="donasi50" value="50000" required>
                            <label class="form-check-label" for="donasi50">Rp50.000</label>
                        </div>
                        <div class="form-check d-inline-block">
                            <input class="form-check-input" type="radio" name="jumlah_donasi" id="donasi100" value="100000">
                            <label class="form-check-label" for="donasi100">Rp100.000</label>
                        </div>
                        <div class="form-check d-inline-block">
                            <input class="form-check-input" type="radio" name="jumlah_donasi" id="donasi200" value="200000">
                            <label class="form-check-label" for="donasi200">Rp200.000</label>
                        </div>
                        <div class="form-check d-inline-block">
                            <input class="form-check-input" type="radio" name="jumlah_donasi" id="donasiLainnya" value="lainnya">
                            <label class="form-check-label" for="donasiLainnya">Lainnya</label>
                        </div>
                        </div>
                    </div>
                    <div class="mb-3" id="inputLainnya" style="display: none;">
                        <label for="jumlah_manual" class="form-label">Masukkan Jumlah Donasi</label>
                        <input type="number" class="form-control" id="jumlah_manual" name="jumlah_manual" placeholder="Masukkan jumlah donasi">
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit-donasi" class="btn btn-success">Kirim Donasi</button>
                    </div>
                </form>
            <?php } else { ?>
                <?php foreach($models as $model) {
                    if ($model->get_id() == $submit_model) { 
                ?>
                    <h2><?= $model->get_nama() ?></h2>
                    <h2><?= $model->get_keterangan() ?></h2>
                    <a href="" class="btn btn-success">Konfirmasi</a>
                <?php }} ?>
            <?php } ?>
        </div>
        </div>
    </div>
    </section>
</section>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const donasiLainnya = document.getElementById('donasiLainnya');
    const inputLainnya = document.getElementById('inputLainnya');
    const jumlahManual = document.getElementById('jumlah_manual');

    document.querySelectorAll('input[name="jumlah_donasi"]').forEach(radio => {
        radio.addEventListener('change', function () {
        if (donasiLainnya.checked) {
            inputLainnya.style.display = 'block';
            jumlahManual.required = true;
        } else {
            inputLainnya.style.display = 'none';
            jumlahManual.required = false;
            jumlahManual.value = '';
        }
        });
    });
});
</script>