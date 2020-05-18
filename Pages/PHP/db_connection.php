<?php
$servername = "localhost";
$username = "client";
$password = "client";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

//select otodb
mysqli_select_db($conn, "otodb");
?>