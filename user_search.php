<?php include("conn.php"); ?>

<!DOCTYPE HTML>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/Main.css" />
    <script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="js/jquery.watermark.js"></script>
<script type="text/javascript">
 
 
$(document).ready(function() {
$("#faq_search_input").watermark("Begin Typing to Search");

$("#faq_search_input").keyup(function()
{
var faq_search_input = $(this).val();
var dataString = 'keyword='+ faq_search_input;
if(faq_search_input.length>0)

{
$.ajax({
type: "GET",
url: "user_search-ajax.php",
data: dataString,

success: function(server_response)
{

$('#searchresultdata').html(server_response).show();
$('span#faq_category_title').html(faq_search_input);

}
});
}return false;
});
});
	  
</script>


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
                   <h1>Locator</h1>
                    </div> 


<div class="centerFeedbackUs ">
<div class="centerFeedbackUsInner ">
 
       <h1>Search Results For :<span id="faq_category_title">Keyword</span> </h1>
                <input  name="query" type="text" id="faq_search_input"/>


    <div id="searchresultdata"> </div>
       
         

     
          
   
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

