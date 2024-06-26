<?php 

/* Template Name: Wari Template */

session_start();

$dbName = "itdindee";
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "student12345";
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
$username = $_SESSION['username'];

$query = "SELECT userID FROM `usermaster` WHERE userName='$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
$user_id = $user['userID'];



if (isset($_POST["cityID"]) && is_ajax()) {
    $query = "SELECT * FROM areamaster WHERE cityID = '".$_POST["cityID"]."'";
    $result = mysqli_query($conn, $query);
    $areas = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($areas);
    exit;
}

function is_ajax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
function loadCity() {
	global $conn;
	$query = "SELECT * FROM citymaster";
	$result = mysqli_query($conn, $query);
	$cityID = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $cityID;
}
if(isset($_POST['save']) && !is_ajax()) 
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
  
   $sql = "INSERT INTO warkari(userID, firstName, lastName, email, mobileNo, whatsAppNo, telegramNo, gender, age, address, cityID, areaID, companyID, volunteer)
           VALUES ('$user_id', '$firstName', '$lastName', '$email', '$mobileNo', '$whatsAppNo', '$telegramNo', '$gender', '$age', '$address', '$cityID', '$areaID', '$companyID', '$volunteer')";

   $res = mysqli_query($conn , $sql) ;
    
   if($res)
   {
	header("Location:welcome.php");
	exit();
   }
   else 
   {
      echo "Please fill the form again.";
   }       
}
 
	

?>

<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<title>Register Warkari</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<style> <?php include_once "res/registerWarkari.css" ?> </style> 
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

	
	<script type="text/javascript" >
  $(document).ready(function(){
    $("#City").change(function(){
      var cityID = $("#City").val();
      $.ajax({
        url: window.location.href,
        method: 'post',
        data: {cityID: cityID}
      }).done(function(areas){
        console.log(areas);
        areas = JSON.parse(areas);
        $('#Area').empty();
        areas.forEach(function(area){
          $('#Area').append('<option value="' + area.areaID + '">' + area.areaName + '</option>')
        });
      });
    });
  });
</script>

	


<script src="firebase.js" type="text/javascript"></script>
	
	
	</head>
	<body  style="background-image: url('https://itdindee.org/wp-content/uploads/2023/03/Picsart_23-03-02_23-58-10-978-scaled.jpg'); background-repeat: no-repeat; background-size: cover;">

	<form class="hotel-reservation-form" method="post" action="">
  <h1 style="margin: top 80px;"><i class="far fa-calendar-alt"></i>Register Warkari</h1>
  <div class="fields">
    <!-- Input Elements -->
    <div class="wrapper">
      <div style="display: inline-block; width: 50%;">
        <label for="First_Name">First Name<strong style="color: red;">*</strong></label>
        <div class="field">
          <i class="fas fa-user"></i>
          <input id="First_Name" type="text" name="firstName" placeholder="First Name" style=" background-color: #686c7233; border-radius: 8px;"required>
        </div>
      </div>
      <div class="gap"></div>
      <div style="display: inline-block; width: 50%;">
        <label for="Last_Name">Last Name<strong style="color: red;">*</strong></label>
        <div class="field">
          <i class="fas fa-user"></i>
          <input id="Last_Name" type="text" name="lastName" placeholder="Last Name" style=" background-color: #686c7233; border-radius: 8px;" required>
        </div>
      </div>
    </div>
    <div style="display: inline-block; width: 48%;">
      <label for="Email">Email<strong style="color: red;">*</strong></label>
      <div class="field">
        <i class="fas fa-envelope"></i>
        <input id="Email" type="Email" name="email" placeholder="Your Email" style=" background-color: #686c7233; border-radius: 8px;" required>
      </div>
    </div>
    <div style="display: inline-block; width: 50%;">
      <label for="Number">Mobile Number<strong style="color: red;">*</strong></label>
      <div class="field">
        <i class="fas fa-mobile-alt"></i>
        <input id="mobileNo" type="text" name="mobileNo" placeholder="Enter Your Phone Number" required pattern="[0-9]{10}" style=" background-color: #686c7233; border-radius: 8px;" required>
      </div>
    </div>
    <div class="field">
      <input type="hidden" name="username" required value="<?php echo $username; ?> ">
    </div>
						
						
					
					<div  id="recaptcha-container"></div>
					<div class="field">
    <button type="button" onclick="phoneAuth(); render();" style='background-color:#808080;'>Send Otp</button>
</div>

   

					
					
					<div class="field">
					<input type="text" id="verificationCode" placeholder="Enter verification code" style=" background-color: #686c7233; border-radius: 8px;" required>
					</div>

					<div class="wrapper">
					<div>
					
					<label for="WhatsApp_no" ><strong>Whatsapp Number</strong><strong style="color: red;">*</strong></label>
						<div class="field" >
						<i class="fab fa-whatsapp fa-lg fa-fw"></i>
						<input type="text" id="whatsAppNo" placeholder="Enter phone number" name="whatsAppNo"  style=" background-color: #686c7233; border-radius: 8px;" required>
					</div>
					</div>
					<div class="gap"></div>
					<div>
					<label for="Telegram_No" ><strong>Telegram Number</strong><strong style="color: red;">*</strong></label>
						<div class="field" >
						<i class="fab fa-telegram-plane fa-fw"></i>	
						<input type="text" id="telegramNo" placeholder="Enter phone number" name="telegramNo" style=" background-color: #686c7233; border-radius: 8px;" required >
						<script>
var inputs = document.querySelectorAll('input');

inputs.forEach(function(input) {
    input.addEventListener('input', function() {
        if (input.value !== '') {
            input.style.backgroundColor = 'white';
        }
    });
});

var mobileNo = document.getElementById('mobileNo');
var whatsAppNo = document.getElementById('whatsAppNo');
var telegramNo = document.getElementById('telegramNo');

mobileNo.addEventListener('input', function(){
    whatsAppNo.value = this.value;
    telegramNo.value = this.value;
    // Dispatch a new 'input' event on the elements to trigger the script
    var inputEvent = new Event('input', { bubbles: true });
    whatsAppNo.dispatchEvent(inputEvent);
    telegramNo.dispatchEvent(inputEvent);
});
</script>



					</div>
					</div>
					</div>



					<div style="display: inline-block; width: 45%;">
    <label for="Gender" required>Gender <strong style="color: red;">*</strong></label>
    <div class="field">
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female" style="background-color: #686c7233; border-radius: 8px;" required><span style="color: white;">Female</span>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male" style="background-color: #686c7233; border-radius: 8px;" required><span style="color: white;">Male</span>
    </div>
</div>
<div style="display: inline-block; width: 45%;">
    <label for="age"> Age<strong style="color: red;">*</strong></label>
    <div class="field">
        <input type="text" id="number" placeholder="Enter Your Age " name="age" style=" background-color: #686c7233; border-radius: 8px;" required>
    </div>
</div>




					
					

					<div class="field">
					
    
				
					</div>
		        	
					
					<div>
  <label for="City">City<strong style="color: red;">*</strong></label>
  <div class="field" style="display: inline-block;">
    <select id="City" name="cityID" style="background-color: #686c7233; border-radius: 8px; height: 55px;" required>
      <option style="color: #858688; padding-bottom: 40px;">Select City</option>
      <?php 
        $cityID = loadCity();
        foreach ($cityID as $City) {
          echo "<option id='".$City['cityID']."' value='".$City['cityID']."'>".$City['cityName']."</option>";
        }
      ?>
    </select>
  </div>
  
  <div class="gap"></div>
  
  <label for="Area">Area<strong style="color: red;">*</strong></label>
  <div class="field" style="display: inline-block;">
    <select id="Area" name="areaID" style="background-color: #686c7233; border-radius: 8px; height: 55px;" required>
      <option style="color: #858688;">Select Area</option>
    </select>
  </div>
</div>

					
					
					<div class="fields" style = "margin-top : -20px">
					<label for="Address">Address<strong style="color: red;">*</strong></label>
						<input id="Address" type="textbox" name="address" placeholder="Enter your Address" style=" background-color: #686c7233; border-radius: 8px;" required>
					</div>	
					


					<div class="fields">	
		                    <label for="Company">Company Name<strong style="color: red;">*</strong></label>
																		
							<select id = "Company"name="companyID"  style=" background-color: #686c7233; border-radius: 8px;height:55px" required>
					         <option style="color:#858688;">Select Company </option>
							<?php 
                             
								$sqli = "SELECT * FROM companymaster";
								$result = mysqli_query($conn, $sqli);
								while ($row = mysqli_fetch_array($result)) {
									
									echo '<option>'.$row['companyName'].'</option>';
								}	
			

								?>
							
		                    </select>
		                   </div>
					
					

						<label for="Volunteer" style = "margin-left: 23px" required>Interested in Volunteer<strong style="color: red;">*</strong></label>	 
						
						<div class="fields">
						<input type="radio" name="volunteer" <?php if (isset($volunteer) && $volunteer=="Yes") echo "checked";?> value="Yes" style=" background-color: #686c7233; border-radius: 8px; color: white;" required><span style="color: white;">Yes</span>
						<input type="radio" name="volunteer" <?php if (isset($volunteer) && $volunteer=="No") echo "checked";?> value="No" style=" background-color: #686c7233; border-radius: 8px; color: white;" required><span style="color: white;">No</span>
						</div>
							
						<script>
    var inputs = document.querySelectorAll('input, select');

    inputs.forEach(function(input) {
        input.addEventListener('input', setBackground);
        input.addEventListener('change', setBackground);
    });

    function setBackground() {
        if (this.value !== '') {
            this.style.backgroundColor = 'white';
        } else {
            this.style.backgroundColor = '#686c7233';
        }
    }
</script>
<a href="./Warkari" class="btn-back" style="position: absolute; top: 0; left: 0; margin-top: 80px; padding: 10px 15px; font-size: 18px; margin-left:10px">Back</a>


      <button type="submit"  name="save" id="sign-in-button"  class="btn-btn-primary" onclick="return alert();">Register</button>
		
		</form>
	</body>
	<script type="text/javascript">
	function alert() 
	  {
		
	  }
	  </script>
</html>