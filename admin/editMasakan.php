<?php
$title = 'Tambah Masakan';
$status = ['Tersedia', 'Habis'];
session_start();
include('templates/header.php');
include('templates/sidebar.php');
include('templates/topbar.php');
include('../backend/web_con.php');
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM masakan WHERE id_masakan = '$id'");
$data = mysqli_fetch_array($query);
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Masakan</h1>

    </div>
    <!-- Tambah Row -->
    <div class="row">
        <div class="col-lg-8">
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama_masakan">Nama Masakan</label>
                    <input type="text" class="form-control" name="nama_masakan" id="nama_masakan" placeholder="Masukan nama masakan" autocomplete="off" value="<?= $data['nama_masakan'] ?>">
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" name="harga" id="harga" placeholder="Masukan harga" autocomplete="off" value="<?= $data['harga'] ?>">
                </div>
                <div class=" form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <?php foreach ($status as $st) : ?>
                            <?php if ($st === $data['status_masakan']) : ?>
                                <option value="<?= $st ?>" selected><?= $st ?></option>
                            <?php else : ?>
                                <option value="<?= $st ?>"><?= $st ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="edit">Edit Maskan</button>
                </div>
            </form>
            <?php
            if (isset($_POST['edit'])) {
                $masakan = $_POST['nama_masakan'];
                $harga = $_POST['harga'];
                $status = $_POST['status'];
                $sql = "UPDATE masakan SET
                        nama_masakan = '$masakan',
                        harga = '$harga',
                        status_masakan = '$status'
                        WHERE id_masakan = '$id'";
                $input = mysqli_query($conn, $sql);
                if ($input) {
                    echo '<div class="alert alert-success">Berhasil Edit Data! <a href="masakan.php">Kembali</a></div>';
                } else {
                    echo '<div class="alert alert-danger">Gagal Edit Data!</a></div>';
                }
            }
            ?>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include('templates/footer.php') ?>