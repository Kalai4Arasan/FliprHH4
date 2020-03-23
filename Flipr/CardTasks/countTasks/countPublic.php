<?php
$conn = mysqli_connect("localhost", "id13006371_kalai","12345","id13006371_root");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
        $id=$_SESSION['id'];
        $result=mysqli_query($conn,"SELECT count(*) AS count,title FROM board WHERE uid='$id' and visibility='Public'");
        $count=mysqli_fetch_assoc($result);
        $title=mysqli_query($conn,"SELECT title FROM board WHERE uid='$id' and visibility='Public'");
        $count=$count['count'];
        $ans=array();
        while($r=mysqli_fetch_assoc($title)){
            $ans[]=$r;
        }
        $titlePublic= json_encode($ans);
        echo $titlePublic;
?>