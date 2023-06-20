<?php
$hostName = "localhost";
$userName = "root";
$password = "";
$dbname = "masjidwik";
 $conn = new mysqli($hostName, $userName, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>