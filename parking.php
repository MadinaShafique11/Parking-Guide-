 <?php
include_once 'connect.php';
session_start();
if(!isset($_SESSION['name'])){
	header('Location: login2.php');
	}
$name=$_SESSION['name'];
	if(isset($_POST['submit'])){	
	if(!empty($_POST['pname']) && !empty($_POST['prows'])&& !empty($_POST['pcols'])){
  	$Park_name=$_POST['pname'];	
	$Park_rows=$_POST['prows'];
	$Park_cols=$_POST['pcols'];

	$conn = new mysqli('localhost', 'root', '') or die (mysqli_error()); // DB Connection
 	$db = mysqli_select_db($conn, 'fyp') or die("DB Error"); // Select DB from database
 //Selecting Database
		
		$query="UPDATE `parking` SET `pname`='".$Park_name."',`prows`='".$Park_rows."',`pcols`='".$Park_cols."' WHERE `id`= '1'";
		$result=mysqli_query($conn,$query);
	if($result){
		?><script>window.alert("Basic information saved.");</script><?php
		
	}
	else{?><script>window.alert("Information do not save!");</script><?php
		
	}
	mysqli_close($conn);


 }
		else{
		?><script>window.alert("required fields  required");</script><?php
		}
}
?>


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
  <!--=================================================================-->
  <!--=================================================================-->
   <div class="container" style="margin-top:20px;">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"><h3>Parking Basic Information</h3></div>
      <div class="card-body">
        <form method="POST" action="parking.php">           
          <div class="form-group">
            <label for="exampleInputPassword1">Parking Name</label>
            <input class="form-control" id="exampleInputPassword1" type="text" placeholder="Enter Parking name" name="pname" value="" required >
          </div>
          <div class="form-group">
          <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Parking Rows</label>
                <input class="form-control" id="datetimepicker-input" type="number" name="prows" aria-describedby="nameHelp" value="" min="1" max="100" required>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Parking Columns</label>
                <input class="form-control" id="exampleInputLastName" type="number" name="pcols" aria-describedby="nameHelp" value="" min="1" max="100" required>
              </div>
            </div>
			</div>                  
        <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" name="status" type="checkbox" required>Confirm?</label>
            </div>
          </div>     
         <input type="submit"value="Submit" class="btn btn-primary btn-block" name="submit" >           
        </form> 
            
       
      </div>
      </div>
  </div> 
    

    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
  </div>
  
</body>

</html>
