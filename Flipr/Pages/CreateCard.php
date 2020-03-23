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
						Create Card
					</li>
				</ol>
			</nav>
        </div>
    </div>
</div>

<div style="height:90%;width:60%;margin-top:2%;" class="container">
<form action="../CardTasks/createcard.php" method="POST" enctype="multipart/form-data">
    <h3 style="text-align:center;">Card Creation</h3><hr>
  <div class="form-group">
    <label for="exampleFormControlInput1">Card Title:</label>
    <?php 
        $lid=$_GET['lid'];
        echo'<input name="lid" type="hidden" value="'.$lid.'" >';
    ?>
    <input  class="form-control" name="ctitle" id="exampleFormControlInput1" placeholder="Enter the title" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Due Date:</label>
    <input  class="form-control" type="date" name="duedate" id="exampleFormControlInput1" required>
  </div>
  
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Comment (optional) :</label>
    <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" placeholder="Enter Your comment here." rows="3"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Attachment:</label>
    <input style="height:9%;"  class="form-control" type="file" name="files" id="exampleFormControlInput1" required>
  </div>
  <?php 
                        if(isset($_SESSION['error'])){
                            $error=$_SESSION['error'];
                            echo '<p class="text-center" style="color:red;margin-bottom:5px;" ><br>'.$error.'</p>';
                        }
                        ?>

  <input type="submit" style="margin-left:45%;" class="btn btn-primary" value="Create">
</form>
</div>
<?php 
    unset($_SESSION['error']);
    ?>
<?php 
include('../layout/footer.php');
?>