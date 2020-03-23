<title>Search User</title>
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
						Show User
					</li>
				</ol>
			</nav>
        </div>
    </div>
</div>
<?php 
    $conn = mysqli_connect("localhost", "id13006371_kalai","12345","id13006371_root");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
        $uid=mysqli_real_escape_string($conn,$_GET['uid']);
        $result=mysqli_query($conn,"SELECT * FROM board WHERE uid='$uid' AND verified='0' ");

        echo'
            <h3 style="text-align:center">Team Invites:<h3>
            <div style="width:50%;" class="container">
            <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Board Name</th>
                <th scope="col">Task</th>
            </tr>
            </thead>
            <tbody>
    ';
        while($row=mysqli_fetch_assoc($result)){
            echo'
            <tr>
                <td>'.$row['title'].'</td>
                <td><a class="btn btn-outline-success mr-2" href="/Flipr/UserTasks/change.php?bid='.$row['bid'].'&uid='.$row['uid'].'" ><i class="fa fa-check"></i></a>
                <a class="btn btn-outline-danger "><i class="fa fa-window-close"></i></a></td>
            </tr>
            ';
        }
        echo'
        </tbody>
        </table>
        </div>
        ';
?>

<?php 
include('../layout/footer.php');
?>