<?php
$conn = mysqli_connect("localhost", "id13006371_kalai","12345","id13006371_root");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name=mysqli_real_escape_string($conn,$_POST['username']);
    $epass=mysqli_real_escape_string($conn,$_POST['epassword']);
    $cpass=mysqli_real_escape_string($conn,$_POST['cpassword']);
    $phnumber=mysqli_real_escape_string($conn,$_POST['phone']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $query="INSERT INTO user(username, password, phone, email) 
    VALUES ('$name','$epass','$phnumber','$email')";
    $ch=mysqli_query($conn,"SELECT * FROM user WHERE email='$email'");
    $c=mysqli_fetch_assoc($ch);
    if( mysqli_num_rows($ch)==0){
        if($epass===$cpass){
            mysqli_query($conn,$query);
            $_SESSION['username']=$name;
            $_SESSION['id']=$c['uid'];
            $username=$_SESSION['username'];
            return header('location: /Flipr/index.php');
        }
        else{
            $_SESSION['error']="Password is not matched"; 
            return header('location: /Flipr/Auth/SignupPage.php');
        }
    }
    else{
        $_SESSION['error']="Already User available"; 
        return header('location: /Flipr/Auth/SignupPage.php');
    }
}
?>