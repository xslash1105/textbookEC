<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="bootstrap-3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <script src="js/main.js" charset="utf-8"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </head>
  <body>
    <?php include("menu.php"); ?>
    <div id="backgroundContainer" style="background-image: url('img/background.jpg')">
      <div id="titleContainer">
        <h2 class="title">
          <form action="searchResult.php" method="get">
             南山大学専用<br>
             教科書販売サイト
           </h2>
           <span class="subTitle">SAVE YOUR CREDIT, SAVE THEIR CREDIT</span>

             <div id="custom-search-input">
                <div class="input-group">
                    <input type="text" class="form-control input-lg" placeholder="教授名・授業名から検索" name="search"/>
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </div>
           </form>
        </h2>
      </div>
    </div>


  </body>
</html>
