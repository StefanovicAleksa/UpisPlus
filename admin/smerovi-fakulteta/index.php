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
    $ime = $_POST['ime'];
    $id_fakulteta = $_POST['id_fakulteta'];
    updateRecord($conn, $id, $ime, $id_fakulteta);
    header("Location: index.php");
}

// Handle add operation
if(isset($_POST['save'])) {
    addRecord($conn, $_POST['ime'], $_POST['id_fakulteta']);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Smerovi Fakulteta</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="../../styles.css">
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4 text-center"><i class="fas fa-database mr-2"></i>Smerovi Fakulteta</h2>

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
                <label for="ime">Ime:</label>
                <input type="text" class="form-control" id="ime" name="ime" required>
              </div>
              <div class="form-group">
                <label for="id_fakulteta">Fakultet:</label>
                <select class="form-control" id="id_fakulteta" name="id_fakulteta">
                  <?php
                  $faculties = fetchFaculties($conn);
                  while ($row = $faculties->fetch_assoc()) {
                    echo "<option value='" . $row['ID_fakulteta'] . "'>" . $row['Ime'] . "</option>";
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
          <th>Ime</th>
          <th>Fakultet</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = fetchRecords($conn);
        while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['ID_smeraFakulteta']; ?></td>
            <td><?php echo $row['Ime']; ?></td>
            <td><?php echo $row['ID_fakulteta']; ?></td>
            <td>
              <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editRecordModal<?php echo $row['ID_smeraFakulteta']; ?>"><i class="fas fa-edit"></i> Edit</a>
              <a href="?delete=<?php echo $row['ID_smeraFakulteta']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fas fa-trash-alt"></i> Delete</a>
            </td>
          </tr>

          <!-- Edit Modal -->
          <div class="modal fade" id="editRecordModal<?php echo $row['ID_smeraFakulteta']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="hidden" name="edit_id" value="<?php echo $row['ID_smeraFakulteta']; ?>">
                    <div class="form-group">
                      <label for="ime">Ime:</label>
                      <input type="text" class="form-control" id="ime" name="ime" value="<?php echo $row['Ime']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="id_fakulteta">Fakultet:</label>
                      <select class="form-control" id="id_fakulteta" name="id_fakulteta">
                        <?php
                        $faculties = fetchFaculties($conn);
                        while ($facultyRow = $faculties->fetch_assoc()) {
                          $selected = ($facultyRow['ID_fakulteta'] == $row['ID_fakulteta']) ? "selected" : "";
                          echo "<option value='" . $facultyRow['ID_fakulteta'] . "' $selected>" . $facultyRow['Ime'] . "</option>";
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
