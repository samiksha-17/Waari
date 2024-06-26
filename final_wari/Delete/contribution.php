<?php

require_once 'config/db.php';


$tappaID = $_POST['tappaID'];

$sql = "SELECT returnContri,stayContri FROM tappamaster WHERE tappaID = '$tappaID' ";
$result = mysqli_query($con, $sql);
return ($result);


?>