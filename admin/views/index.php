<section id="content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row row-cols-3">
            <div class="col">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-title text-center pt-2">Total Donasi Uang</div>
                    <div class="card-body">
                        <p class="h3 text-center">Rp. <?= number_format($total_donasi_uang, 2, ',', '.') ?></p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="transaksi.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-success text-white mb-4">
                    <div class="card-title text-center pt-2">Total Donasi Konfirmasi</div>
                    <div class="card-body">
                        <p class="h3 text-center"><?= $total_konfirmasi ?></p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-title text-center pt-2">Total Donasi Pending</div>
                    <div class="card-body">
                        <p class="h3 text-center"><?= $total_pending ?></p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area me-1"></i>
                Total Uang Donasi
                <div class='d-flex justify-content-between'>
                    <div class='d-flex'>
                        <button class="btn btn-primary" id="perbulan" onclick="perbulan()">Perbulan</button>
                        <button class="btn btn-primary" id="pertahun" onclick="pertahun()">Pertahun</button>
                    </div>
                    <div>
                        <div id="perbulan-options" class='align-items-center'>
                            <label for="" class='me-2'>Tahun</label>
                            <select class="form-select" name="" id="perbulan-tahun-opsi" onchange="pilih_tahun_perbulan(this)">
                                <?php foreach($tahunDonasiList as $tahunDonasi) { ?>
                                    <option value="<?=$tahunDonasi?>"><?=$tahunDonasi ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div id="pertahun-options" class='align-items-center'>
                            <label for="">Dari</label>
                            <select class="form-select" name="" id="pertahun-dari-opsi" onchange="pilih_range_pertahun()">
                                <?php foreach($tahunDonasiList as $tahunDonasi) { ?>
                                    <option value="<?=$tahunDonasi?>"><?=$tahunDonasi ?></option>
                                <?php } ?>
                            </select>
                            <label for="">Ke</label>
                            <select class="form-select" name="" id="pertahun-ke-opsi" onchange="pilih_range_pertahun()">
                                <?php foreach($tahunDonasiList as $tahunDonasi) { ?>
                                    <option value="<?=$tahunDonasi?>"><?=$tahunDonasi ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <canvas hidden id="chart-uang-bulan" width="100%" height="30"></canvas>
                <canvas hidden id="chart-uang-tahun" width="100%" height="30">
            </div>
            <div class="card-footer">
                Masih Work in progress
            </div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="js/index.js"></script>