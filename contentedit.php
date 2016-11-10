<?php
include('conn.php');
session_start();
$sid=session_id();
if(isset($_SESSION['userloggedin']) && $_SESSION["userloggedin"]!="")
{
?>
<?php 
  if(isset($_POST['update']))
  {
  $history=$_POST['history'];
  $hotline=$_POST['hotline'];
   $chiefexec=$_POST['chiefexec'];
    $maleldo=$_POST['maleldo'];
     $giantlanternfestival=$_POST['giantlanternfestival'];
      $fiestangtugak=$_POST['fiestangtugak'];
       $mission=$_POST['mission'];
        $vision=$_POST['vision'];
        $corevalues=$_POST['corevalues'];


  $sql = "UPDATE tbl_content SET history='$history', hotline='$hotline', chiefexec='$chiefexec', maleldo='$maleldo', 
  giantlanternfestival='$giantlanternfestival', fiestangtugak='$fiestangtugak', mission='$mission', vision='$vision',
  corevalues='$corevalues' WHERE idcontent='2016'";
  mysqli_query($dbc,$sql);
  header('Location:contentedit.php');
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
        <h1>Edit Content</h1>
    </div>
<div class="announcementForm">

          

<?php 
 
 $sql = "SELECT * FROM tbl_content WHERE idcontent='2016'";
  $result = mysqli_query($dbc,$sql);
  while ($list = mysqli_fetch_assoc($result)) {
  
   $history=$list['history'];
  $hotline=$list['hotline'];
     $chiefexec=$list['chiefexec'];
    $maleldo=$list['maleldo'];
     $giantlanternfestival=$list['giantlanternfestival'];
      $fiestangtugak=$list['fiestangtugak'];
       $mission=$list['mission'];
        $vision=$list['vision'];
        $corevalues=$list['corevalues'];
?>


      <form action="" method="post">

      <label>History</label>
      <textarea name="history" required><?php echo $history?></textarea>

      <label>Hotline</label>
      <textarea name="hotline" required><?php echo $hotline?></textarea>

      <label>Chief Executives</label>
      <textarea name="chiefexec" required><?php echo $chiefexec?></textarea>

      <label>Maleldo</label>
      <textarea name="maleldo" required><?php echo $maleldo?></textarea>

      <label>Giant Lantern Festival</label>
      <textarea name="giantlanternfestival" required><?php echo $giantlanternfestival?></textarea>

      <label>Fiestang Tugak</label>
      <textarea name="fiestangtugak" required><?php echo $fiestangtugak?></textarea>

      <label>Mission</label>
      <textarea name="mission" required><?php echo $mission?></textarea>

      <label>Vision</label>
      <textarea name="vision" required><?php echo $vision?></textarea>


      <label>Core Values</label>
      <textarea name="corevalues" required><?php echo $corevalues?></textarea>

















<?php } ?>
      <div class="FieldsButton">
      <input type="submit" name="update" value="Update" />
      </div>
      </form>


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


