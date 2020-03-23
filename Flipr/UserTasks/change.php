<?php 
    $conn = mysqli_connect("localhost", "id13006371_kalai","12345","id13006371_root");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
        $uid=mysqli_real_escape_string($conn,$_GET['uid']);
        $bid=mysqli_real_escape_string($conn,$_GET['bid']);
        mysqli_query($conn,"UPDATE board SET verified=1 WHERE uid='$uid' AND bid='$bid'");
        return header('location: /Flipr/Cards.php');
?>
        
