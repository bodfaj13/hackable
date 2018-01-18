<?php
include './database/db_connect.php';

//create db
$sql = "CREATE DATABASE IF NOT EXISTS ".$dbname;
if (mysqli_query($conn, $sql)) {
    // echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

// echo "<br/>";

$conn = mysqli_connect($servername, $username, $password, $dbname);
//create table
$sql = "CREATE TABLE IF NOT EXISTS ". $dbtable ."(
  id INT(6) AUTO_INCREMENT PRIMARY KEY, 
  email VARCHAR(30) NOT NULL,
  password VARCHAR(30) NOT NULL
  )";
  
if (mysqli_query($conn, $sql)) {
    // echo "User created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS ". $dbtable2 ."(
  id INT(6) AUTO_INCREMENT PRIMARY KEY, 
  email VARCHAR(30) NOT NULL,
  name VARCHAR(30) NOT NULL,
  comments VARCHAR(255) NOT NULL
  )";
  
if (mysqli_query($conn, $sql)) {
    // echo "User created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// echo "<br/>";

//dumping data: username => admin, password => admin
// $sql = "INSERT INTO ". $dbtable ." ( username, password )
// VALUES ('admin', 'admin')";

// if (mysqli_query($conn, $sql)) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }
?>