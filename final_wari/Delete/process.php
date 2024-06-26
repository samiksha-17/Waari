<?php
include('connect.php');
if (isset($_POST["registerWarkari"])) {
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
    $sqlInsert = "insert into warkari(firstName,lastName,email,mobileNo,whatsAppNo,telegramNo,gender,address,cityID,areaID,companyID,volunteer)
    values ('$firstName','$lastName','$email','$mobileNo','$whatsAppNo','$telegramNo', '$gender','$address','$cityID','$areaID','$companyID','$volunteer')";

    if(mysqli_query($conn,$sqlInsert)){
        session_start();
        $_SESSION["registerWarkari"] = "record Added Successfully!";
        header("Location:welcome.php");
    }else{
        die("Something went wrong");
    }
}

?>