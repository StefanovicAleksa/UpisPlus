<!-- functions.php -->
<?php
include '../../config.php';

// Insert record
function addRecord($conn, $ime, $id_fakulteta) {
  $conn->query("INSERT INTO smeroviFakulteta (Ime, ID_fakulteta) VALUES ('$ime', '$id_fakulteta')");
}

// Update record
function updateRecord($conn, $id, $ime, $id_fakulteta) {
  $conn->query("UPDATE smeroviFakulteta SET Ime='$ime', ID_fakulteta='$id_fakulteta' WHERE ID_smeraFakulteta=$id");
}

// Delete record
function deleteRecord($conn, $id) {
  $conn->query("DELETE FROM smeroviFakulteta WHERE ID_smeraFakulteta=$id");
}

// Fetch records
function fetchRecords($conn) {
  $result = $conn->query("SELECT * FROM smeroviFakulteta");
  return $result;
}

// Fetch faculties
function fetchFaculties($conn) {
  $result = $conn->query("SELECT * FROM fakulteti");
  return $result;
}
?>
