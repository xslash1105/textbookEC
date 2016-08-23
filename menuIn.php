<?php
session_start();
include("connection.php");
if(!$_SESSION["username"]){
  header("location: main.php");
}
$username = $_SESSION["username"];
$userSelect = "SELECT * FROM user WHERE username = '$username' ";
$userSelectQuery = mysqli_query($con, $userSelect);
$userArray = mysqli_fetch_array($userSelectQuery);
$icon = $userArray["icon"];
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/styleIn.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" href="bootstrap-3.3.6/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/hover-min.css">
    <title></title>

    <script src="js/jquery-1.12.3.js"></script>
    <script src="js/main.js" charset="utf-8"></script>
    <script src="js/settingsAjax.js"></script>
    <script src="js/formAjax.js"></script>
    <script src="bootstrap-3.3.6/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php
    $userExist = "";
     ?>
    <nav id="menubar">
      <div id="userContainer">
        <table>
          <tr>
            <th id="userCalling">
              <?php echo $username ?>
            </th>
            <th>
              <img src="<?php if($icon){
                echo $icon;
              }else{
                echo "img/guestIcon.png";
              }?>" alt="<?php echo $username?>'s Icon'" id="icon">
            </th>
          </tr>
        </table>
      </div>
      <div id="searchContainer">
        <form action="searchResultIn.php" method="get">
          <div id="custom-search-input">
             <div class="input-group">
                 <input type="text" class="form-control" placeholder="SEARCH" name="searchIn" value="<?php if(isset($_GET["search"])){ echo $_GET["search"]; }?>"/>
                 <span class="input-group-btn">
                     <button class="btn btn-info" id="searchButton" type="submit">
                         <i class="glyphicon glyphicon-search"></i>
                     </button>
                 </span>
             </div>
         </div>
        </form>
      </div>
      <?php
      $selectMessage = "SELECT * FROM message WHERE receiver = '$username' AND status = 'unread' ";
      $queryMessage = mysqli_query($con, $selectMessage);
      $numMessage = mysqli_num_rows($queryMessage);
      if($numMessage>0){
        $totalMessage = $numMessage;
      }else{
        $totalMessage = "";
      } ?>
      <div id="menuList">
        <ul>
          <a href="mainIn.php"><li>ホーム</li></a>
          <a href="facultyItemsIn.php?faculty=人文学部"><li>人文学部</li></a>
          <a href="facultyItemsIn.php?faculty=外国語学部"><li>外国語学部</li></a>
          <a href="facultyItemsIn.php?faculty=経済学部"><li>経済学部</li></a>
          <a href="facultyItemsIn.php?faculty=経営学部"><li>経営学部</li></a>
          <a href="facultyItemsIn.php?faculty=法学部"><li>法学部</li></a>
          <a href="facultyItemsIn.php?faculty=総合政策学部"><li>総合政策学部</li></a>
          <a href="facultyItemsIn.php?faculty=理工学部"><li>理工学部</li></a>
          <a href="facultyItemsIn.php?faculty=短期大学部"><li>短期大学部</li></a>
          <li id="modal_open">User / Logout <span class="badge"><?php echo $totalMessage ?></span></li>
        </ul>
      </div><!-- menulist -->
    </nav>


      <div id="modal_in">
        <!--
        登録
        -->
        <div id="settings">
          <div class="formTitle">
            <h2>設定 / Settings</h2>
          </div>
          <ul>
            <a href="userSettingIn.php"><li id="userInfoChange">ユーザー情報変更 / Change User Information</li></a>
            <a href="insertPageIn.php"><li id="registerItem">商品登録 / Sell your Textbooks</li></a>
            <a href="contactIn.php"><li id="contact">メッセージ / Messages <span class="badge"><?php echo $totalMessage ?></span></li></a>
            <a href="sellingHistoryIn.php"><li id="sellingHistory">販売履歴 / Selling History</li></a>
            <a href="purchaseHistory.php"><li id="purchaseHistory">購入履歴 / Purchased History</li></a>
            <a href="wantedIn.php"><li id="wantingList">ほしいものリスト / Wanting List</li></a>
            <a href="logout_sql.php"><li id="logout">ログアウト / Logout</li></a>
          </ul>
        </div><!-- settings -->

      </div><!-- modal in -->
    <div id="modal_overlay">
    </div>

  </body>
</html>
