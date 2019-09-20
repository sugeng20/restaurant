<?php

session_start();

// Mengambil input dari login
$user = $_POST['username'];
$password = $_POST['password'];
$_SESSION['user'] = $user;

include('web_con.php');

// Mengambil data dari tabel user dengan Username
$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user' ");

// Validasi
if (mysqli_num_rows($result) === 1) {
	// cek password
	$row = mysqli_fetch_assoc($result);
	if ($password == $row["password"]) {
		if ($row['id_level'] == "Admin") {
			$_SESSION["login"] = "admin";
			header("Location: ../admin/index.php");
			exit;
		} else if ($row['id_level'] == "Waiter") {
			$_SESSION["login"] = 2;
			header("Location: ../user.php");
			exit;
		} else if ($row['id_level'] == "Pelanggan") {
			$_SESSION["login"] = 3;
			header("Location: register.html");
			exit;
		} else if ($row['id_level'] == "Owner") {
			$_SESSION["login"] = 4;
			header("Location: register.html");
			exit;
		} else if ($row['id_level'] == "Kasir") {
			$_SESSION["login"] = 5;
			header("Location: register.html");
			exit;
		}
	} else {
		?>
		<script language="JavaScript">
			alert('Password tidak sesuai !');
			document.location = '../login.html';
		</script>
	<?php
		}
	} else {
		?>
	<script language="JavaScript">
		alert('Username tidak sesuai !');
		document.location = '../login.html';
	</script>
<?php
}
