<?php
include 'koneksi.php';
if (isset($_POST['login'])){
    $id_karyawan= $_POST['id_karyawan'];
    $password= $_POST['password'];
    $sql="select * from karyawan where id_karyawan='$id_karyawan' and password='$password'";
    $query=mysqli_query($conn,$sql);
    $find=mysqli_num_rows($query);
    if ($find==1){
        echo '<script>alert("Login Sukses");</script>';
        echo '<script>location="payroll.php";</script>';
    } else {
        echo '<script>alert("Login Gagal");</script>';
        echo '<script>location="login.php";</script>';
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>

<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form>
					<label for="chk" aria-hidden="true">P r o f i l</label>
                    <img src="logopayroll.png"class="profile-pic"style="display: block; margin: 0 auto;">
                    <label for="chk" aria-hidden="true">Hallo Karyawan!</label>					
				</form>
			</div>

            <div class="login">
             <form method="post">
                    <label for="chk" aria-hidden="true">Login</label>
                    <input type="text" name="id_karyawan" placeholder="ID Karyawan" required="">
                    <input type="password" name="password" placeholder="Password" required="">
                    <button type="submit" name="login">Login</button>
                </form>
            </div>

	</div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>