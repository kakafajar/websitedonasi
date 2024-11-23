<?php 
    require_once 'models/modelpembayaran.php';

    $models = ModelPembayaran::get_all();

?>
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
<?php

    $title = "Model Pembayaran";

    require_once 'layout.php';
?>