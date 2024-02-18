<?php
include_once 'connect.php';
session_start();
if(!isset($_SESSION['name'])){
	header('Location: login2.php');
	}
$name1=$_SESSION['name'];
$member = "-1";
if (isset($_SESSION['name'])) {
  $member = $_SESSION['name'];

}
 $conn = new mysqli('localhost', 'root', '') or die(mysqli_error());
 $db = mysqli_select_db($conn, 'fyp') or die("databse error");
 $query = mysqli_query($conn, "SELECT * FROM alogin WHERE email='".$member."'");
 $result = mysqli_num_rows($query);
if($result !=0)
 {
 while($row = mysqli_fetch_assoc($query))
 {
 $fn=$row['first-name'];
 $ln=$row['last-name'];	
 $mail=$row['email'];
$pass=$row['pass'];
	
}
 }
if(isset($_POST['update'])){	
if($_POST['pass2']==$_POST['pass1']){
	
	$namee=$_POST['Fname'];
	$lastname=$_POST['Lname'];
	$pass=$_POST['pass2'];
 $query2="UPDATE `alogin` SET `first-name`='".$namee."',`last-name`='".$lastname."',`pass`='".$pass."' WHERE `email`= '".$member."'";
	$result=mysqli_query($conn,$query2);
	if($result){
		?><script>window.alert("Profile updated.");</script><?php
		
	}
	else{?><script>window.alert("Profile don't updated.");</script><?php
		
	}
	mysqli_close($conn);

}/* if passwords  match*/
	else{?><script>window.alert("Password do not match.");</script><?php
		
	} /* else if passwords  not match*/
	
}/* if update is clicke*/

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

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
<?php
	include("navigation.php");
	?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Update Profile</li>
      </ol>
      <h1>Update Profile</h1>
      <hr>
      <p>You can change your profile if you want to.</p>
      
      <!-- ==============registration part ==============-->
      <!-- ==============registration part ==============-->
      <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Update your Account</div>
      <div class="card-body">
      
   
        <form method="POST" action="">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">First name</label>
                <input class="form-control" id="exampleInputName" type="text" name="Fname" aria-describedby="nameHelp" value="<?php echo "$fn"; ?>">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Last name</label>
                <input class="form-control" id="exampleInputLastName" type="text" name="Lname" aria-describedby="nameHelp" value="<?php echo "$ln"; ?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" type="email" name="Mail" aria-describedby="emailHelp" value="<?php echo"$mail"?>" disabled>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="exampleInputPassword1" name="pass1" type="password" value="<?php echo"$pass"?>">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input class="form-control" id="exampleConfirmPassword" name="pass2" type="password" value="<?php echo"$pass"?>">
              </div>
            </div>
          </div>
          <!--<a class="btn btn-primary btn-block">Update</a>-->
          <input type="submit" value="Update" class="btn btn-primary btn-block" name="update">
        </form>
        
        <!--<?php echo"helo";?>-->
        
        <div class="text-center">
			<a class="d-block small mt-3" href="#">Help</a>
        </div>
      </div>
    </div>
  </div>
      <!-- ==============Registration part end ==============-->
     <!-- ============== Registration part end ==============-->
     
      
      
      <div style="height: 1000px;"></div>
    </div>
    <!-- /.container-fluid-->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <!-- Toggle between fixed and static navbar-->
    <script>
    $('#toggleNavPosition').click(function() {
      $('body').toggleClass('fixed-nav');
      $('nav').toggleClass('fixed-top static-top');
    });

    </script>
    <!-- Toggle between dark and light navbar-->
    <script>
    $('#toggleNavColor').click(function() {
      $('nav').toggleClass('navbar-dark navbar-light');
      $('nav').toggleClass('bg-dark bg-light');
      $('body').toggleClass('bg-dark bg-light');
    });

    </script>
  </div>
</body>

</html>
