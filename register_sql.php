<?php
include("connection.php");

$username = $_POST["username"];
$email = $_POST["email"];
$faculty = $_POST["faculty"];
$department = $_POST["department"];
$password = $_POST["password"];
$password = sha1($password);

$select = "SELECT * FROM user WHERE username = '$username' AND email = '$email' ";
$selectQuery = mysqli_query($con, $select);
$checkNumber = mysqli_num_rows($selectQuery);
if(!$checkNumber>0){
  $insert = "INSERT INTO user (username, email, faculty, department, password) VALUES ('$username', '$email', '$faculty', '$department', '$password' )";
  $insertQuery = mysqli_query($con, $insert);
  if($insertQuery){
    ?>
      <h2 id="registerMessage">登録完了/Register Completed</h2>
    <?php
  }else{
    ?>
      <h2 id="registerMessage">登録に失敗しました/Register unsuccessful</h2>
    <?php
  }
}else{
  ?>
    <h2 id="registerMessage">既に登録された情報です/Data already exists</h2>
  <?php
}
 ?>
