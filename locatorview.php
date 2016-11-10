<?php
include("conn.php");
session_start();
$sid=session_id();
if(isset($_SESSION['userloggedin']) && $_SESSION["userloggedin"]!="")
{
?>

<?php 
 if(isset($_GET['id']))
  {
  $viewId=$_GET['id'];
  $sql = "SELECT * FROM tbl_locator WHERE id='$viewId'";
  $getselect=mysqli_query($dbc,$sql);
  while($view=mysqli_fetch_assoc($getselect))
  {
             $file = $view['file'];
              $id = $view['id'];
            
              }
          }
          ?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/Body.css" />
    <link rel="stylesheet" type="text/css" href="css/Push-Slide.css" />
    <link rel="stylesheet" type="text/css" href="css/Dialog.css" />
    <link rel="stylesheet" type="text/css" href="css/Table.css" />
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
        <h1>Locator</h1>
    </div>
    <div class="AtableForm">

    <embed style="height: 1000px; width: 1000px;" src="upload_locator/<?php echo $file;?>">

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


