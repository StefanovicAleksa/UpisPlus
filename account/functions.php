<?php
// functions.php

include '../config.php'; // Include database configuration

function verifyPassword($username, $password) {
    global $conn;

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result === false) {
        die("Error executing the query: " . $conn->error);
    }

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            return $row['role']; 
        }
    }
    return false;
}

function logout() {
    session_start();
    session_unset();
    session_destroy();
    header("Location: /upis_plus/account/login.php");
    exit();
}

function redirectIfLoggedIn() {
    session_start();
    if($_SESSION['role'] == 'admin')
        header("Location: /upis_plus/admin");
    else
        header("Location: /upis_plus/statistika-upisa-ucenika");
    exit();
}
?>
