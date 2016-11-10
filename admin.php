<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/Body.css" />
  <link rel="stylesheet" type="text/css" href="css/Bubble-Effects.css" />
  <link rel="stylesheet" type="text/css" href="css/Dialog.css" />
  <link rel="stylesheet" type="text/css" href="css/Fields.css" />
  <link rel="stylesheet" type="text/css" href="css/Gallery.css" />
  <link rel="stylesheet" type="text/css" href="css/Login.css" />
  <link rel="stylesheet" type="text/css" href="css/Push-Slide.css" />
  <link rel="stylesheet" type="text/css" href="Status-Messages.css" />
  <link rel="stylesheet" type="text/css" href="css/Table.css" />
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script src="js/classie.js"></script>
  <script src="js/dialogFx.js"></script>
  <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="js/jquery-1.3.2.js"></script>
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/modernizr.custom.js"></script>
</head>

<body class="cbp-spmenu-push">
    <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
      <h3 id="showLeftPush">Menu</h3>

    
      <a href="#.php"><i class="fa fa-newspaper-o"></i>&nbspAnnouncement</a>
      <a href="#.php"><i class="fa fa-map-marker"></i>&nbspLocator</a>
      <a href="#.php"><i class="fa fa-info"></i>&nbspServices</a>
      <a href="#.php"><i class="fa fa-info-circle"></i>&nbspContent</a>
      <a href="#.php"><i class="fa fa-image"></i>&nbspGallery</a>
      <a href="#.php"><i class="fa fa-comments-o"></i>&nbspFeedback</a>
  
    </nav>

<?php
ob_start();
session_start();
if(isset($_SESSION['userloggedin']) && $_SESSION["userloggedin"]!="")
{
 header("location:announcementtable.php");
}
else
{
  ?>

 <div class="TitleLabel">
        <span>Smart Information Board</span>
        <h1>Login</h1>
    </div>


 <div class="loginForm">
   
<form action="" method="post">
  <h1> Welcome </h1>
      <input type="text" id="username" required name="textfieldusername" placeholder="Username" /></td>
      <input type="password" id="password" required name="textfieldpassword" placeholder="Password" /></td>
      <input type="submit" name="login" value="Login" />
</form>

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



<?php include('conn.php'); 
if(isset($_POST['login']))
{	$username = mysql_real_escape_string($_POST['textfieldusername']);
	$password = mysql_real_escape_string($_POST['textfieldpassword']);

	$result = mysqli_query($dbc,"SELECT * FROM tbl_login where username='$username' and password='$password' ");
	$rowcount=mysqli_num_rows($result);
	if ($rowcount>0)
	{ 
	$_SESSION['userloggedin']="loggedin";
	 header('location:announcementtable.php');
	}
	else
	{

	
		

	 
	}
	
}


?> 
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
