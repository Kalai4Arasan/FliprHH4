<?php
$conn = mysqli_connect("localhost", "id13006371_kalai","12345","id13006371_root");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $bid=mysqli_real_escape_string($conn,$_POST['bid']);
    $lname=mysqli_real_escape_string($conn,$_POST['listname']);
    mysqli_query($conn,"INSERT INTO lists(bid,listname) VALUES ('$bid','$lname')");
    $result=mysqli_query($conn,"SELECT lid FROM lists WHERE bid='$bid' and listname='$lname'");
    $row=mysqli_fetch_assoc($result);
    $lid=$row['lid'];
    mysqli_query($conn,"INSERT INTO cards(lid,tasks) VALUES ('$lid','To Do')");
    mysqli_query($conn,"INSERT INTO cards(lid,tasks) VALUES ('$lid','Doing')");
    mysqli_query($conn,"INSERT INTO cards(lid,tasks) VALUES ('$lid','Done')");
    return header('location: /Flipr/Pages/ShowBoard.php?bid='.$bid);
}
?>