<?php 
session_start();
  require_once 'dbUtil/connect.php';
   
  function display_data(){
    global $conn;
    $userName = $_SESSION['username'];
    $query = "SELECT userID FROM `usermaster` WHERE userName='$userName'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    $userID = $user['userID'];
    $query = "SELECT * FROM `warkari` WHERE userID='$userID'";
    $result = mysqli_query($conn, $query);
    return $result;
}
function display_tappa(){
  global $conn;
 // $sql = "SELECT * FROM tappamaster"; 
 $sql = "select * from tappamaster left join tappaenrollment on tappamaster.tappaID = tappaenrollment.tappaID and warkariID = 113";
  $result = mysqli_query($conn, $sql);
  return $result;
}
?>
