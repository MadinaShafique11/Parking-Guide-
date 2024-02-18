<?php
session_start();
if(isset($_SESSION['name'])){
	unset($_SESSION['name']);
//session_destroy();
header("Location: login2.php");
}

?>