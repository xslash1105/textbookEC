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
    $faculty = $_GET["faculty"];
    $facultySelect = "SELECT * FROM faculty WHERE facultyJap = '$faculty' ";
    $selectQuery = mysqli_query($con, $facultySelect);
     ?>
     <div id="backgroundContainer" style="background-image: url('img/background.jpg')">
       <div id="facultyItemContainer">
         <div id="itemTopContainer">
           <div id="processBarContainer">
             <a href="facultyItemsIn.php?faculty=<?php  echo $faculty?>"><?php  echo $faculty?></a> >
           </div><!-- processBarContainer -->
           <div id="selectBarContainer">
             <?php
             while($facultyArray = mysqli_fetch_array($selectQuery)){
               $department = $facultyArray["departmentJap"];
               ?>
               <a href="departmentItems.php?faculty=<?php echo $faculty?>&amp;department=<?php echo $department?>"><button class="itemPageJumpButton hvr-float-shadow">
                 <?php echo $department ?>
               </button></a>
               <?php
             }
              ?>
              <a href="classItems.php?faculty=<?php echo $faculty?>"><button class="itemPageJumpButton hvr-float-shadow">
                授業別
              </button></a>
           </div><!-- selectBarContainer -->
         </div><!-- itemTopContainer -->

         <div id="itemBottomContainer">
           <h2 class="itemListTitle"><?php echo $faculty ?>の教授別</h2>
           <div id="itemListContainer">
             <?php
             $selectItem = "SELECT * FROM textbooks WHERE faculty = '$faculty' ";
             $selectItemQuery = mysqli_query($con, $selectItem);
             ?>
             <div id="itemListWhole">
             <?php
             if(mysqli_num_rows($selectItemQuery)>0){
               while($itemArray = mysqli_fetch_array($selectItemQuery)){
                 $id = $itemArray["id"];
                 $title = $itemArray["title"];
                 $image = $itemArray["image"];
                 $price = $itemArray["price"];
                 $professor = $itemArray["professor"];
                 $class = $itemArray["class"];
                 $department = $itemArray["department"];
                 ?>
                 <a href="itemPage.php?id=<?php echo $id ?>&amp;item=<?php echo $title ?>" >
                   <div class="itemList_EachContainer hvr-grow-shadow">
                     <img src="<?php echo $image?>" class="itemList_EachImg" alt="<?php echo $title?>s Icon">
                     <h5 class="itemList_EachTitle">
                       <?php echo $professor ?>
                     </h5>
                     <p class="itemList_EachInfo">
                       <?php echo $class?>
                     </p>
                     <p class="itemList_EachInfo">
                       <?php echo $department?>
                     </p>
                     <p class="itemList_EachInfo">
                       &yen;<?php echo $price ?>
                     </p>

                   </div>
                 </a>
                 <?php
                }
             }else{
               ?>
              <div id="listItemMessage">
                <h2 class="textBookUnavailable">まだ教科書がありません / No Textbooks are Available</h2>
                <p class="requestMessage">
                  ほしい商品をリクエストもしくは売りたい商品の販売は新規登録していただくと可能になります。
                </p>
              </div>
              <!--list Item Message-->
                <?php
          }
              ?>
              </div>
           </div>
         </div><!-- itemBottomContainer -->

       </div><!--facultyItemContainer-->

     </div><!-- backgroundContainer -->

  </body>
</html>
