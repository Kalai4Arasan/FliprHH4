<title>Create Card</title>
<?php
include('../layout/navbar.php');
?>
<div class="mt-2 container" >
	<div class="row">
		<div  class="col-md-12">
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="/Flipr/index.php">Home</a>
					</li>
                    <li class="breadcrumb-item">
						<a href="/Flipr/Pages/Cards.php">Notes</a>
					</li>
                    <li class="breadcrumb-item active">
						Show Card
					</li>
				</ol>
			</nav>
        </div>
    </div>
</div>
<div class="container">
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			
                <?php
                    $conn = mysqli_connect("localhost", "id13006371_kalai","12345","id13006371_root");
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                           
                          $lid=$_GET['lid'];
                          $result=mysqli_query($conn,"SELECT * FROM cards WHERE lid='$lid'");
                          echo'<a style="float:right;"  href="/Flipr/Pages/CreateCard.php?lid='.$lid.'" class="btn btn-primary"><i class="fa fa-plus"></i> Add Card</a>
                          <div class="row">
                          ';
                            while($row=mysqli_fetch_assoc($result)){
                                 echo'
                                 <div class="row mr-4 ml-2">
                                 <!-- Card -->
                                 <div style="height:250px;width:250px;" class="card promoting-card ml-2 mb-2">
                                 <!-- Card content -->
                                 <div class="card-body d-flex flex-row">

                                     <!-- Avatar -->
                                     <img src="../Images/logo1.jpg" class="rounded-circle mr-3" height="50px" width="50px" alt="avatar">

                                     <!-- Content -->
                                     <div>

                                     <!-- Title -->
                                     <h4  class="card-title font-weight-bold mb-2 text-dark">'.$row['tasks'].'</h4> 
                                     <!-- Subtitle -->
                                     <p class="card-text text-dark"><i class="far fa-clock pr-2"></i><small>Due : '.$row['duedate'].'</small></p></a>

                                     </div>

                                 </div>

                                 <!-- Card image -->
                                 <div class="view overlay">
                                     <img height="100" class="card-img-top rounded-0" src="../Images/activity.jpg" alt="Card image cap">
                                     <a href="#!">
                                     <div class="mask rgba-white-slight"></div>
                                     </a>
                                 </div>

                                 <!-- Card content -->
                                 <div class="card-body">

                                     <div class="collapse-content">
                                     <!-- Button -->
                                     <div class="dropdown">
                                     <a class="btn btn-flat red-text p-1 my-1 mr-0 mml-1 collapsed" ><small>More</small> <i class="fa fa-angle-double-down"></i></a>
                                     <div class="dropdown-content">
                                         <p>'.$row['comment'].'</p>
                                     </div>
                                     
                                     </div>';
                                     if(strlen($row['attachment'])>0){
                                        echo' <a style="float:right" class="btn btn-outline-success" href="/Flipr/Files/'.$row['lid'].'-'.$row['ctitle'].'/'.$row['ctitle'].$row['attachment'].'"><i class="fa fa-download p-1"></i></a>';
                                     }
                                     echo'
                                     <a style="float:right" class="btn btn-outline-danger mr-1" href=""><i class="fa fa-edit p-1"></i></a>
                                     </div>
                                     </div>
                                     </div>
                                     </div>
                                 ';   
                            } 
                ?>
			</div>
		</div>
	</div>
</div>
</div>

<?php 
include('../layout/footer.php');
?>