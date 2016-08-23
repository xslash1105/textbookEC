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
    $id = $_GET["id"];
    $title = $_GET["item"];
     ?>
     <div id="backgroundContainer" style="background-image: url('img/background.jpg')">
       <div id="itemPageContainer">
         <div id="itemPageTopContainer">
           <h2><?php echo $title ?>
          </h2>
         </div>
         <div id="itemPageBottomContainer">
             <?php
             $selectItem = "SELECT * FROM textbooks WHERE title = '$title' AND id = '$id' ";
             $selectItemQuery = mysqli_query($con, $selectItem);
             if(mysqli_num_rows($selectItemQuery)>0){
              $itemArray = mysqli_fetch_array($selectItemQuery);
              $title = $itemArray["title"];
              $author = $itemArray["author"];
              $publisher = $itemArray["publisher"];
              $image = $itemArray["image"];
              $price = $itemArray["price"];
              $state = $itemArray["state"];
              $explanation = $itemArray["explanation"];
              $professor = $itemArray["professor"];
              $class = $itemArray["class"];
              $faculty = $itemArray["faculty"];
              $department = $itemArray["department"];
              $exhibitor = $itemArray["exhibitor"];
              $date = $itemArray["date"];
              ?>
              <div id="itemWhole">
                   <div id="itemContainer">
                     <div id="item_leftContainer" style="background: url('<?php echo $image ?>'); background-size: contain; background-repeat: no-repeat">
                     </div>
                     <div id="item_rightContainer">
                       <p class="item_Info">
                         <table id="item_InfoTable">
                           <tr>
                             <th>
                               作者:
                             </th>
                             <td>
                               <?php echo $author ?>
                             </td>
                           </tr>
                           <tr>
                             <th>
                               出版社:
                             </th>
                             <td>
                               <?php echo $publisher ?>
                             </td>
                           </tr>
                           <tr>
                             <th>
                               価格:
                             </th>
                             <td>
                                &yen;<?php echo $price ?>
                             </td>
                           </tr>
                           <tr>
                             <th>
                               状態:
                             </th>
                             <td>
                                <?php echo $state ?>
                             </td>
                           </tr>
                           <tr>
                             <th>
                               説明:
                             </th>
                             <td>
                                <span id="modal_explanation_open">この本の詳細はこちら</span>
                             </td>
                           </tr>

                           <tr>
                             <th>
                               教授名:
                             </th>
                             <td>
                                <?php echo $professor?>
                             </td>
                           </tr>
                           <tr>
                             <th>
                               授業名:
                             </th>
                             <td>
                                <?php echo $class ?>
                             </td>
                           </tr>
                           <tr>
                             <th>
                               学部:
                             </th>
                             <td>
                                <a href="facultyItems.php?faculty=<?php echo $faculty ?>"><?php echo $faculty ?></a>
                             </td>
                           </tr>
                           <tr>
                             <th>
                               学科:
                             </th>
                             <td>
                                <a href="departmentItems.php?faculty=<?php echo $faculty?>&amp;department=<?php echo $department ?>"><?php echo $department ?></a>
                             </td>
                           </tr>
                           <tr>
                             <th>
                               出展者:
                             </th>
                             <td>
                               <?php
                               $selectExhibitor = "SELECT * FROM user WHERE username = '$exhibitor' ";
                               $selectExhibitorQuery = mysqli_query($con, $selectExhibitor);
                               $arrayExhibitor = mysqli_fetch_array($selectExhibitorQuery);
                               $exhibitorRate = $arrayExhibitor["rating"];
                               echo $exhibitor;
                               ?>
                             </td>
                           </tr>
                           <tr>
                             <th>
                               出展者評価:
                             </th>
                             <td>
                                <?php
                                if($exhibitorRate<=1){
                                  $rateColor = "ratingStar1";
                                }else{
                                  $rateColor = "ratingStar";
                                }
                                if($exhibitorRate>0){
                                  for($rater=1; $rater<=5-$exhibitorRate; $rater++){
                                    ?>
                                    <i class="glyphicon glyphicon-star-empty"></i>
                                    <?php
                                }
                                  for($rate=1; $rate<=$exhibitorRate; $rate++){
                                    ?>
                                    <i class="glyphicon glyphicon-star ratingStar <?php echo $rateColor?>"></i>
                                    <?php
                                  }
                                }else{
                                  echo "まだ評価されていません";
                                }
                               ?>
                             </td>
                           </tr>
                           <tr>
                             <th colspan="2">
                                 <button id="purchaseOpen" class="purchaseButton purchaseGuest" name="purchase" type="button">購入 / Purchase</button>
                             </th>
                           </tr>
                         </table>
                     </div>
                   </div>
                 <?php
             }else{
                ?>
              <div id="listItemMessage">
                <h2 class="textBookUnavailable">エラーが起きました / Error occured</h2>
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
           <div id="modal_explanation">
             <!--
             登録
             -->
             <div id="itemExplanationmodal">
               <div class="formTitle">
                 <h2><?php echo $title ?></h2>
               </div>
               <div id="itemModalScroll">
                 <p id="explanationText">
                   <?php echo $explanation ?>
                 </p>
               </div><!-- item  modal scroll-->
             </div><!-- itemExplanationmodal -->

           </div><!-- modal in -->
         <div id="modal_explanation_overlay">
         </div>
         <!--  購入画面のモダル-->
         <?php
         $purchaseSelect = "SELECT * FROM textbooks WHERE id= '$id' AND title = '$title' ";
         $purchaseQuery = mysqli_query($con, $purchaseSelect);
         $purchaseArray = mysqli_fetch_array($purchaseQuery);
         $id = $purchaseArray["id"];
         $title = $purchaseArray["title"];
         $class = $purchaseArray["class"];
         $price = $purchaseArray["price"];
         $exhibitor = $purchaseArray["exhibitor"];
          ?>

                  <div id="modal_purchase">
                    <div id="itemPurchasemodal">
                      <div id="itemPurchaseExplain">
                          <h2>購入について</h2>
                          <p>
                            お支払い方法に関しましては、直接現金での手渡しという形になっております。そして、受け渡し場所は販売者ユーザーが日時ともに指定し、都合が宜しければそこでお受け取りください。
                            なお、連絡はログインをされていない方は、メールアドレスを販売者ユーザーの方にお伝えし、連絡はそちらにさせていただきますのでご了承ください。
                          </p>
                          <small>※右記の商品情報欄は編集不可となっています。</small>

                          <small>※情報が異なる場合はお手数ですがページを一度リフレッシュさせてやり直してください。</small>
                        </div>
                        <div id="purchaseForm">
                          <form>
                            <dl>
                              <dt>お名前:<span id="guestnameRequired" class="unavailable" ></span></dt>
                              <dd><input type="text" placeholder="name" class="input"  name="username" id="purchaser"></dd>
                              <dt>メールアドレス:<span id="guestemailRequired" class="unavailable" ></span></dt>
                              <dd><input type="email" placeholder="email" class="input" id="email"  required></dd>
                              <dt>本のタイトル:</dt>
                              <dd><input type="text" class="input readonly" value="<?php echo $title ?>" name="title" id="purchase_title" readonly></dd>
                              <dt>授業名:</dt>
                              <dd><input type="text" class="input readonly" value="<?php echo $class ?>" name="class" readonly></dd>
                              <dt>価格:</dt>
                              <dd><input type="text" class="input readonly" value="<?php echo $price ?>" name="price" id="purchase_price" readonly></dd>
                              <dt>販売者ユーザー名:</dt>
                              <dd><input type="text" class="input readonly" value="<?php echo $exhibitor  ?>" name="class" id="seller" readonly></dd>
                              <dt>確認ができましたら購入ボタンを押してください</dt>
                              <dd id="purchasedd"><button type="button" value="<?php echo $id ?>" name="send" class="purchaseButton" id="guestPurchaseButton">購入</button></dd>
                            </dl>
                          </form>
                        </div>
                    </div><!-- itempurchasemodal -->

                  </div><!-- modal in -->
                <div id="modal_purchase_overlay">
                </div>

         </div><!-- itemBottomContainer -->

       </div><!--facultyItemContainer-->

     </div><!-- backgroundContainer -->

  </body>
</html>
