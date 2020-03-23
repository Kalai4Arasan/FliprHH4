<?php
$conn = mysqli_connect("localhost", "id13006371_kalai","12345","id13006371_root");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
       
      $id=$_SESSION['id'];
      $data=json_decode(file_get_contents("php://input"),true);
      $title= $data['title'];
      $type= $data['type'];
      $description= $data['description'];
      $visibility= $data['visibility'];
      $verified=1;
      $bid=uniqid();
      //echo"$id,$bid";
      mysqli_query($conn,"INSERT INTO board(bid,uid,title,teamtype,description,visibility,verified) VALUES('$bid','$id','$title','$type','$description','$visibility','$verified')");
      $result=mysqli_query($conn,"SELECT count(*) AS count FROM board WHERE uid='$id'");
      $count=mysqli_fetch_assoc($result);
      echo $count['count'];
 ?>