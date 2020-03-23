<?php
$conn = mysqli_connect("localhost", "id13006371_kalai","12345","id13006371_root");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$uid=$_GET['uid'];
$bid=$_GET['bid'];

$result=mysqli_query($conn,"SELECT * FROM board WHERE bid='$bid'");
$row=mysqli_fetch_assoc($result);

$title=$row['title'];
$teamtype=$row['teamtype'];
$description=$row['description'];
$visibility=$row['visibility'];
$verify=0;
$re=mysqli_query($conn,"INSERT INTO board(bid,uid,title,teamtype,description,visibility,verified) VALUES('$bid','$uid','$title','$teamtype','$description','$visibility','$verify')");
return header('location: /Flipr/Pages/Cards.php');
?>