<?php
$title = 'Masakan';
session_start();
include('templates/header.php');
include('templates/sidebar.php');
include('templates/topbar.php');
include('../backend/web_con.php');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Masakan</h1>

    </div>

    <div class="row">
        <div class="col">
            <a href="tambahMasakan.php" class="btn btn-primary mb-3">Tambah Masakan</a>


            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Status</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($query1) == 0) : ?>
                        <tr>
                            <div class="alert alert-danger">
                                Tidak ada Data
                            </div>
                        </tr>
                        <?php else : $no = 1;
                            while ($data = mysqli_fetch_assoc($query1)) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $data['nama_masakan'] ?></td>
                                <td><?= $data['harga'] ?></td>
                                <td><?= $data['status_masakan'] ?></td>
                                <td>
                                    <a href="editMasakan.php?id=<?= $data['id_masakan'] ?>" class="badge badge-warning">edit</a>
                                    <a href="hapusMasakan.php?id=<?= $data['id_masakan'] ?>" class="badge badge-danger" onclick="return confirm('Anda Yakin?')">hapus</a>
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