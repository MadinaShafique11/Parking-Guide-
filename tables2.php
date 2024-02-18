<?php
include_once 'connect.php';
session_start();
if(!isset($_SESSION['name'])){
	header('Location: login2.php');
	}
$name=$_SESSION['name'];


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
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
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
        <li class="breadcrumb-item active">Tables</li> </ol>
                <form method="POST" action="tables2.php">
				<div style="width: 100%;height: 60px; " >
                 <input type="submit" value="All Records" class="btn btn-primary btn-block" style="align-items: center;margin-left: 2%; height: 80%;width: 20%; " name="home">
                 <input type="submit" value="Current Status" class="btn btn-primary btn-block" style="align-items: center;margin-left: 26%;margin-top: -48px; height: 80%;width: 20%;" name="current">
                 <input type="submit" value="Total Spaces" class="btn btn-primary btn-block" style="align-items: center;margin-left: 50%;margin-top: -48px; height: 80%;width: 20%;" name="total">
                 <input type="submit" value="Available Spaces" class="btn btn-primary btn-block" style="align-items: center;margin-left: 74%;margin-top: -48px; height: 80%;width: 20%;" name="available">
				</div>
       
           
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Vehicles record
          
          </div>
          
        <div class="card-body">
          <?php 
		          //total spaces record
				   if(isset($_POST['total'])){
					   		  $rw=0;
?>
					   <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No. of Rows</th>
                   <th>No. of Cols</th>
                  <th>Total Spaces</th>                 
                </tr>
				</thead>
					<tbody>
					<?php
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

						?>
         <tr>
                  <td><?php echo $col; ?></td>
                  <td><?php echo $rw; ?></td>
			 <td><?php echo $crs; ?></td></tr>
         <?php } 
					?>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Plate-no</th>
                 <th>Serial-no</th>
                  <th>Time</th>
                  <th>Date</th>
                  <th>Status</th>
                   <th>Parking-row</th>
                  <th>Parking-column</th>                 
                </tr>
				</thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Plate-no</th>
                  <th>Serial-no</th>
                  <th>Time</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Parking-row</th>
                  <th>Parking-column</th>                   
                </tr>
              </tfoot>
               <tbody>
                <?php
				   //home or all record of db
				   if(isset($_POST['home'])){
	               $sql_query="SELECT * FROM vehicle";
	             $result_set=mysql_query($sql_query);
	              while($row=mysql_fetch_row($result_set))
		       {?>
                <tr>
                  <td><?php echo $row[0]; ?></td>
                  <td><?php echo $row[1]; ?></td>
                  <td><?php echo $row[2]; ?></td>
                  <td><?php echo $row[3]; ?></td>
                  <td><?php echo $row[4]; ?></td>
                  <td><?php echo $row[5]; ?></td>
                  <td><?php echo $row[6]; ?></td>
				  <td><?php echo $row[7]; ?></td>
                </tr> 
                <?php 
		          }}
				   //for Current status
				   if(isset($_POST['current'])){
					   	for($r=1;$r<10;$r++){
							for($c=1;$c<10;$c++){
	               $sql_query="SELECT * FROM vehicle WHERE status='on' AND Park_row='".$r."' AND Park_colum='".$c."'";
	             $result_set=mysql_query($sql_query);
				 $sz= mysql_num_rows ($result_set );
				 if($sz>0){				
	              while($row=mysql_fetch_row($result_set))
		       {?>
                <tr>
                  <td><?php echo $row[0]; ?></td>
                  <td><?php echo $row[1]; ?></td>
                  <td><?php echo $row[2]; ?></td>
                  <td><?php echo $row[3]; ?></td>
                  <td><?php echo $row[4]; ?></td>
                  <td><?php echo $row[5]; ?></td>
                  <td><?php echo $row[6]; ?></td>
				  <td><?php echo $row[7]; ?></td>
                </tr> 
                <?php 
		          }}
						else{
					?>
                <tr>
                  <td><?php echo "Free"; ?></td>
                  <td><?php echo "Free"; ?></td>
                  <td><?php echo "Free"; ?></td>
                  <td><?php echo "Free"; ?></td>
                  <td><?php echo "Free"; ?></td>
                  <td><?php echo "Free"; ?></td>
                  <td><?php echo $r; ?></td>
				  <td><?php echo $c; ?></td>
                </tr> 
                <?php 
		          		
							
						}	}}}
				   //available space
				   if(isset($_POST['available'])){
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
					   	for($r=1;$r<10;$r++){
							for($c=1;$c<10;$c++){
	               $sql_query="SELECT * FROM vehicle WHERE status='on' AND Park_row='".$r."' AND Park_colum='".$c."'";
	             $result_set=mysql_query($sql_query);
				 $sz= mysql_num_rows ($result_set );
				 if($sz>0){				
	             }
						else{
					?>
                <tr>
                  <td><?php echo "Free"; ?></td>
                  <td><?php echo "Free"; ?></td>
                  <td><?php echo "Free"; ?></td>
                  <td><?php echo "Free"; ?></td>
                  <td><?php echo "Free"; ?></td>
                  <td><?php echo "Free"; ?></td>
                  <td><?php echo $r; ?></td>
				  <td><?php echo $c; ?></td>
                </tr> 
                <?php 
		          		
							
						}	}}
 }
				   
                 ?>    
              </tbody>
            </table>
           
          </div>
			</form>
        </div>
        <div class="card-footer small text-muted">Parking Guide for Vehicles</div>
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
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  </div>
</body>

</html>
