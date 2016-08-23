<?php
include("connection.php");

if(isset($_POST["purchase"])){
  $purchaser = $_POST["purchaser"];
  $title = $_POST["title"];
  $price = $_POST["price"];
  $exhibitor = $_POST["seller"];
  $password = $_POST["password"];
  $id = $_POST["bookId"];
  $text = $exhibitor."様の商品である「".$title."」(".$price."円)の購入を".$purchaser."様が現在希望されましたので自動で連絡しております。ここから受け取り場所(南山大学内に限る)、日時などのご連絡を宜しくお願い致します。";

  $checkUser = "SELECT * FROM user WHERE username = '$purchaser' AND password = '$password' ";
  $queryCheck = mysqli_query($con, $checkUser);

  if(mysqli_num_rows($queryCheck)>0){
    $purchase = "INSERT INTO purchase (purchaser, seller, textbookId, title, price) VALUES ('$purchaser', '$exhibitor', '$id', '$title', '$price')";
    $purchaseQuery = mysqli_query($con, $purchase);
    $purchaseMessage = "INSERT INTO message (sender, receiver, text) VALUES ('$purchaser', '$exhibitor', '$text' )";
    $purchaseMessageQuery = mysqli_query($con, $purchaseMessage);
    if($purchaseQuery && $purchaseMessageQuery){
      ?>
      <h2 class="changedMessageok purchaseMessage">データを販売者に送信しました。連絡が届くまで少々お待ちください。<br><br>
      ご利用ありがとうございました。</h2>
      <?php
    }else{
      ?>
      <h2 class="changedMessageng purchaseMessage">エラーが発生しました。お手数ですがもう一度ページを更新してやりなおしてください。</h2>
      <?php
    }
  }else{
    ?>
    <h2 class="changedMessageng purchaseMessage">パスワードが間違っている可能性があります。もう一度ページを更新してやり直してください。</h2>
    <?php
  }
} ?>

<?php
if(isset($_POST["guest"])){
  $purchaser = $_POST["purchaser"];
  $email = $_POST["email"];
  $title = $_POST["title"];
  $price = $_POST["price"];
  $exhibitor = $_POST["seller"];
  $id = $_POST["bookId"];
  $text = $exhibitor."様の商品である「".$title."」(".$price."円)の購入を".$purchaser."様が現在希望されましたので自動で連絡しております。なお、".$purchaser."様はユーザー登録されていないためメールでのやり取りになります。そのためこのメッセージに返信ではなく、".$email."に受け取りの詳細を記載の上連絡してください。宜しくお願い致します。";

    $purchase = "INSERT INTO purchase (purchaser, seller, textbookId, title, price) VALUES ('$purchaser', '$exhibitor', '$id', '$title', '$price')";
    $purchaseQuery = mysqli_query($con, $purchase);
    $purchaseMessage = "INSERT INTO message (sender, receiver, text) VALUES ('$purchaser', '$exhibitor', '$text' )";
    $purchaseMessageQuery = mysqli_query($con, $purchaseMessage);
    if($purchaseQuery && $purchaseMessageQuery){
      ?>
      <h2 class="changedMessageok purchaseMessage">データを販売者に送信しました。連絡が届くまで少々お待ちください。<br><br>
      ご利用ありがとうございました。</h2>
      <?php
    }else{
      ?>
      <h2 class="changedMessageng purchaseMessage">エラーが発生しました。お手数ですがもう一度ページを更新してやりなおしてください。</h2>
      <?php
    }
  }
 ?>
