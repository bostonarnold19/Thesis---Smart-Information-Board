<?php
include('conn.php');
session_start();
$sid=session_id();
if(isset($_SESSION['userloggedin']) && $_SESSION["userloggedin"]!="")
{
?>

<?php 
  if(isset($_GET['id'])!="")
  {
  $deleteId=$_GET['id'];
  $sql = "DELETE FROM tbl_locator WHERE id='$deleteId'";
  $delete=mysqli_query($dbc,$sql);
    $_SESSION['message'] = "Successfully deleted!";
	  header("Location:locatortable.php"); 
  }
?>

<?php } ?>