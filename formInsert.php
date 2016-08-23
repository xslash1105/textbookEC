
<?php
include("connection.php");
 ?>
 <form action="" method="get">
<input type="text" name="facultyJap" placeholder="faculty" value="<?php echo $_GET["facultyJap"]?>">
<input type="text" name="departmentJap" placeholder="department">
<select name="faculty">
<?php
$select = "SELECT * FROM faculty";
$selectQuery = mysqli_query($con, $select);
while($array = mysqli_fetch_array($selectQuery)){
  ?>
  <option value="<?php echo $array['faculty'] ?>"><?php echo $array["faculty"] ?></option>
  <?php
}
 ?>
 </select>
 <select name="department">
<?php
$select2 = "SELECT * FROM faculty";
$query2 = mysqli_query($con, $select2);
while($array2 = mysqli_fetch_array($query2)){
  ?>
  <option value="<?php echo $array2['department'] ?>"><?php echo $array2["department"] ?></option>
  <?php
}
 ?>
 </select>
 <input type="submit" value="submit" name="send">
 </form>

 <?php
//  if(isset($_GET["send"])){
//    $facultyJap = $_GET["facultyJap"];
//    $departmentJap = $_GET["departmentJap"];
//    $faculty = $_GET["faculty"];
//    $department = $_GET["department"];
//
//    $update = "UPDATE faculty SET facultyJap = '$facultyJap', departmentJap = '$departmentJap' WHERE faculty = '$faculty' AND department = '$department' ";
//    $updateQuery = mysqli_query($con, $update);
//    if($updateQuery){
//      echo "ok";
//    }else{
//      echo "ng";
//    }
// }

// if(isset($_GET["send"])){
//   $faculty = $_GET["facultyJap"];
//   $roop = 0;
//   $faculty = htmlspecialchars($faculty);
//   $faculty = mb_convert_kana($faculty, "as");
//   exit;
//   $facultyCheck = split(" ", $faculty);
//   $select = "SELECT * FROM faculty WHERE ";
//   // for($i=0; $i<count($facultyCheck); $i++){
//   foreach($facultyCheck as $check){
//     $roop++;
//     if($roop==1){
//      $select .= "facultyJap LIKE '%$check%' OR departmentJap LIKE '%$check%' ";
//    }else{
//      $select .= "OR facultyJap LIKE '%$check%' OR departmentJap LIKE '%$check%' ";
//    }
//  }
//     $selectQuery = mysqli_query($con, $select);
//     if(mysqli_num_rows($selectQuery)>0){
//       while($array = mysqli_fetch_array($selectQuery)){
//         echo $array["facultyJap"]."の".$array["departmentJap"]."<br>";
//       }
//     }
//   // }
// }
//
// ?>

<?php
if(isset($_GET["send"])){
    $search = $_GET["facultyJap"];
    $loop = 0;
    $searchResult = htmlspecialchars($search);
    $searchResult = mb_convert_kana($searchResult, "as");
    $searchResult = split(" ", $searchResult);
    $select = "SELECT * FROM textbooks WHERE ";
    // for($i=0; $i<count($searchResult); $i++){
    foreach($searchResult as $searchCheck){
       $loop++;
       if($loop==1){
         $select .= "title LIKE '%$searchCheck%' OR class LIKE '%$searchCheck%' OR professor LIKE '%$searchCheck%' OR explanation LIKE '%$searchCheck%' OR author LIKE '%$searchCheck%' OR publisher LIKE '%$searchCheck%' OR faculty LIKE '%$searchCheck%' OR department LIKE '%$searchCheck%' ";
      }else{
        $select .= "title LIKE '%$searchCheck%' OR class LIKE '%$searchCheck%' OR professor LIKE '%$searchCheck%' OR explanation LIKE '%$searchCheck%' OR author LIKE '%$searchCheck%' OR publisher LIKE '%$searchCheck%' OR faculty LIKE '%$searchCheck%' OR department LIKE '%$searchCheck%' ";
      }
    }
    $selectQuery = mysqli_query($con, $select);
    echo $select;

    $searchNum = mysqli_num_rows($selectQuery);
    echo $searchNum;
    ?>
    <div id="itemBottomContainer">
      <h2 class="itemListTitle"><?php echo $search ?>の商品</h2>
        <div id="itemListContainer">
          <?php
          if($searchNum > 0){
            while($searchArray = mysqli_fetch_array($selectQuery)){
              $title = $searchArray["title"];
              $image = $searchArray["image"];
              $price = $searchArray["price"];
              $professor = $searchArray["professor"];
              $class = $searchArray["class"];
                ?>
                     <div id="itemListWhole">
                       <a href="itemPage.php?item=<?php echo $title ?>" >
                         <div class="itemList_EachContainer hvr-grow-shadow">
                           <!-- <img src="<?php echo $image?>" class="itemList_EachImg" alt="<?php echo $username?>s Icon"> -->
                           <img src="img/textbook.jpg" class="itemList_EachImg">
                           <h5 class="itemList_EachTitle">
                             <?php echo $title ?>
                             title
                           </h5>
                           <p class="itemList_EachInfo">
                             &yen;2000<?php echo $price ?>
                           </p>
                           <p class="itemList_EachInfo">
                             <a href="">David Potter<?php echo $professor?></a>
                           </p>
                           <p class="itemList_EachInfo">
                             <a href="">2016年度ゼミ<?php echo $class ?></a>
                           </p>
                         </div>
                       </a>
                     </div>
                   </div>
                <?php
              }
            }else{
              echo "false";
            }
            ?>
    </div><!-- itemBottomContainer -->
      <?php
    }
 ?>
