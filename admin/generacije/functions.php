<!-- functions.php -->
<?php
include '../../config.php';

// Insert record
function addRecord($conn, $ime) {
  $conn->query("INSERT INTO generacije (Ime) VALUES ('$ime')");
}

// Update record
function updateRecord($conn, $id, $ime) {
  $conn->query("UPDATE generacije SET Ime='$ime' WHERE ID_generacije=$id");
}

// Delete record
function deleteRecord($conn, $id) {
  $conn->query("DELETE FROM generacije WHERE ID_generacije=$id");
}

// Fetch records
function fetchRecords($conn) {
  $result = $conn->query("SELECT * FROM generacije");
  return $result;
}
?>
