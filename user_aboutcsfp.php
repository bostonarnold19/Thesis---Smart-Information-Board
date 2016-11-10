<?php include("conn.php"); ?>

<!DOCTYPE HTML>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/Main.css" />
  </head>
  <body>

      <div class="sidebar">
        <div class="sidebarInner">
              <a  class="button"href="index.php">Back</a></br>
              <a  class="button"href="#one">History</a></br>
              <a  class="button"href="#two">Events</a></br>
              <a  class="button"href="#three">Hotline</a></br>
              <a  class="button"href="#four">Mission</a></br>
              <a  class="button"href="#five">Vision</a></br>
      </div>
      </div>

      <div class="mainWrapper">

<?php
$sql = "SELECT * FROM tbl_content WHERE idcontent='2016'";
$result = mysqli_query($dbc,$sql);
while ($list = mysqli_fetch_assoc($result)) {
$history=$list['history'];
$chiefexec=$list['chiefexec'];
?>
          <div id="one">
          <div class="centerAbout">
          <div class="centerAboutInner">
                  <h1>History</h1>
                  <p><?php echo $history?></p>
                  <h1>List of Local Chief Executives of the city of San Fernando</h1>
                  <table>
                  <?php echo $chiefexec?>
                  </table>
          </div>
          </div>
          </div>
          <?php } ?>

<?php
 $sql = "SELECT * FROM tbl_content WHERE idcontent='2016'";
 $result = mysqli_query($dbc,$sql);
 while ($list = mysqli_fetch_assoc($result)) {
 $maleldo=$list['maleldo'];
 $giantlanternfestival=$list['giantlanternfestival'];
 $fiestangtugak=$list['fiestangtugak'];
?>

          <div id="two">
          <div class="centerAbout">
          <div class="centerAboutInner">
                  <h1>Maleldo</h1>
                  <p><?php echo $maleldo?></p>

                  <h1>Giant Lantern Festival</h1>
                  <p><?php echo $giantlanternfestival?></p>

                  <h1>Fiestang Tugak</h1>
                  <p><?php echo $fiestangtugak?></p>
            </div>
            </div>
            </div>
<?php } ?>


<?php
$sql = "SELECT * FROM tbl_content WHERE idcontent='2016'";
$result = mysqli_query($dbc,$sql);
while ($list = mysqli_fetch_assoc($result)) {  
$hotline=$list['hotline'];
?>

          <div id="three">
          <div class="centerAbout">
          <div class="centerAboutInner">
                <h1>Hotline</h1>
                <table>
                <p><?php echo $hotline?></p>
                </table>
               
          </div>
          </div>
          </div>
<?php } ?>


<?php
$sql = "SELECT * FROM tbl_content WHERE idcontent='2016'";
$result = mysqli_query($dbc,$sql);
while ($list = mysqli_fetch_assoc($result)) { 
$mission=$list['mission'];
$vision=$list['vision'];
$corevalues=$list['corevalues'];
?>

          <div id="four">
          <div class="centerAbout">
          <div class="centerAboutInner">
                  <h1>Mission</h1>
                  <p><?php echo $mission?></p>
          </div>
          </div>
          </div>
<?php } ?>


<?php
$sql = "SELECT * FROM tbl_content WHERE idcontent='2016'";
$result = mysqli_query($dbc,$sql);
while ($list = mysqli_fetch_assoc($result)) { 
$vision=$list['vision'];
?>

          <div id="five">
          <div class="centerAbout">
          <div class="centerAboutInner">
                  <h1>Vision</h1>
                  <p><?php echo $vision?></p>
          </div>
          </div>
          </div>
<?php } ?>     
  


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

