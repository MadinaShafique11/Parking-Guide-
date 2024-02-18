<?php
include_once 'connect.php';
session_start();
if(!isset($_SESSION['name'])){
	header('Location: login2.php');
	}
$name=$_SESSION['name'];


if(isset($_GET['delete_id'])){
	
	$sql_query="DELETE FROM alogin WHERE id=".$_GET['delete_id'];
	mysql_query($sql_query);}

 $conn = new mysqli('localhost', 'root', '') or die(mysqli_error());
 $db = mysqli_select_db($conn, 'fyp') or die("databse error");
 $query = mysqli_query($conn, "SELECT * FROM alogin WHERE id=".$_REQUEST['update_id']);
 $result = mysqli_num_rows($query);
if($result !=0)
 {
 while($row = mysqli_fetch_assoc($query))
 {
 $fn=$row['status'];	
}
 }
if(isset($_REQUEST['update_id'])){
if($fn=='on'){
	$namee="off";
	
	$id=$_REQUEST['update_id'];
	$query2="UPDATE `alogin` SET `status`='".$namee."'WHERE `id`= '".$id."'";
	$result=mysqli_query($conn,$query2);
	if($result){
		?><script>window.alert(" Are you sure! you want to make changes .");</script><?php
		
	}
	else{?><script>window.alert(" don't updated.");</script><?php
		
	}
}
	if($fn=='off'){
	$namee="on";
	$id=$_REQUEST['update_id'];
	$query2="UPDATE `alogin` SET `status`='".$namee."'WHERE `id`= '".$id."'";
	$result=mysqli_query($conn,$query2);
	if($result){
		?><script>window.alert("Are you sure! you want to make changes .");</script><?php
		
	}
	else{?><script>window.alert(" don't updated.");</script><?php
		
	}
}
	
}
mysqli_close($conn);
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
        <li class="breadcrumb-item active">Tables</li>
                  
        </ol>
           
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Admins record
          
          </div>
          
     <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>First name</th>
                 <th>Last name</th>
                  <th>Email</th>
					<th>Status</th>
					<th>Change Access</th>
					<th>delete</th>                               
                </tr>
				</thead>
              <tfoot>
               <tr>
                  <th>ID</th>
                  <th>First name</th>
                 <th>Last name</th>
                  <th>Email</th>
				   <th>Status</th>
				   <th>Login Access</th>
					<th>delete</th>                               
                </tr>
              </tfoot>
               <tbody>
                <?php
	               $sql_query="SELECT * FROM alogin";
	             $result_set=mysql_query($sql_query);
	              while($row=mysql_fetch_row($result_set))
					  
		       {?>
                <tr>
                
                  <td><?php echo $row[0]; ?></td>
                  <td><?php echo $row[1]; ?></td>
                  <td><?php echo $row[2]; ?></td>                  
				  <td><?php echo $row[3]; ?></td>
				  <td><?php echo $row[5]; ?></td>
					<?php
					if($row[3]==$name OR $row[5]=="admin"){
					?><td><a style="visibility: hidden" href="users.php?update_id=<?php echo $row[0]?>" >Change</a></td><?php	
					}
				else{
					?>
					<td><a href="users.php?update_id=<?php echo $row[0]?>" >Change</a></td>
					<?php
				}
					?>
					
                <?php
					if($row[3]==$name OR $row[5]=="admin"){
					?><td><a style="visibility: hidden" href="users.php?delete_id=<?php echo $row[0]?>" >delete</a></td><?php	
					}
				else{
					?>
					<td><a href="users.php?delete_id=<?php echo $row[0]?>" >delete</a></td>
					<?php
				}
					?>
					
					                             
                  
                </tr> 
                <?php 
		          }
                 ?>    
              </tbody>
            </table>
			  
          </div>
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
