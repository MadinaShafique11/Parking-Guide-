 <?php
include_once 'connect.php';
session_start();
if(!isset($_SESSION['name'])){
	header('Location: login2.php');
	}
$name=$_SESSION['name'];

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

$sql_query="SELECT * FROM vehicle WHERE status='on'";
								$result_set=mysql_query($sql_query);
								$nm= mysql_num_rows ($result_set );
								if($nm==$crs){
								//	if($nm>0){
									?><script>window.alert("Parking is Full!!!");</script><?php
								}

	if(isset($_POST['submit'])){
		
		
	if(!empty($_POST['plateNo']) && !empty($_POST['serialNo'])){
		$size=$_POST['plateNo'];
		$s=strlen($size);
		if($s<12){
	
  $Plate_no=$_POST['plateNo'];
	$serial_no=$_POST['serialNo'];
	$Timme=$_POST['time'];
	$Daate=$_POST['date'];
	$row=$_POST['row'];
	$clm=$_POST['column'];
	$Sat=$_POST['status'];	
$sss=3;
	$GLOBALS['zzz']=7;	
			
			
	$chrg="50";
		
	//	$me="wasi";	
 $conn = new mysqli('localhost', 'root', '') or die (mysqli_error()); // DB Connection
 $db = mysqli_select_db($conn, 'fyp') or die("DB Error"); // Select DB from database
 //Selecting Database
 $query = mysqli_query($conn, "SELECT * FROM vehicle WHERE plate_no ='".$Plate_no."' AND status='"."on"."'");
 $numrows = mysqli_num_rows($query);	
 if($numrows == 0)
 {  
  $sql="INSERT INTO `vehicle`( `plate_no`, `serial_no`, `time`, `date`, `status`, `Park_row`, `Park_colum`, `chargs`) VALUES ('$Plate_no','$serial_no','$Timme','$Daate','$Sat','$row', '$clm','$chrg')";
 $result = mysqli_query($conn, $sql);
	 
	 
 //Result Message
 if($result){
?><script>window.alert("Your receipt Created Successfully.");</script><?php
 }
 else {
 ?><script>window.alert("failure!");</script><?php
 }

 }
 else
 {    
	 ?><script>window.alert("That vehicle is already entered in Parking!");</script><?php
 }
	 }
		else{
			?><script>window.alert("no plate not correct.");</script><?php
		}		
 }
		else{
		?><script>window.alert("required fields  required");</script><?php
		}
		

}
?>
<?php
$chrg="50";
 $path = 'receipt.txt';
 if (isset($_POST['plateNo']) && isset($_POST['serialNo'])&& isset($_POST['time'])&& isset($_POST['date'])&& isset($_POST['row'])&& isset($_POST['column'])) {
    $fh = fopen($path,"w");
    $string =nl2br('(Serial No: '. $_POST['serialNo'].') (Plate No: '.$_POST['plateNo'].') (Date : '.$_POST['date'].') (Time: '.$_POST['time'].') (Alloted Row: '.$_POST['row'].') (Alloted Column: '.$_POST['column'].') (Charges: '.$chrg.')');
	 //$string .= "\n";
	 //$st='hello';
    fwrite($fh,$string); // Write information to the file
   // fwrite($fh,$st);
	 fclose($fh); // Close the file
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
      <div class="card-header"><h3>Receipt</h3></div>
      <div class="card-body">
        <form method="POST" action="blank2.php">
         <div class="form-group">
          <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Date</label>
                <input class="form-control" id="datetimepicker-input" type="text" name="date" aria-describedby="nameHelp" value="<?php  date_default_timezone_set('Asia/Karachi'); echo date("Y-m-d")?>">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Time</label>
                <input class="form-control" id="exampleInputLastName" type="text" name="time" aria-describedby="nameHelp" value="<?php  echo date("h:i"); ?>">
              </div>
            </div>
			</div>
            
           <div class="form-group">
            <label for="exampleInputPassword1">Serial no</label>
            <input class="form-control" id="exampleInputPassword1" type="text" placeholder="Serail No" name="serialNo"  value="<?php  echo (rand()."-".date("hi")."-".date("Ymd")); ?>">
          </div>            
          <div class="form-group">
            <label for="exampleInputPassword1">Vehicle no plate</label>
            <input class="form-control" id="exampleInputPassword1" type="text" placeholder="No plate" name="plateNo" value="<?php $handle = fopen("output.txt", "r"); //read line one by one


while (!feof($handle)) // Loop til end of file.
{
    echo fgets($handle); // Read a line.

}
				fclose($handle);   ?>">
          </div>
          <label for="exampleInputName">Alloted Area</label>
          <div class="form-group">
          <div class="form-row">
              <div class="col-md-6">                
                <input class="form-control" id="exampleInputName" type="number" name="row" Pat placeholder="Row" aria-describedby="nameHelp" min="1" max="20" required value="<?php
		//		$sql_query="SELECT * FROM vehicle WHERE status='".of."'";
	      //       $result_set=mysql_query($sql_query);
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
 }
		 // $rw=prows;
				 		$col=$col+1;
						$rw=$rw+1;		 
		 
		  

						
						
						//echo $rw;
						for($r=1;$r<$rw;$r++){
							for($c=1;$c<$col;$c++){
								
								$sql_query="SELECT * FROM vehicle WHERE Park_row='".$r."' AND Park_colum='".$c."'";
								$result_set=mysql_query($sql_query);
								$sz=0;
								$O=0;
								$flag=0;
								//$sz=sizeof($result_set);
								$sz= mysql_num_rows ($result_set );
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
										echo $r;
										$flag=1;
									break;
									}
									else if($sz>$O){
									$flag=0;
									}
									
								}
								else{
								echo $r;
									$flag=1;
									break;
								}
												}
							if($flag=="1"){
								break;
							}
													}

				  //echo $v3;
				?>">
              </div>
              <div class="col-md-6">
                <input class="form-control" id="exampleInputLastName" type="number" name="column" placeholder="Column" aria-describedby="nameHelp"  min="1" max="20" required value="<?php echo $c ;?>">           
             </div>
            </div>
			</div>  
        <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" name="status" type="checkbox" required> Parking Status</label>
            </div>
          </div>     
         <input type="submit"value="Print" class="btn btn-primary btn-block" name="submit">           
        </form> 
            
       
      </div>
      </div>
  </div> 
    
    <!-- /.container-fluid-->
        <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

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
