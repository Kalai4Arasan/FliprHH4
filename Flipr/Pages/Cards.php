<title>Cards</title>

<?php
include('../layout/navbar.php');
$conn = mysqli_connect("localhost", "id13006371_kalai","12345","id13006371_root");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id=$_SESSION['id'];
$count=0;
$result=mysqli_query($conn,"SELECT count(*) AS count FROM board WHERE uid='$id'");
$count=mysqli_fetch_assoc($result);
$count=$count['count'];
echo "<script>var count='$count'</script>"
?>
<div class="mt-2 container" >
	<div class="row">
		<div  class="col-md-12">
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="/Flipr/index.php">Home</a>
					</li>
					<li class="breadcrumb-item active">
						Notes
					</li>
				</ol>
			</nav>
			<div class="row">
				<div class="col-md-4 mb-4">
					<div id="card-462670">
						<div class="card">
							<div class="card-header bg-success">
								 <a  class="card-link collapsed text-white" data-toggle="collapse" data-parent="#card-462670" href="#card-element-549695">Boards</a>
							</div>
							<div id="card-element-549695" class="collapse">
								<div class="card-body">
									
										<div ng-if="total1.length==0" class="card">
													<div class="card-header bg-primary">
														<a class="text-white text-white">Personal Board :</a>
													</div>
													<div id="card-element-549695" class="collapse">
														<div class="card-body">
															Nothing
														</div>
													</div>
												</div>


										<div ng-if="total1.length>0" class="card" style="border:white;">
													<div class="card-header bg-primary">
														<a class="text-white active">Personal Board :</a>
													</div>
																<ul class="list-group" ng-repeat="x in total1">
																	<li class="list-group-item list-group-item-action">{{x.title}}</li>
																</ul>
												</div>
									
									
								</div>
								<div  class="card-body">
										<div ng-if="total2.length==0" class="card">
												<div class="card-header bg-primary">
													<a class=" text-white">Team Board :</a>
												</div>
												<div id="card-element-549695" class="collapse">
													<div class="card-body">
														Nothing
													</div>
												</div>
											</div>

											<div ng-if="total2.length>0" class="card" style="border:white;">
													<div class="card-header bg-primary">
														<a class=" active text-white">Team Board :</a>
													</div>
																<ul class="list-group" ng-repeat="x in total2">
																	<li class="list-group-item list-group-item-action">{{x.title}}</li>
																</ul>
												</div>
									
									
								</div>
							</div>
						</div>
						<?php
							$result=mysqli_query($conn,"SELECT username FROM user WHERE uid<>'$id' AND uid IN (SELECT uid FROM board WHERE bid IN(SELECT bid FROM board WHERE uid='$id') AND verified='1')");
							if(mysqli_num_rows($result)>0){
								echo'
								<div class="card">
									<div class="card-header bg-success">
										<a  class="card-link collapsed text-white" data-toggle="collapse" data-parent="#card-462670" href="#card-element-588201">Team Members</a>
									</div>
									<div id="card-element-588201" class="collapse">
										<div class="card-body">
										<ul class="list-group">
								';
								while($row=mysqli_fetch_assoc($result)){
									echo '<li class="list-group-item">'.$row['username'].'</li>';
								}
								echo'
										</ul>
									</div>
								</div>
							</div>
							';
							}
							else{
								echo'
								<div class="card">
									<div class="card-header bg-success">
										<a  class="card-link collapsed text-white" data-toggle="collapse" data-parent="#card-462670" href="#card-element-588201">Team Members</a>
									</div>
									<div id="card-element-588201" class="collapse">
										<div class="card-body">
											Nobody
										</div>
									</div>
								</div>
								';
							}
							
						?>

						



					</div>
				</div>

				<div ng-if="status==0"  class="col-md-8">
                <div style="padding:28%;background-image:url('../Images/bg2.png');border-radius:18px;" class="container">
                <a id="modal" style="margin-left:30%;border-radius:20px;text-transform:uppercase;" href="#modal-container" role="button" class="btn btn-success" data-toggle="modal">Create Board</a>                
				</div>			
				</div>
				
				<div ng-if="status>0"  class="col-md-8">
					<div class="container-fluid">
								<div class="row">
									<div class="col-md-12">	
									<a style="float:right;"  href="#modal-container" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Add Board</a><br><br>
										<div id="php" class="row">
											<!-- Card -->
										<div ng-repeat="x in records" style="height:250px;width:250px;" class="card promoting-card ml-2 mb-2">
										<!-- Card content -->
										<div class="card-body d-flex flex-row">

											<!-- Avatar -->
											<img src="../Images/private.png" class="rounded-circle mr-3" height="50px" width="50px" alt="avatar">

											<!-- Content -->
											<div>

											<!-- Title -->
											<a style="text-decoration:none;" href="../Pages/ShowBoard.php?bid={{x.bid}}"><h4  class="card-title font-weight-bold mb-2 text-dark">{{x.title}}</h4>
											<!-- Subtitle -->
											<p class="card-text text-dark"><i class="far fa-clock pr-2"></i>{{x.teamtype}}</p></a>

											</div>

										</div>

										<!-- Card image -->
										<div class="view overlay">
											<img height="100" class="card-img-top rounded-0" src="../Images/public.png" alt="Card image cap">
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
												<p>{{x.description}}</p>
											</div>
											</div>
											
											<a href="../Pages/ShowBoard.php?bid={{x.bid}}"><i class="fa fa-list text-muted float-right p-1 my-1" data-toggle="tooltip" data-placement="top" title="show List of Notes"></i></a>
											<i class="fa fa-plus text-muted float-right p-1 my-1 mr-3" data-toggle="modal" data-target="#myModallist{{x.bid}}" data-placement="top" title="Add List"></i>
											<i ng-if="x.visibility=='Private'" class="fa fa-user-secret"></i>
										<!--Modal fro creating Lists-->
										<!-- Modal -->
											<div class="modal fade" id="myModallist{{x.bid}}" role="dialog">
												<div class="modal-dialog modal-sm">
												<div class="modal-content">
													<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													</div>
													<div class="modal-body">
													<form action="../CardTasks/storelist.php" method="post">
													<div class="form-group">
														<input type="hidden" name="bid" value="{{x.bid}}">
														<label for="listname">List Name :</label>
														<input class="form-control" name="listname" id="listname" placeholder="i.e:Planning" required>
													</div>
													<input type="submit" class="btn btn-success" value="Add">
													</form>
													</div>
												</div>
												</div>
											</div>


											<i ng-if="x.visibility=='Public'"  class="fa fa-user"></i>

											</div>

										</div>

										</div>
										<!-- Card -->
												</div>
											</div>
										</div>
													
									</div>
									
							</div>
					</div>
				</div>
				
<!--Modal For create board.-->
<div  class="modal fade"  style="padding:5%;" id="modal-container" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div style="padding-left:10%;padding-right:10%;" class="modal-content">
								<div id="header" class="modal-header">
									<h5 class="modal-title mt-1" id="myModalLabel">
										Choose Board Type
									</h5> 
									<button type="button" class="close" data-dismiss="modal">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div id="body" class="modal-body">
									<a  onclick="personalCreate()" class="btn btn-success ml-2 mr-2 text-white">Personal Board</a>
                                    <a  onclick="teamCreate()" class="btn btn-success ml-2 mr-2 text-white">Team Board</a>
								</div>

							<!--Private modal-->
								<div id="private" style="display:none;" class="modal-body">
								<i  class="fa fa-arrow-left mt-2 text-primary goback"></i>
								<button type="button" class="close" data-dismiss="modal">
										<span aria-hidden="true">×</span>
									</button>
								<form ng-submit="store1()">
								<h4 class="text-center">Let's Build a Team</h4>
								<hr>
								<div class="form-group">
									<label for="title1">Title :</label>
									<input ng-model="title" class="form-control" id="title1" placeholder="i.e:Avengers Team" required>
								</div>
								<div class="form-group">
									<label for="select1">Team Type :</label>
									<select ng-model="type" class="form-control" id="select1" required>
									<option>Marketing</option>
									<option>Business</option>
									<option>Engineering-IT</option>
									<option>Project Management</option>
									<option>Education</option>
									<option>Others</option>
									</select>
								</div>
								<div class="form-group">
									<label for="description">Description :</label>
									<textarea ng-model="description" class="form-control" id="description" rows="3" required></textarea>
								</div>
								<div  class="form-group">
								<p>Visibility Type : <i class="fa fa-user-secret"></i> private <i class="fa fa-check text-success" aria-hidden="true"></i></p>
								</div>
								<input  type="submit"  value="Create" style="margin-left:40%;margin-right:40%;" class="btn btn-primary text-center">
								</form>
								</div>



								<!--public modal-->
								<div id="public" style="display:none;" class="modal-body">
								<i class="fa fa-arrow-left mt-2 text-primary goback"></i>
								<button type="button" class="close" data-dismiss="modal">
										<span aria-hidden="true">×</span>
									</button>
										
								<form ng-submit="store2()">
								<h4 class="text-center">Let's Build a Team</h4>
								<hr>
								<div class="form-group">
									<label for="title2">Title :</label>
									<input class="form-control" ng-model="title" id="title2" placeholder="i.e:Company name or Any" required>
								</div>
								<div class="form-group">
									<label for="select">Team Type :</label>
									<select ng-model="type" class="form-control" id="select" required>
									<option>Marketing</option>
									<option>Business</option>
									<option>Engineering-IT</option>
									<option>Project Management</option>
									<option>Education</option>
									<option>Others</option>
									</select>
								</div>
								<div class="form-group">
									<label for="description2">Description :</label>
									<textarea ng-model="description" class="form-control" id="description2" rows="3" required></textarea>
								</div>
								<div class="form-group">
								<p>Visibility Type : <i class="fa fa-user"></i> public <i class="fa fa-check text-success" aria-hidden="true"></i></p>
								</div>
								
								<input type="submit"  value="Create" style="margin-left:40%;margin-right:40%;"  class="btn btn-primary text-center">
								
								</form>
								</div>

								<div class="modal-footer">
								</div>
							</div>
							
						</div>
						
					</div>
					
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include('../layout/footer.php');
?>
<script>
var app=angular.module("App",[]);
app.controller("ctrl",function($scope,$http){
	//console.log(count);
	$scope.status=count;
	$http.get("http://fliprhh4.000webhostapp.com/Flipr/CardTasks/totaldata.php")
    						.then(function (response) {
							//console.log(response.data);
							$scope.records=response.data;
							//console.log($scope.records);
							});

	/*important-----*/

	$http.get("http://fliprhh4.000webhostapp.com/Flipr/CardTasks/countTasks/countPrivate.php")
    						.then(function (response) {
							//console.log(response.data);
							$scope.total1=response.data;
							//console.log($scope.total1);
							});

	$http.get("http://fliprhh4.000webhostapp.com/Flipr/CardTasks/countTasks/countPublic.php")
    						.then(function (response) {
							//console.log(response.data);
							$scope.total2=response.data;
							//console.log($scope.total2);
							});

	$scope.store1=function(){
		

		$scope.pp="Private";
		$scope.records={};	
		$http.post("http://fliprhh4.000webhostapp.com/Flipr/CardTasks/store.php",{
			'title':$scope.title,
			'type':$scope.type,
			'description':$scope.description,
			'visibility':$scope.pp,
		}).success(function (data, status, headers, config) {
					console.log(data);
					$http.get("http://fliprhh4.000webhostapp.com/Flipr/CardTasks/totaldata.php")
    						.then(function (response) {
							//console.log(response.data);
							$scope.records=response.data;
							//console.log($scope.records);
							});
					$http.get("http://fliprhh4.000webhostapp.com/Flipr/CardTasks/countTasks/countPrivate.php")
    						.then(function (response) {
							//console.log(response.data);
							$scope.total1=response.data;
							//console.log($scope.total1);
							});
					$(".close").click();
					$('#card-462670 > div:nth-child(1) > div.card-header.bg-success > a').click();
					$('#card-462670 > div:nth-child(2) > div.card-header.bg-success > a').click();
					$scope.status=data;
                    });
	};
	$scope.store2=function(){
		

		$scope.pp="Public";
		$http.post("http://fliprhh4.000webhostapp.com/Flipr/CardTasks/store.php",{
			'title':$scope.title,
			'type':$scope.type,
			'description':$scope.description,
			'visibility':$scope.pp,
		}).success(function (data, status, headers, config) {
			//console.log(data);
			$http.get("http://fliprhh4.000webhostapp.com/Flipr/CardTasks/totaldata.php")
    						.then(function (response) {
							//console.log(response.data);
							$scope.records=response.data;
							//console.log($scope.records);
							});
			$http.get("http://fliprhh4.000webhostapp.com/Flipr/CardTasks/countTasks/countPublic.php")
    						.then(function (response) {
							//console.log(response.data);
							$scope.total2=response.data;
							//console.log($scope.total2);
							});
			$(".close").click();
			$('#card-462670 > div:nth-child(1) > div.card-header.bg-success > a').click();
			$('#card-462670 > div:nth-child(2) > div.card-header.bg-success > a').click();
			
			$scope.status=data;
                    });
	};


	
})



//All javascript tasks will be done here-------------------------
function teamCreate(){
	document.getElementById("public").style.display="block";
	document.getElementById("body").style.display="none";
	document.getElementById("header").style.display="none";
}
function personalCreate(){
	document.getElementById("private").style.display="block";
	document.getElementById("body").style.display="none";
	document.getElementById("header").style.display="none";
}

$(window).click(function(){
	setTimeout(function(){
if($('#modal-container').is(':visible')==false){

	document.querySelector("#title1").value="";
	document.querySelector("#description").value="";
	document.querySelector("#title2").value="";
	document.querySelector("#description2").value="";


	document.getElementById("body").style.display="block";
	document.getElementById("header").style.display="block";
	document.getElementById("private").style.display="none";
	document.getElementById("public").style.display="none";

	
}
}, 1000);

});
$(".goback").click(function(){
	document.getElementById("body").style.display="block";
	document.getElementById("header").style.display="block";
	document.getElementById("private").style.display="none";
	document.getElementById("public").style.display="none";
	document.querySelector("#title1").value="";
	document.querySelector("#description").value="";
	document.querySelector("#title2").value="";
	document.querySelector("#description2").value="";

});

</script>

