<!-- UNtuk warna pending (merah) dan confirmed (hijau) -->
<style>
    tr:has(td):has(value.row-pending){
        /* border-color:rgb(142, 142, 142); */
        background-image:linear-gradient(to top, rgba(255, 156, 168, 0.4), white);
    }
    tr:has(td):has(value.row-confirmed){
        /* border-color:rgb(142, 142, 142); */
        background-image:linear-gradient(to top, rgba(167, 255, 214, 0.62), white);
    }
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.4/css/dataTables.dateTime.min.css">
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
                            <div class="col">
                                <input class="form-control" type="text" id="form-id" name="id" readonly>
                            </div>
                            
                            <label for="form-donatur">Donatur</label>
                            <div class="col">
                                <input class="form-control" type="text" id="form-nama" name="nama">
                            </div>
                            
                            <label for="form-email">Email</label>
                            <div class="col">
                                <input class="form-control" type="text" id="form-email" name="email">
                            </div>

                            <label for="form-no-hp">No HP</label>
                            <div class="col">
                                <input class="form-control" type="text" id="form-no-hp" name="no-hp">
                            </div>

                            <label for="form-model">Model Pembayaran</label>
                            <div class="col">
                                <select class="form-select col" name="model" id="form-model">
                                    <?php foreach($models as $model) { ?>
                                        <option value="<?=$model->get_id()?>"><?=$model->get_nama()?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <label for="form-jumlah">Jumlah</label>
                            <div class="col">
                                <input class="form-control" type="text" id="form-jumlah" name="jumlah">
                            </div>
                            
                            <label for="form-pesan">Pesan</label>
                            <div class="col">
                                <textarea class="form-control" name="pesan" id="form-pesan"></textarea>
                            </div>
                            
                            <label for="form-bukti">Bukti Transfer</label>
                            <div class="col">
                                <input class="form-control" type="file" id="form-bukti" name="bukti">
                            </div>
                            
                            <label for="form-status">Status</label>
                            <div class="col">
                                <select class="form-select" name="status" id="form-status">
                                    <option value="pending">Pending</option>
                                    <option value="finished">Confirmed</option>
                                </select>
                            </div>
                            
                            <label for="form-tanggal">Tanggal</label>
                            <div class="col">
                                <input class="form-control" type="datetime-local" id="form-tanggal" name="tanggal">
                            </div>
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

<div class="modal fade" tabindex="-1" id="modal-other">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-other-title">Bukti Transfer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container align-items-center" id="modal-other-container">
                    <p id="pesan-content"></p>
                    <img id="bukti-transfer-img" class="img-fluid" src="" alt="">
                    <form action="?mode=edit_status_all_selected" method="post" id="status-in-other">
                        <input type="text" name="ids" style="display:none">
                        <select class="form-select" name="status" id="form-status">
                            <option value="pending">Pending</option>
                            <option value="finished">Confirmed</option>
                        </select>
                        <button type="button" class="btn btn-primary w-100 mt-2" id="submit-form-status-btn">Save</button>
                    </form>
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
                <div class="d-flex mb-3">
                    <button class="btn btn-primary" id="add-data-btn" >Add Data</button>
                    <button class="btn btn-secondary" id="export-csv-btn">Export CSV</button>
                </div>
                <div class="d-flex ">
                    <div class="d-flex me-2 align-items-center">
                        <label for="from">Dari</label>
                        <input type="text" id="from-date" class="form-control">
                    </div>
                    <div class="d-flex me-2 align-items-center">
                        <label for="to">Ke</label>
                        <input type="text" id="to-date" class="form-control">
                    </div>
                    <button type="button" class="btn btn-primary" id="filter-date-btn">Filter</button>
                    <button type="button" class="btn btn-primary" id="clear-filter-date-btn">Clear</button>
                </div>
                <div class="mb-3 align-items-center" id="selected-options" style="display:none;">
                    <button class="btn btn-danger" id="delete-all-btn" href="?mode=delete_all_selected">Delete yang dipilih</button>
                    <button class="btn btn-primary me-2" id="edit-all-btn">Edit Status yang dipilih</button>
                    <h6 id="selected-counters">x25</h6>
                </div>
                <table id="datatablehtml" class="table cell-border hover">
                    <thead>
                        <th>
                            <input class="form-check-input" type="checkbox" id="all-data-checkbox">
                        </th>
                        <th>Id</th>
                        <th>Donatur</th>
                        <th>Email Donatur</th>
                        <th>No HP Donatur</th>
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
                                <td>
                                    <input class="form-check-input selected-checkbox" type="checkbox" id="data-checkbox" data-id="<?=$transaction->get_id()?>">
                                </td>
                                <td><?=$transaction->get_id()?></td>
                                <td><?=$transaction->get_donatur()?></td>
                                <td><?=$transaction->get_email()?></td>
                                <td><?=$transaction->get_no_hp()?></td>
                                <td>
                                    <value style="display:none;" forcsv="<?=$transaction->get_model()->get_nama()?>"><?=$transaction->get_model()->get_id()?></value>
                                    <a href="" onclick="search_on_table(this, '<?=$transaction->get_model()->get_id()?>', 'modelpembayaran.php')"><?=$transaction->get_model()->get_nama()?></a>
                                </td>
                                <td><?=$transaction->get_jumlah()?></td>
                                <td>
                                    <value style="display:none;"><?=$transaction->get_pesan()?></value>
                                    <button class="btn btn-primary" id="show-msg-btn">Show</button>
                                </td>
                                <td>
                                    <button class="btn btn-primary" img='../<?= $transaction->get_bukti_transfer() ?>'
                                    id="show-img-btn">Show</button>
                                </td>
                                <td>
                                    <!-- class untuk menambahkan warna -->
                                    <value class="
                                        <?php if ($transaction->get_status() == 'pending') {?>
                                            row-pending
                                        <?php } else { ?>
                                            row-confirmed
                                        <?php } ?>
                                    "><?=$transaction->get_status()?></value>
                                </td>
                                <td><?=$transaction->get_tanggal()?></td>
                                <td>
                                    <button class="btn btn-primary" id="edit-data-btn">Edit</button>
                                    <button class="btn btn-danger" id="delete-data-btn" href="?mode=delete&id=<?=$transaction->get_id()?>">Hapus</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<script src='js/modalform.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.5.4/js/dataTables.dateTime.min.js"></script>
<script src="js/transaksi.js"></script>