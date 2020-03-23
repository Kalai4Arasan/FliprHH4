<?php
$conn = mysqli_connect("localhost", "id13006371_kalai","12345","id13006371_root");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
      $user = mysqli_real_escape_string($conn,$_POST['username']);
      
      $sql = "SELECT * FROM user WHERE phone = '$user' or email ='$user'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
         $_SESSION['id']=$row['id'];
         return header('location: /Flipr/Auth/ResetPassword.php');
      }
      else {
         $_SESSION['error']="Entered Email is not valid";
         return header("location: /Flipr/Auth/ForgotPassword.php");
      }
   }
 ?>