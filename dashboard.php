<?php
 session_start(); 
 if(!isset($_SESSION['id']) && !isset($_SESSION['email'])){
  $msg = "Access denied";
  header("Location: login.php?msg=".$msg);
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
      <li><a href="http://localhost/pablito/logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>  

  <!-- body -->
  <div class="">
    <div class="container">
      <h1>Welcome to Dashboard </h1>
    </div>
  </div>
  
  <script src="./js/jquery.js"></script>
  <script src="./js/bootsrap.js"></script>
</body>
</html>
