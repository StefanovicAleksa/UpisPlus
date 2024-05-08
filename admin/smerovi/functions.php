<!-- functions.php -->
<?php
include '../../config.php';

// Insert record
function addRecord($conn, $ime) {
  $conn->query("INSERT INTO smerovi (Ime) VALUES ('$ime')");
}

// Update record
function updateRecord($conn, $id, $ime) {
  $conn->query("UPDATE smerovi SET Ime='$ime' WHERE ID_smera=$id");
}

// Delete record
function deleteRecord($conn, $id) {
  $conn->query("DELETE FROM smerovi WHERE ID_smera=$id");
}

// Fetch records
function fetchRecords($conn) {
  $result = $conn->query("SELECT * FROM smerovi");
  return $result;
}
?>
