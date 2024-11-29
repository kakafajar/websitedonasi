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
                            <label for="form-id">Id</label>
                            <input type="text" id="form-id" name="id" readonly>
                            <label for="form-donatur">Donatur</label>
                            <input type="text" id="form-nama" name="nama">
                            <label for="form-email">Email</label>
                            <input type="text" id="form-email" name="email">
                            <label for="form-model">Model Pembayaran</label>
                            <select class="form-select" name="model" id="form-model">
                                <?php foreach($models as $model) { ?>
                                    <option value="<?=$model->get_id()?>"><?=$model->get_nama()?></option>
                                <?php } ?>
                            </select>
                            <label for="form-jumlah">Jumlah</label>
                            <input type="text" id="form-jumlah" name="jumlah">
                            <label for="form-pesan">Pesan</label>
                            <input type="text" id="form-pesan" name="pesan">
                            <label for="form-status">Status</label>
                            <input type="text" id="form-status" name="status">
                            <label for="form-tanggal">Tanggal</label>
                            <input type="text" id="form-tanggal" name="tanggal">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submit-button">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src='./views/modalform.js'></script>

<div class="modal fade" tabindex="-1" id="modal-bukti">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Bukti Transfer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <img id="bukti-transfer-img" src="" alt="" height="500px">
                </div>
            </div>
        </div>
    </div>
</div>

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
                        <th>Email Donatur</th>
                        <th>Model Pembayaran</th>
                        <th>Jumlah</th>
                        <th>Pesan</th>
                        <th>Bukti Transfer</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php foreach($transactions as $transaction) { ?>
                            <tr>
                                <td><?=$transaction->get_id()?></td>
                                <td><?=$transaction->get_donatur()?></td>
                                <td><?=$transaction->get_email()?>
                                <td><?=$transaction->get_model()->get_nama()?></td>
                                <td><?=$transaction->get_jumlah()?></td>
                                <td><?=$transaction->get_pesan()?></td>
                                <td>
                                    <button class="btn btn-primary" 
                                    onclick="
                                    showimg('../<?= $transaction->get_bukti_transfer() ?>')
                                    ">Show</button>
                                </td>
                                <td><?=$transaction->get_status()?></td>
                                <td><?=$transaction->get_tanggal()?></td>
                                <td>
                                    <button class="btn btn-primary" onclick="edit(this)">Edit</button>
                                    <button class="btn btn-danger" onclick="erase(this)">
                                        <a href="?mode=delete&id=<?=$transaction->get_id()?>" onclick="event.stopPropagation()"></a>
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<script>
    const bukti_transfer_modal = new bootstrap.Modal('#modal-bukti', {
        keyboard: false
    });
    const bukti_transfer_img = document.getElementById("bukti-transfer-img");

    function showimg(url){
        console.log(url);
        bukti_transfer_img.src = url;

        bukti_transfer_modal.show();
    }
</script>