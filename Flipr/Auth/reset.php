<?php
$conn = mysqli_connect("localhost", "id13006371_kalai","12345","id13006371_root");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
      $id=$_SESSION['id'];
      $epassword = mysqli_real_escape_string($conn,$_POST['epassword']); 
      $cpassword = mysqli_real_escape_string($conn,$_POST['cpassword']); 
      if(strlen($epassword)<6 || strlen($cpassword)<6 ){
         $_SESSION['error']="Password must be greater than 6";
         return header("location: /Flipr/Auth/ResetPassword.php");
      }
      if($epassword===$cpassword){
      $sql = "UPDATE user SET password = '$epassword' where id='$id' ";
      mysqli_query($conn,$sql);
       return header("location: /Flipr/index.php");
      }
      else{
        $_SESSION['error']="Password not matched";
        return header("location: /Flipr/Auth/ResetPassword.php");
      }
   }
 ?>