<?php

$conn = mysqli_connect("localhost", "id13006371_kalai","12345","id13006371_root");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $ctitle=mysqli_real_escape_string($conn,$_POST['ctitle']);
    $duedate=mysqli_real_escape_string($conn,$_POST['duedate']);
    $lid=mysqli_real_escape_string($conn,$_POST['lid']);
    $comment=mysqli_real_escape_string($conn,$_POST['comment']);


    //Storing Attachment.
    if(isset($_FILES['files'])){
        //print_r( $_FILES['files']);
        $errors= array();
        if(is_dir("../Files/".$lid.'-'.$ctitle)){
            $target_dir = "../Files/".$lid.'-'.$ctitle."/";  
        }
        else{
            mkdir("../Files/".$lid.'-'.$ctitle);
            $target_dir = "../Files/".$lid.'-'.$ctitle."/";
        }
        $target_file = $target_dir .$ctitle. basename($_FILES["files"]["name"]);
        $file_name = $_FILES['files']['name'];
        $file_size =$_FILES['files']['size'];
        $file_tmp =$_FILES['files']['tmp_name'];
        $file_type=$_FILES['files']['type'];
        $tmp = explode('.', $file_name);
        $file_ext = end($tmp);
        $extensions= array("png","jpg","jpeg","xlsx","docx","pdf");
        
        if(in_array($file_ext,$extensions)=== false){
           $_SESSION['error']=$file_ext." files not allowed";
           return header('location: /Flipr/Pages/CreateCard.php?lid='.$lid);
        }
        move_uploaded_file($_FILES["files"]["tmp_name"],$target_file);

        mysqli_query($conn,"INSERT INTO cards(lid,ctitle,duedate,attachment,comment,tasks) VALUES ('$lid','$ctitle','$duedate','$file_name','$comment','$ctitle')");

        return header("location: /Flipr/Pages/ShowCard.php?lid=".$lid);
    }
}  
      
 ?>