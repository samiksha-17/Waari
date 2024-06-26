<?php

// Include database connection and functions
$dbName = "itdindee";
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "student12345";
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
require_once 'functions.php';
// Define get_stay_contribution function


if (isset($_POST['action'])) {
  $tappaID = $_POST['tappaID'];
  if ($_POST['action'] == 'get_stay_contribution') {
    // Call the get_stay_contribution function and return the result
    $stayContri = get_stay_contribution($tappaID);
    echo $stayContri;
    exit();
  } else if ($_POST['action'] == 'get_return_contribution') {
    // Call the get_return_contribution function and return the result
    $returnContri = get_return_contribution($tappaID);
    echo $returnContri;
    exit();
  }
}

function get_previously_selected_tappas($warkariID) {
  global $conn;
  $query = "SELECT tappaID FROM tappaenrollment WHERE warkariID = $warkariID";
  $result = mysqli_query($conn, $query);
  $tappaIDs = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $tappaIDs[] = $row['tappaID'];
  }
  return $tappaIDs;
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


// Initialize total contribution
$totalContribution = 0;

// Handle form submission
if (isset($_POST['submit'])) {
  $warkariID = $_GET['warkariID'];
  $tappaIDs = isset($_POST['checkbox']) ? $_POST['checkbox'] : [];

  if (empty($tappaIDs)) {
    die("No Tappa selected");
  }

  // Initialize arrays to hold data for each selected Tappa
  $tappaData = array();
  $tappaIDsStr = implode(',', $tappaIDs);
  $previouslySelectedTappas = get_previously_selected_tappas($warkariID);
  foreach ($tappaIDs as $tappaID) {
    $tappaDates = get_tappa_dates($tappaID); 
    // fetch tappa dates from function
    if (empty($tappaDates)) {
      die("No tappa dates found for tappaID: $tappaID");
    }
    $selectedOption = $_POST["option$tappaID"];
     $returnFlag = 0; // Add this line
  if ($selectedOption == 1) {
    $returnFlag = 1;
  }
    foreach ($tappaDates as $tappaDate) {
      $returnContri = get_return_contribution($tappaID);
      $stayContri = get_stay_contribution($tappaID);
    
      $contribution = 0;
    
      if ($selectedOption == 1) {
        $contribution = $returnContri;
      } else if ($selectedOption == 2) {
        $contribution = $stayContri;
      }
    
      // Add data for this Tappa to the $tappaData array
      $tappaData[] = array(
        'warkariID' =>$warkariID,
        'tappaID' => $tappaID,
        'tappaDate' => $tappaDate,
        'registerDate' => date('Y-m-d'),
        'contribution' => $contribution,
        'returnFlag' => $returnFlag,
      );

      // Add contribution for this Tappa to the total contribution
      $totalContribution += $contribution;
    }
  }

  // Add total contribution to the $tappaData array
  foreach ($tappaData as &$data) {
    $data['totalContribution'] = $totalContribution;
  }

  // Encode the Tappa data as JSON and add it to the URL query string
  session_start();
  $_SESSION['warkariID'] = $warkariID;
  $_SESSION['tappaIDs'] = $tappaIDs;
  $_SESSION['tappaData'] = $tappaData;
  header("Location:payment.php");
  exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
  $(document).ready(function() {
    $('select').change(function() {
      var tappaID = $(this).attr('name').replace('option', '');
      var contributionType = $(this).val();
      var spanID = '#contribution_' + tappaID;
      var contributionAmount;

      if (contributionType == 1) {
        // Calculate return travel contribution
        $.ajax({
          url: window.location.href,
          type: 'POST',
          data: { 
            action: 'get_return_contribution',
            tappaID: tappaID
          },
          success: function(data) {
            contributionAmount = data;
            $(spanID).text(contributionAmount);
            // update the corresponding input field with the contribution value
            $('input[name="contribution_' + tappaID + '"]').val(contributionAmount);
            calculateTotalContribution();
          }
        });
      } else if (contributionType == 2) {
        // Calculate travel with stay contribution
        $.ajax({
          url: window.location.href,
          type: 'POST',
          data: { 
            action: 'get_stay_contribution',
            tappaID: tappaID
          },
          success: function(data) {
            contributionAmount = data;
            $(spanID).text(contributionAmount);
            // update the corresponding input field with the contribution value
            $('input[name="contribution_' + tappaID + '"]').val(contributionAmount);
            calculateTotalContribution();
          }
        });
      } else {
        // Reset contribution value
        contributionAmount = '';
        $(spanID).text(contributionAmount);
        // update the corresponding input field with the empty value
        $('input[name="contribution_' + tappaID + '"]').val(contributionAmount);
        calculateTotalContribution();
      }
    });
  });
  $(document).ready(function() {
  $('input[name="checkbox[]"]').on('change', function() {
    calculateTotalContribution();
  });
});


function calculateTotalContribution() {
  var totalContribution = 0;
  $('input[name="checkbox[]"]:checked').each(function() {
    var tappaID = $(this).val();
    var contribution = $("#contribution_" + tappaID).text().trim();
    if (contribution && $(this).is(':not(:disabled)')) {
      totalContribution += parseInt(contribution);
    }
  });

  $("#totalContribution").text(totalContribution);
}
</script>



</head>
<body   style="background-image: url('https://itdindee.org/wp-content/uploads/2023/03/wari.jpg'); background-repeat: no-repeat; background-size: cover;">

<form action="" method="post">

  <style>
  
</style>
  <title>Enrollment Details</title>
  <style>
   body {
    background-color: black;
    color: black;}
    .container {
  max-width: 1197px; /* change this value to the desired size */
  height: 700px;
}
  
  
  .card-header {
  background-color: #ffd700;
  color: #000;
  font-weight: bold;
}
  
  .card-header {
    background-color: #28282B;
    color: #000;
    font-weight: bold;
  }
  .btn-primary {
    background-color: #E49B0F;
    border-color: #E49B0F;
    
  color: black;
}
  
  .btn-primary:hover {
    background-color: #000;
    border-color: #000;
  }
  .btn-success {
    background-color: #000;
    border-color: #000;
  }
  .btn-success:hover {
    background-color: #ffd700;
    border-color: #ffd700;
  }
  .table-bordered th {
  color: black;
  border-color: silver !important;
}

.table-bordered td {
  color: #DCDCDC;
}
  
.display-6 {
  color: white;
}
  
  .table-bordered {
    background-color: #333;
  }
  .card-header {
  background-color: #28282B;
  color: white;
  font-weight: bold;
}

.card-footer {
  background-color: #28282B;
  color: white;
}
input[type="checkbox"] {
  appearance: none;
  -moz-appearance: none;
  -webkit-appearance: none;
  width: 20px;
  height: 20px;
  border: 2px solid white;
  background-color: #333;
  outline: none;
  position: relative; /* create a positioning context */
}

/* Change the color of the checked checkboxes */
input[type="checkbox"]:checked {
  background-color: #ffd700;
}

/* Create a tick symbol using the ::before pseudo-element */
input[type="checkbox"]:checked::before {
  content: "\2714"; /* Unicode character for tick symbol */
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%); /* Center the tick symbol */
  font-size: 16px;
  color: #000; /* Set the color of the tick symbol to black */
}
.button-container {
  text-align: left;
  margin-left: 100%;
  text-align: left;
  margin-left: 100%;
  margin-top: -800px; /* adjust this value to move the button up or down */
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

  <div class="container" >
   
          <div class="card mt-5">
            
            <div class="card-header">
              <h2 class="display-6 text-center">Warkari Enrollment</h2>
            
              <div class="card-header">
             
              <table style="border: 1px solid silver" class="table table-bordered text-center">
              <tr style="background-color: #E49B0F;">
                  <td><strong> Select </strong></td>
                  <td><strong>Waari Year</strong></td>
                  <td><strong> Tappa</strong></td>
                  <td > <strong>Tappa Date</strong></td>
                  <td> <strong>Distance</strong></td>
                  <td><strong> Tithi</strong></td>
                  <td> <strong>Tappa Day</strong></td>
                  <td><strong> Difficulty Level</strong></td>
                  <td> <strong>Return/Stay</strong></td>
                  <td> <strong>Remark</strong></td>
                  <td> <strong>Contribution</strong></td>
                </tr>
                                   <?php 
                   $warkariID_s = $_GET['warkariID'];
                   // get the list of already selected tappaIDs
                   $selectedTappaIDs = array();

                   $sql = "SELECT * FROM tappaenrollment WHERE warkariID = $warkariID_s";
                   $result = mysqli_query($conn, $sql);
                   while ($row = mysqli_fetch_assoc($result)) {
                       $selectedTappaIDs[] = $row['tappaID'];        
                   }

                   // get the contributions for previously selected tappas
                   $previousSelected = array();
                   foreach ($selectedTappaIDs as $tappaID) {
                       $tappa = mysqli_fetch_assoc(mysqli_query($conn, "SELECT returnFlag, contribution FROM tappaenrollment WHERE tappaID = $tappaID and warkariID = $warkariID_s"));
                       $previousSelected[$tappaID] = $tappa['contribution'];
                   }

                   $sql = "SELECT * FROM tappamaster";   // loop through the tappas
                   $result = mysqli_query($conn, $sql);
                   while ($row = mysqli_fetch_assoc($result)) {
                       $tappaID = $row['tappaID'];
                       $isChecked = in_array($tappaID, $selectedTappaIDs);

                       // check if the tappa is already selected
                       if (in_array($tappaID, $selectedTappaIDs)) {
                           $tappa = mysqli_fetch_assoc(mysqli_query($conn, "SELECT returnFlag, contribution FROM tappaenrollment WHERE tappaID = $tappaID and warkariID = $warkariID_s"));
                           if ($tappa['returnFlag'] == 1) {
                               $selectedOption = 1;
                           } else {
                               $selectedOption = 2;
                           }
                           $isChecked = true;
                       } else {
                           $selectedOption = 0;
                           $isChecked = false;
                       }

                       $isDisabled = $isChecked; // disable if already selected
                       if (!$isDisabled && $row['isActiveFlag'] == 0) {
                           $isDisabled = true; // disable if inactive
                       }

                       // display the contribution for previously selected tappas and newly selected tappas
                       if (array_key_exists($tappaID, $previousSelected)) {
                           $contribution = $previousSelected[$tappaID];
                       } else {
                           $contribution = null;
                       }
                       ?>
              <tr <?php echo $isDisabled ? 'class="disabled-row"' : ''; ?>>
                  <td>
                      <input type="checkbox" name="checkbox[]" value="<?php echo $tappaID; ?>" <?php echo $isChecked ? 'checked' : ''; ?> <?php echo $isDisabled ? 'disabled' : ''; ?>>
                  </td>

       
           <td><?php echo $row['waariYear']; ?></td>
           <td><?php echo $row['tappa']; ?></td>
           <td><?php echo $row['tappaDate']; ?></td>
           <td><?php echo $row['distance']; ?></td>
           <td><?php echo $row['tithi']; ?></td>
           <td><?php echo $row['tappaDay']; ?></td>
           <td><?php echo $row['difficultyLevel']; ?></td>
          
           <td>
     <select name="option<?php echo $row['tappaID']; ?>">
         <option value="0>" <?php echo (!$isChecked && $selectedOption == 0) ? 'selected' : ''; ?>>Select</option>
         <option value="1" <?php echo ($isChecked && $selectedOption == 1) ? 'selected' : ''; ?>>Return Travel</option>
         <option value="2" <?php echo ($isChecked && $selectedOption == 2) ? 'selected' : ''; ?>>Travel with Stay</option>
     </select>
     </td>



         <td><?php echo $row['remark']; ?></td>
       
           
         <td>
<span name="contribution_" id="contribution_<?php echo $tappaID; ?>"><?php echo $contribution; ?></span>
</td>         

         <style>
.disabled-row {
opacity: 0.5;
pointer-events: none;
}
</style>

         <?php    
           }
         
         ?>
         
       </table>
       
     </div>
     <div class="card-footer" style="margin-left: 815px">
Total Contribution: <span id="totalContribution"></span>
</div>
</tr>

<style>
.disabled-row {
opacity: 0.5;
pointer-events: none;
}
</style>
            
          </div>
        </div>
      </div>
    </div>
    <a href="./Warkari" class="btn-back" style="position: absolute; top: 0; left: 0; margin-top: 80px; padding: 10px 15px; font-size: 18px; margin-left:10px">Back</a>

<button type="submit" name="submit" class="btn btn-primary"   onclick="return alert();" style="margin-left: 150px;margin-top: -300px">Click Here To Make Payment</button>
    </form>
</body>
<script type="text/javascript">
	function alert() 
	  {
 
		alert ("register succeessfully");
		return true;
		
	  }
	  </script>
</html>