<?php
if(isset($_POST['submit'])){	
	if($_POST['pass2']==$_POST['pass1']){
   $first_name=$_POST['Fname'];
	$last_name=$_POST['Lname'];
	$Mail=$_POST['Email'];
	$Pass=$_POST['pass2'];
 $conn = new mysqli('localhost', 'root', '') or die (mysqli_error()); // DB Connection
 $db = mysqli_select_db($conn, 'fyp') or die("DB Error"); // Select DB from database
 //Selecting Database
 $query = mysqli_query($conn, "SELECT * FROM alogin WHERE email ='".$Mail."'");
 $numrows = mysqli_num_rows($query);	
 if($numrows == 0)
 { 
 $sql ="INSERT INTO alogin (`first-name`, `last-name`, `email`,`pass`) VALUES ('$first_name', '$last_name', '$Mail','$Pass')";	 
 $result = mysqli_query($conn, $sql);
 //Result Message
 if($result){
 ?><script>window.alert("Sign-up Successfully.");</script><?php
 }
 else {?><script>window.alert("Sign-up Failure.");</script><?php }
 }
 else
 {?><script>window.alert("Email already exist.");</script><?php
 }
 }
		else{?><script>window.alert("Password do not match.");</script><?php
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
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script> 
	</script>
</head>

<body>
  <div class="container">
    <div class="card card-register mx-auto mt-5" id="logincard">
      <div class="card-header"><h1>Register an Account</h1></div>
      <div class="card-body">
        <form method="POST" action="register2.php">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">First name</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter first name" name="Fname" required>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Last name</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" placeholder="Enter last name" name="Lname" required >
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" name="Email" placeholder="Enter email" required >
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="exampleInputPassword1"  name="pass1"type="password" placeholder="Password" required>
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input class="form-control" id="exampleConfirmPassword"  name="pass2" type="password" placeholder="Confirm password" required>
              </div>
            </div>
          </div>
          <!--<a class="btn btn-primary btn-block" href="login2.php">Register</a>-->
          <input type="submit" value="Register" class="btn btn-primary btn-block" name="submit">
          
        </form>       
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
