<?php
$servername = "localhost";
$username = "client";
$password = "client";
$data_base = "otodb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $data_base);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>