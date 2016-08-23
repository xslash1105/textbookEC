<?php
include("connection.php");
$username = "masafumi";
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php include("menuIn.php"); ?>
      <div id="backgroundContainer" style="background-image: url('img/background.jpg')">
        <div id="userChangeContainer">
           <div class="formTitle">
            <h3>ユーザー情報変更 / Change User Information</h3>
            <input type="text" id="sessionUsername" value="<?php echo $username ?>" class="hiddenInput">
          </div>

      <div id="changeEmail">
        <h3 class="changeLabelTitle">メールアドレス / Email Address</h3>
        <dl class="formdl">
          <dt>現在のメールアドレス / Present Email Address<span id="presentEmailExist" class="emailCheck"></span></dt>
          <dd><input type="text" placeholder="Present Email Address" id="presentEmail" class="input"></dd>
          <dt>新しいメールアドレス / New Email Address<span id="newEmailExist" class="emailCheck"></span></dt>
          <dd><input type="text" placeholder="New Email Address" id="newEmail" class="input"></dd>
          <dt class="formButtondt"><input type="button" value="CHANGE" id="changeEmailButton" class="formButton"></dt>
        </dl>
      </div>

      <hr>

      <div id="changePassword">
        <h3 class="changeLabelTitle">パスワード / Password</h3>
        <dl class="formdl">
          <dt>現在のパスワード / Present Password<span id="presentPasswordExist"></span></dt>
          <dd><input type="password" placeholder="Present Password" id="presentPassword" class="input"></dd>
          <dt>新しいパスワード / New Password<span class="passwordCheck" id="newpass1Exist"></span></dt>
          <dd><input type="password" placeholder="New Password" id="newPassword1" class="input"></dd>
          <dt>新しいパスワード(確認用) / New Password again<span class="passwordCheck" id="newpass2Exist"></span></dt>
          <dd><input type="password" placeholder="New Password once again" id="newPassword2" class="input"></dd>
          <dt class="formButtondt"><input type="button" value="CHANGE" id="changePasswordButton" class="formButton"></dt>
        </dl>
      </div>

      <hr>

      <div id="changeIcon">
        <h3 class="changeLabelTitle">アイコン / Icon</h3>
        <dl class="formdl">
          <form id="file-form" action="" method="POST" enctype="multipart/form-data">
            <dt>イメージを選択してください / Select your Icon Image<span id="presentPasswordExist"></span></dt>
            <dd><input type="file" id="file-select" name="file" /></dd>
            <dd><input type="text" value="<?php echo $username ?>" name="username" class="hiddenInput"></dd>
            <dt class="formButtondt"><button type="submit" id="upload-button" class="formButton" name="upload">Upload</button></dt>
          </form>
        </dl>
      </div>
      <?php
      if(isset($_POST["upload"])){
        $username = $_POST["username"];
        $file = $_FILES["file"]["name"];
        $fileLocation = $_FILES["file"]["tmp_name"];
        $folder = "upload/";
        $fileNew = str_replace(" ", "_", $file);
        $finalFile = $folder.$file;
        if(move_uploaded_file($fileLocation, $finalFile)){
          $update = "UPDATE user SET icon = '$finalFile' WHERE username = '$username' ";
          $updateQuery = mysqli_query($con, $update);
          if($updateQuery){
            $select = "SELECT * FROM user WHERE username = '$username' ";
            $selectQuery = mysqli_query($con, $select);
            $array = mysqli_fetch_array($selectQuery);
            $icon = $array["icon"];
            ?>
            <script type="text/javascript">
              $(document).ready(function(){
                $("body").append('<div id="modal_overlay_upload"></div>');
                $("#modal_overlay_upload").fadeIn("slow");
                $("#upload_modal_in").fadeIn("slow");
                $("#modal_overlay_upload").unbind().click(function(){
                  $("#upload_modal_in, #modal_overlay_upload").fadeOut("slow", function(){
                    $("#modal_overlay_upload").remove();
                    window.open("mainIn.php", "_self");
                    })
                  })
                })
            </script>
            <div id="modal_overlay_upload">
              <div id="upload_modal_in">
                <h2 class="changedMessageok">画像がアップロードされました<br> Successfully uploaded your image</h2>
                <img src="<?php if($icon){
                  echo $icon;
                }else{
                  echo 'img/guesticon.png';
                } ?>" alt="<?php echo $username ?>'s Icon" id="uploadedIcon">
              </div>
            </div>
            <script type="text/javascript">
              $(document).ready(function(){
              })
            </script>
            <?php
          }else{
            ?>
            <script type="text/javascript">
              $(document).ready(function(){
                $("body").append('<div id="modal_overlay_upload"></div>');
                $("#modal_overlay_upload").fadeIn("slow");
                $("#upload_modal_in").fadeIn("slow");
                $("#modal_overlay_upload").unbind().click(function(){
                  $("#upload_modal_in, #modal_overlay_upload").fadeOut("slow", function(){
                    $("#modal_overlay_upload").remove();
                    })
                  })
                })
            </script>
            <div id="modal_overlay_upload">
              <div id="upload_modal_in">
                <h2 class="changedMessageok">画像のアップロードに失敗しました<br> Faild to upload your image</h2>
              </div>
            </div>
                <?php
          }
        }
      }
 ?>

    </div><!--setting change container-->
  </div><!-- background -->



  </body>
</html>
