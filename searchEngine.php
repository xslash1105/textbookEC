<?php
if(isset($_GET["searchIn"])){
    $search = $_GET["searchIn"];
    $loop = 0;
    $searchResult = htmlspecialchars($search);
    $searchResult = mb_convert_kana($searchResult, "as");
    $search = str_replace(" ", "/", $searchResult);
    $searchResult = split(" ", $searchResult);
    $select = "SELECT * FROM textbooks WHERE ";
    // for($i=0; $i<count($searchResult); $i++){
    foreach($searchResult as $searchCheck){
       $loop++;
       if($loop==1){
         $select .= "title LIKE '%$searchCheck%' OR class LIKE '%$searchCheck%' OR professor LIKE '%$searchCheck%' OR explanation LIKE '%$searchCheck%' OR author LIKE '%$searchCheck%' OR publisher LIKE '%$searchCheck%' OR faculty LIKE '%$searchCheck%' OR department LIKE '%$searchCheck%' ";
      }else{
        $select .= "OR title LIKE '%$searchCheck%' OR class LIKE '%$searchCheck%' OR professor LIKE '%$searchCheck%' OR explanation LIKE '%$searchCheck%' OR author LIKE '%$searchCheck%' OR publisher LIKE '%$searchCheck%' OR faculty LIKE '%$searchCheck%' OR department LIKE '%$searchCheck%' ";
      }
    }
    $selectQuery = mysqli_query($con, $select);
    $searchNum = mysqli_num_rows($selectQuery);
    ?>
    <div id="itemBottomContainer">
      <h2 class="itemListTitle"><?php echo $search ?>の検索結果</h2>
        <div id="itemListContainer">
          <?php
          if($searchNum > 0){
            while($searchArray = mysqli_fetch_array($selectQuery)){
              $id = $searchArray["id"];
              $title = $searchArray["title"];
              $image = $searchArray["image"];
              $price = $searchArray["price"];
              $discountPrice = $price * 0.8;
              $professor = $searchArray["professor"];
              $class = $searchArray["class"];
                ?>
                     <div id="itemListWhole">
                       <a href="itemPageIn.php?id=<?php echo $id ?>&amp;item=<?php echo $title ?>" >
                         <div class="itemList_EachContainer hvr-grow-shadow">
                           <img src="<?php echo $image?>" class="itemList_EachImg" alt="<?php echo $title?>">

                           <h5 class="itemList_EachTitle">
                             <?php echo $title ?>
                           </h5>
                           <p class="itemList_EachInfo">
                             <strike>&yen;<?php echo $price ?></strike> <span class="discount">&yen;<?php echo $discountPrice ?></span>
                           </p>
                           <p class="itemList_EachInfo">
                             <?php echo $professor?>
                           </p>
                           <p class="itemList_EachInfo">
                             <?php echo $class ?>
                           </p>
                         </div>
                       </a>
                     </div>
                <?php
              }
            }else{
              ?>
              <div id="listItemMessage">
                <h2 class="textBookUnavailable">検索結果と一致する商品がありませんでした / <br>None of the textbooks matched the search result</h2>
                <p class="requestMessage">
                  <a href="itemRequsetIn.php">ほしい商品をリクエストされる方はこちらから</a>
                </p>
                <p class="requestMessage">
                  <a href="itemSellingIn.php">売りたい商品がある方はこちらから</a>
                </p>
              </div>
              <!--list Item Message-->
              <?php
            }
            ?>
          </div>
    </div><!-- itemBottomContainer -->
      <?php
    }


  if(isset($_GET["search"])){
    $search = $_GET["search"];
    $loop = 0;
    $searchResult = htmlspecialchars($search);
    $searchResult = mb_convert_kana($searchResult, "as");
    $search = str_replace(" ", "/", $searchResult);
    $searchResult = split(" ", $searchResult);
    $select = "SELECT * FROM textbooks WHERE ";
    // for($i=0; $i<count($searchResult); $i++){
    foreach($searchResult as $searchCheck){
       $loop++;
       if($loop==1){
         $select .= "title LIKE '%$searchCheck%' OR class LIKE '%$searchCheck%' OR professor LIKE '%$searchCheck%' OR explanation LIKE '%$searchCheck%' OR author LIKE '%$searchCheck%' OR publisher LIKE '%$searchCheck%' OR faculty LIKE '%$searchCheck%' OR department LIKE '%$searchCheck%' ";
      }else{
        $select .= "OR title LIKE '%$searchCheck%' OR class LIKE '%$searchCheck%' OR professor LIKE '%$searchCheck%' OR explanation LIKE '%$searchCheck%' OR author LIKE '%$searchCheck%' OR publisher LIKE '%$searchCheck%' OR faculty LIKE '%$searchCheck%' OR department LIKE '%$searchCheck%' ";
      }
    }
    $selectQuery = mysqli_query($con, $select);
    $searchNum = mysqli_num_rows($selectQuery);
    ?>
    <div id="itemBottomContainer">
      <h2 class="itemListTitle"><?php echo $search ?>の検索結果</h2>
        <div id="itemListContainer">
          <?php
          if($searchNum > 0){
            while($searchArray = mysqli_fetch_array($selectQuery)){
              $id = $searchArray["id"];
              $title = $searchArray["title"];
              $image = $searchArray["image"];
              $price = $searchArray["price"];
              $discountPrice = $searchArray["discount"];
              $professor = $searchArray["professor"];
              $class = $searchArray["class"];
                ?>
                     <div id="itemListWhole">
                       <a href="itemPage.php?id=<?php echo $title?>&amp;item=<?php echo $title ?>" >
                         <div class="itemList_EachContainer hvr-grow-shadow">
                           <img src="<?php echo $image?>" class="itemList_EachImg" alt="<?php echo $title?>">
                           <h5 class="itemList_EachTitle">
                             <?php echo $title ?>
                           </h5>
                           <p class="itemList_EachInfo">
                             &yen;<?php echo $price ?>
                           </p>
                           <p class="itemList_EachInfo">
                             <?php echo $professor?>
                           </p>
                           <p class="itemList_EachInfo">
                             <?php echo $class ?>
                           </p>
                         </div>
                       </a>
                     </div>
                <?php
              }
            }else{
              ?>
              <div id="listItemMessage">
                <h2 class="textBookUnavailable">検索結果と一致する商品がありませんでした / <br>None of the textbooks matched the search result</h2>
                <p class="requestMessage">
                    ほしい商品をリクエストもしくは売りたい商品の販売は新規登録していただくと可能になります。
                </p>
              </div>
              <!--list Item Message-->
              <?php
            }
            ?>
          </div>
    </div><!-- itemBottomContainer -->
      <?php
    }
    ?>
