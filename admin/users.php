<?php 
    require_once 'models/user.php';

    $users = User::get_all();

?>
<section id="content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Users</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Users</li>
        </ol>
        <div class="card mt-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                
            </div>
            <div class="card-body">
                <table id="datatable">
                    <thead>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user) { ?>
                            <tr>
                                <td><?=$user->get_id()?></td>
                                <td><?=$user->get_username()?></td>
                                <td><?=$user->get_password()?></td>
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

    $title = "Users";

    require_once 'layout.php';
?>