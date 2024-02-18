<?php
include_once 'connect.php';
session_start();
if(!isset($_SESSION['name'])){
	header('Location: index2.php');
	}
$name=$_SESSION['name'];
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
          <a href="index2.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Charts</li>
        
      </ol>
      
        <div class="col-lg-8">
          <!-- Example Pie Chart Card-->
                    <?php 
		          //total spaces record
				   
					   		  $rw=0;
 $conn = new mysqli('localhost', 'root', '') or die(mysqli_error());
 $db = mysqli_select_db($conn, 'fyp') or die("databse error");
 $query = mysqli_query($conn, "SELECT * FROM parking WHERE id='1'");
 $result = mysqli_num_rows($query);
if($result !=0)
 {
 while($row = mysqli_fetch_assoc($query))
 {
 $rw=$row['prows'];
 $col=$row['pcols'];
}
 }	 		$col=$col;
			$rw=$rw;
			$crs=$col*$rw;
		
			date_default_timezone_set('Asia/Karachi'); 
			
			
			
			$date=date("H:i");
	               $sql_query="SELECT * FROM vehicle WHERE status='on'";
	             $result_set=mysql_query($sql_query);
				 $sz= mysql_num_rows ($result_set );			
				//$gz=$crs-$sz;
			
			//$
			
			$gz=$crs-$sz;
		
			
			?>
          
          
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-pie-chart"></i> Parking Status Pie Chart</div>
            <div class="card-body">
              <canvas id="myPieChart" width="100%" height="100"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated at <?php  date_default_timezone_set('Asia/Karachi'); echo $date;?></div>
          </div>
        </div>
      </div>
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
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-charts.js"></script>
    <script>


	  // -- Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: [ "Full", "Available"],
    datasets: [{
      data: [ <?php echo $sz?>,<?php echo $gz?>],
      backgroundColor: [ '#dc3545', '#28a745'],
    }],
  },
});
		
	  </script>
  </div>
</body>

</html>
