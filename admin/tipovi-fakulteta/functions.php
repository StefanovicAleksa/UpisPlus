<!-- functions.php -->
<?php
include '../../config.php';

// Insert record
function addRecord($conn, $ime) {
  $conn->query("INSERT INTO tipoviFakulteta (Ime) VALUES ('$ime')");
}

// Update record
function updateRecord($conn, $id, $ime) {
  $conn->query("UPDATE tipoviFakulteta SET Ime='$ime' WHERE ID_tipaFakulteta=$id");
}

// Delete record
function deleteRecord($conn, $id) {
  $conn->query("DELETE FROM tipoviFakulteta WHERE ID_tipaFakulteta=$id");
}

// Fetch records
function fetchRecords($conn) {
  $result = $conn->query("SELECT * FROM tipoviFakulteta");
  return $result;
}
?>
