$(document).ready(function(){
  $("#faculty").change(function(){
    var faculty = $(this).val();
    $.ajax({
      type: "POST",
      url: "departmentSelect.php",
      dataType: "text",
      data: {faculty: faculty},
      success: function(result){
        $("#department").html(result);
      }
    });
  });
});

$(document).ready(function(){
  $("#RegformUsername").keyup(function(){
    var userCheck = $("#RegformUsername").val();
    $.ajax({
      type: "GET",
      url: "existChecking.php",
      data: {userCheck:userCheck},
      dataType: "text",
      success: function(result){
        $("#userExist").html(result);
      }
    });
  });
});

$(document).ready(function(){
  $("#RegformEmail").focusout(function(){
    var emailCheck = $("#RegformEmail").val();
    $.ajax({
      type: "POST",
      url: "existChecking.php",
      dataType: "text",
      data: {emailCheck:emailCheck},
      success: function(result){
        $("#emailExist").html(result);
      }
    })
  })
})

$(document).ready(function(){
  $("#faculty").change(function(){
    var faculty = $("#faculty").val();
    if(!faculty){
      $.ajax({
        type: "GET",
        dataType: "text",
        success: function(){
          $("#facultyRequired").html("<span class='unavailable'>学部を選択してください</span>");
        }
      })
    }else if(faculty){
      $.ajax({
        type: "GET",
        dataType: "text",
        success: function(){
          $("#facultyRequired").html("<span class='available glyphicon glyphicon-ok-sign'></span>");
        }
      })
    }
  })
})

$(document).ready(function(){
  $("#department").change(function(){
    var department = $("#department").val();
    if(!department){
      $.ajax({
        type: "GET",
        dataType: "text",
        success: function(){
          $("#departmentRequired").html("<span class='unavailable'>学科を選択してください</span>");
        }
      })
    }else if(department){
      $.ajax({
        type: "GET",
        dataType: "text",
        success: function(){
          $("#departmentRequired").html("<span class='available glyphicon glyphicon-ok-sign'></span>");
        }
      })
    }
  })
})

$(document).ready(function(){
  $("#pass1Check").focusout(function(){
    var pass1 = $("#pass1Check").val();
    var pass2 = $("#pass2Check").val();
      if(pass2.length>0){
      $.ajax({
        type: "POST",
        url: "existChecking.php",
        dataType: "text",
        data: {pass1:pass1, pass2:pass2},
        success: function(result){
          $(".passCheck").html(result);
        }
      })
    }
  })
  $("#pass2Check").focusout(function(){
    var pass1 = $("#pass1Check").val();
    var pass2 = $("#pass2Check").val();
      if(pass1.length>0){
      $.ajax({
        type: "POST",
        url: "existChecking.php",
        dataType: "text",
        data: {pass1:pass1, pass2:pass2},
        success: function(result){
          $(".passCheck").html(result);
        }
      })
    }
  })

})

$(document).ready(function(){
  $("#registerButton").click(function(){
    var userExist = $("#userAvailable").val();
    var emailExist = $("#emailAvailable").val();
    var passCheck = $(".passAvailable").val();
    var username = $("#RegformUsername").val();
    var email = $("#RegformEmail").val();
    var faculty = $("#faculty").val();
    var department = $("#department").val();
    var password = $("#pass1Check").val();

    if(userExist == "available" && emailExist == "available" && passCheck == "available" && faculty != null && department != null){
      $.ajax({
        type: "POST",
        url: "register_sql.php",
        dataType: "text",
        data: {username:username, email:email, faculty:faculty, department:department, password:password},
        success: function(result){
          $("#register").html(result);
        }
      })
    }
    if(userExist == "unavailable"){
      $.ajax({
        type: "GET",
        dataType: "text",
        success: function(){
          $("#userExist").html("<span class='unavailable'>使用済みのユーザー名です</span>");
        }
      })
    }else if(username.length==0){
      $.ajax({
        type: "GET",
        dataType: "text",
        success: function(){
          $("#userExist").html("<span class='unavailable'>ユーザー名を入れてください</span>");
        }
      })
    }
    if(emailExist == "unavailable"){
      $.ajax({
        success: function(){
          $("#emailExist").html("<span class='unavailable'>登録済みのメールアドレスです</span>");
        }
      })
    }else if(email.length==0){
      $.ajax({
        type: "GET",
        dataType: "text",
        success: function(){
          $("#emailExist").html("<span class='unavailable'>メールアドレスを入れてください</span>");
        }
      })
    }
    if(!faculty){
      $.ajax({
        type: "GET",
        dataType: "text",
        success: function(){
          $("#facultyRequired").html("<span class='unavailable'>学部を選択してください</span>");
        }
      })
    }
    if(!department){
      $.ajax({
        type: "GET",
        dataType: "text",
        success: function(){
          $("#departmentRequired").html("<span class='unavailable'>学科を選択してください</span>");
        }
      })
    }
    if(passCheck == "unavailable"){
      $.ajax({
        success: function(){
          $(".passCheck").html("<span class='unavailable'>異なるパスワードです</span>");
        }
      })
    }else if(password.length==0){
      $.ajax({
        type: "GET",
        dataType: "text",
        success: function(){
          $(".passCheck").html("<span class='unavailable'>パスワードを入れてください</span>");
        }
      })
    }
  })
})

$(document).ready(function(){
  $("#loginButton").click(function(){
      var username = $("#logformUsername").val();
      var email = $("#logformEmail").val();
      var password = $("#password").val();
        if(username.length>=8 && email.length>0 && password.length>=8){
        $.ajax({
          type: "POST",
          url: "login_sql.php",
          dataType: "text",
          data: {username:username, email:email, password:password},
          success: function(result){
            $("#loginButton").html(result);
            window.open("mainIn.php", "_self");
          }
        })
      }
      if(!username.length>0){
        $.ajax({
          type: "GET",
          dataType: "text",
          success: function(){
            $("#userRequired").html("<span class='unavailable'>ユーザー名を入れてください</span>");
          }
        })
      }else if(username.length>0 && username.length<8){
        $.ajax({
          type: "GET",
          dataType: "text",
          success: function(){
            $("#userRequired").html("<span class='unavailable'>ユーザー名は8文字以上です</span>");
          }
        })
      }else if(username.length>=8){
        $.ajax({
          success: function(){
            $("#userRequired").html("");
          }
        })
      }
      if(!email.length>0){
        $.ajax({
          type: "GET",
          dataType: "text",
          success: function(){
            $("#emailRequired").html("<span class='unavailable'>メールアドレスを入れてください</span>");
          }
        })
      }else if(email.length>0){
        $.ajax({
          success: function(){
            $("#emailRequired").html("");
          }
        })
      }
      if(!password.length>0){
        $.ajax({
          type: "GET",
          dataType: "text",
          success: function(){
            $("#passwordRequired").html("<span class='unavailable'>パスワードを入れてください</span>");
          }
        })
      }else if(password.length>0 && password.length<8){
        $.ajax({
          success: function(){
            $("#passwordRequired").html("<span class='unavailable'>パスワードは8文字以上です</span>");
          }
        })
      }else if(password.length>=8){
        $.ajax({
          success: function(){
            $("#passwordRequired").html("");
          }
        })
      }
    })
  });

  $(document).ready(function(){
    $("#insertfaculty").change(function(){
      var facultyJap = $(this).val();
      $.ajax({
        type: "POST",
        url: "departmentSelect.php",
        dataType: "text",
        data: {facultyJap: facultyJap},
        success: function(result){
          $("#insertdepartment").html(result);
        }
      });
    });
  });

  $(document).ready(function(){
    $("#priceInsert").keyup(function(){
      var price = $("#priceInsert").val();
      var discount = price*0.8;
      discount = Math.floor(discount);
      if(discount<100){
        discount = 100+"(最低価格です)";
      }
      $.ajax({
        success: function(){
          $("#discountInsert").html('<input type="text" value="'+discount+'" class="insertinput" readonly>');
        }
      })
    })
  });

  $(document).ready(function(){
    $(document).on("click", "#purchaseButton", function(){
      var purchase = "purchase";
      var purchaser = $("#purchaser").val();
      var title = $("#purchase_title").val();
      var price = $("#purchase_price").val();
      var seller = $("#seller").val();
      var password = $("#password").val();
      var bookId = $("#purchaseButton").val();
      if(password==""){
        $.ajax({
          success: function(){
            $("#purchaseNoPass").html("<span class='unavailable'>パスワードを記入してください。</span> ");
          }
        })
      }else{
        $.ajax({
          type: "POST",
          url: "purchase_sql.php",
          dataType: "text",
          data: {purchase:purchase, purchaser: purchaser, title: title, price:price, seller:seller, password:password, bookId:bookId},
          success: function(result){
            $("#itemPurchasemodal").html(result);
          }
        })
      }
    })
  })


$(document).ready(function(){
  $(document).on("click", "#guestPurchaseButton", function(){
    var guest = "guest";
    var purchaser = $("#purchaser").val();
    var email = $("#email").val();
    var title = $("#purchase_title").val();
    var price = $("#purchase_price").val();
    var seller = $("#seller").val();
    var bookId= $("#guestPurchaseButton").val();
    if(purchaser == ""){
      $.ajax({
        success: function(){
          $("#guestnameRequired").html("名前を入力してください");
        }
      })
    }
    if(email == ""){
      $.ajax({
        success: function(){
          $("#guestemailRequired").html("メールアドレスを入力してください");
        }
      })
    }
    if(purchaser != "" && email != ""){
      $.ajax({
        type: "POST",
        url: "purchase_sql.php",
        dataType: "text",
        data: {guest:guest, purchaser:purchaser, email:email, title: title, price:price, seller:seller, bookId:bookId},
        success: function(result){
          $("#itemPurchasemodal").html(result);
        }
      })
    }
  })
})
