<?php
include('conn.php');
session_start();
$sid=session_id();
if(isset($_SESSION['userloggedin']) && $_SESSION["userloggedin"]!="")
{
?>

     <?php
if(isset($_GET['id']))
{
  $id=$_GET['id'];
  if(isset($_POST['update']))
  {

if (!isset($_FILES['image']['tmp_name'])) {
  echo "";
  }else{
  $location=$_FILES['image']['tmp_name'];
  $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
  $image_name= addslashes($_FILES['image']['name']);
      
      move_uploaded_file($_FILES["image"]["tmp_name"],"upload_announcement/" . $_FILES["image"]["name"]);
      
      $file="upload_announcement/" . $_FILES["image"]["name"];
      $title=$_POST['title'];
  $content=$_POST['content'];
   $summary=$_POST['summary'];
  $currentDate=$_POST['announcementDate'];


  $sql = "UPDATE tbl_announcement SET title='$title', content='$content', announcementDate='$currentDate', summary='$summary', file='$file' WHERE id='$id'";
   mysqli_query($dbc,$sql);
   $_SESSION['message'] = "Successfully saved changes!";
  header('Location:announcementtable.php');
 } }
}
?>




<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/Body.css" />
    <link rel="stylesheet" type="text/css" href="css/Push-Slide.css" />
    <link rel="stylesheet" type="text/css" href="css/Dialog.css" />
    <link rel="stylesheet" type="text/css" href="css/Fields.css" />
    <link rel="stylesheet" type="text/css" href="css/Bubble-Effects.css" />
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="js/modernizr.custom.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/dialogFx.js"></script>
    
</head>


<body class="cbp-spmenu-push">
    <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
      <h3 id="showLeftPush">Menu</h3>

    
      <a href="announcementtable.php"><i class="fa fa-newspaper-o"></i>&nbspAnnouncement</a>
      <a href="locatortable.php"><i class="fa fa-map-marker"></i>&nbspLocator</a>
      <a href="servicestable.php"><i class="fa fa-info"></i>&nbspServices</a>
      <a href="contentedit.php"><i class="fa fa-info-circle"></i>&nbspContent</a>
      <a href="photoupload.php"><i class="fa fa-image"></i>&nbspGallery</a>
      <a href="feedbacktable.php"><i class="fa fa-comments-o"></i>&nbspFeedback</a>
      <a data-dialog="somedialog"><i class="fa fa-power-off"></i>&nbspLog out</a>
  
    </nav>


    <div class="TitleLabel">
        <span>Smart Information Board</span>
        <h1>Edit Announcement</h1>
    </div>
<div class="announcementForm">
        <h1><a href="announcementtable.php"><i class="fa fa-list"></i>&nbsp;List of Announcement</a> |
     <a href="announcementadd.php"><i class="fa fa-plus"></i>&nbsp;Create Announcement</a></h1>



<?php 
  if(isset($_GET['id']))
  {
  $id=$_GET['id'];
  $getselect=mysqli_query($dbc,"SELECT * FROM tbl_announcement WHERE id='$id'");
  while($profile=mysqli_fetch_array($getselect))
  {
    $title=$profile['title'];
    $content=$profile['content'];
    $summary=$profile['summary'];
       $file=$profile['file'];
    $announcementDate=$profile['announcementDate'];
    $date = explode(" ",$announcementDate);
    $currentDate  = $date[0];  } 
?>


      <form method="post" action="" enctype="multipart/form-data">

      <label>Title</label>
      <input type="text" name="title" required value="<?php echo $title?>"/>

      <label>Summary</label>
      <textarea name="summary" style="height: 100px;" required><?php echo $summary?></textarea>

      <label>Content</label>
      <textarea name="content" required><?php echo $content?></textarea>

      <label>Date</label>
      <input type="date" name="announcementDate" required value=<?php echo '"'.$currentDate.'"'; ?>/>
 
      <label></label>
      <img style="margin-left: 10px" src="<?php echo $file?>">  

      <label>Upload</label>
      <input type="file" accept="image/x-png, image/gif, image/jpeg"  name="image" />

   

     

      <div class="FieldsButton">
      <input type="submit" name="update" value="Update" />
      </div>
      </form>
      <?php }?>


    </div>
          

  <ul class="bg-bubbles">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
  </ul>



            <div id="somedialog" class="dialog">
          <div class="dialog__overlay"></div>
          <div class="dialog__content">
          
                  <h2>Are you sure you want to logout?</h2>
                  <div class="diabutton">
                        <a href="logout.php" method="post">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;</a>
                        <a data-dialog-close>Cancel</a>
                  </div>
                                         
          </div>
        </div>


</body>
</html>

<?php } ?>


    <script>
      var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
        showLeftPush = document.getElementById( 'showLeftPush' ),
        body = document.body;


      showLeftPush.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( body, 'cbp-spmenu-push-toright' );
        classie.toggle( menuLeft, 'cbp-spmenu-open' );
        disableOther( 'showLeftPush' );
      };

    
    </script>

    <script>
      (function() {

        var dlgtrigger = document.querySelector( '[data-dialog]' ),
          somedialog = document.getElementById( dlgtrigger.getAttribute( 'data-dialog' ) ),
          dlg = new DialogFx( somedialog );

        dlgtrigger.addEventListener( 'click', dlg.toggle.bind(dlg) );

      })();
    </script>


