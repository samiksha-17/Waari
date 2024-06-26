<?php
$dbName = "itdindee";
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "student12345";
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$conn) {
    die("Something went wrong");
}
// Get the ID of the record to delete
$id = $_GET['warkariID'];

// Check if the record exists before attempting to delete it
$sql_check = "SELECT * FROM warkari WHERE warkariID='$id'";
$result_check = mysqli_query($conn, $sql_check);

if(mysqli_num_rows($result_check) == 0) {
  echo "Record does not exist";
} else {
  // Delete the record
  $sql = "DELETE FROM warkari WHERE warkariID=?";
  $stmt = mysqli_prepare($conn, $sql);

  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);

  if(mysqli_affected_rows($conn) > 0){
    session_start();
    $_SESSION["delete"] = "Record Deleted Successfully!";
   
}else{
    $error = "Unable to delete the record.";
    header("Location: ./Warkari?error=".$error);
}
}

?>