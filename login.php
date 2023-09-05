<?php

include 'config.php';

session_start();

if (isset($_SESSION['nama'])) {
  header("Location: index.php");
}

if (isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = ($_POST['password']);
  $sql = "SELECT * FROM usert WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['nama'] = $row['nama'];
    header("Location : index.php");
  } else {
    echo "<script>alert('Email atau password Anda Salah. Silahkan coba lagi')</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/bootstrap.js>">
    <link rel="stylesheet" href="js/bootstrap.min.js">
    <style>
        body{
            background-color: white;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            max-width: 35%;
            margin-left: 32%;
        }
        .container{
            background-color: white;
            box-shadow: 18px -8px 12px 4px rgba(0,0,0,0.75);
-webkit-box-shadow: 18px -8px 12px 4px rgba(0,0,0,0.75);
-moz-box-shadow: 18px -8px 12px 4px rgba(0,0,0,0.75);
        }
        .form-container input[type="email"],
        .form-container input[type="password"]{
            width: 100%;
            padding: 8px;
            border-radius: 2px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
    <form>
  <div class="mb-3">
    <element class="form-container">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <element class="form-container">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button><br><br>
  <a href="register.php">Register</a>
</form>
    </div>
</body>
</html>