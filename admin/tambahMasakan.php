<?php
$title = 'Tambah Masakan';
$status = ['Tersedia', 'Habis'];
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
        <h1 class="h3 mb-0 text-gray-800">Tambah Masakan</h1>

    </div>
    <!-- Tambah Row -->
    <div class="row">
        <div class="col-lg-8">
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama_masakan">Nama Masakan</label>
                    <input type="text" class="form-control" name="nama_masakan" id="nama_masakan" placeholder="Masukan nama masakan" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" name="harga" id="harga" placeholder="Masukan harga" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <?php foreach ($status as $st) : ?>
                            <option value="<?= $st ?>"><?= $st ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="tambah">Tambah Maskan</button>
                </div>
            </form>
            <?php
            if (isset($_POST['tambah'])) {
                $masakan = $_POST['nama_masakan'];
                $harga = $_POST['harga'];
                $status = $_POST['status'];
                $input = mysqli_query($conn, "INSERT INTO masakan VALUES(NULL, '$masakan', '$harga', '$status')") or die(mysql_error());
                if ($input) {
                    echo '<div class="alert alert-success">Berhasil Menambahkan Data! <a href="masakan.php">Kembali</a></div>';
                } else {
                    echo '<div class="alert alert-danger">Gagal Menambahkan Data!</a></div>';
                }
            }
            ?>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include('templates/footer.php') ?>