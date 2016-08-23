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
    $registeredItem = "SELECT * FROM textbooks WHERE exhibitor = '$username' ";
    $registeredItemQuery = mysqli_query($con, $registeredItem);

     ?>

     <div id="backgroundContainer" style="background-image: url('img/background.jpg')">
       <div id="sellHistoryContainer">
         <div id="sellHistoryTitle">
           販売履歴
         </div>
             <?php
             while($registeredItemArray = mysqli_fetch_array($registeredItemQuery)){
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
                         登録日時:
                       </th>
                       <td>
                         <?php echo $registeredItemArray["date"] ?>
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
                         価格:
                       </th>
                       <td>
                         <?php echo $registeredItemArray["price"]."円(".$registeredItemArray['price']*0.8."円)" ?>
                       </td>
                     </tr>
                     <tr>
                       <th>
                         状況:
                       </th>
                       <td>
                         <?php echo $registeredItemArray["situation"] ?>
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
