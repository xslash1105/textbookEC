<?php
include("connection.php");

$sender = $_GET["sender"];
$receiver = $_GET["receiver"];
 ?>
 <form method="get">
   <textarea id="messageInput" name="message" required></textarea>
   <button id="messageSendButton" class="btn" type="submit" name="messageButton" value="<?php echo $sender."_".$receiver ?>">送信&nbsp;<span class="glyphicon glyphicon-envelope"></span></button>
 </form>
