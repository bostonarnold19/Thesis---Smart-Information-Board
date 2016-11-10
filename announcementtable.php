<?php
include('conn.php');
session_start();
$sid=session_id();
if(isset($_SESSION['userloggedin']) && $_SESSION["userloggedin"]!="")
{
?>
<!DOCTYPE html>




<?php
$query = "SELECT * FROM tbl_announcement";
 $sql = mysqli_query($dbc, $query);
        $row = mysqli_fetch_assoc($sql);
    $num = mysqli_num_rows($sql); 
        $rows = $num;
        $pageRows = 10;
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
          $query = "SELECT title, announcementDate FROM tbl_announcement $limit";
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

<html>
<head>
   <link rel="stylesheet" type="text/css" href="css/Body.css" />
    <link rel="stylesheet" type="text/css" href="css/Push-Slide.css" />
    <link rel="stylesheet" type="text/css" href="css/Dialog.css" />
    <link rel="stylesheet" type="text/css" href="css/Table.css" />
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
        <h1>Announcement</h1>
    </div>
 
    <div class="AtableForm">
     <h1><a href="announcementtable.php"><i class="fa fa-list"></i>&nbsp;List of Announcement</a> |
     <a href="announcementadd.php"><i class="fa fa-plus"></i>&nbsp;Create Announcement</a></h1>

      <?php if (isset($_SESSION['message'])) { ?>
     <div class="statusMessage"> <?php echo $_SESSION['message']; ?> </div>
      <?php unset($_SESSION['message']); ?>

      <?php }?>
    <table>
    
      <tr>
      <th>Date</th>
      <th>Title</th>
      <th><center>Edit</th>
      <th><center>Delete</th>
      </tr>

<?php
$sql = "SELECT * FROM tbl_announcement order by announcementDate desc $limit";
$result = mysqli_query($dbc, $sql);
 while ($list = mysqli_fetch_assoc($result)) {
   
              $title = $list['title'];
              $content = $list['content'];
              $announcementDate = $list['announcementDate'];
              $date = explode(" ",$announcementDate);
              $currentDate  = $date[0];
              $id = $list['id']; ?>
             
              <tr>
                <td><?php echo $currentDate?></td>
                <td><?php echo $title?></td>
                <td><center><a href="announcementedit.php?id=<?php echo $id?>"><i class="fa fa-edit"></a></td>
                <td><center><a href="announcementdelete.php?id=<?php echo $id ?>"><i class="fa fa-remove"></a></td>

                </tr>
              <?php } ?>
              


 </table>
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


      <script type="text/javascript">
                    var $rows = $('#table tr');
                    $('#search').keyup(function() {
                        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
                        
                        $rows.show().filter(function() {
                            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                            return !~text.indexOf(val);
                        }).hide();
                    });
                </script>