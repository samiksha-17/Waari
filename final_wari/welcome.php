<?php 
  /* Template Name: Waritable template */

  $dbName = "itdindee";
  $dbHost = "localhost";
  $dbUser = "root";
  $dbPass = "student12345";
  $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

// Check if the delete button is clicked

require_once 'dbUtil/connect.php';
require_once 'functions.php';

$result = display_data();


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <style>
  body {
  background-color: #232323;
  color: #fff;
}
.card-header {
  background-color: #ffd700;
  color: #000;
  font-weight: bold;
}
.btn-primary {
  background-color: #E49D0F;
  border-color: #E49D0F;
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
.table-bordered th,
.table-bordered td {
  border-color: silver !important;
  color: #c0c0c0;
}
.table-bordered {
  background-color: #333;
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
<body   style="background-image: url('https://itdindee.org/wp-content/uploads/2023/03/shri.jpg'); background-repeat: no-repeat; background-size: cover;">
<div class="container">
  
  <style>
  body {
    background-color: #C5C5C5;
  }
</style>

<div class = "container my-5">
  

  <button type="button"  class="btn btn-warning" onClick="document.location.href='registerWarkari.php'">Add New Warkari </button>

   
</div> 
  <div class="container">
      <div class="row mt-5">
        <div class="col">
          <div class="card mt-5">
            <div class="card-header">
              <h2 class="display-6 text-center">Registered Warkari</h2>
            </div>
            <div>
               
            <table style="border: 1px solid silver" class="table table-bordered text-center">
              <tr style="background-color: #171717;">
                  
                  <td><strong> First Name </strong></td>
                  <td><strong> Last Name </strong></td>
                  <td><strong> Email </strong></td>
                  <td> <strong>Phone number </strong></td>
                  <td> <strong>Edit </strong></td>
                  <td> <strong>View details </strong></td>
                  <td><strong> Delete </strong></td>
                  <td> <strong>Join Wari 2023 </strong></td>

                </tr>
                <tr>
                <?php 
                   $result = display_data();
                  while($row = mysqli_fetch_assoc($result))
                  {
                ?>
                 
                  <td><?php echo $row['firstName']; ?></td>
                  <td><?php echo $row['lastName']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['mobileNo']; ?></td>
                  
                  <td><a href="dir/edit.php?warkariID=<?php echo $row['warkariID']; ?>" class="btn btn-primary" >Edit</a></td>
                  <td><a href="dir/view.php?warkariID=<?php echo $row['warkariID']; ?>" class="btn btn-primary" >view</a></td>
                  <td><a href="dir/delete.php?warkariID=<?php echo $row['warkariID']; ?>" class="btn btn-danger">Delete</a></td>  
                  <td><a href="enrollWari.php?warkariID=<?php echo $row['warkariID']; ?>" >Join Wari 2023</a></td>
                  <a href="welcome.php" class="btn-back" style="position: absolute; top: 0; left: 0; margin-top: 20px; padding: 10px 15px; font-size: 18px; margin-right:50px">Back</a>

                </tr>
                <?php    
                  }
                
                ?>
                
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>