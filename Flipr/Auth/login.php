<?php
$conn = mysqli_connect("localhost", "id13006371_kalai","12345","id13006371_root");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
      $user = mysqli_real_escape_string($conn,$_POST['username']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 
      if(strlen($password)<6){
         $_SESSION['error']="Password must be greater than 6";
         return header("location: /Flipr/Auth/LoginPage.php");
      }
      
      $sql = "SELECT * FROM user WHERE phone = '$user' or email ='$user' and password = '$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
         $_SESSION['username'] = $row['username'];
         $_SESSION['id']=$row['uid'];
         return header('location: /Flipr/index.php');
      }
      else {
         $_SESSION['error']="Invalid Username or Password";
         return header("location: /Flipr/Auth/LoginPage.php");
      }
   }
 ?>