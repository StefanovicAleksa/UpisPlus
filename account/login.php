<?php
include 'functions.php'; // Include functions.php instead of config.php
session_start();

if(isset($_SESSION['user'])) {
    redirectIfLoggedIn();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $role = verifyPassword($username, $password);

    if ($role !== false) {
        $_SESSION['user'] = $username;
        $_SESSION['role'] = $role;
        if($_SESSION['role'] == 'admin')
            header("Location: /upis_plus/admin");
        else if($_SESSION['role'] == 'user')
            header("Location: /upis_plus/statistika-upisa-ucenika");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                        <?php if(isset($error)): ?>
                            <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <!-- Add a link to the signup page -->
                        <div class="mt-3">
                            <a href="signup.php">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
