<?php
require 'config.php';
if(isset($_POST["register"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $brand = $_POST["simcardBrand"];
  $phone = $_POST["phone"];

  $user = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($user) > 0){
    echo
    "
    <script> alert('Username/Email Has Already Taken'); </script>
    ";
  }
  else{
    $query = "INSERT INTO tb_users VALUES('', '$name', '$username', '$email', '$brand', '$phone')";
    mysqli_query($conn, $query);
    echo
    "
    <script> alert('Registration Successful'); </script>
    ";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
  </head>
  <body>
    <form class="" action="" method="post">
      <div class="title">
        <h2>REGISTER</h2>
      </div>
      <div class="half">
        <div class="item">
          <label for="">Name</label>
          <input type="text" name="name" required value="">
        </div>
        <div class="item">
          <label for="">Username</label>
          <input type="text" name="username" required value="">
        </div>
      </div>
      <div class="half">
        <div class="item">
          <label for="">Email</label>
          <input type="text" name="email" required value="">
        </div>
        <div class="item">
          <label for="">Sim Card Brand (Smart, Globe, etc..)</label>
          <input type="text" name="simcardBrand" required value="">
        </div>
      </div>
      <div class="full">
        <div class="item">
          <label for="">Phone</label>
          <input type="text" name="phone" required value="">
        </div>
      </div>
      <div class="action">
        <input type="submit" name = "register" value = "REGISTER">
      </div>
    </form>
  </body>
</html>
