

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

    <style>
    .box-shadow {
        border: 1px solid #888888;
        padding: 10px;
        box-shadow: 10px 10px #888888;
        }
    </style>
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div style="margin:5px;margin-top:5%;border-radius:8px;"  class="col-md-4 box-shadow">
					<form style="margin:50px;" action="./reset.php" method="POST" role="form">
                    <h3 class="text-center">
                        <img src="../Images/logo.png" width="100" height="100" alt="" srcset="">
					</h3>
                    <div class="form-group">
                        <input type="password" name="epassword" placeholder="Enter Password" class="form-control" required/>
						</div>
						<div class="form-group">
							<input type="password" name="cpassword" placeholder="Confirm Password" class="form-control" required/>
						</div> 
                        <?php 
                        if(isset($_SESSION['error'])){
                            $error=$_SESSION['error'];
                            echo '<div class="text-center" style="color:red;margin-bottom:5px;" ><br>'.$error.'</div>';
                        }
                        ?>
						<button style="width: 50%; margin: 0 27%;" type="submit" class="btn btn-primary">
							Reset Password
						</button>
					</form>
                    <a href="/Flipr/index.php" style="margin:auto" class="text-center"><i class="fa fa-arrow-left"></i> Home</a>
				</div>
                
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
    unset($_SESSION['error']);
    ?>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>