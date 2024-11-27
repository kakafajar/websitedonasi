<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="modal fade" tabindex="-1" id="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="modal-form" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row row-cols-2">
                            <label for="">Id</label>
                            <input type="text" id="form-id" name="id" readonly>
                            <label for="">Nama</label>
                            <input type="text" id="form-nama" name="nama">
                            <label for="">Keterangan</label>
                            <input type="text" id="form-keterangan" name="keterangan">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src='./views/modalform.js'></script>

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
                <button class="btn btn-primary mb-3" onclick="add()">Add Data</button>
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
                                <td><?=$transaction->get_model()->get_nama()?></td>
                                <td><?=$transaction->get_jumlah()?></td>
                                <td><?=$transaction->get_pesan()?></td>
                                <td><?=$transaction->get_tanggal()?></td>
                                <td>
                                    <button class="btn btn-primary" onclick="edit(this)">Edit</button>
                                    <a href="?mode=delete&id=<?= $transaction->get_id() ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>