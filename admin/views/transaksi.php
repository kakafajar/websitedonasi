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
<script src='js/modalform.js'></script>

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

<div class="modal fade" tabindex="-1" id="modal-pesan">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Pesan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <p id="pesan-content"></p>
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
                                <td><?=$transaction->get_id()?></td>
                                <td><?=$transaction->get_donatur()?></td>
                                <td><?=$transaction->get_email()?></td>
                                <td><?=$transaction->get_no_hp()?></td>
                                <td>
                                    <value style="display:none;"><?=$transaction->get_model()->get_id()?></value>
                                    <a href="" onclick="search_on_table(this, '<?=$transaction->get_model()->get_id()?>', 'modelpembayaran.php')"><?=$transaction->get_model()->get_nama()?></a>
                                </td>
                                <td><?=$transaction->get_jumlah()?></td>
                                <td>
                                    <value style="display:none;"><?=$transaction->get_pesan()?></value>
                                    <button class="btn btn-primary" onclick="
                                        showmsg(this)
                                    ">Show</button>
                                </td>
                                <td>
                                    <button class="btn btn-primary" 
                                    onclick="
                                    showimg('../<?= $transaction->get_bukti_transfer() ?>')
                                    ">Show</button>
                                </td>
                                <td>
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
    
    const pesan_modal = new bootstrap.Modal('#modal-pesan', { keyboard:false});
    const pesan_content = document.getElementById("pesan-content");

    function showimg(url){
        bukti_transfer_img.src = url;

        bukti_transfer_modal.show();
    }

    function showmsg(tag){
        pesan_content.innerText = tag.parentElement.childNodes[1].innerText;
        pesan_modal.show();
    }

</script>