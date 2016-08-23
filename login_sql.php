<?php
session_start();
include("connection.php");

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

$select = "SELECT * FROM user WHERE username = '$username' AND email = '$email' AND password = '$password' ";
$selectQuery = mysqli_query($con, $select);
if(mysqli_num_rows($selectQuery)>0){
  $_SESSION["username"] = $username;
}else{
  ?>
    <h2 id="loginMessage">ログイン失敗/Login unsuccessful</h2>
  <?php
}
 ?>
