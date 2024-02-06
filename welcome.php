<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;
}
//this code will not send us on other page if session is already true and set it means that it will execute following html code
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome - <?php echo $_SESSION['username']?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
  <?php require 'partials/_nav.php'; ?>
    <div class="container my-4">
    <div class="alert alert-success" role="alert">
    <h4 class="alert-heading"> Welcome - <?php echo $_SESSION['username'] ?>!</h4>
    <p>Welcome to iSecure, you are logged in as <?php echo $_SESSION['username']?> successfully</p>
    <hr>
    <p class="mb-0">Whenever you need to, be sure to logout using <a href="/02_Login_&_Registration_Sys/logout.php"> this link</a></p>
  </div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>