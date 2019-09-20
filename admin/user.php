<?php
$title = 'User';
include('templates/header.php');
include('templates/sidebar.php');
include('templates/topbar.php');
include('../backend/web_con.php');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- User -->
    <div class="row">
        <div class="col">
            <h5>Daftar User</h5>
            <a href="tambahUser.php" class="btn btn-primary mb-3">Tambah User</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">level</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($query2) == 0) : ?>
                        <tr>
                            <div class="alert alert-danger">
                                Tidak ada Data
                            </div>
                        </tr>
                        <?php else : $no = 1;
                            while ($data = mysqli_fetch_assoc($query2)) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $data['nama_user'] ?></td>
                                <td><?= $data['username'] ?></td>
                                <td><?= $data['id_level'] ?></td>
                                <td>
                                    <a href="editUser.php?id=<?= $data['id_user'] ?>" class="badge badge-warning">edit</a>
                                    <a href="" class="badge badge-danger">hapus</a>
                                </td>
                            </tr>

                    <?php $no++;
                        endwhile;
                    endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include('templates/footer.php') ?>