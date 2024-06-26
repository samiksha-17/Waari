<?php
include('dbUtil/connect.php');

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
  $id = mysqli_real_escape_string($conn, $_POST["warkariID"]);
  $sqlUpdate = "UPDATE warkari
  SET firstName= '$firstName', lastName = '$lastName', email = '$email', gender = '$gender', address = '$address', cityID = '$cityID', areaID = '$areaID', whatsAppNo = '$whatsAppNo', telegramNo = '$telegramNo', companyID = '$companyID', volunteer = '$volunteer' WHERE warkariID='$id'";
  if(mysqli_query($conn,$sqlUpdate)){
      session_start();
      $_SESSION["update"] = "Updated Successfully!";
      header("Location:index.php");
  }else{
    echo("Something went wrong");
}
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width,minimum-scale=1">
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="css3/style.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
	
    <script type="text/javascript">
$(document).ready(function(){
  // Initialize the selectedArea variable
  var selectedArea = "";
  // First time load the city and area dropdown
  loadCityArea();

  // Call the function whenever you want to retrigger the area dropdown
  $("#City").change(function(){
    loadCityArea();
  });
});

function loadCityArea() {
  var cityID = $("#City").val();
  $.ajax({
    url: 'data.php',
    method: 'post',
    data: 'cityID=' + cityID
  }).done(function(areas){
    console.log(areas);
    areas = JSON.parse(areas);
    $('#Area').empty();
    areas.forEach(function(area){
      $('#Area').append("<option value='" + area.areaID + "'>" + area.areaName + '</option>');
    });

    // Store the selected area value
    selectedArea = $("#areaID").val();
    
    // Set the value of the selected area
    $('#areaID').val(selectedArea);
  });
}
</script>


  <script>
$(document).ready(function(){
$("#cityID").select2();
$("#areaID").select2();
$("#companyID").select2();
});
</script>

<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase.js"></script>
    <script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
  apiKey: "AIzaSyAkXsWAk2kJF5pdwvvJuIJv6wZwasoNGuI",
  authDomain: "mobileotp-f89cc.firebaseapp.com",
  projectId: "mobileotp-f89cc",
  storageBucket: "mobileotp-f89cc.appspot.com",
  messagingSenderId: "340302219634",
  appId: "1:340302219634:web:c63a8223ad8e21db86f5eb",
  measurementId: "G-FTQZ5FF81B"
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
     firebase.analytics();
</script>
    <script src="firebase.js" type="text/javascript"></script>
	
</head>
<body>
<form class="hotel-reservation-form" method="post" action="">
			<h1><i class="far fa-calendar-alt"></i>Edit Record</h1>
			<div class="fields">
    <div class="container my-5">
    <header class="d-flex justify-content-between my-4">
           
            <div>
            <a href="welcome.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <form  method="post">
        
            <?php 
            
         if (isset($_GET['warkariID'])) 
              {
                include("dbUtil/connect.php");
                $id = $_GET['warkariID'];
                $sql = "SELECT * FROM warkari WHERE warkariID=$id";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                ?>
                 
               
				                    
                
                    <div class="wrapper">
                        <div>
                            <label for="First_Name">First Name</label>
                            <div class="field">
                                <i class="fas fa-user"></i>
                                <input id="First_Name" type="text" name="firstName" placeholder="First Name" value="<?php echo $row["firstName"]; ?>" >
                            </div>
                        </div>
                        <div class="gap"></div>
                        <div>
                            <label for="Last_Name">Last Name</label>
                            <div class="field">
                                <i class="fas fa-user"></i>
                                <input id="Last_Name" type="text" name="lastName" placeholder="Last Name" value="<?php echo $row["lastName"]; ?>">
                            </div>
                        </div>
                    </div>
                    <label for="Email">Email</label>
                    <div class="field">
                        <i class="fas fa-envelope"></i>
                        <input id="Email" type="Email" name="email" placeholder="Your Email" value="<?php echo $row["email"]; ?>">
                    </div>

                                    
                                    
                        <input type="hidden" name="username" value="<?php echo $username; ?>">
						<label for="Mobile_No" ><strong>Phone Number</strong></label>
						<div class="field" >
						<input type="text" id="number" placeholder="Enter phone number" name="mobileNo" value="<?php echo $row["mobileNo"]; ?>" >
					</div>
					
					
					<div id="recaptcha-container"></div>
					<div class="field">
					<button type="button" onclick="phoneAuth();" style ="background-color: #D3D3D3; border-radius: 10px 10px; color: black ; text-align:center; height:30px ; width: 80px; margin-top: 10px;">Send Otp</button>
					</div>
					
					
					
					<div class="field">
					<input type="text" id="verificationCode" placeholder="Enter verification code" >
					</div>

					<div class="wrapper">
					<div>
					<label for="WhatsApp_no" ><strong>Whatsapp Number</strong></label>
						<div class="field" >
						<input type="text" id="number" placeholder="Enter phone number" name="whatsAppNo" value="<?php echo $row["whatsAppNo"]; ?>" >
					</div>
					</div>
					<div class="gap"></div>
					<div>
					<label for="Telegram_No" ><strong>Telegram Number</strong></label>
						<div class="field" >
						<input type="text" id="number" placeholder="Enter phone number" name="telegramNo" value="<?php echo $row["telegramNo"]; ?>" >
					</div>
					</div>
					</div>

					<label for="Gender">Gender</label>

					<div class="field">
                    <input type="radio" name="gender" <?php if (isset($row["gender"]) && $row["gender"]=="female") echo "checked";?> value="female">Female
                    <input type="radio" name="gender" <?php if (isset($row["gender"]) && $row["gender"]=="male") echo "checked";?> value="male">Male
					
					</div>
                    
		        	      
					         <div>
		                    <label for="City">City</label>
							<div class="field">	
		                    <select id="City" name="cityID" >
							<option>Select City</option>														
		                    	<?php 								   
		                    		require 'data.php';
		                    		$cityID = loadCity();
		                    		foreach ($cityID as $City) {									
                                        echo "<option value='".$City['cityID']."' ". ($row["cityID"]== $City['cityID'] ? "selected" : "") .">".$City['cityName']."</option>";
		                    		}
		                    	 ?>
		                    </select>
		                </div>
                        </div>
		           
					    <div class="gap"></div>
					
		                    <label for="Area">Area</label>	
							<div class="field">			
		                    <select  id="Area" name="areaID"  >  
	
							<option >Select Area</option>	                
		                    </select>
		                </div>	
						
						
					
					
					
					<label for="Address">Address</label>
                    <div class="field" >
						<input id="Address" type="textbox" name="address" placeholder="Enter your Address"value="<?php echo $row["address"]; ?>" >
					</div>	
					


            <div>
            <label for="Company">Company Name</label>
            <div class="field">
                <select id="Company" name="companyID">
                <option>Select</option>
                <?php 
                require 'dbUtil/connect.php';
                $sqli = "SELECT * FROM companymaster";
                $result = mysqli_query($conn, $sqli);
                while ($row = mysqli_fetch_array($result)) {
                echo '<option value="'.$row['companyName'].'"';
                if (isset($_GET['companyID']) && !empty($_GET['companyID'])) {
                    $sql_selected = "SELECT companyID FROM warkari WHERE warkariID='".$_GET['companyID']."'";
                    $result_selected = mysqli_query($conn, $sql_selected);
                    $selected = mysqli_fetch_array($result_selected);
                    if ($selected['companyID'] == $row['companyID']) {
                        echo 'selected="selected"';
                    }
                }
                echo '>'.$row['companyName'].'</option>';
            }	
            ?>
            </select>
            </div>
        </div>
        </div>
					
                    <div>
                    <label for="Volunteer" >Interested in Volunteer</label>
                    <div class="field">
                        <input type="radio" name="volunteer" value="yes" 
                            <?php if (isset($row["volunteer"]) && $row["volunteer"] == "yes") {echo "checked";} ?> >Yes
                        <input type="radio" name="volunteer" value="no" 
                            <?php if (isset($row["volunteer"]) && $row["volunteer"] == "no") {echo "checked";} ?>>No
                    </div>
                    </div>                          
			          
                        <input type="hidden" value="<?php echo $id; ?>" name="id">
            <div class="form-element my-4">
                <input type="submit" name="edit" value="Update" class="btn btn-primary">
            </div>              
                       
                <?php
            }
            
            else{
                echo "<h3>Record Does Not Exist</h3>";
            }
            ?>
           
        </form>
        
        </div>  
    </div>
</body>
<script type="text/javascript">
	function mess() 
	  {
		alert ("register succeessfully");
		return true;
	  }
	  </script>   
</html>

