
<?php


include_once ('conn.php');

if(isset($_GET['keyword'])){
    $keyword = 	trim($_GET['keyword']) ;
$keyword = mysqli_real_escape_string($dbc, $keyword); ?>



<?php
$query = "SELECT office,officeCode,file,id from tbl_locator where office like '%$keyword%' or officeCode like '%$keyword%'";

$result = mysqli_query($dbc,$query);
if($result){
    if(mysqli_affected_rows($dbc)!=0){
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
          	 $office = $row['office'];
          	 $id = $row['id'];
              $officeCode = $row['officeCode'];
              $file = $row['file'];
              $keyword = $_GET['keyword']; 
                ?>


<style type="text/css">
  
.homeButton {
  text-align: left;
  margin-left: 70px;
}

.homeButton .button {
    background-color: #25373d;
    background-image: linear-gradient(to bottom, #3e5056 0%, #25373d 100%);
    box-shadow: inset 0 1px 0 #57696f;
    border: solid 3px  #9ce5ff;
    border-radius: 50px;
    color: #9ce5ff;
    cursor: pointer;
    display: inline-block;
    font-size: 10px;
    letter-spacing: 2px;
    line-height: 70px;
    text-align: center;
    outline: 0;
    padding: 0 50px;
    position: relative;
    text-decoration: none;
    text-transform: uppercase;
    white-space: nowrap;
    width: 300px;

  }

.homeButton .button:after {
      transform: scale(0.25);
      pointer-events: none;
      transition: opacity 0.2s ease, transform 0.2s ease;
      background: #ffffff;
      border-radius: 50px;
      position: absolute;
    width: 400px;
    }
    

.homeButton .button:hover {
      border-color: rgba(255, 255, 255, 0.55);
    }

.homeButton .button:hover:after {
        opacity: 0.05;
        transform: scale(1);
      }

.homeButton .button:hover:active {
        border-color: #ffffff;
      }

.homeButton .button:hover:active:after {
          opacity: 0.1;
      }
</style>



                <div class="homeButton">
               <a class="button" href="user_locatorview.php?id=<?php echo $id?>"><?php echo $office?></a>
               </div>
   <?php } ?>
               

    <?php } else { ?>

             <h1> No Results for : <?php echo $keyword?> </h1>
             <?php
    }
  
}
}else { ?>
    <h1> Parameter Missing </h1>
    <?php } ?>


