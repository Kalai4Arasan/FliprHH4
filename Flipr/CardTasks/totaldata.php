<?php
$conn = mysqli_connect("localhost", "id13006371_kalai","12345","id13006371_root");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
       
      $id=$_SESSION['id'];
      $result=mysqli_query($conn,"SELECT * FROM board WHERE uid='$id'");
      /* Converting data into JSON*/
      $rows = array();
      while($r = mysqli_fetch_assoc($result)) {
          $rows[] = $r;
      }
      print json_encode($rows);
 ?>