<!-- functions.php -->
<?php
include '../../config.php';

// Insert record
function addRecord($conn, $oznaka, $id_generacije, $id_smera) {
  $conn->query("INSERT INTO odeljenja (Oznaka, ID_generacije, ID_smera) VALUES ('$oznaka', '$id_generacije', '$id_smera')");
}

// Update record
function updateRecord($conn, $id, $oznaka, $id_generacije, $id_smera) {
  $conn->query("UPDATE odeljenja SET Oznaka='$oznaka', ID_generacije='$id_generacije', ID_smera='$id_smera' WHERE ID_odeljenja=$id");
}

// Delete record
function deleteRecord($conn, $id) {
  $conn->query("DELETE FROM odeljenja WHERE ID_odeljenja=$id");
}

// Fetch records
function fetchRecords($conn) {
  $result = $conn->query("SELECT * FROM odeljenja");
  return $result;
}

// Fetch generations
function fetchGenerations($conn) {
  $result = $conn->query("SELECT * FROM generacije");
  return $result;
}

// Fetch departments
function fetchDepartments($conn) {
  $result = $conn->query("SELECT * FROM smerovi");
  return $result;
}
?>
