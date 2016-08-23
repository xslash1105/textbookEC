<!DOCTYPE>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/styleIn.css">

    <script src="js/main.js" charset="utf-8"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="js/jquery-1.12.3.js"></script>
    <script src="js/formAjax.js"></script>

  </head>
  <body>
    <?php include("menuIn.php"); ?>
    <div id="backgroundContainer" style="background-image: url('img/background.jpg')">
      <div id="requestFormContainer">
        <div id="requestFormTitle">
          <h2>ほしいものリクエスト / ほしいものリスト</h2>
        </div>
        <div id="requestFormLeft">
          <form action="" method="get">
            <dl class="requestdl">
              <dt>教科書名:</dt>
              <dd><input type="text" name="bookName" id="bookName" class="input"></dd>
              <dt>授業の学部名:</dt>
              <dd><input type="text" name="faculty" id="classFaculty" class="input"></dd>
              <dt>授業の学科名:</dt>
              <dd><input type="text" name="classDepartment" id="classDepartment" class="input"></dd>
              <dt>授業名:</dt>
              <dd><input type="text" name="class" id="class" class="input"></dd>
              <dt>確認して宜しければ送信を押してください。</dt>
              <dd><input type="submit" name="request" id="requestButton" class="btn btn-primary" value="リクエスト"></dd>
            </dl>
          </form>
          <?php
          if(isset($_GET["request"])){
            $title = $_GET["bookName"];
            $faculty = $_GET["classFaculty"];
            $department = $_GET["classDepartment"];
            $class = $_GET["class"];
            $insertRequest = "INSERT INTO request (username, textbook, faculty, department, class) VALUES ('$username', '$title', '$faculty', '$department', '$class')";
            $insertQuery = mysqli_query($con, $insertRequest);
          }
          ?>
        </div>
        <div id="requestFormRight">
          <?php
          $selectRequest = "SELECT * FROM request WHERE username = '$username' ";
          $requestQuery = mysqli_query($con, $selectRequest);
          while($requestArray = mysqli_fetch_array($requestQuery)){
            $title = $requestArray["textbook"];
            $class = $requestArray["class"];
            $date = $requestArray["date"];
            $select = "SELECT  * FROM textbooks WHERE title LIKE '%$title%' AND class = '$class' ";
            $query = mysqli_query($con, $select);
            $array = mysqli_fetch_array($query);
            $id = $array["id"];
            $textTitle = $array["title"];
            $num = mysqli_num_rows($query);
            ?>
            <div class="eachRequest">
              <div class="eachRequestTop">
                <?php echo $date ?>
              </div>
              <div class="eachRequestBottom">
                <div class="eachRequestTitle">
                  <a href="itemPageIn.php?id=<?php echo $id ?>&amp;item=<?php echo $textTitle ?>"><?php echo $title ?></a>
                </div>
                <div class="eachRequestClass">
                  <?php echo $class ?>
                </div>
                <div class="eachRequestAvailable">
                  現在の本の冊数:<?php echo $num ?>
                </div>
              </div>
            </div>
            <?php
          }
           ?>
        </div>
      </div>
    </div>
  </body>
</html>
