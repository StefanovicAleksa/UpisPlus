<?php
include "../layout.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="../styles.css">
  <style>
    .container {
      background-color: #ffffff00;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);
      margin-top: 50px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header text-white" style="background-color: #343a40;">
            <h2 class="text-center mb-0"><i class="fas fa-database mr-2"></i>Admin Panel</h2>
          </div>
          <div class="card-body">
            <h3>Tables:</h3>
            <div class="list-group">
              <a href="tipovi-fakulteta" class="list-group-item list-group-item-action"><i class="fas fa-university mr-2"></i>Tipovi Fakulteta</a>
              <a href="generacije" class="list-group-item list-group-item-action"><i class="fas fa-users mr-2"></i>Generacije</a>
              <a href="smerovi" class="list-group-item list-group-item-action"><i class="fas fa-graduation-cap mr-2"></i>Smerovi</a>
              <a href="fakulteti" class="list-group-item list-group-item-action"><i class="fas fa-building mr-2"></i>Fakulteti</a>
              <a href="smerovi-fakulteta" class="list-group-item list-group-item-action"><i class="fas fa-book mr-2"></i>Smerovi Fakulteta</a>
              <a href="odeljenja" class="list-group-item list-group-item-action"><i class="fas fa-chalkboard-teacher mr-2"></i>Odeljenja</a>
              <a href="ucenici" class="list-group-item list-group-item-action"><i class="fas fa-user-graduate mr-2"></i>Ucenici</a>
              <a href="upisi" class="list-group-item list-group-item-action"><i class="fas fa-clipboard-list mr-2"></i>Upisi</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
