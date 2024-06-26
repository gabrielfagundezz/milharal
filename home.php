<?php

    session_start();


if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit;
}



?>

<?php require_once("header.php"); ?>
<h1>Olá <?php echo $_SESSION['username']; ?> </h1>
<a href="logout.php">Logout</a>