<?php
session_start();
include("connection.php");
// if(!$_SESSION["username"]){
//   header("location: main.php");
// }
// $username = $_SESSION["username"];
$username = "Staff";
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

    <link rel="stylesheet" type="text/css" href="css/styleStaff.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" href="bootstrap-3.3.6/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/hover-min.css">
    <title></title>

    <script src="js/jquery-1.12.3.js"></script>
    <script src="js/main.js" charset="utf-8"></script>
    <script src="js/settingsAjax.js"></script>
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
      <div id="menuList">
        <ul>
          <a href="mainIn.php"><li>ホーム</li></a>
          <a href="insertPageIn.php"><li>商品登録</li></a>

          <li id="modal_open">User / Logout</li>
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
            <li id="cartChecking">買い物カゴ / Cart</li>
            <li id="sellingHistory">販売履歴 / Selling History</li>
            <li id="purchaseHistory">購入履歴 / Purchased History</li>
            <li id="wantingList">ほしいものリスト / Wanting List</li>
            <a href="logout_sql.php"><li id="logout">ログアウト / Logout</li></a>
          </ul>
        </div><!-- settings -->

      </div><!-- modal in -->
    <div id="modal_overlay">
    </div>

  </body>
</html>
