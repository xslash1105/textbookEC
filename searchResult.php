<?php
include("connection.php");
include("menu.php");
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    if(isset($_GET["search"])){
       $searchValue = $_GET["search"];
       $searchValue = mb_convert_kana($searchValue, "as");
       $searchValue = str_replace(" ", " / ", $searchValue);
     }
     ?>
     <div id="backgroundContainer" style="background-image: url('img/background.jpg')">
       <div id="facultyItemContainer">
         <div id="itemTopContainer">
           <div id="processBarContainer">
             検索 > <?php  echo $searchValue ?>
           </div><!-- processBarContainer -->
           <div id="selectBarContainer">

           </div><!-- selectBarContainer -->
         </div><!-- itemTopContainer -->
         <?php include("searchEngine.php"); ?>
       </div><!--facultyItemContainer-->

     </div><!-- backgroundContainer -->

  </body>
</html>
