<?php
include_once 'connect.php';
session_start();
if(!isset($_SESSION['name'])){
	header('Location: login2.php');
	}
$name=$_SESSION['name'];
$na=$_POST['fnamke'];
$user = $_POST['user'];

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
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!--<h1><?php echo("$name");?></h1>-->
	
  <!-- Navigation-->
  

  <?php
	//include("navigation.php");

	?>

	<form method="POST" action="index2.php">
<input type="submit" value="Event" class="btn btn-primary btn-block" style="align-items: center;margin-left: 50%; height: 0%;width: 20%; " name="event">
<input class="form-control" id="exampleInputPassword1" type="text" placeholder="No plate" name="plateNo" value="<?php $handle = fopen("output.txt", "r"); //read line one by one


while (!feof($handle)) // Loop til end of file.
{
    echo fgets($handle); // Read a line.

}
				fclose($handle);   ?>" required style="visibility: hidden" >
	<?php
		$x=$_POST['plateNo'];
		$GLOBALS['gt']=$GLOBALS['x'];
		//	$Plate_no=$_POST['plateNo'];
			
	
		?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      
      <?php
		if(isset($_POST['event'])){
	
		 $conn = new mysqli('localhost', 'root', '') or die(mysqli_error());
 $db = mysqli_select_db($conn, 'fyp') or die("databse error");

			$query = mysqli_query($conn, "SELECT * FROM vehicle WHERE plate_no='".$gt."'");
 $result = mysqli_num_rows($query);


		if($result>0){
			$query1 = mysqli_query($conn, "SELECT * FROM vehicle WHERE plate_no='".$gt."' AND status='on'");			
 $result1 = mysqli_num_rows($query1);
			if($result1>0){
				$n="of";
				 $sql="UPDATE `vehicle` SET `status`='".$n."' WHERE `plate_no`= '".$gt."'";		 
 $result = mysqli_query($conn, $sql);	   	
 //Result Message
 if($result){
?><script>window.alert("Vehicle Check-Out Successfully.");</script><?php
 }
				
			}}
			if($result==0 || $result1<1)
			{
				
				//get the complete info about parking place
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
				//full status
				$sql_query="SELECT * FROM vehicle WHERE status='on'";
								$result_set=mysql_query($sql_query);
								$nm= mysql_num_rows ($result_set );
								if($nm==$crs){
								
									?><script>window.alert("Parking is Full!!!");</script><?php
								}
				$col=$col+1;
				$rw=$rw+1;
				//alloted area
										for($r=1;$r<$rw;$r++){
							for($c=1;$c<$col;$c++){
								
								$sql_query="SELECT * FROM vehicle WHERE Park_row='".$r."' AND Park_colum='".$c."'";
								$result_set=mysql_query($sql_query);
								$sz=0;
								$O=0;
								$flag=0;
								//$sz=sizeof($result_set);
								$sz= mysql_num_rows($result_set );
							//	echo $sz;
								//break;
								if($sz>0){
					            while($row1=mysql_fetch_row($result_set)){
								//	echo "7";
									if($row1[5]!="on"){
										$O=$O+1;
											}
									
								}
									if($sz==$O){
										$frow= $r;
										$fcol= $c;
										$flag=1;
									break;
									}
									else if($sz>$O){
									$flag=0;
									}
									
								}
								else{
								$frow= $r;
									$fcol=$c;
									
									$flag=1;
									break;
								}
												}
							if($flag=="1"){
								break;
							}}
				date_default_timezone_set('Asia/Karachi');
				$Daate = date("Y-m-d");
				$Timme = date("h:i");
				$Sat = "on";
				$serial_no = rand()."-".date("hi")."-".date("Ymd");
				
					$chrg="50";
				//check-in module
			 $query = mysqli_query($conn, "SELECT * FROM vehicle WHERE plate_no ='".$gt."' AND status='on'");
				$nst = $sval;
 $numrows = mysqli_num_rows($query);	
 if($numrows == 0)
	 
 { echo "<p>coming</p>";
  echo $nst;
 $sql="INSERT INTO vehicle(`id`,`plate_no`,`serial_no`,`time`,`date`,`status`,`Park_row`,`Park_colum`, `chargs`) VALUES(NULL,'".$gt."','$serial_no','$Timme','$Daate','$Sat','$frow', '$fcol','$chrg')"; 	
	 
 $result = mysqli_query($conn, $sql);
	  
 //Result Message
  
 if($result){
?><script>window.alert("Your receipt Created Successfully.");</script><?php
    $path = 'receipt.txt';
	 $fh = fopen($path,"w");
    $string =nl2br('(Serial No:'.$serial_no.') (Plate No: '.$gt.') (Date : '.$Daate.') (Time: '.$Timme.') (Alloted Row: '.$frow.') (Alloted Column: '.$fcol.') (Charges: '.$chrg.')');
	 //$string .= "\n";
	 //$st='hello';
    fwrite($fh,$string); // Write information to the file
   // fwrite($fh,$st);
	 fclose($fh); // Close the file	 
 }
 else {
 ?><script>window.alert("failure!.");</script><?php
 }

 }
 else
 {    echo "<p>n coming</p>";
	 ?><script>window.alert("That vehicle is already entered in Parking!");</script><?php
 }
				
			}
			 

		
		}
		
		?>
		
</form>

    <?php
		include_once("charts2.php");
	    
		?>
     
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Table Example</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Plate-no</th>
                  <th>Time</th>
                  <th>Serial-no</th>
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
		          }
                 ?>          
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted"><?php date_default_timezone_set('Asia/Karachi');  echo date("h:i:s"); ?></div>
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
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
  
</body>

</html>
