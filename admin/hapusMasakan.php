 <?php
    include('../backend/web_con.php');
    if ($_GET['id']) {
        $id = $_GET['id'];

        $sql = "DELETE FROM masakan WHERE id_masakan = '$id'";
        $input = mysqli_query($conn, $sql);
        if ($input) {
            echo '<script language="JavaScript">alert("Berhasil Menghapus Data");document.location = "masakan.php";</script>';
        } else {
            echo '<script language="JavaScript">alert("Gagal Menghapus Data");document.location = "masakan.php";</script>';
        }
    }
    ?>