<?php
include('connect.php');
// Connect to the database
if (isset($_POST["edit"])) {
  $firstName = mysqli_real_escape_string($conn, $_POST["firstName"]);
    $lastName = mysqli_real_escape_string($conn, $_POST["lastName"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $mobileNo = mysqli_real_escape_string($conn, $_POST["mobileNo"]);
    $whatsAppNo = mysqli_real_escape_string($conn, $_POST["whatsAppNo"]);
    $telegramNo = mysqli_real_escape_string($conn, $_POST["telegramNo"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $cityID = mysqli_real_escape_string($conn, $_POST["cityID"]);
    $areaID = mysqli_real_escape_string($conn, $_POST["areaID"]);
    $companyID = mysqli_real_escape_string($conn, $_POST["companyID"]);
    $volunteer = mysqli_real_escape_string($conn, $_POST["volunteer"]);
  $id = mysqli_real_escape_string($con, $_POST["warkariID"]);
  $sqlUpdate =  "UPDATE warkari
  SET firstName= '$firstName', lastName = '$Last_Name', email = '$Email', gender = '$Gender', address = '$Address', cityID = '$City', areaID = '$Area', whatsAppNo = '$WhatsApp_No', telegramNo = '$Telegram_No', companyID = '$Company', volunteer = '$Volunteer' WHERE warkariID='$id'";
  if(mysqli_query($con,$sqlUpdate)){
      session_start();
      $_SESSION["update"] = "Updated Successfully!";
      header("Location:index.php");
  }else{
    echo("Something went wrong");
}
  
}
?>