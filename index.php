<?php
if(!isset($_SESSION['user'])) {
    header("Location: account/login.php");
    exit();
}
else if($_SESSION['role'] == 'admin') {
    header("Location: admin");
    exit();
}
else {
    header("Location: statistika-upisa-ucenika");
    exit();
}
?>
