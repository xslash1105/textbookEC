<?php
include("connection.php");

$sender = $_GET["sender"];
$receiver = $_GET["receiver"];
$selectMessage = "SELECT * FROM message WHERE (sender = '$sender' AND receiver = '$receiver') OR (sender = '$receiver' AND receiver = '$sender') ORDER BY date DESC";
$queryMessage = mysqli_query($con, $selectMessage);
while($arrayMessage = mysqli_fetch_array($queryMessage)){
  $messageSender = $arrayMessage["sender"];
  $messageReceiver = $arrayMessage["receiver"];
  $text = $arrayMessage["text"];
  $date = $arrayMessage["date"];
  $status = $arrayMessage["status"];
    if($messageSender == $sender){
      ?>
        <?php echo "sent by: <i>".$sender."</i> (".$date.")" ?>
          <div class="messageReceiverWrapper">
            <p class="messageReceiverBox">
              <?php echo $text ?>
            </p>
          </div><!-- messageReceiverWrapper -->
      <?php
  }else if($messageSender == $receiver){
    ?>
      <?php echo "sent by: <i>".$receiver."</i> (".$date.")" ?>
        <div class="messageSenderWrapper">
          <?php echo $status ?>
          <p class="messageSenderBox">
            <?php echo $text ?>
          </p>
        </div><!-- messageReceiverWrapper -->
    <?php
  }
}
$updateMessage = "UPDATE message SET status = 'read' WHERE sender = '$sender' AND receiver = '$receiver' ";
$updateQuery = mysqli_query($con, $updateMessage);
 ?>
