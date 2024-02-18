<?php
if(isset($_POST["submit"])){
 if(!empty($_POST['user']) && !empty($_POST['pass'])){
 $user = $_POST['user'];
 $pass = $_POST['pass'];
 
 $conn = new mysqli('localhost', 'root', '') or die(mysqli_error());
 $db = mysqli_select_db($conn, 'fyp') or die("databse error");
 $query = mysqli_query($conn, "SELECT * FROM alogin WHERE email='".$user."' AND pass='".$pass."'");
 $result = mysqli_num_rows($query);
 if($result !=0)
 {

 while($row = mysqli_fetch_assoc($query))
 {
 $dbuser=$row['email'];
 $dbpass=$row['pass'];
 }
 if($user == $dbuser && $pass == $dbpass)
 {$st="blocked";
	$query = mysqli_query($conn, "SELECT * FROM alogin WHERE email='".$user."' AND pass='".$pass."' AND status='".$st."'");
 $numrows = mysqli_num_rows($query);
 if($numrows==0){
	 
 session_start();
 $_SESSION['name']=$_POST['user'];
 header("Location:index2.php");}
	 else
	 {
		?><script>window.alert("Temprary blocked by Super Admin.");</script><?php }
	}
 }
 else
 {
	 ?><script>window.alert("Invalid Username or Password.");</script><?php
 }
 }
 else
 {
?><script>window.alert("filled all the fields above.");</script>

<?php
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
      <div class="card-header"><h1>Login</h1></div>
      <div class="card-body">
        <form method="POST" action="" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email" name="user" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" name="pass" max="10" required>
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div> 
			
         <!--<a class="btn btn-primary btn-block" href="index2.php" name="submit">Login</a>-->
         <!--<input type="submit" name="submit" value="Submit">-->
         <!--<input type="submit" value="login" name="submit">-->
         <input type="submit" value="login" class="btn btn-primary btn-block" name="submit">
        </form> 
        <div class="text-center">
          <!--<a class="d-block small mt-3" href="register2.php">Register an Account</a>-->
         <br>
          
          <a class="d-block small" href="forgot-password2.php">Forgot Password?</a>
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
