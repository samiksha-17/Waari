<?php

$hostName = "localhost";
$userName = "root";
$password = "student12345";
$dbname = "itdindee";
$dbconn = mysqli_connect($hostName, $userName, $password,$dbname);
if (isset($_POST['submit'])) {
  $warkariID = $_POST['warkariID'];
  $tappaID = $_POST['tappaID'];
  
  $query1 = "SELECT warkariID FROM warkari WHERE warkariID=$warkariID";
  $result1 = mysqli_query($dbconn, $query1);
  $row1 = mysqli_fetch_assoc($result1);
  $selectedWarkariID = $row1['warkariID'];

  $query2 = "SELECT tappaID FROM tappamaster WHERE tappaID=$tappaID";
  $result2 = mysqli_query($dbconn, $query2);
  $row2 = mysqli_fetch_assoc($result2);
  $selectedTappaID = $row2['tappaID'];

  $totalContribution = $_POST['totalContribution'];
  
  $tappaDate = '';
  $contribution = '';
  if (isset($_POST['tappaDate']) && isset($_POST['contribution'])) {
     $tappaDate = $_POST['tappaDate'];
     $contribution = $_POST['contribution'];
  }
  
  $query = "INSERT INTO tappaenrollment (warkariID, tappaID, registerDate, contribution, totalContribution) 
            VALUES ($selectedWarkariID, $selectedTappaID, '$tappaDate', '$contribution', $totalContribution)";
  $result = mysqli_query($dbconn, $query);

  if ($result) {
   echo "Data inserted successfully.............................";
  } else {
    echo "Data insertion failed.";
  }
}

?>