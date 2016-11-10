 <?php
session_start(); 
include("conn.php");
	  $_SESSION["userloggedin"]="";
	   header("location:admin.php?action=logout");

?>




