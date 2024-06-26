<?php
session_start();

$hostName = "localhost";
$userName = "root";
$password = "student12345";
$dbname = "itdindee";
$dbconn = mysqli_connect($hostName, $userName, $password,$dbname);

$username = $_SESSION['username'];

$query = "SELECT userID FROM `userMaster` WHERE userName='$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
$user_id = $user['userID'];

if(isset($_POST['save']))
{

   $userID = $_POST['user_id'];
   $firstName = $_POST['firstName'];
   $lastName = $_POST['lastName'];
   $email = $_POST['email'];
   $mobileNo = $_POST['mobileNo'];
   $whatsAppNo = $_POST['whatsAppNo'];
   $telegramNo = $_POST['telegramNo'];
   $gender = $_POST['gender'];
   $age = $_POST['age'];
   $address = $_POST['address'];
   $cityID = $_POST['cityID'];
   $areaID = $_POST['areaID'];
   $companyID = $_POST['companyID'];
   $volunteer = $_POST['volunteer'];
   
   if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      echo "Invalid email format";
  }

   $sql = "INSERT INTO warkari(userID, firstName, lastName, email, mobileNo, whatsAppNo, telegramNo, gender, age, address, cityID, areaID, companyID, volunteer)
           VALUES ('$user_id', '$firstName', '$lastName', '$email', '$mobileNo', '$whatsAppNo', '$telegramNo', '$gender', '$age', '$address', '$cityID', '$areaID', '$companyID', '$volunteer')";

   $res = mysqli_query($conn , $sql) ;
    
   if($res)
   {
      header("Location:registerWarkarri.php");
   }
   else 
   {
      echo "Please fill the form again.";
  }
}
?>