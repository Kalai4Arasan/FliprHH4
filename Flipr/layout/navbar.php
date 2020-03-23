<?php 

if(!isset($_SESSION['username'])){
    return header('location: /Flipr/index.php');
}
$conn = mysqli_connect("localhost", "id13006371_kalai","12345","id13006371_root");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en" ng-app="App">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!--<link href="https://fonts.googleapis.com/css?family=Baloo+2:400,500&display=swap" rel="stylesheet">-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<style>
        .dropdown {
        position: relative;
        display: inline-block;
        }

        .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        padding: 12px 16px;
        z-index: 1;
        }
        .dropdown:hover .dropdown-content {
        display: block;
        border-radius:8px;
        }

        .lcentered {
        position: absolute;
        top: 40%;
        left: 41%;
        transform: translate(-50%, -50%);
        font-size: 140%;
        font-family: 'Baloo 2';
      }
      .breadcrumb-item + .breadcrumb-item::before {
          content: ">";
      }


      .collapse-content .fa.fa-heart:hover {
        color: #f44336 !important;
      }
      .collapse-content .fa.fa-share-alt:hover {
        color: #0d47a1 !important;
      }
</style>
<body  style="font-family: 'Roboto', sans-serif;" ng-controller="ctrl" >
<div class="container">
<nav style="border-radius:0 0 10px 10px;" class="navbar navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand ml-2 text-white" href="./index.php"><img style="background-color:white;border-radius:8px;" src="/Flipr/Images/logo.png" width="40" height="40" alt="img" srcset=""> HH4.0</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-white" href="/Flipr/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="/Flipr/Pages/Cards.php">Notes</a>
      </li>
    </ul>
    <ul style="margin-left:70%;" class=" my-2 my-lg-0">
        <div class="dropdown">
        <h6 class="text-white"><?php
            $name=$_SESSION['username']; 
            $uid=$_SESSION['id'];
            $result=mysqli_query($conn,"SELECT * FROM board WHERE uid='$uid' AND verified='0'");
            if(mysqli_num_rows($result)>0){
              echo $name.'<span class="ml-1 badge badge-light">'.mysqli_num_rows($result).'</span>
              <i class="fa fa-caret-down"></i></h6>
              <div class="dropdown-content">
              <a style="text-decoration:none" href="/Flipr/UserTasks/teaminvites.php?uid='.$uid.'">Team Invites</a><br>
              ';
            }
            else{
              echo $name.'
              <i class="fa fa-caret-down"></i></h6>
               <div class="dropdown-content">
              ';
            }
        ?> 
        <a style="text-decoration:none" href="/Flipr/Auth/logout.php">Logout</a>
        </div>
        </div>
    </ul>
  </div>
  
</nav>

</div>

