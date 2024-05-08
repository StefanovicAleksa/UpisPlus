<!-- index.php -->
<?php 
include '../../config.php'; 
include 'functions.php'; 
include "../../layout.php";

// Handle delete operation
if(isset($_GET['delete'])){
    deleteRecord($conn,$_GET['delete']);
    header("Location: index.php");
}

// Handle edit operation
if(isset($_POST['update'])){
    $id = $_POST['edit_id'];
    $ime = $_POST['ime'];
    $id_tipaFakulteta = $_POST['id_tipaFakulteta'];
    updateRecord($conn, $id, $ime, $id_tipaFakulteta);
    header("Location: index.php");
}

// Handle add operation
if(isset($_POST['save'])) {
    addRecord($conn, $_POST['ime'], $_POST['id_tipaFakulteta']);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fakulteti</title>
  <link rel="stylesheet" href="../../styles.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4 text-center"><i class="fas fa-database mr-2"></i>Fakulteti</h2>

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
                <label for="id_tipaFakulteta">Tip fakulteta:</label>
                <select class="form-control" id="id_tipaFakulteta" name="id_tipaFakulteta">
                  <?php
                  $facultyTypes = fetchFacultyTypes($conn);
                  while ($row = $facultyTypes->fetch_assoc()) {
                    echo "<option value='" . $row['ID_tipaFakulteta'] . "'>" . $row['Ime'] . "</option>";
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
          <th>Tip fakulteta</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = fetchRecords($conn);
        while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['ID_fakulteta']; ?></td>
            <td><?php echo $row['Ime']; ?></td>
            <td><?php echo $row['ID_tipaFakulteta']; ?></td>
            <td>
              <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editRecordModal<?php echo $row['ID_fakulteta']; ?>"><i class="fas fa-edit"></i> Edit</a>
              <a href="?delete=<?php echo $row['ID_fakulteta']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fas fa-trash-alt"></i> Delete</a>
            </td>
          </tr>

          <!-- Edit Modal -->
          <div class="modal fade" id="editRecordModal<?php echo $row['ID_fakulteta']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="hidden" name="edit_id" value="<?php echo $row['ID_fakulteta']; ?>">
                    <div class="form-group">
                      <label for="ime">Ime:</label>
                      <input type="text" class="form-control" id="ime" name="ime" value="<?php echo $row['Ime']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="id_tipaFakulteta">Tip fakulteta:</label>
                      <select class="form-control" id="id_tipaFakulteta" name="id_tipaFakulteta">
                        <?php
                        $facultyTypes = fetchFacultyTypes($conn);
                        while ($typeRow = $facultyTypes->fetch_assoc()) {
                          $selected = ($typeRow['ID_tipaFakulteta'] == $row['ID_tipaFakulteta']) ? "selected" : "";
                          echo "<option value='" . $typeRow['ID_tipaFakulteta'] . "' $selected>" . $typeRow['Ime'] . "</option>";
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
