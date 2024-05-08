<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'upis_plus');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
