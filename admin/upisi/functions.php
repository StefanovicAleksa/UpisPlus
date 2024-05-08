<!-- functions.php -->
<?php
include '../../config.php';

// Insert record
function addRecord($conn, $godina, $id_upisnogRoka, $id_ucenika, $id_smeraFakulteta, $imeIPrezime, $jmbg) {
  $conn->query("INSERT INTO upisi (Godina, ID_upisnogRoka, ID_ucenika, ID_smeraFakulteta, ImeIPrezime, JMBG) VALUES ('$godina', '$id_upisnogRoka', '$id_ucenika', '$id_smeraFakulteta', '$imeIPrezime', '$jmbg')");
}

// Update record
function updateRecord($conn, $id, $godina, $id_upisnogRoka, $id_ucenika, $id_smeraFakulteta) {
  $conn->query("UPDATE upisi SET Godina='$godina', ID_upisnogRoka='$id_upisnogRoka', ID_ucenika='$id_ucenika', ID_smeraFakulteta='$id_smeraFakulteta' WHERE ID_upisa=$id");
}

// Delete record
function deleteRecord($conn, $id) {
  $conn->query("DELETE FROM upisi WHERE ID_upisa=$id");
}

// Fetch records
function fetchRecords($conn) {
  $result = $conn->query("SELECT * FROM upisi");
  return $result;
}

// Fetch registration periods
function fetchRegistrationPeriods($conn) {
  $result = $conn->query("SELECT * FROM upisniRokovi");
  return $result;
}

// Fetch students
function fetchStudents($conn) {
  $result = $conn->query("SELECT * FROM ucenici");
  return $result;
}

// Fetch departments
function fetchDepartments($conn) {
  $result = $conn->query("SELECT * FROM smeroviFakulteta");
  return $result;
}


function fetchFacultyName($conn, $facultyId) {
  $result = $conn->query("SELECT Ime FROM fakulteti WHERE ID_fakulteta=$facultyId");
  $row = $result->fetch_assoc();
  return $row['Ime'];
}
?>
