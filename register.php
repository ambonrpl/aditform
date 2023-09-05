<?php

include 'config.php';

session_start();

if (isset($_SESSION['nama'])){
  header("Locarion: index.php");
}

if (isset($_POST['submit'])) {
  $nama = $_POST ['nama'];
  $email = $_POST ['email'];
  $password = ($_POST ['password']);
  $cpassword = ($_POST ['cpassword']);

  if ($password == $cpassword){
    $sql = "SELECT * FROM kaka WHERE email='$email'";
    $result = mysqli_query($conn,$sql);
    if (!$result->num_rows > 0){
      $sql = "INSERT INTO kaka
      VALUES ('', '$nama', '$email', '$password')";
      $result = mysqli_query($conn, $sqli);
      if ($result) {
        echo "<script>alert('Selamat, registrasi berhasil!') </script>";
        $nama = "";
        $email = "";
        $_POST['password'] = "";
        $_POST['cpassword'] = "";
      } else {
        echo "<script>alert('Woops! Terjadi Kesalahan.')</script>";
      }
    } else {
      echo "<script>alert ('Woops! Email Sudah Terdaftar.')</script>";
    }
  }else{
    echo "<script>alert('Password Tidak Sesuai')</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/bootstrap.js>">
    <link rel="stylesheet" href="js/bootstrap.min.js">
    <style>
        body{
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            max-height:100vh;
            max-width: 40%;
            margin-left: 30%;
            margin-top: 5vh;
        }
        .container{
            box-shadow: 10px -12px 21px 0px rgba(0,0,0,0.74);
-webkit-box-shadow: 10px -12px 21px 0px rgba(0,0,0,0.74);
-moz-box-shadow: 10px -12px 21px 0px rgba(0,0,0,0.74);
        }
        
        </style>
</head>
<body>
    <div class="container">
    <div class="row">


</div>
<form class="row g-3" action="" method="post">
  <div class="col-12">
  <label for="inputPassword4" class="form-label">Name</label>
    <input type="text" name="nama" class="form-control" placeholder="Name" aria-label="First name">
  </div>
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="inputPassword4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Confirm Password</label>
    <input type="password" name="cpassword" class="form-control" id="inputPassword4">
  </div>
  <div class="col-12">
    <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
  </div>
  <a href="login.php">Login</a>
</form>
    </div>
</body>
</html>