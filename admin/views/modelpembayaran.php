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
                            
                            <label for="form-nama">Nama</label>
                            <div class="col">
                                <input class="form-control" type="text" id="form-nama" name="nama" required>
                            </div>
                            
                            <label for="form-keterangan">Keterangan</label>
                            <div class="col">
                                <input class="form-control" type="text" id="form-keterangan" name="keterangan" required>
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

<section id="content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Model Pembayaran</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Model Pembayaran</li>
        </ol>
        <div class="card mt-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                
            </div>
            <div class="card-body">
                <button class="btn btn-primary mb-3" id="add-data-btn">Add Data</button>
                <div class="mb-3 align-items-center" id="selected-options" style="display:none;">
                    <button class="btn btn-danger me-2" id="delete-all-btn">
                        Delete yang dipilih
                    </button>
                    <h6 id="selected-counters">x25</h6>
                </div>
                <table id="datatablehtml">
                    <thead>
                        <th>
                            <input class="form-check-input" type="checkbox" id="all-data-checkbox">
                        </th>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php foreach($models as $model) { ?>
                            <tr>
                                <td>
                                    <input class="form-check-input selected-checkbox" type="checkbox" id="data-checkbox" data-id="<?=$model->get_id()?>">
                                </td>
                                <td><?=$model->get_id()?></td>
                                <td><?=$model->get_nama()?></td>
                                <td><?=$model->get_keterangan()?></td>
                                <td>
                                    <button class="btn btn-primary" id="edit-data-btn">Edit</button>
                                    <button class="btn btn-danger" id="delete-data-btn" data-id="<?=$model->get_id()?>">
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
<script src='js/modalform.js'></script>