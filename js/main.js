$(document).ready(function(){
  $("#modal_open").click(function(){
  $("body").append('<div id="modal_overlay"></div>');
  $("#modal_overlay").fadeIn("slow");
  $("#modal_in").fadeIn("slow");
  $("#modal_overlay").unbind().click(function(){
    $("#modal_in, #modal_overlay").fadeOut("slow", function(){
      $("#modal_overlay").remove();
      })
    })
  })
});

$(document).ready(function(){
  $("#titleContainer").fadeIn(2000);
});

$(document).ready(function(){
  $("#modal_explanation_open").click(function(){
  $("body").append('<div id="modal_explanation_overlay"></div>');
  $("#modal_explanation_overlay").fadeIn("slow");
  $("#modal_explanation").fadeIn("slow");
  $("#modal_explanation_overlay").unbind().click(function(){
    $("#modal_explanation, #modal_explanation_overlay").fadeOut(1000, function(){
      $("#modal_explanation_overlay").remove();
      })
    })
  })
});

$(document).ready(function(){
  $("#purchaseOpen").click(function(){
  $("body").append('<div id="modal_purchase_overlay"></div>');
  $("#modal_purchase_overlay").fadeIn("slow");
  $("#modal_purchase").fadeIn("slow");
  $("#modal_purchase_overlay").unbind().click(function(){
    $("#modal_purchase, #modal_purchase_overlay").fadeOut(1000, function(){
      $("#modal_purchase_overlay").remove();
      })
    })
  })
});
