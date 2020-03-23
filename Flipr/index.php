<?php
if(isset($_SESSION['username'])){
    return header("location: /Flipr/Homepage.php");
}
else{
    return header("location: /Flipr/Auth/LoginPage.php");
}
?>