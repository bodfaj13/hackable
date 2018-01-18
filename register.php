
<?php
$email = "";
include './database/db_connect_main.php';

$msg = "";
$errmsg = "";

if(isset($_GET['email'])){
  $email = $_GET["email"];
  $password = $_GET["password"];
 
  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
      $errmsg = "<div class='alert alert-warning'>
      Email address already exits
    </div>";
  }else{
    $sql = "INSERT INTO users VALUES ('','$email','$password')";
    if (mysqli_query($conn, $sql)) {
      $msg = "<div class='alert alert-success'>
      User registered successfully
    </div>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    $email = "";
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
  <title>Hacking Website</title>
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
      <li><a href="http://localhost/pablito/login.php">Login</a></li>
      <li class="active"><a href="http://localhost/pablito/register.php">Register</a></li>
      </ul>
    </div>
  </div>
</nav>  

  <!-- body -->
  <div class="main">
    <h1>Register</h1>
    <?php if(isset($errmsg)){
      echo $errmsg;
    }
    ?>
    <?php if(isset($msg)){
      echo $msg;
    }
    ?>
    <form action="#" method="get">
      <div class="form-group">
        <label for="email">email</label>
        <input type="email" class="form-control" id="email" name="email" value = "<?php echo $email?>" required> 
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