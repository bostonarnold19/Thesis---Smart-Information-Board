<?php 
 include('conn.php');
 session_start();
$sid=session_id();
if(isset($_SESSION['userloggedin']) && $_SESSION["userloggedin"]!="")
{
?>
<?php
 if (!empty($_FILES['image']['name'][0])) {
    $pic = $_FILES['image'];
    $count = 0;
    foreach ($pic['name'] as $key => $value) {
      //echo $pic['name'][$key]."<br>";
      $count = $key;
  }
  $count;
  for ($i=0; $i <= $count ; $i++) { 
    $file=$_FILES['image']['tmp_name'];
                      $image= addslashes(file_get_contents($_FILES['image']['tmp_name'][$i]));
                      $image_name= addslashes($_FILES['image']['name'][$i]);
                                      
                                      move_uploaded_file($_FILES["image"]["tmp_name"][$i],"upload_gallery/" . $_FILES["image"]["name"][$i]);
                                      $location="upload_gallery/" . $_FILES["image"]["name"][$i];

                                     $query = 'INSERT INTO tbl_gallery (location) VALUES ("'.$location.'")';
                                     $result = mysqli_query($dbc,$query);

                                     if ($query) {
  $_SESSION['message'] = "Successfully uploaded!";

                                        header('location:photoupload.php');
                                     }
  }

}
  ?>  <?php } ?>
