/**
 * Created by mostafa on 05/06/16.
 */
$(document).ready()
{
    var selected = 1;
    $("select[name='search_by']").change(function () {
        // console.log($(":input[name='type']").val());
        if (this.value == 1) {
            console.log("name");
            $("#name").text("medicine_name");
        } else {
            console.log("active constituent");
            $("#name").text("active_constituent");
            selected = 2;
        }
    });
    $("input[name='medicine_name']").on("keyup", function () {
        // console.log(selected);
        // $("select[name='search_by'] option[value='1']").attr("selected",true);
        // if ($("select[name='search_by']").value==0){
        //     $("select[name='search_by']").value=1;
        // }
        if (selected == 1) {
            // console.log("name");
            // console.log($(":input[name='type']").val());
            // console.log($(":input[name='medicine_name']").val());
            $.ajax({
                url: "/medicines/find/",
                type: "post",
                data: {'name': $(":input[name='medicine_name']").val(),'id': $(":input[name='type']").val(), '_token': $('input[name=_token]').val()},
                success: function (data) {
                    // console.log(data[0]);
                    // console.log(data[1]);
                    if (data.length > 0) {
                        var datalist = $("#results");
                        // console.log(data.length);
                        datalist.empty();
                        $.each(data, function (i, content) {

                            datalist.append("<option value='" + content.name + "'>");
                        });
                    }
                    else {
                        $("#results").text("there is no data");
                    }

                },
            });
        } else {
            console.log("active constituent");
            $("#type").hide();
            $.ajax({
                url: "/consistitues/find",
                type: "post",
                data: {'name': $(":input[name='medicine_name']").val(), '_token': $('input[name=_token]').val()},
                success: function (data) {
                    console.log(data);
                    if (data.length > 0) {
                        var datalist = $("#results");
                        datalist.empty();
                        $.each(data, function (i, content) {

                            datalist.append("<option value='" + content.name + "'>");
                        });
                    }
                    else {
                        $("#contain").text("there is no data");
                    }

                },
            });
        }

    });
    // $("input[name='medicine_name']").on("blur",function () {
    //     console.log(this.value);
    // });
    
}