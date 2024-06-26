<?php

// ... code for database connection ...

$dbName = "itdindee";
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "student12345";
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

function get_tappa_dates($tappaID) {
  global $conn;
  $query = "SELECT tappaDate FROM tappamaster WHERE tappaID = $tappaID";
  $result = mysqli_query($conn, $query);
  $tappaDates = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $tappaDates[] = $row['tappaDate'];
  }
  return $tappaDates;
}




function get_stay_contribution($tappaID) {
  global $conn;
  $stayContri = 0;
  $result = mysqli_query($conn, "SELECT stayContri FROM tappamaster WHERE tappaID=$tappaID");

  if ($result) {
    $row = mysqli_fetch_assoc($result);
    $stayContri = $row['stayContri'];
  }

  return $stayContri;
}

// Define get_return_contribution function
function get_return_contribution($tappaID) {
  global $conn;
  $returnContri = 0;
  $result = mysqli_query($conn, "SELECT returnContri FROM tappamaster WHERE tappaID=$tappaID");

  if ($result) {
    $row = mysqli_fetch_assoc($result);
    $returnContri = $row['returnContri'];
  }

  return $returnContri;
}

// Initialize total contribution

  // Insert data into the tappaenrollment table
 
  session_start();
  $warkariID = $_SESSION['warkariID'];
  $tappaIDs = $_SESSION['tappaIDs'];
  $tappaData = $_SESSION['tappaData'];
  


  // Insert data into the tappaenrollment table
  $totalContribution = 0;

// Handle form submission
if (isset($_POST['submit'])) {

// select max enrollmentID from tappaenrollment and  add into insert query 
$result = mysqli_query($conn, "SELECT max(enrollmentID)+1 FROM tappaenrollment");
$result = $result->fetch_array();
$maxEID = intval($result[0]);


  // Insert each Tappa contribution into the tappaenrollment table
  foreach ($tappaData as $key => $tappa) {
    $tappaID = intval($tappaIDs[$key]); // get the correct tappaID from the $tappaIDs array using the $key variable
    $tappaDate = $tappa['tappaDate'];
    $contribution = $tappa['contribution'];
    $totalContribution = $tappa['totalContribution'];
      
    // Get returnFlag value based on selected option
  $returnFlag = $tappa['returnFlag'];
  

  // Insert data into tappaenrollment table
  $sql = "INSERT INTO tappaenrollment (enrollmentID , warkariID, tappaID,  contribution, totalContribution,registerDate) VALUES ($maxEID,$warkariID, $tappaID, $contribution, $totalContribution, CURRENT_DATE())";
$result = mysqli_query($conn, $sql);
  
    if (!$result) {
      die("Error: " . mysqli_error($conn));
    }
  }
  header('Location: payment.php');
}






// Display payment details

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  .center-container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center; /* Modified */
  min-height: 100vh;
}

body {
    margin: 0;
    padding: 0;
    background-color: #28282B;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    margin-left: 20%; /* Add margin-left to move content to right side */
  }

  input[type="submit"] {
    background-color: #ffd60bd4;
    color: black;
    padding: 12px;
    border-radius: 5px;
    border: 2px solid grey;
    cursor: pointer;
    margin-top: 20px;
    margin-bottom: 20px;
    display: block;
    margin: 0 auto;
    font-weight: bold;
  }

  h1 {
    color: white;
  }

  label {
    font-weight: bold;
    color: white;
  }

  input[type="text"] {
    border: 2px solid black;
    font-weight: bold;
    font-family: Arial, sans-serif;
    margin-bottom: 20px;
    padding: 10px;
    border-radius: 10px;
    width: 100%;
    margin: 0 auto;
    display: block;
  }

  .enrollment-message {
    color: white;
    text-align: center;
  }
  .btn-back {
            background-color: #ffcc00;
            border-color: #ffcc00;
            color: #333;
            transition: all 0.2s ease-in-out;
        }

        .btn-back:hover {
            background-color: #333;
            border-color: #333;
            color: #ffcc00;
        }
</style>
</head>
<body style="background-image: url('https://itdindee.org/wp-content/uploads/2023/03/Picsart_23-03-04_01-44-34-150-1-2-scaled.jpg'); background-repeat: no-repeat; background-size: cover;">
  <div class="center-container">
    <h1>Payment Page</h1>
    <p><h3 class="enrollment-message">Please make your payment to confirm your enrollment</h3></p>

    <form method="post">
      <label for="transaction-id" style="display: block">Transaction ID:</label>
      <input type="text" name="transaction_id" id="transaction-id" required><br><br>
      <a href="./Enroll" class="btn-back" style="position: absolute; top: 0; left: 0; margin-top: 80px; padding: 10px 15px; font-size: 18px; margin-left:10px">Back</a>

      <input type="submit" name="submit" value="Submit Payment"    onclick="return alert();">
    </form>
  </div>
</body>
<script type="text/javascript">
	function alert() 
	  {
 
		alert ("Payment successfull");
		return true;
		
	  }
	  </script>
</html>