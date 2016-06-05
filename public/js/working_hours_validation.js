/**
 * Created by mostafa on 04/06/16.
 */
$(document).ready(function () {
    // console.log("hiii in ready");


    $(":input[name='toTime']").on("blur", function () {
        // console.log($('input[name=fromTime]').val());
        // console.log($(":input[name='fromTime']").val());
        // console.log($(":input[name='toTime']").val());
        // console.log($(":input[name='fromTime']").val().split(":"));
        // console.log($(":input[name='toTime']").val().split(":"));
        var hours1 = $(":input[name='fromTime']").val().split(":")["0"];
        var hours2 = $(":input[name='toTime']").val().split(":")["0"];
        var minute1 = $(":input[name='fromTime']").val().split(":")["1"];
        var minute2 = $(":input[name='toTime']").val().split(":")["1"];
        if (hours2 - hours1 >= 0) {
            if (minute2 - minute1 >= 15 || hours2 - hours1 > 0 ) {
                // console.log("hiii in ready1");
                $(":input[name='toTime']").next().text("enter correct time").hide();
            } else {
                // console.log("hiii in ready2");

                $(":input[name='toTime']").next().text("enter correct time").show();
            }
            // console.log($(":input[name='toTime']").val());
            // $(":input[name='toTime']").next().text("enter correct time").hide();
            //     $("#error").text("enter correct time").show();
        } else {
            // console.log("hiii in ready3");

            $(":input[name='toTime']").next().text("enter correct time").show();
        }
        // $("#error").show;
        //
        //         console.log("blur");
        // $.get("/abc").done(function (data, status) {

        // alert("Data: " + data + "\nStatus: " + status);
        // console.log("Data: " + data + "\nStatus: " + status);
        // console.log(data);
        // });
        // $.ajaxSetup({
        //     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        // });
        // $.ajax({
        //     url: '/working_hours/checkdata/',
        // type: "get",
        // data: {'fromTime':$('input[name=fromTime]').val(), 'toTime': $('input[name=toTime]').val()},
        //
        // success: function(data){
        //     alert(data);
        //         console.log(data);
        //
        // }
        // });
    });
    // $(":input[name='day']").on("blur", function () {
    //    
    //     var hours1 = $(":input[name='fromTime']").val().split(":")["0"];
    //     var hours2 = $(":input[name='toTime']").val().split(":")["0"];
    //     var minute1 = $(":input[name='fromTime']").val().split(":")["1"];
    //     var minute2 = $(":input[name='toTime']").val().split(":")["1"];
    //     if (hours2 - hours1 >= 0 ) {
    //         if (minute2 - minute1 > 0){
    //             $(":input[name='toTime']").next().text("enter correct time").hide();
    //         }else {
    //             $(":input[name='toTime']").next().text("enter correct time").show();
    //         }
    //         // console.log($(":input[name='toTime']").val());
    //         // $(":input[name='toTime']").next().text("enter correct time").hide();
    //         //     $("#error").text("enter correct time").show();
    //     } else {
    //         $(":input[name='toTime']").next().text("enter correct time").show();
    //     }
    //    
    // });
});