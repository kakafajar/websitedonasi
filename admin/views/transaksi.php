<section id="content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Transaksi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Transaksi</li>
        </ol>
        <div class="card mt-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                
            </div>
            <div class="card-body">
                <table id="datatable">
                    <thead>
                        <th>Id</th>
                        <th>Donatur</th>
                        <th>Model Pembayaran</th>
                        <th>Jumlah</th>
                        <th>Pesan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php foreach($transactions as $transaction) { ?>
                            <tr>
                                <td><?=$transaction->get_id()?></td>
                                <td><?=$transaction->get_donatur()?></td>
                                <td><?=$transaction->get_idmodel()?></td>
                                <td><?=$transaction->get_jumlah()?></td>
                                <td><?=$transaction->get_pesan()?></td>
                                <td><?=$transaction->get_tanggal()?></td>
                                <td>
                                    <a href="" class="btn btn-primary">Edit</a>
                                    <a href="" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>