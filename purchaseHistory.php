<?php
include("connection.php");
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    include("menuIn.php");
    $selectTextbook = "SELECT * FROM purchase WHERE purchaser = '$username' ";
    $selectTextbookQuery = mysqli_query($con, $selectTextbook);
    $textbooksArray = mysqli_fetch_array($selectTextbookQuery);
    $id = $textbooksArray["textbookId"];
    $price = $textbooksArray["price"];
    $seller = $textbooksArray["seller"];
    $purchaseDate = $textbooksArray["date"];
    $purchasedHistory = "SELECT * FROM textbooks WHERE id = '$id' ";
    $purchasedHistoryQuery = mysqli_query($con, $purchasedHistory);
     ?>

     <div id="backgroundContainer" style="background-image: url('img/background.jpg')">
       <div id="sellHistoryContainer">
         <div id="sellHistoryTitle">
           購入履歴
         </div>
             <?php
             while($registeredItemArray = mysqli_fetch_array($purchasedHistoryQuery)){
               ?>
             <div id="sellHistoryBottom">
               <div class="sellHistoryImageContainer">
                 <img src="<?php echo $registeredItemArray['image'] ?>" alt="" class="sellHistoryImage">
               </div>
               <div class="sellHistoryInfoContainer">
                 <table>
                   <thead>
                     <caption><?php echo $registeredItemArray["title"] ?></caption>
                   </thead>
                   <tbody>
                     <tr>
                       <th>
                         購入日時:
                       </th>
                       <td>
                         <?php echo $purchaseDate ?>
                       </td>
                     </tr>
                     <tr>
                       <th>
                         学部:
                       </th>
                       <td>
                         <?php echo $registeredItemArray["faculty"] ?>
                       </td>
                     </tr>
                     <tr>
                       <th>
                         学科:
                       </th>
                       <td>
                         <?php echo $registeredItemArray["department"] ?>
                       </td>
                     </tr>
                     <tr>
                       <th>
                         授業名:
                       </th>
                       <td>
                         <?php echo $registeredItemArray["class"] ?>
                       </td>
                     </tr>
                     <tr>
                       <th>
                         購入価格:
                       </th>
                       <td>
                         <?php echo $price ?>
                       </td>
                     </tr>
                     <tr>
                       <th>
                         販売者:
                       </th>
                       <td>
                         <?php echo $seller ?>
                       </td>
                     </tr>
                   </tbody>
                 </table>
               </div><!--sellHistoryInfoContainer-->
             </div><!--sellHistoryBottom-->

               <?php
             }
              ?>

       </div><!--sellHistoryContainer-->
     </div><!--backgroundContainer-->

  </body>
</html>
