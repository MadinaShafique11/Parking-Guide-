<?php
if(isset($_POST["submit"])){
 
 $user = $_POST['user'];
 $car=$_POST['Squestion'];
 $pass = $_POST['pass'];
 
 $conn = new mysqli('localhost', 'root', '') or die(mysqli_error());
 $db = mysqli_select_db($conn, 'fyp') or die("databse error");
 $query = mysqli_query($conn, "SELECT * FROM alogin WHERE email='".$user."'");
 $result = mysqli_num_rows($query);
 if($result !=0)
 {

 while($row = mysqli_fetch_assoc($query))
 {
 $dbuser=$row['email'];
 $dbcar=$row['car'];
 }
 if($user == $dbuser && $car == $dbcar)
 {

	 	 $pass = $_POST['pass'];

 $query2="UPDATE `alogin` SET `pass`='".$pass."' WHERE `email`= '".$user."'";
	$result=mysqli_query($conn,$query2);
	if($result){
		?><script>window.alert("Password updated.");</script><?php
		
	}
	else{?><script>window.alert("Password don't updated.");</script><?php
		
	}
	 
	 }
	 else
	 {
		?><script>window.alert("Data do not match.");</script><?php }
	}
 
 else
 {
	 ?><script>window.alert("Invalid Email.");</script><?php
 }
 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Parking Guide</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="loginBody">
  <div class="container" style="margin-top:130px;">
    <div class="card card-login mx-auto mt-5" id="logincard">
      <div class="card-header"><h1>Reset Password</h1></div>
      <div class="card-body">
        <form method="POST" action="" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email" name="user" required>
          </div>
           <div class="form-group">
            <label for="exampleInputEmail1">your Favorit car</label>
            <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="car name" name="Squestion" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Reset-Password</label>
            <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" name="pass" min="5" max="10" required>
          </div>
			
         <!--<a class="btn btn-primary btn-block" href="index2.php" name="submit">Login</a>-->
         <!--<input type="submit" name="submit" value="Submit">-->
         <!--<input type="submit" value="login" name="submit">-->
         <input type="submit"value="Reset" class="btn btn-primary btn-block" name="submit"> 
        </form> 
        <div class="text-center">
          <!--<a class="d-block small mt-3" href="register2.php">Register an Account</a>-->
         <br>
          
          <a class="d-block small" href="login2.php">Login page</a>
        </div>
      </div>
      </div>
  </div> 
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  
</body>
</html>
