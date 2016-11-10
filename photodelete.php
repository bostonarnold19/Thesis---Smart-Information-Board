<?php
include('conn.php');
session_start();
$sid=session_id();
if(isset($_SESSION['userloggedin']) && $_SESSION["userloggedin"]!="")
{
?>

<?php
$query = "SELECT * FROM tbl_gallery";
 $sql = mysqli_query($dbc, $query);
        $row = mysqli_fetch_assoc($sql);
    $num = mysqli_num_rows($sql); 
        $rows = $num;
        $pageRows = 8;
        $last = ceil($rows/$pageRows);
        if ($last < 1) {
          $last = 1;
      }
      $pagenum = 1;
      if(isset($_GET['pn'])){
        $pagenum = preg_replace('#[^0-9]#','',$_GET['pn']);
      }
      if ($pagenum < 1) {
        $pagenum = 1;
      }else if($pagenum > $last){
        $pagenum = $last;
      } 
      $limit = 'LIMIT '.($pagenum - 1) * $pageRows.','.$pageRows;
          $query = "SELECT id, location FROM tbl_gallery $limit";
  $sql = mysqli_query($dbc, $query);
      $textline1 = "Items(<b>$rows</b>)";
      $textline2 = "Page <b>$pagenum</b> of <b>$last</b>";
      $paginationCtrls = '';
      if ($last != 1) {
        if ($pagenum > 1) {
          $previous = $pagenum - 1;
          $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Previous</a> &nbsp;&nbsp;';
        for ($i=$pagenum - 4; $i < $pagenum; $i++) { 
            if ($i>0) {
            $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp;&nbsp;';
            }
          } 
        }
        $paginationCtrls .= ''.$pagenum.' &nbsp; ';
        for ($i=$pagenum + 1; $i <= $last; $i++) { 
            $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp;&nbsp;';
            if ($i>=$pagenum + 4) {
            break;
            }
          }
      if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= '&nbsp &nbsp<a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a>
';
      }
    }
$list = '';
 ?>



<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/Body.css" />
    <link rel="stylesheet" type="text/css" href="css/Push-Slide.css" />
    <link rel="stylesheet" type="text/css" href="css/Dialog.css" />
    <link rel="stylesheet" type="text/css" href="css/Gallery.css" />
    <link rel="stylesheet" type="text/css" href="css/Bubble-Effects.css" />
    <link rel="stylesheet" type="text/css" href="css/Status-Messages.css" />
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
        <h1>Gallery</h1>
    </div>


<div class="galleryForm">
<h1><a href="photoupload.php"><i class="fa fa-upload"></i>&nbsp;Upload Photos</a> |
      <a href="photodelete.php"><i class="fa fa-remove"></i>&nbsp;Delete  Photos</a></h1>


<form action="photomultipledelete.php?id=photos" method="post">

<div class="galleryFormDelete">
      <?php if (isset($_SESSION['message'])) { ?>
     <div class="statusMessage"> <?php echo $_SESSION['message']; ?> </div>
      <?php unset($_SESSION['message']); ?>

      <?php }?>
<input name="input" type="submit" value="Delete" />
</div>

<?php
$sql = "SELECT * FROM tbl_gallery order by id desc $limit";
$result = mysqli_query($dbc,$sql) or trigger_error("SQL", E_USER_ERROR);
while ($list = mysqli_fetch_assoc($result)) {
       $location = $list['location'];
       $id = $list['id']; ?>
 
        <img src="<?php echo $location?>"/>
        <input name="selector[]" type="checkbox" value="<?php echo $id?>"/>
     <?php } ?>

</form>
<div id="pagination_controls"> <?php echo $paginationCtrls; ?> </div>

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