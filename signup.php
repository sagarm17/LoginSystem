<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include 'partials/_dbconnect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];

  //Chech whether this username exists
  $existsSql = "SELECT * FROM `user` WHERE username='$username'";
  $result = mysqli_query($conn, $existsSql);
  $numExistRows= mysqli_num_rows($result);
  if($numExistRows > 0){
      $showError = "Username  already exists";
  }
  else{
    $exists=false;
    if(($password == $cpassword)){
    $sql= "INSERT INTO `user` (`username`, `password`, `date`) VALUES ('$username', '$password', current_timestamp())";
    $result = mysqli_query($conn, $sql);
      if ($result){
        $showAlert = true;
        }
    }
    else{
      $showError = "Passwords do not Match";
    }
  }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
  <?php require 'partials/_nav.php'; ?>
  <?php
    if($showAlert){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if($showError){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong>'. $showError .'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }  
  ?>  
  <div class="container" >
  <h1 class="text-center my-4" ><b>SignUp to our Website - </b></h1>
    <form action="/02_Login_&_Registration_Sys/signup.php" method="post">
      <div class="mb-3" class="mt-11">
        <label for="username" class="form-label" class="my-11">Username</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
      </div>           
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="cpassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="cpassword" name="cpassword" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Make sure to type same password</div>
      <button type="submit" class="btn btn-primary" >SignUp</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>