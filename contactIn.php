<?php include("menuIn.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <script src="js/main.js" charset="utf-8"></script>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="js/contactAjax.js"></script>
  </head>
  <body>


    <div id="backgroundContainer" style="background-image: url('img/background.jpg')">
      <div id="contactContainer">
        <div id="contactTitle">
          <h2>メッセージ</h2>
        </div><!-- contactTitle -->
        <div id="contactListContainer">
          <div id="contactListNew">
          <?php
          $checkMessage = "SELECT * FROM message WHERE receiver = '$username' AND status = 'unread' ";
          $queryCheckMessage = mysqli_query($con, $checkMessage);
          $numCheckMessage = mysqli_num_rows($queryCheckMessage);
          if($numCheckMessage==0){
            $numCheckMessage = "";
          }
          ?>
          <h4 class="contactListTitle">新着メッセージ <span class="badge"><?php echo $numCheckMessage ?></span></h4>
          <?php
          if($numCheckMessage>0){
            while($arrayCheckMessage = mysqli_fetch_array($queryCheckMessage)){
              $sender = $arrayCheckMessage["sender"];

              ?>
              <button class="senderListEach" id="contactInfo" value="<?php echo $sender."_".$username ?>"><?php echo $sender ?></button>
              <?php
            }
          }else{
            ?>
            <h4>現在メッセージはありません。</h4>
            <?php
          }
          ?>
            </div>
            <hr>
            <div id="contactListOld">

              <?php
              $contactHistory = "SELECT DISTINCT sender FROM message WHERE receiver = '$username' ";
              $contactQuery = mysqli_query($con, $contactHistory);
              $numContactHistory = mysqli_num_rows($contactQuery);
              ?>
              <h4 class="contactListTitle">メッセージボックス<span class="badge"><?php echo $numContactHistory ?></span></h4>
              <?php
              if($numContactHistory>0){
                while($arrayContactHistory = mysqli_fetch_array($contactQuery)){
                  $sender = $arrayContactHistory["sender"];
                  ?>
                  <button class="senderListEach" id="contactInfo" value="<?php echo $sender."_".$username ?>"><?php echo $sender ?></button>
                  <?php
                }
            }else{
              ?>
              <h4>現在メッセージはありません。</h4>
              <?php
            }
           ?>
        </div>
      </div>
        <div id="messageContainer">
          <div id="messageScreen">
          </div><!-- messageScreen -->
          <div id="messageInputContainer">

            <form method="get">
              <textarea id="messageInput" name="message"  required></textarea>
              <button id="messageSendButton" class="btn" type="submit" name="messageButton" value="<?php echo $sender."_".$receiver ?>">送信&nbsp;<span class="glyphicon glyphicon-envelope"></span></button>
            </form>

        </div><!-- messageInput -->
      </div><!-- contactContainer -->
      <?php
      if(isset($_GET["messageButton"])){
        $value = $_GET["messageButton"];
        $arrayValue = explode("_", $value);
        $receiver = $arrayValue[0];
        $sender = $arrayValue[1];
        $message = $_GET["message"];

        $insertMessage = "INSERT INTO message (sender, receiver, text) VALUES ('$sender', '$receiver', '$message') ";
        $insertQuery = mysqli_query($con, $insertMessage);

      }
       ?>
    </div><!-- backgroundContainer -->


  </body>
</html>
