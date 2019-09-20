<?php
$title = 'Dashboard';
include('templates/header.php');
include('templates/sidebar.php');
include('templates/topbar.php');
include('../backend/web_con.php');
?>



<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col">
      <h5>Daftar Masakan</h5>
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
                  <a href="" class="badge badge-warning">edit</a>
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

  <!-- User -->
  <div class="row">
    <div class="col">
      <h5>Daftar User</h5>
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
                  <a href="" class="badge badge-warning">edit</a>
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
<!-- End of Main Content -->
<?php include('templates/footer.php') ?>