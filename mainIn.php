<?php include("menuIn.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <script src="js/main.js" charset="utf-8"></script>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
  </head>
  <body>


    <div id="backgroundContainer" style="background-image: url('img/background.jpg')">
      <div id="titleContainer">
        <h2 class="title">
         <form action="searchResultIn.php" method="get">
            南山大学専用<br>
            教科書販売サイト
          </h2>
          <span class="subTitle">SAVE YOUR CREDIT, SAVE THEIR CREDIT</span>

            <div id="custom-search-input">
               <div class="input-group">
                   <input type="text" class="form-control input-lg" placeholder="教授名・授業名から検索" name="searchIn"/>
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
