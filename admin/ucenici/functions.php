<!-- functions.php -->
<?php
include '../../config.php';

// Insert record
function addRecord($conn, $jmbg, $imePrezime, $id_pola, $id_odeljenja) {
  $conn->query("INSERT INTO ucenici (JMBG, ImeIPrezime, ID_pola, ID_odeljenja) VALUES ('$jmbg', '$imePrezime', '$id_pola', '$id_odeljenja')");
}

// Update record
function updateRecord($conn, $id, $jmbg, $imePrezime, $id_pola, $id_odeljenja) {
  $conn->query("UPDATE ucenici SET JMBG='$jmbg', ImeIPrezime='$imePrezime', ID_pola='$id_pola', ID_odeljenja='$id_odeljenja' WHERE ID_ucenika=$id");
}

// Delete record
function deleteRecord($conn, $id) {
  $conn->query("DELETE FROM ucenici WHERE ID_ucenika=$id");
}

// Fetch records
function fetchRecords($conn) {
  $result = $conn->query("SELECT * FROM ucenici");
  return $result;
}

// Fetch genders
function fetchGenders($conn) {
  $result = $conn->query("SELECT * FROM polovi");
  return $result;
}

// Fetch departments
function fetchDepartments($conn) {
  $result = $conn->query("SELECT * FROM view_imena_odeljenja");
  return $result;
}
?>
