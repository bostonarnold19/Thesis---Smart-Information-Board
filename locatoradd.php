<?php
include('conn.php');
session_start();
$sid=session_id();
if(isset($_SESSION['userloggedin']) && $_SESSION["userloggedin"]!="")
{
?>

<?php
if(isset($_POST['add']))
{    
	   $office=$_POST['office'];
	$officeCode=$_POST['officeCode'];
     
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="upload_locator/";
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$sql="INSERT INTO tbl_locator(file,type,size,office,officeCode) VALUES('$final_file','$file_type','$new_size','$office','$officeCode')";
		mysqli_query($dbc,$sql);

	}
		  $_SESSION['message'] = "Successfully added!";
		header("location:locatortable.php");

}
		?>
		
		
		<?php } ?>