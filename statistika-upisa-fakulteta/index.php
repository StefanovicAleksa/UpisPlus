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
  <title>Statistika Upisa Na Fakultete</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="../styles.css">
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4 text-center"><i class="fas fa-list-alt mr-2"></i>Statistika Upisa Na Fakultete</h2>

    <div class="row">
      <div class="col-md-6 mb-3">
        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#popularnostSmerovaModal">
          <i class="fas fa-plus mr-1"></i> Popularnost Smerova
        </button>
      </div>
      <div class="col-md-6">
        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#prosecanBrojUpisanihStudenataPoGodiniZaSvakiFakultetModal">
          <i class="fas fa-plus mr-1"></i> Prosečan Broj Upisanih Studenata Po Godini Za Svaki Fakultet
        </button>
      </div>
      <div class="col-md-6">
        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#fakultetiSaNajvecimBrojemUpisanihStudenataModal">
          <i class="fas fa-plus mr-1"></i> Fakulteti Sa Najvećim Brojem Upisanih Studenata
        </button>
      </div>
      <div class="col-md-6">
        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#brojUpisanihStudenataNaSvakomFakultetuPoPoluModal">
          <i class="fas fa-plus mr-1"></i> Broj Upisanih Studenata Na Svakom Fakultetu Po Polu
        </button>
      </div>
    </div>

    <!-- Modal for procedure "Popularnost Smerova" -->
    <div class="modal fade" id="popularnostSmerovaModal" tabindex="-1" role="dialog" aria-labelledby="popularnostSmerovaModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="popularnostSmerovaModalLabel">Popularnost Smerova</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered table-striped">
              <thead class="thead-dark">
                <tr>
                  <th>Fakultet</th>
                  <th>Naziv Smera</th>
                  <th>Broj Upisa</th>
                </tr>
              </thead>
              <tbody>
                <!-- PHP function call to display the result of the stored procedure -->
                <?php displayPopularnostSmerova(); ?>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for procedure "Prosecan Broj Upisanih Studenata Po Godini Za Svaki Fakultet" -->
    <div class="modal fade" id="prosecanBrojUpisanihStudenataPoGodiniZaSvakiFakultetModal" tabindex="-1" role="dialog" aria-labelledby="prosecanBrojUpisanihStudenataPoGodiniZaSvakiFakultetModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="prosecanBrojUpisanihStudenataPoGodiniZaSvakiFakultetModalLabel">Prosecan Broj Upisanih Studenata Po Godini Za Svaki Fakultet</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered table-striped">
              <thead class="thead-dark">
                <tr>
                  <th>Naziv Fakulteta</th>
                  <th>Prosecan Broj Studenata</th>
                </tr>
              </thead>
              <tbody>
                <?php displayProsecanBrojUpisanihStudenataPoGodiniZaSvakiFakultet(); ?>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for procedure "Fakulteti Sa Najvećim Brojem Upisanih Studenata" -->
    <div class="modal fade" id="fakultetiSaNajvecimBrojemUpisanihStudenataModal" tabindex="-1" role="dialog" aria-labelledby="fakultetiSaNajvecimBrojemUpisanihStudenataModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="fakultetiSaNajvecimBrojemUpisanihStudenataModalLabel">Fakulteti Sa Najvećim Brojem Upisanih Studenata</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered table-striped">
              <thead class="thead-dark">
                <tr>
                  <th>Naziv Fakulteta</th>
                  <th>Broj Studenata</th>
                </tr>
              </thead>
              <tbody>
                <!-- PHP function call to display the result of the stored procedure -->
                <?php displayFakultetiSaNajvecimBrojemUpisanihStudenata(); ?>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for procedure "Broj Upisanih Studenata Na Svakom Fakultetu Po Polu" -->
    <div class="modal fade" id="brojUpisanihStudenataNaSvakomFakultetuPoPoluModal" tabindex="-1" role="dialog" aria-labelledby="brojUpisanihStudenataNaSvakomFakultetuPoPoluModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="brojUpisanihStudenataNaSvakomFakultetuPoPoluModalLabel">Broj Upisanih Studenata Na Svakom Fakultetu Po Polu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered table-striped">
              <thead class="thead-dark">
                <tr>
                  <th>Naziv Fakulteta</th>
                  <th>Pol</th>
                  <th>Broj Studenata</th>
                </tr>
              </thead>
              <tbody>
                <!-- PHP function call to display the result of the stored procedure -->
                <?php displayBrojUpisanihStudenataNaSvakomFakultetuPoPolu(); ?>
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
            <th>ID Fakulteta</th>
            <th>Fakultet</th>
            <th>Smer Fakulteta</th>
            <th>Generacija</th>
            <th>Smer</th>
            <th>Broj Upisa</th>
          </tr>
        </thead>
        <tbody id="viewData">
          <?php displayViewListaUpisaPoFakultetu(); ?>
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
