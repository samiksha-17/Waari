
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Warkari Details</title>
    <style>
        /* body background */
        body {
            background-color: #e6e6e6;
            color: #333;
            font-family: Arial, sans-serif;
        }

        /* header styles */
        header {
            background-color: #333;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 4px solid #ffcc00;
        }

        h1 {
            color: #ffcc00;
            margin: 0;
        }

        /* link styles */
        a {
            color: #333;
            text-decoration: none;
        }

        a:hover {
            color: #ffcc00;
        }

        /* button styles */
        .btn-primary {
            background-color: #ffcc00;
            border-color: #ffcc00;
            color: #333;
            transition: all 0.2s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #333;
            border-color: #333;
            color: #ffcc00;
        }

        /* warkari details */
        .warkari-details {
            background-color:#2E2E2E;
            color: white;
            padding: 20px;
            margin-top: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h5 {
            color:#FBFCF8;
            margin-top: 0;
        }

        p {
            margin-bottom: 0;
        }
    </style>
</head>
<body>


    <div class="container my-4">
        <header>
            <h1>Warkari Details</h1>
            <div>
                <a href="./Warkari" class="btn btn-primary">Back</a>
            </div>
        </header>
        <div class="warkari-details p-5 my-4">
           
           <?php  
           
  $dbName = "itdindee";
  $dbHost = "localhost";
  $dbUser = "root";
  $dbPass = "student12345";
  $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
            $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
            $id = $_GET['warkariID'];
            if ($id) {
                $sql = "SELECT * FROM warkari  WHERE warkariID = $id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                 ?>
                 <style>
  h5, p {
    display: inline-block;
    margin: 50;
    padding-right: 10px;
  }

  .underline {
  text-decoration: underline;
}


</style>
<div class="details-container">
  <h5> First Name:</h5>
  <h5><?php echo $row["firstName"]; ?></h5>
</div>
<div class="details-container">
  <h5>Last Name:</h5>
  <h5><?php echo $row["lastName"]; ?></h5>
</div>

<div class="details-container">
  <h5>Email:</h5>
  <h5><?php echo $row["email"]; ?></h5>
</div>

<div class="details-container">
  <h5>Mobile Number:</h5>
  <h5><?php echo $row["mobileNo"]; ?></h5>
</div>
<div class="details-container">
  <h5>WhatsApp Number:</h5>
  <h5><?php echo $row["whatsAppNo"]; ?></h5>
</div>
<div class="details-container">
  <h5>Telegram Number:</h5>
  <h5><?php echo $row["telegramNo"]; ?></h5>
</div>
<div class="details-container">
  <h5>Gender:</h5>
  <h5><?php echo $row["gender"]; ?></h5>
</div>
<div class="details-container">
  <h5>Address:</h5>
  <h5><?php echo $row["address"]; ?></h5>
</div>
<div class="details-container">
  <h5>Company:</h5>
  <h5><?php echo $row["companyID"]; ?></h5>
</div>
<div class="details-container">
  <h5>Are You Interested In Volunteering ?</h5>
  <h5><?php echo $row["volunteer"]; ?></h5>
</div>

                 <?php
                }
            }
            else{
                echo "<h5>No record found</h5>";
            }
            ?>
            
        </div>
    </div>
</body>
</html>