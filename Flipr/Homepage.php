
<?php
$conn = mysqli_connect("localhost", "id13006371_kalai","12345","id13006371_root");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
        $id=$_SESSION['id'];
        $result=mysqli_query($conn,"SELECT count(*) AS count,title FROM board WHERE uid='$id'");
        $count=mysqli_fetch_assoc($result);
        $count=$count['count'];
        if($count>0){
            echo'<script>window.location.replace("http://fliprhh4.000webhostapp.com/Flipr/Pages/Cards.php");</script>';
            return;
        }

?>
<?php
include('./layout/navbar.php');
?>
<div style="margin-top:1%;border-radius:7px;" class="container">
<nav>
				<ol class="breadcrumb">
          <li class="breadcrumb-item active">
						Home
					</li>
				</ol>
			</nav>
  
  <img style="opacity:.8;width:99.8%;border-radius:8px;" src="./Images/home.jpg" alt="Image" >
  <div style="border-radius:20px;text-transform: uppercase;" class="lcentered"><p style="margin-left:35%;margin-right:-10%;;color:rgb(245, 20, 110)" class="text-center"> Welcome to Flipr Hackathon Hiring 4.0 Portal. 
      Here you can create your own sticky notes for your project.</p>
      <a style="margin-left:60%;margin-right:20%;border-radius:30px;" href="/Flipr/Pages/Cards.php" class="btn btn-primary">Get Started</a>
      </div>
</div>


<?php
include('./layout/footer.php');
?>

