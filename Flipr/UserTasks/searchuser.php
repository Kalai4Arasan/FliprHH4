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
    

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $user=mysqli_real_escape_string($conn,$_POST['username']);
        $bid=mysqli_real_escape_string($conn,$_POST['bid']);
        $uid=$_SESSION['id'];
        $result=mysqli_query($conn,"SELECT * FROM user WHERE username LIKE '%$user%' AND uid<>'$uid' AND uid NOT IN (SELECT uid from board WHERE bid='$bid') ");

        echo'
            <div class="container">
            <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">User</th>
                <th scope="col">Email</th>
                <th scope="col">Invite</th>
            </tr>
            </thead>
            <tbody>
    ';
        while($row=mysqli_fetch_assoc($result)){
            echo'
            <tr>
                <td>'.$row['username'].'</td>
                <td>'.$row['email'].'</td>
                <td><a class="btn btn-outline-success" href="/Flipr/UserTasks/inviteuser.php?uid='.$row['uid'].'&bid='.$bid.'"><i class="fa fa-user-plus"></i></a></td>
            </tr>
            ';
        }
        echo'
        </tbody>
        </table>
        </div>
        ';
    }
?>


<?php 
include('../layout/footer.php');
?>