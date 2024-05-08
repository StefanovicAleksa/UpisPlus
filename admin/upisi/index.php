<!-- index.php -->
<?php 
include '../../config.php'; 
include 'functions.php'; 
include "../../layout.php";

if(!isset($_SESSION['user']) || $_SESSION['role'] != 'admin') {
  header("Location: /upis_plus/account/login.php");
  exit();
}
// Handle delete operation
if(isset($_GET['delete'])){
    deleteRecord($conn,$_GET['delete']);
    header("Location: index.php");
}

// Handle edit operation
if(isset($_POST['update'])){
    $id = $_POST['edit_id'];
    $godina = $_POST['godina'];
    $id_upisnogRoka = $_POST['id_upisnogRoka'];
    $id_ucenika = $_POST['id_ucenika'];
    $id_smeraFakulteta = $_POST['id_smeraFakulteta'];
    updateRecord($conn, $id, $godina, $id_upisnogRoka, $id_ucenika, $id_smeraFakulteta);
    header("Location: index.php");
}

// Handle add operation
if(isset($_POST['save'])) {
    addRecord($conn, $_POST['godina'], $_POST['id_upisnogRoka'], $_POST['id_ucenika'], $_POST['id_smeraFakulteta']);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upisi</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="../../styles.css">
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4 text-center"><i class="fas fa-database mr-2"></i>Upisi</h2>

    <!-- Button to trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addRecordModal">
      <i class="fas fa-plus mr-1"></i> Add Record
    </button>

    <!-- Modal -->
    <div class="modal fade" id="addRecordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus mr-2"></i> Add Record</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Form for adding record -->
            <form method="post" action="">
              <div class="form-group">
                <label for="godina">Godina:</label>
                <input type="number" class="form-control" id="godina" name="godina" required>
              </div>
              <div class="form-group">
                <label for="id_upisnogRoka">Upisni Rok:</label>
                <select class="form-control" id="id_upisnogRoka" name="id_upisnogRoka">
                  <?php
                  $registrationPeriods = fetchRegistrationPeriods($conn);
                  while ($row = $registrationPeriods->fetch_assoc()) {
                    echo "<option value='" . $row['ID_upisnogRoka'] . "'>" . $row['Ime'] . "</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="id_ucenika">Učenik:</label>
                <select class="form-control" id="id_ucenika" name="id_ucenika">
                  <?php
                  $students = fetchStudents($conn);
                  while ($row = $students->fetch_assoc()) {
                    echo "<option value='" . $row['ID_ucenika'] . "'>" . $row['ImeIPrezime'] . " (" . $row['JMBG'] . ")</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="id_smeraFakulteta">Smer Fakulteta:</label>
                <select class="form-control" id="id_smeraFakulteta" name="id_smeraFakulteta">
                  <?php
                  $departments = fetchDepartments($conn);
                  while ($row = $departments->fetch_assoc()) {
                    $facultyName = fetchFacultyName($conn, $row['ID_fakulteta']);
                    echo "<option value='" . $row['ID_smeraFakulteta'] . "'>" . $row['Ime'] . " (" . $facultyName . ")</option>";
                  }
                  ?>
                </select>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-1"></i> Close</button>
            <button type="submit" class="btn btn-primary" name="save"><i class="fas fa-save mr-1"></i> Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Display success/error message -->
    <?php if(isset($_POST['save'])) {
      echo '<div class="alert alert-success">Record added successfully!</div>';
    } ?>

    <!-- Display records -->
    <h3 class="mb-3">Records</h3>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Godina</th>
          <th>Upisni Rok</th>
          <th>Učenik</th>
          <th>Smer Fakulteta</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = fetchRecords($conn);
        while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['ID_upisa']; ?></td>
            <td><?php echo $row['Godina']; ?></td>
            <td><?php echo $row['ID_upisnogRoka']; ?></td>
            <td><?php echo $row['ID_ucenika']; ?></td>
            <td><?php echo $row['ID_smeraFakulteta']; ?></td>
            <td>
              <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editRecordModal<?php echo $row['ID_upisa']; ?>"><i class="fas fa-edit"></i> Edit</a>
              <a href="?delete=<?php echo $row['ID_upisa']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fas fa-trash-alt"></i> Delete</a>
            </td>
          </tr>

          <!-- Edit Modal -->
          <div class="modal fade" id="editRecordModal<?php echo $row['ID_upisa']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit mr-2"></i> Edit Record</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- Form for editing record -->
                  <form method="post" action="">
                    <input type="hidden" name="edit_id" value="<?php echo $row['ID_upisa']; ?>">
                    <div class="form-group">
                      <label for="godina">Godina:</label>
                      <input type="number" class="form-control" id="godina" name="godina" value="<?php echo $row['Godina']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="id_upisnogRoka">Upisni Rok:</label>
                      <select class="form-control" id="id_upisnogRoka" name="id_upisnogRoka">
                        <?php
                        $registrationPeriods = fetchRegistrationPeriods($conn);
                        while ($regRow = $registrationPeriods->fetch_assoc()) {
                          $selected = ($regRow['ID_upisnogRoka'] == $row['ID_upisnogRoka']) ? "selected" : "";
                          echo "<option value='" . $regRow['ID_upisnogRoka'] . "' $selected>" . $regRow['Ime'] . "</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="id_ucenika">Učenik:</label>
                      <select class="form-control" id="id_ucenika" name="id_ucenika">
                        <?php
                        $students = fetchStudents($conn);
                        while ($stdRow = $students->fetch_assoc()) {
                          $selected = ($stdRow['ID_ucenika'] == $row['ID_ucenika']) ? "selected" : "";
                          echo "<option value='" . $stdRow['ID_ucenika'] . "' $selected>" . $stdRow['ImeIPrezime'] . " (" . $stdRow['JMBG'] . ")</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="id_smeraFakulteta">Smer Fakulteta:</label>
                      <select class="form-control" id="id_smeraFakulteta" name="id_smeraFakulteta">
                        <?php
                        $departments = fetchDepartments($conn);
                        while ($deptRow = $departments->fetch_assoc()) {
                          $selected = ($deptRow['ID_smeraFakulteta'] == $row['ID_smeraFakulteta']) ? "selected" : "";
                          $facultyName = fetchFacultyName($conn, $deptRow['ID_fakulteta']);
                          echo "<option value='" . $deptRow['ID_smeraFakulteta'] . "' $selected>" . $deptRow['Ime'] . " (" . $facultyName . ")</option>";
                        }
                        ?>
                      </select>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-1"></i> Close</button>
                  <button type="submit" class="btn btn-primary" name="update"><i class="fas fa-save mr-1"></i> Update</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

        <?php endwhile; ?>
      </tbody>
    </table>

  </div>

  <!-- JavaScript for Bootstrap modal -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
