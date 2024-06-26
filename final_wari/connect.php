<?php
$dbName = "itdindee";
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "student12345";
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$conn) {
    die("Something went wrong");
}
?>