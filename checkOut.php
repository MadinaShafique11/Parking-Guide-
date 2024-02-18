 <?php
include_once 'connect.php';
session_start();
if(!isset($_SESSION['name'])){
	header('Location: login2.php');
	}
$name=$_SESSION['name'];
	if(isset($_POST['submit'])){	
	if(!empty($_POST['plateNo']) && !empty($_POST['status'])){
  $Plate_no=$_POST['plateNo'];	
	$Sat=$_POST['status'];	
		$n="of";

		
		
 $conn = new mysqli('localhost', 'root', '') or die (mysqli_error()); // DB Connection
 $db = mysqli_select_db($conn, 'fyp') or die("DB Error"); // Select DB from database
 //Selecting Database
 $query = mysqli_query($conn, "SELECT * FROM vehicle WHERE plate_no ='".$Plate_no."' AND status='".on."'");
	
 $numrows = mysqli_num_rows($query);
		$a=0;
 if($numrows!= 0)
 {
 $sql="UPDATE `vehicle` SET `status`='".$n."' WHERE `plate_no`= '".$Plate_no."'";		 
 $result = mysqli_query($conn, $sql);	   	
 //Result Message
 if($result){
?><script>window.alert("Vehicle Check-Out Successfully.");</script><?php
 }
	
 else {
 ?><script>window.alert(" Check-Out failure!.");</script><?php
 }
 }
 else
 {    
	 ?><script>window.alert("vehicle with given no plate is not in parking! Please try again..");</script><?php
 }
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
      <div class="card-header"><h3>Check Out</h3></div>
      <div class="card-body">
        <form method="POST" action="checkOut.php">           
          <div class="form-group">
            <label for="exampleInputPassword1">Vehicle no plate</label>
            <input class="form-control" id="exampleInputPassword1" type="text" placeholder="No plate" name="plateNo" value="<?php $handle = fopen("output.txt", "r"); //read line one by one


while (!feof($handle)) // Loop til end of file.
{
    echo fgets($handle); // Read a line.

}
				fclose($handle);   ?>" required >
          </div>                  
        <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" name="status" type="checkbox" required> Parking Status</label>
            </div>
          </div>     
         <input type="submit"value="Print" class="btn btn-primary btn-block" name="submit" >           
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
