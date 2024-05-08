<!-- functions.php -->
<?php
include '../../config.php';

// Insert record
function addRecord($conn, $ime) {
  $conn->query("INSERT INTO upisniRokovi (Ime) VALUES ('$ime')");
}

// Update record
function updateRecord($conn, $id, $ime) {
  $conn->query("UPDATE upisniRokovi SET Ime='$ime' WHERE ID_upisnogRoka=$id");
}

// Delete record
function deleteRecord($conn, $id) {
  $conn->query("DELETE FROM upisniRokovi WHERE ID_upisnogRoka=$id");
}

// Fetch records
function fetchRecords($conn) {
  $result = $conn->query("SELECT * FROM upisniRokovi");
  return $result;
}
?>
