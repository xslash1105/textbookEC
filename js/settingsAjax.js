// ------------------------------------------

// username

$(document).ready(function(){
  $(document).on("keyup", "#presentUsername", function(){
    var presentUsername = $("#presentUsername").val();
    if(presentUsername.length>0 || presentUsername.length==0){
      $.ajax({
        success: function(){
          $("#presentUserCheck").html("<input value='available' class='passAvailable hiddenInput' id='newUserAvailable1'></span>");
        }
      })
    }
  })
})

$(document).ready(function(){
  $(document).on("focusout", "#presentUsername", function(){
    var username = $("#sessionUsername").val();
    var presentUserCheck = $("#presentUsername").val();
    if(presentUserCheck.length>0){
        if(username != presentUserCheck){
          $.ajax({
            success: function(){
              $("#presentUserCheck").html("<span class='unavailable'>ユーザー名が異なります<input value='unavailable' class='passAvailable hiddenInput' id='newUserAvailable1'></span>");
            }
          })
        }else{
          $.ajax({
            success: function(){
              $("#presentUserCheck").html("<input value='available' class='passAvailable hiddenInput' id='newUserAvailable1'>");
            }
          })
        }
      }else{
        $.ajax({
          success: function(){
            $("#presentUserCheck").html("<input value='unavailable' class='passAvailable hiddenInput' id='newUserAvailable1'>");
          }
        })
      }
    })
  })

$(document).ready(function(){
  $(document).on("keyup", "#newUsername", function(){
    var username = $("#sessionUsername").val();
    var newUserCheck = $("#newUsername").val();
    if(username != newUserCheck){
      $.ajax({
        type: "GET",
        url: "existChecking.php",
        data: {newUserCheck:newUserCheck},
        dataType: "text",
        success: function(result){
          $("#newUserExist").html(result);
        }
      })
    }else if(username == userCheck){
      $.ajax({
        success: function(){
          $("#newUserExist").html("<span class='unavailable'>現在のユーザー名と同じです<input value='unavailable' id='newUserAvailable' class='passAvailable hiddenInput' id='newUserAvailable2'></span>");
        }
      })
    }
  });
});

$(document).ready(function(){
  $(document).on("click", "#changeUsernameButton", function(){
    var newUserAvailable1 = $("#newUserAvailable1").val();
    var newUserAvailable2 = $("#newUserAvailable2").val();
    var username = $("#presentUsername").val();
    var newUsername = $("#newUsername").val();
    if(username.length>0 && newUsername.length>0){
      if(newUserAvailable1 == "available" && newUserAvailable2 == "available"){
        $.ajax({
          type: "POST",
          url: "settings.php",
          data: {username:username, newUsername:newUsername},
          dataType: "text",
          success: function(result){
            $("#changeUsername").html(result);
          }
        })
      }
    }
    if(username.length==0){
      $.ajax({
        success: function(){
          $("#presentUserCheck").html("<span class='unavailable'>ユーザー名が未入力です<input value='unavailable' id='newUserAvailable' class='passAvailable hiddenInput' id='newUserAvailable1'></span>");
        }
      })
    }
    if(newUsername.length==0){
      $.ajax({
        success: function(){
          $("#newUserExist").html("<span class='unavailable'>ユーザー名が未入力です<input value='unavailable' id='newUserAvailable' class='passAvailable hiddenInput' id='newUserAvailable2'></span>");
        }
      })
    }
  })
})

// changing email
$(document).ready(function(){
  $(document).on("focusout", "#presentEmail", function(){
    var presentEmail = $("#presentEmail").val();
    if(presentEmail.length==0 || presentEmail.length>0){
      $.ajax({
        success: function(){
          $("#presentEmailExist").html();
        }
      })
    }
  })
})

$(document).ready(function(){
  $(document).on("keyup", "#newEmail", function(){
    var newEmailCheck = $("#newEmail").val();
    $.ajax({
      type: "POST",
      url: "existChecking.php",
      dataType: "text",
      data: {newEmailCheck:newEmailCheck},
      success: function(result){
        $("#newEmailExist").html(result);
      }
    })
  })
})

$(document).ready(function(){
  $(document).on("click", "#changeEmailButton", function(){
    var newEmailAvailable = $("#newEmailAvailable").val();
    var username = $("#sessionUsername").val();
    var presentEmail = $("#presentEmail").val();
    var newEmail = $("#newEmail").val();
    if(presentEmail.length>0 && newEmail.length>0){
      if(newEmailAvailable=="available"){
        $.ajax({
          type: "POST",
          url: "settings.php",
          dataType: "text",
          data: {username:username, presentEmail:presentEmail, newEmail:newEmail},
          success: function(result){
            $("#changeEmail").html(result);
          }
        })
      }
    }
    if(presentEmail.length==0){
      $.ajax({
        success: function(){
          $("#presentEmailExist").html("<span class='unavailable'>メールアドレス未入力<input type='hidden' value='unavailable' class='passAvailable' id='newEmailAvailable1'></span>");
        }
      })
    }
    if(newEmail.length==0){
      $.ajax({
        success: function(){
          $("#newEmailExist").html("<span class='unavailable'>メールアドレス未入力<input type='hidden' value='unavailable' class='passAvailable' id='newEmailAvailable2'></span>");
        }
      })
    }
  })
})

// password changing

// パスワードが０もしくはそれ以上だとメッセージを消す
$(document).ready(function(){
  $(document).on("keyup", "#presentPassword", function(){
    var presentPassword = $("#presentPassword").val();
    if(presentPassword.length>0 || presentPassword.length==0){
      $.ajax({
        success: function(){
          $("#presentPasswordExist").html("&nbsp;");
        }
      })
    }
  })
})

$(document).ready(function(){
  $(document).on("keyup", "#newPassword1", function(){
    var newPassword1 = $("#newPassword1").val();
    if(newPassword1.length==0){
      $.ajax({
        success: function(){
          $("#newpass1Exist").html("&nbsp;");
        }
      })
    }
  })
})

$(document).ready(function(){
  $(document).on("keyup", "#newPassword2", function(){
    var newPassword2 = $("#newPassword2").val();
    if(newPassword2.length==0){
      $.ajax({
        success: function(){
          $("#newpass2Exist").html("&nbsp;");
        }
      })
    }
  })
})


// パスワードが違うときのメッセージを指定している
$(document).ready(function(){
  $(document).on("focusout", "#newPassword2", function(){
    var newpass1 = $("#newPassword1").val();
    var newpass2 = $("#newPassword2").val();
    if(newpass1.length>=8 && newpass2.length>=8){
      if(newpass1 == newpass2){
        $.ajax({
          success: function(){
            $(".passwordCheck").html("<span class='available glyphicon glyphicon-ok-sign'><input value='available' class='passAvailable hiddenInput'></span>");
          }
        })
      }else{
        $.ajax({
          success: function(){
            $(".passwordCheck").html("<span class='unavailable'>パスワードが異なります<input value='unavailable' class='passAvailable hiddenInput'></span>");
          }
        })
      }
    }
  })
})

// パスワードチェンジボタンを押した後の動作を記している
$(document).ready(function(){
  $(document).on("click", "#changePasswordButton", function(){
    var username = $("#sessionUsername").val();
    var presentPass = $("#presentPassword").val();
    var newpass1 = $("#newPassword1").val();
    var newpass2 = $("#newPassword2").val();
    if(presentPass.length>=8 && newpass1.length>=8 && newpass2.length>=8){
      if(newpass1 == newpass2){
        $.ajax({
          type: "POST",
          url: "settings.php",
          dataType: "text",
          data: {username:username, presentPass:presentPass, newpass1:newpass1},
          success: function(result){
            $("#changePassword").html(result);
          }
        })
      }
    }
    if(presentPass.length==0){
      $.ajax({
        success: function(){
          $("#presentPasswordExist").html("<span class='unavailable'>パスワードを入力してください<input value='unavailable' class='passAvailable hiddenInput'></span>");
        }
      })
    }
    if(newpass1.length==0){
      $.ajax({
        success: function(){
          $("#newpass1Exist").html("<span class='unavailable'>パスワードを入力してください<input value='unavailable' class='passAvailable hiddenInput'></span>");
        }
      })
    }
    if(newpass2.length==0){
      $.ajax({
        success: function(){
          $("#newpass2Exist").html("<span class='unavailable'>パスワードを入力してください<input value='unavailable' class='passAvailable hiddenInput'></span>");
        }
      })
    }
  })
})

// icon
// $(document).ready(function(){
//   $(document).on("click", "#upload-button", function(){
//     var
//   })
// })
// --------------------------------------------
// sellingHistory

// $(document).ready(function(){
//   $("#sellingHistory").click(function(){
//     $.ajax({
//       type: "GET",
//       url: "settings.php",
//       dataType: "text",
//       data: {userInfoChange:userInfoChange},
//       success: function(result){
//         $("#settings").html(result);
//       }
//     })
//   })
// })
//
// $(document).ready(function(){
//   $("#purchaseHistory").click(function(){
//     $.ajax({
//       type: "GET",
//       url: "settings.php",
//       dataType: "text",
//       data: {userInfoChange:userInfoChange},
//       success: function(result){
//         $("#settings").html(result);
//       }
//     })
//   })
// })
//
// $(document).ready(function(){
//   $("#wantingList").click(function(){
//     $.ajax({
//       type: "GET",
//       url: "settings.php",
//       dataType: "text",
//       data: {userInfoChange:userInfoChange},
//       success: function(result){
//         $("#settings").html(result);
//       }
//     })
//   })
// })
//
// $(document).ready(function(){
//   $("#logout").click(function(){
//     $.ajax({
//       type: "GET",
//       url: "settings.php",
//       dataType: "text",
//       data: {userInfoChange:userInfoChange},
//       success: function(result){
//         $("#settings").html(result);
//       }
//     })
//   })
// })
