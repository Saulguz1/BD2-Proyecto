<?php
session_start();
$_SESSION['username'];

if (isset($_POST['inputUser'])) {
    $_SESSION['username'] = $_POST['inputUser'];
}
header("Location: index.php");
exit;
?>

