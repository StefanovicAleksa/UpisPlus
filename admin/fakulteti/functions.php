<!-- functions.php -->
<?php
include '../../config.php';

// Insert record
function addRecord($conn, $ime, $id_tipaFakulteta) {
  $conn->query("INSERT INTO fakulteti (Ime, ID_tipaFakulteta) VALUES ('$ime', '$id_tipaFakulteta')");
}

// Update record
function updateRecord($conn, $id, $ime, $id_tipaFakulteta) {
  $conn->query("UPDATE fakulteti SET Ime='$ime', ID_tipaFakulteta='$id_tipaFakulteta' WHERE ID_fakulteta=$id");
}

// Delete record
function deleteRecord($conn, $id) {
  $conn->query("DELETE FROM fakulteti WHERE ID_fakulteta=$id");
}

// Fetch records
function fetchRecords($conn) {
  $result = $conn->query("SELECT * FROM fakulteti");
  return $result;
}

// Fetch types of faculties
function fetchFacultyTypes($conn) {
  $result = $conn->query("SELECT * FROM tipoviFakulteta");
  return $result;
}
?>
