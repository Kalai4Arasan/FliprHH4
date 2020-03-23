
<title>Lists</title>
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
						Lists
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
    $bid=$_GET['bid'];
    $board=mysqli_query($conn,"SELECT * FROM board WHERE bid='$bid'");
    $list=mysqli_query($conn,"SELECT * FROM lists WHERE bid='$bid'");
    $rowBoard=mysqli_fetch_assoc($board);
    echo'
    <!--Board Lists -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <hr>
                    </div>
                    <div style="margin-left:10%;" class="container">
                    <div class="jumbotron card card-block" style="padding:5%;width:80%;">
                        <h2>
                        <h1 style="text-transform:uppercase;"><img src="../Images/private.png" class="rounded-circle mr-3" height="50px" width="50px" alt="avatar">
                        '.$rowBoard['title'].'  
                        </h1>
                        <small style="margin-left:11%;font-weight: bold;">'.$rowBoard['teamtype'].'</small>
                        </h2>
                        <hr>
                        <p class="lead">Description:</p>
                        <ul class="list-group">
                        <li class="list-group-item">
                            '.$rowBoard['description'].'
                        </li>
                        </ul>';
                        
                        if(mysqli_num_rows($list)==0){
                            echo'<br><p class="lead">No List found.</p><button style="width:150px;border-radius:12px;" class="btn btn-primary"><i class="fa fa-plus" data-toggle="modal" data-target="#myModallist"> Add List</i></button>';
                        }
                        else{
                        echo'<p>
                            <p class="lead">Lists:</p>
                            <ul class="list-group">
                            ';
                            while($row=mysqli_fetch_assoc($list)){
                                echo '<li class="list-group-item">'.$row['listname'].'<a href="/Flipr/Pages/ShowCard.php?lid='.$row['lid'].'"><i style="float:right;" data-toggle="tooltip" data-placement="top" title="Show Cards" class="btn btn-outline-success fa fa-outdent  p-2"></i></a><i style="float:right;" class="btn btn-outline-danger mr-2 fa fa-trash p-2"></i></li>';
                            }
                            echo'
                            </ul>
                        </p>';
                        echo'<button style="width:150px;border-radius:12px;" class="btn btn-primary"><i class="fa fa-plus" data-toggle="modal" data-target="#myModallist"> Add List</i></button>';
                        }
                    echo'
                    <br>';

                   
                   echo'
                    <p class="lead">Visibility Type :</p>
                        <ul class="list-group">
                        <li class="list-group-item">';
                        if($rowBoard['visibility']=="Private"){
                            echo'<i class="fa fa-user-secret p-1"></i> Private <i class="fa fa-check text-success" aria-hidden="true"></i>
                                <i style="float:right;" class="btn btn-outline-primary mr-2 fa fa-caret-square-o-right "> Change</i></li>
                                    </ul>
                            ';
                        }
                        else{
                            echo'<i class="fa fa-user p-1"></i> Public <i class="fa fa-check text-success" aria-hidden="true"> </i>
                                <i style="float:right;" class="btn btn-outline-primary mr-2 fa fa-caret-square-o-right "> Change</i></li>
                                    </ul>
                                <br>
                                <p class="lead">Invite Team Members :</p>
                                <form class="form-inline" action="../UserTasks/searchuser.php" method="POST">
                                     <input type="hidden" name="bid" value="'.$bid.'">
                                    <input class="form-control" name="username" placeholder="Search Team Member...">
                                    <input type="submit" class="ml-2 btn btn-outline-primary" value="Search">
                                </form>
                            ';
                            echo'<p class="lead">Team Members:</p>';
                            $uid=$_SESSION['id'];
                            $members=mysqli_query($conn,"SELECT username,uid FROM user WHERE uid IN (SELECT uid FROM board WHERE uid<>'$uid' AND bid='$bid' AND verified='1')");
                        
                            if(mysqli_num_rows($members)==0){
                                echo'<p class="lead">No Members found.</p>';
                            }
                            else{
                            echo'
                                <ul class="list-group">
                                ';
                                while($row=mysqli_fetch_assoc($members)){
                                    echo '<li class="list-group-item">'.$row['username'].'</li>';
                                }
                                echo'
                                </ul>
                            ';
                            }
                        }
                        echo'

                        
                    ';
    
    

    echo'
    </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="modal fade" id="myModallist" role="dialog">
    <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form action="../CardTasks/storelist.php" method="post">
        <div class="form-group">
            <input type="hidden" name="bid" value="'.$bid.'">
            <label for="listname">List Name :</label>
            <input class="form-control" name="listname" id="listname" placeholder="i.e:Planning" required>
        </div>
        <input type="submit" class="btn btn-success" value="Add">
        </form>
        </div>
    </div>
    </div>
</div>

    ';
?>




<?php 
include('../layout/footer.php');
?>