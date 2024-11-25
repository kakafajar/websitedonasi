<?php if ($model != null) { ?>
<div class="modal fade" tabindex="-1" id="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="modalform" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row row-cols-2">
                            <label for="">Id</label>
                            <input type="text" disabled value='<?= $model->get_id() ?>'>
                            <label for="">Nama</label>
                            <input type="text" name="nama" value='<?= $model->get_nama() ?>'>
                            <label for="">Keterangan</label>
                            <input type="text" name="keterangan" value='<?= $model->get_keterangan() ?>'>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="submitmodal()">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    window.addEventListener('DOMContentLoaded', event => {
        document.getElementById('modal').show();
    });
</script>
<?php } ?>

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
                <button class="btn btn-primary mb-3">Add Data</button>
                <table id="datatable">
                    <thead>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php foreach($models as $model) { ?>
                            <tr>
                                <td><?=$model->get_id()?></td>
                                <td><?=$model->get_nama()?></td>
                                <td><?=$model->get_keterangan()?></td>
                                <td>
                                    <a href="?edit=<?= $model->get_id() ?>" class="btn btn-primary">Edit</button>
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
<script>
    const myModal = new bootstrap.Modal('#modal', {
        keyboard: false
    })
    myModal.show();

</script>