<?php
$title = 'Tambah User';
include('templates/header.php');
include('templates/sidebar.php');
include('templates/topbar.php');
include('../backend/web_con.php');
$id_level = ['Admin', 'Waiter', 'Kasir', 'Owner', 'Pelanggan'];
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id'");
$data = mysqli_fetch_array($query);
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-lg-8">
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama_user">nama_user</label>
                    <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Masukan Nama User" autocomplete="off" value="<?= $data['nama_user'] ?>">
                </div>
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username" autocomplete="off" value="<?= $data['username'] ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" id="password" placeholder="Masukan Password" autocomplete="off" value="<?= $data['password'] ?>">
                </div>
                <div class="form-group">
                    <label for="id_level">Id Level</label>
                    <select name="id_level" id="id_level" class="form-control">
                        <?php foreach ($id_level as $il) : ?>
                            <?php if ($il == $data['id_level']) : ?>
                                <option value="<?= $il ?>" selected><?= $il ?></option>
                            <?php else : ?>
                                <option value="<?= $il ?>"><?= $il ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" name="edit" class="btn btn-primary">Edit User</button>
                </div>
            </form>
            <?php
            if (isset($_POST['edit'])) {
                $nama_user = $_POST['nama_user'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $id_level = $_POST['id_level'];
                $sql = "UPDATE user SET
                            username = '$username',
                            password = '$password',
                            nama_user = '$nama_user',
                            id_level = '$id_level'
                        WHERE id_user = '$id'
                        ";
                $input = mysqli_query($conn, $sql);
                if ($input) {
                    echo '<div class="alert alert-success">Berhasil Edit Data! <a href="user.php">Kembali</a></div>';
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