<?Php include("conn.php"); ?>
<!DOCTYPE HTML>
<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
      <link rel="stylesheet" href="css/Main.css" />
  <link rel="stylesheet" href="dist/css/lightbox.min.css">



	</head>
	<body>
			<div class="sidebar">
				<div class="sidebarInner">
							<a  class="button"href="index.php">Home</a></br>
						    <a  class="button"href="user_announcement.php">Announcement</a></br>
                            <a  class="button"href="user_search.php">Locator</a></br>
                            <a  class="button"href="user_gallery.php">Gallery</a></br>
                            <a  class="button"href="user_services.php">Services</a></br>
                            <a  class="button"href="user_feedbackus.php">Feedback Us</a></br>
			</div>
			</div>

			<div class="mainWrapper">



   <div class="centerTitle">
                    <h1>Gallery</h1>
                    </div>
  
  
           
        <div class="centerGallery">
          <div class="centerGalleryInner">
             <?php
            $sql = "SELECT * FROM tbl_gallery order by id desc";
            $result = mysqli_query($dbc,$sql) or trigger_error("SQL", E_USER_ERROR);
            while ($list = mysqli_fetch_assoc($result)) {
            $location = $list['location'];
            $id = $list['id']; ?>

<a href="<?php echo $location?>" data-lightbox="example-set">
      <img src="<?php echo $location?>" alt=""/>
      </a>


              <?php } ?>
  <script src="dist/js/lightbox-plus-jquery.min.js"></script>

 </div>

</div>
				
			</div>
	</body>
</html>




<script type="text/javascript">

var IDLE_TIMEOUT = 60; //seconds
var _localStorageKey = 'global_countdown_last_reset_timestamp';
var _idleSecondsTimer = null;
var _lastResetTimeStamp = (new Date()).getTime();
var _localStorage = null;

AttachEvent(document, 'click', ResetTime);
AttachEvent(document, 'mousemove', ResetTime);
AttachEvent(document, 'keypress', ResetTime);
AttachEvent(window, 'load', ResetTime);

try {
    _localStorage = window.localStorage;
}
catch (ex) {
}

_idleSecondsTimer = window.setInterval(CheckIdleTime, 1000);

function GetLastResetTimeStamp() {
    var lastResetTimeStamp = 0;
    if (_localStorage) {
        lastResetTimeStamp = parseInt(_localStorage[_localStorageKey], 10);
        if (isNaN(lastResetTimeStamp) || lastResetTimeStamp < 0)
            lastResetTimeStamp = (new Date()).getTime();
    } else {
        lastResetTimeStamp = _lastResetTimeStamp;
    }

    return lastResetTimeStamp;
}

function SetLastResetTimeStamp(timeStamp) {
    if (_localStorage) {
        _localStorage[_localStorageKey] = timeStamp;
    } else {
        _lastResetTimeStamp = timeStamp;
    }
}

function ResetTime() {
    SetLastResetTimeStamp((new Date()).getTime());
}

function AttachEvent(element, eventName, eventHandler) {
    if (element.addEventListener) {
        element.addEventListener(eventName, eventHandler, false);
        return true;
    } else if (element.attachEvent) {
        element.attachEvent('on' + eventName, eventHandler);
        return true;
    } else {
        //nothing to do, browser too old or non standard anyway
        return false;
    }
}

function WriteProgress(msg) {
    var oPanel = document.getElementById("SecondsUntilExpire");
    if (oPanel)
         oPanel.innerHTML = msg;
    else if (console)
        console.log(msg);
}

function CheckIdleTime() {
    var currentTimeStamp = (new Date()).getTime();
    var lastResetTimeStamp = GetLastResetTimeStamp();
    var secondsDiff = Math.floor((currentTimeStamp - lastResetTimeStamp) / 1000);
    if (secondsDiff <= 0) {
        ResetTime();
        secondsDiff = 0;
    }
    WriteProgress((IDLE_TIMEOUT - secondsDiff) + "");
    if (secondsDiff >= IDLE_TIMEOUT) {
        window.clearInterval(_idleSecondsTimer);
        ResetTime();
        document.location.href = "user_touchscreen.php";
    }
}
</script>

