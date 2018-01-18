
<?php
include './database/db_connect_main.php';
session_start(); 
$errmsg = "";

if(isset($_GET['email'])){
  $email = $_GET["email"];
  $password = $_GET["password"];
 
  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    $sql = "SELECT * FROM users WHERE email ='$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        header("Location: dashboard.php?email=".$_SESSION['email']);
      }
    }else{
      $errmsg = "<div class='alert alert-danger'>
        Password is incorrect
      </div>";
    }
  }else{
    $errmsg = "<div class='alert alert-warning'>
      Email address not found
    </div>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="./css/bootstrap.css">
  <link rel="stylesheet" href="./css/style.css">
  <title>Document</title>
</head>
<body>
  <!-- header -->
  <nav class="navbar navbar-inverse index_nav">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="http://localhost/pablito/">Hacking Website</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="http://localhost/pablito/login.php">Login</a></li>
      <li><a href="http://localhost/pablito/register.php">Register</a></li>
      </ul>
    </div>
  </div>
</nav>  

  <!-- body -->
  <div class="main">
    <h1>Login</h1>
    <?php if(isset($errmsg)){
      echo $errmsg;
    }
    ?>
    <?php 
        if(isset($_GET['msg'])){
          $msg = $_GET['msg'];
          $msgafter = ",please login!";
          echo "<div class='alert alert-danger ssalert'>".$msg.$msgafter."</div>";
        } 
      ?>
    <form action="#" method="get">
      <div class="form-group">
        <label for="username">Email</label>
        <input type="text" class="form-control" id="username" name="email" required> 
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="password" required> 
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
  
  <script src="./js/jquery.js"></script>
  <script src="./js/bootsrap.js"></script>
</body>
</html>