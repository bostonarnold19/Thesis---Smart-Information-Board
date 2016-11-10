<?php
include('conn.php');
session_start();
$sid=session_id();
if(isset($_SESSION['userloggedin']) && $_SESSION["userloggedin"]!="")
{
?>


<?php
if(isset($_GET['id'])=="photos"){
$deleteId=$_REQUEST['selector'];
$n = count($deleteId);
for($i=0; $i < $n; $i++){
$sql = "DELETE FROM tbl_gallery where id=$deleteId[$i]";
$delete=mysqli_query($dbc,$sql);
}
  $_SESSION['message'] = "Successfully deleted!";
header("Location:photodelete.php");
  }

  ?>
<?php } ?>


