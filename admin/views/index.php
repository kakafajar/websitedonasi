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
                        <p class="h3 text-center">Rp. <?= number_format($total_donasi_uang, 2, '.', ',') ?></p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
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
            Total Perbulan
        </div>
        <div class="card-body"><canvas id="chart" width="100%" height="30"></canvas></div>
        <div class="card-footer">
            Masih Work in progress
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script>
    const ctx = document.getElementById('chart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "Oktober", "November", "Desember"],
            datasets: [{
            label: "Jumlah Donasi",
            backgroundColor: "rgba(2,117,216,1)",
            borderColor: "rgba(2,117,216,1)",
            data: [4215, 5312, 6251, 7841, 9821, 14984],
            }],
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                    min: 0,
                    max: 20000,
                    maxTicksLimit: 5
                    },
                    gridLines: {
                    display: true
                    }
                }],
            },
            legend: {
            display: false
            }
        }
    });
</script>