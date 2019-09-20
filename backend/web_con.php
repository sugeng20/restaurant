<?php

// Koneksi database
$conn = mysqli_connect("localhost", "root", "", "restaurant");

$query1 = mysqli_query($conn, "SELECT * FROM masakan ORDER BY nama_masakan DESC") or die(mysql_error());

$query2 = mysqli_query($conn, "SELECT * FROM user ORDER BY id_user DESC") or die(mysql_error());
