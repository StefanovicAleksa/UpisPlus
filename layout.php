<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpisPlus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <style>
        @media (max-width: 1439px) {
            .sidebar {
                width: 80px; /* Adjust width as needed */
            }
            .nav-link-text {
                display: none;
            }
            .nav-link-icon {
                margin-right: 0;
            }
            .fas {
                font-size: 20px;
            }
            .fa-school {
                font-size: 40px;
            }
        }
    </style>
</head>
<body>
    <div class="col-2 p-0">
        <div class="d-flex flex-column flex-shrink-0 p-3 sidebar" style="height: 100vh;">
            <a href="/upis_plus" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <i class="fas fa-school text-white nav-link-icon"></i>
                <span class="fs-4 text-white nav-link-text"> UpisPlus</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <?php
                    session_start();
                    if(isset($_SESSION['user']) && $_SESSION['role'] == "admin") { 
                        echo '<li><a href="/upis_plus/admin" class="nav-link link-light"><i class="fas fa-user-shield me-2"></i> Admin</a></li>';
                    }
                ?>
                
                <li>
                    <a href="/upis_plus/statistika-upisa-ucenika" class="nav-link link-light">
                        <i class="fas fa-chart-line nav-link-icon"></i>
                        <span class="nav-link-text"> Statistika Upisa Učenika</span>
                    </a>
                </li>
                <li>
                    <a href="/upis_plus/statistika-upisa-fakulteta" class="nav-link link-light">
                        <i class="fas fa-university nav-link-icon"></i>
                        <span class="nav-link-text"> Statistika Upisa Na Fakultete</span>
                    </a>
                </li>
            </ul>
            <hr class="text-white">
            <a href="/upis_plus/account/logout.php" class="nav-link link-light">
                <i class="fas fa-sign-out-alt me-2"></i>
                <span class="nav-link-text">Sign Out</span>
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
