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
    $department = $_GET["department"];
     ?>
     <div id="backgroundContainer" style="background-image: url('img/background.jpg')">
       <div id="departmentItemContainer">
         <div id="itemTopContainer">
           <div id="processBarContainer">
             <a href="facultyItems.php?faculty=<?php  echo $faculty?>"><?php  echo $faculty?></a> > <a href="departmentItems.php?faculty=<?php  echo $department?>&amp;department=<?php echo $department?>">  <?php echo $department ?> </a> >
           </div><!-- processBarContainer -->
           <div id="selectBarContainer">
              <a href="classItems.php?faculty=<?php echo $faculty?>&amp;department=<?php echo $department ?>&amp;department=<?php echo $department ?>"><button class="itemPageJumpButton hvr-float-shadow">
                授業名
              </button></a>
              <a href="professorItems.php?faculty=<?php echo $faculty?>&amp;department=<?php echo $department ?>"><button class="itemPageJumpButton hvr-float-shadow">
                教授別
              </button></a>
           </div><!-- selectBarContainer -->
         </div><!-- itemTopContainer -->

         <div id="itemBottomContainer">
           <h2 class="itemListTitle"><?php echo $faculty." / ".$department ?>の商品</h2>
           <div id="itemListContainer">
             <?php
             $selectItem = "SELECT * FROM textbooks WHERE faculty = '$faculty' AND department = '$department' ";
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
                 ?>
                 <a href="itemPage.php?id=<?php echo $id ?>&amp;item=<?php echo $title ?>" >
                   <div class="itemList_EachContainer hvr-grow-shadow">
                     <img src="<?php echo $image?>" class="itemList_EachImg" alt="<?php echo $title?>">
                     <h5 class="itemList_EachTitle">
                       <?php echo $title ?>
                     </h5>
                     <p class="itemList_EachInfo">
                       &yen;<?php echo $price ?>
                     </p>
                     <p class="itemList_EachInfo">
                       <a href=""><?php echo $professor?></a>
                     </p>
                     <p class="itemList_EachInfo">
                       <a href=""><?php echo $class ?></a>
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
