<?php
include("connection.php");
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" href="bootstrap-3.3.6/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/hover-min.css">

    <script src="js/jquery-1.12.3.js"></script>
    <script src="js/main.js" charset="utf-8"></script>
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
            <th>
              Guest
            </th>
            <th>
              <img src="img/guesticon.png" alt="icon" id="icon">
            </th>
          </tr>
        </table>
      </div>
      <div id="searchContainer">
        <form action="searchResult.php" method="get">
          <div id="custom-search-input">
             <div class="input-group">
                 <input type="text" class="form-control" placeholder="SEARCH" name="search" value="<?php if(isset($_GET["search"])){ echo $_GET["search"]; }?>"/>
                 <span class="input-group-btn">
                     <button class="btn btn-info" id="searchButton" type="submit">
                         <i class="glyphicon glyphicon-search"></i>
                     </button>
                 </span>
             </div>
         </div>
        </form>
      </div>
      <div id="menuList">
        <ul>
          <a href="main.php"><li>ホーム</li></a>
          <a href="facultyItems.php?faculty=人文学部"><li>人文学部</li></a>
          <a href="facultyItems.php?faculty=外国語学部"><li>外国語学部</li></a>
          <a href="facultyItems.php?faculty=経済学部"><li>経済学部</li></a>
          <a href="facultyItems.php?faculty=経営学部"><li>経営学部</li></a>
          <a href="facultyItems.php?faculty=法学部"><li>法学部</li></a>
          <a href="facultyItems.php?faculty=総合政策学部"><li>総合政策学部</li></a>
          <a href="facultyItems.php?faculty=理工学部"><li>理工学部</li></a>
          <a href="facultyItems.php?faculty=短期大学部"><li>短期大学部</li></a>
          <li id="modal_open">Sign in/ Login</li>
        </ul>
      </div><!-- menulist -->
      <!-- <div id="menuIcon" class="icon">
        <h3>Nanzan<br>University</h3>
      </div> -->
    </nav>

    <div id="modal_in">
      <!--
      登録
      -->
      <div id="register">
        <form method="post">
          <dl class="formdl">
            <dt class="formTitle">
              <h2>登録 / Register</h2>
            </dt>
            <dt class="formLabel">
              ユーザー名(8文字以上):<span id="userExist"></span>
            </dt>
            <dd>
              <input type="text" placeholder="User name" name="name" required class="input" id="RegformUsername" min="8">
            </dd>
            <dt class="formLabel">
              メールアドレス:<span id="emailExist"></span>
            </dt>
            <dd>
              <input type="email" placeholder="Email" name="email" required class="input" id="RegformEmail">
            </dd>
            <dt class="formLabel">
              学部:<span id="facultyRequired"></span>
            </dt>
            <dd>
              <select name="faculty" id="faculty" class="selectInput">
                <option value="none" disabled selected>学部を選択してください</option>
                <option value="humanities">人文学部</option>
                <option value="foreign">外国語学部</option>
                <option value="economics">経済学部</option>
                <option value="business">経営学部</option>
                <option value="law">法学部</option>
                <option value="policy">総合政策学部</option>
                <option value="engineering">理工学部</option>
                <option value="junior">短期大学部</option>
              </select>
            </dd>
            <dt class="formLabel">
              学科:<span id="departmentRequired"></span>
            </dt>
            <dd>
              <select name="department" id="department" class="selectInput">
                <option value="none" disabled selected>学科を選択してください</option>
              </select>
            </dd>
            <dt class="formLabel">
              パスワード(8文字以上):<span class="passCheck"></span>
            </dt>
            <dd>
              <input type="password" name="password" placeholder="Password" class="input" id="pass1Check" required>
            </dd>
            <dt class="formLabel">
              パスワード(確認):<span class="passCheck"></span>
            </dt>
            <dd>
              <input type="password" placeholder="Password once again" class="input" id="pass2Check" required>
            </dd>
            <dt class="formButtondt">
              <input type="button" value="登録" name="register" class="formButton" id="registerButton">
            </dt>
          </dl>
        </form>
      </div><!-- register -->

          <!-- <table class="formTable" cellspacing="10">
            <tr>
              <th colspan="2" class="formTitle">
                <h2>登録/Register</h2>
              </th>
            </tr>
            <tr>
              <th class="formLabel">
                ユーザー名(8文字以上):<span id="userExist"></span>
              </th>
              <td>
                <input type="text" placeholder="User name" name="name" required class="input" id="RegformUsername" min="8">
              </td>
            </tr>
            <tr>
              <th class="formLabel">
                メールアドレス:<span id="emailExist"></span>
              </th>
              <td>
                <input type="email" placeholder="Email" name="email" required class="input" id="RegformEmail">
              </td>
            </tr>
            <tr>
              <th class="formLabel">
                学部:
              </th>
              <td>
                <select name="faculty" id="faculty" class="selectInput">
                  <option value="none" disabled selected>学部を選択してください</option>
                  <option value="humanities">人文学部</option>
                  <option value="foreign">外国語学部</option>
                  <option value="economics">経済学部</option>
                  <option value="business">経営学部</option>
                  <option value="law">法学部</option>
                  <option value="policy">総合政策学部</option>
                  <option value="engineering">理工学部</option>
                  <option value="junior">短期大学部</option>
                </select>
              </td>
            </tr>
            <tr>
              <th class="formLabel">
                学科:
              </th>
              <td>
                <select name="department" id="department" class="selectInput">
                  <option disabled selected>学科を選択してください</option>
                </select>
              </td>
            </tr>
            <tr>
              <th class="formLabel">
                パスワード(8文字以上):<span class="passCheck"></span>
              </th>
              <td>
                <input type="password" name="password" placeholder="Password" class="input" id="pass1Check" required>
              </td>
            </tr>
            <tr>
              <th class="formLabel">
                パスワード(確認):<span class="passCheck"></span>
              </th>
              <td>
                <input type="password" placeholder="Password once again" class="input" id="pass2Check" required>
              </td>
            </tr>
            <tr>
              <th colspan="2"  class="formButtonTh">
                <input type="button" value="登録" name="register" class="formButton" id="registerButton">
              </th>
            </tr>
          </table> -->

      <!--
      ログイン
      -->
      <div id="login">
        <form method="post">
          <dl class="formdl">
            <dt class="formTitle">
              <h2>ログイン / Login</h2>
            </dt>
            <dt class="formLabel">
              ユーザー名:<span id="userRequired"></span>
            </dt>
            <dd>
              <input type="text" name="name" placeholder="User name" class="input" min="8" id="logformUsername" required>
            </dd>
            <dt class="formLabel">
              メールアドレス:<span id="emailRequired"></span>
            </dt>
            <dd>
              <input type="email" placeholder="Email" name="email" required class="input" id="logformEmail">
            </dd>
            <dt class="formLabel">
              パスワード:<span id="passwordRequired"></span>
            </dt>
            <dd>
              <input type="password" name="password" placeholder="Password" class="input" id="password" min="8" required>
            </dd>
            <dt class="formButtondt">
              <input type="button" value="ログイン" name="login" class="formButton" id="loginButton">
            </dt>
          </dl>
        </form>
      </div><!-- login -->
          <!-- <table class="formTable">
            <tr>
              <th colspan="2" class="formTitle">
                <h2>ログイン/Login</h2>
              </th>
            </tr>
            <tr>
              <th class="formLabel">
                ユーザー名:
              </th>
              <td>
                <input type="text" name="name" placeholder="User name" class="input" required>
              </td>
            </tr>
            <tr>
              <th class="formLabel">
                メールアドレス:
              </th>
              <td>
                <input type="email" name="email" placeholder="Email" class="input" required>
              </td>
            </tr>
            <tr>
              <th class="formLabel">
                パスワード:
              </th>
              <td>
                <input type="password" name="password" placeholder="Password" class="input" required>
              </td>
            </tr>
            <tr>
              <th colspan="2" class="formButtonTh">
                <input type="submit" value="ログイン" name="login" class="formButton">
              </th>
            </tr>
          </table> -->
    </div><!-- modal in -->
    <div id="modal_overlay">
    </div>

  </body>
</html>
