// <!-- complain, h_of_complain,  diagnose, plan-->

$(document).ready(function () {
    console.lol("inside");
    $(":input[name='complain']").on('blur', function(event) {
        console.log("inside1");

      if($(":input[name='complain']").val().trim() == ""){
            console.log("inside2");

    }
    });
        

    $("#add").on('click', function(event) {
        if($(":input[name='complain']").val().trim() == ""){
        $(":input[name='complain']").next().text("Please fill this field").show();
      }else{
        $(":input[name='complain']").next().text("Please fill this field").hide();
      }
    });
      
    
});
