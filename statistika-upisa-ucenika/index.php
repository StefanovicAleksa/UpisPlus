<?php 
include 'functions.php';
include '../layout.php';

if(!isset($_SESSION['user'])) { 
  header("Location /user_plus/account/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Statistika Upisa Učenika</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="../styles.css">
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4 text-center"><i class="fas fa-list-alt mr-2"></i>Statistika Upisa Učenika</h2>

    <div class="row">
      <div class="col-md-4 mb-3">
        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#procedureModal">
          <i class="fas fa-plus mr-1"></i> Broj Upisa Po Godini
        </button>
      </div>
      <div class="col-md-4 mb-3">
        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#polModal">
          <i class="fas fa-plus mr-1"></i> Raspodela Upisa Po Polu
        </button>
      </div>
      <div class="col-md-4">
        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#upisniRokProcedureModal">
          <i class="fas fa-plus mr-1"></i> Broj Upisa Po Upisnom Roku
        </button>
      </div>
    </div>

    <!-- Modal for procedure "Broj Upisa Po Godini" -->
    <div class="modal fade" id="procedureModal" tabindex="-1" role="dialog" aria-labelledby="procedureModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="procedureModalLabel">Broj Upisa Po Godini</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered table-striped">
              <thead class="thead-dark">
                <tr>
                  <th>Godina</th>
                  <th>Broj Upisa</th>
                </tr>
              </thead>
              <tbody id="procedureData">
                <?php displayProcedureResult(); ?>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for procedure "Raspodela Upisa Po Polu" -->
    <div class="modal fade" id="polModal" tabindex="-1" role="dialog" aria-labelledby="polModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="polModalLabel">Raspodela Upisa Po Polu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered table-striped">
              <thead class="thead-dark">
                <tr>
                  <th>Pol</th>
                  <th>Broj Upisa</th>
                </tr>
              </thead>
              <tbody id="polData">
                <?php displayPolProcedureResult(); ?>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for procedure "Broj Upisa Po Upisnom Roku" -->
    <div class="modal fade" id="upisniRokProcedureModal" tabindex="-1" role="dialog" aria-labelledby="upisniRokProcedureModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="upisniRokProcedureModalLabel">Broj Upisa Po Upisnom Roku</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered table-striped">
              <thead class="thead-dark">
                <tr>
                  <th>Naziv Upisnog Roka</th>
                  <th>Broj Upisa</th>
                </tr>
              </thead>
              <tbody id="upisniRokProcedureData">
                <!-- PHP function call to display procedure result -->
                <?php displayUpisniRokProcedureResult(); ?>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Table to display view data -->
    <div class="table-responsive mt-4">
      <table class="table table-bordered table-striped">
        <thead class="thead-dark">
          <tr>
            <th>JMBG</th>
            <th>Ime I Prezime</th>
            <th>Pol</th>
            <th>Generacija</th>
            <th>Smer</th>
            <th>Odeljenje</th>
            <th>Godina Upisa</th>
            <th>Upisni Rok</th>
            <th>Upisani Fakultet</th>
            <th>Smer Fakulteta</th>
          </tr>
        </thead>
        <tbody id="viewData">
          <?php displayViewData(); ?>
        </tbody>
      </table>
    </div>

  </div>

  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
