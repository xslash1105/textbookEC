<?php
include("connection.php");
// new username

  if(isset($_POST["newUsername"])){
    $presentUsername = $_POST["username"];
    $newUsername = $_POST["newUsername"];

    $select = "SELECT username FROM user WHERE username = '$presentUsername' ";
    $selectQuery = mysqli_query($con, $select);
    if(mysqli_num_rows($selectQuery)>0){
      $updateUser = "UPDATE user SET username = '$newUsername' WHERE username = '$presentUsername' ";
      $updateUserQuery = mysqli_query($con, $updateUser);
      $updatePurchaser = "UPDATE purchase SET purchaser = '$newUsername' WHERE purchaser = '$presentUsername' ";
      $updatePurchaserQuery = mysqli_query($con, $updatePurchaser);
      $updateSeller = "UPDATE purchase SET seller = '$newUsername' WHERE seller = '$presentUsername' ";
      $updateSellerQuery = mysqli_query($con, $updateSeller);
      $updateExhibitor = "UPDATE textbooks SET exhibitor = '$newUsername' WHERE exhibitor = '$presentUsername' ";
      $updateExhibitorQuery = mysqli_query($con, $updateExhibitor);
      $updateSender = "UPDATE message SET sender = '$newUsername' WHERE sender = '$presentUsername' ";
      $updateSenderQuery = mysqli_query($con, $updateSender);
      $updateReceiver = "UPDATE message SET receiver = '$newUsername' WHERE receiver = '$presentUsername' ";
      $updateReceiverQuery = mysqli_query($con, $updateReceiver);
      if($updateUserQuery && $updatePurchaserQuery && $updateSellerQuery && $updateExhibitorQuery && $updateSenderQuery && $updateReceiverQuery){
        ?>
        <h2 class="changedMessageok">変更完了/Successfully changed</h2>
        <?php
        $_SESSION["username"] = $newUsername;
      }else{
        ?>
        <h2 class="changedMessageng">変更失敗/Changeing unsuccessful</h2>
        <?php
      }
    }else{
    ?>
    <h2 class="changedMessageng">ユーザー名が見つかりませんでした / Username does not exist</h2>
    <?php
  }
}


  if(isset($_POST["newEmail"])){
    $username = $_POST["username"];
    $presentEmail = $_POST["presentEmail"];
    $newEmail = $_POST["newEmail"];

    $select = "SELECT * FROM user WHERE username = '$username' AND email = '$presentEmail' ";
    $selectQuery = mysqli_query($con, $select);
    if(mysqli_num_rows($selectQuery)>0){
      $update = "UPDATE user SET email = '$newEmail' WHERE username = '$username' AND email = '$presentEmail' ";
      $updateQuery = mysqli_query($con, $update);
      if($updateQuery){
        ?>
        <h2 class="changedMessageok">変更完了/Successfully changed</h2>
        <?php
      }else{
        ?>
        <h2 class="changedMessageng">変更失敗/Changeing unsuccessful</h2>
        <?php
      }
    }
  }

  if(isset($_POST["newpass1"])){
    $username = $_POST["username"];
    $presentPass = $_POST["presentPass"];
    $newpassword = $_POST["newpass1"];

    $select = "SELECT * FROM user WHERE username = '$username' AND password = '$presentPass' ";
    $selectQuery = mysqli_query($con, $select);
    if(mysqli_num_rows($selectQuery)>0){
     if($selectQuery>0){
      $update = "UPDATE user SET password = '$newpassword' WHERE username = '$username' AND password = '$presentPass' ";
      $updateQuery = mysqli_query($con, $update);
      if($updateQuery){
        ?>
        <h2 class="changedMessageok">変更完了/Successfully changed</h2>
        <?php
      }else{
        ?>
        <h2 class="changedMessageng">変更失敗/Changeing unsuccessful</h2>
        <?php
      }
    }else{
      ?>
      <h2 class="changedMessageng">Passwordが異なる可能性があります/　Changeing unsuccessful</h2>
      <?php
    }
  }
}

if(isset($_GET["sessionUsername"])){
  $sessionUsername = $_GET["sessionUsername"];
  $select = "SELECT * FROM user WHERE username = '$sessionUsername' ";
  $selectQuery = mysqli_query($con, $select);
  $array = mysqli_fetch_array($selectQuery);
  $username = $array["username"];
  $icon = $array["icon"];
  ?>
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
  <?php
}

 ?>
