$(document).ready(function(){
  $("button").click(function(){
    var contactInfo = $(this).val();
    var array = contactInfo.split("_");
    var sender = array[0];
    var receiver = array[1];
    $.ajax({
      type: "GET",
      url: "messageExchange_sql.php",
      dataType: "text",
      data: {sender:sender, receiver:receiver},
      beforeSend: function(){
        $("#messageScreen").html("loading your message...");
      },
      success: function(result){
        $("#messageScreen").html(result);
      }
    })
  })
  $("button").click(function(){
    var contactInfo = $(this).val();
    var array = contactInfo.split("_");
    var sender = array[0];
    var receiver = array[1];
    $.ajax({
      type: "GET",
      url: "messageInput_sql.php",
      dataType: "text",
      data: {sender:sender, receiver:receiver},
      beforeSend: function(){
        $("#messageInputContainer").html("loading your message...");
      },
      success: function(result){
        $("#messageInputContainer").html(result);
      }
    })
  })
})
