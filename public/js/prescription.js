/**
 * Created by mostafa on 05/06/16.
 */
$(document).ready()
{
    var selected = 1;
    $("#active_div1").hide();
    $("#active_div2").hide();
    $("select[name='search_by']").change(function () {
        if (this.value == 1) {
            $("#medicine_name").show();
        } else {
            selected = 2;
            $("#active_div1").show();
            $("#active_div2").show();
            $("#medicine_name").hide();
        }
    });
    $("input[name='medicine_name']").on("keyup", function () {
        if ($("input[name='medicine_name']").val().trim() != "") {
            if ($(":input[name='type']").val() != -1) {
                $.ajax({
                    url: "/medicines/find/?with=name&&has=id",
                    type: "post",
                    data: {
                        'name': $(":input[name='medicine_name']").val(),
                        'id': $(":input[name='type']").val(),
                        '_token': $('input[name=_token]').val()
                    },
                    success: function (data) {
                        if (data.length > 0) {
                            var datalist = $("#results");
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
                $.ajax({
                    url: "/medicines/find/?with=name",
                    type: "post",
                    data: {'name': $(":input[name='medicine_name']").val(), '_token': $('input[name=_token]').val()},
                    success: function (data) {
                        if (data.length > 0) {
                            var datalist = $("#results");
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
            }
        }
    });
    $("input[name='medicine_name']").on("blur", function () {
    });
    $("input[name='active_constituent']").on("keyup", function () {
        if (this.value.trim() != "") {
            $.ajax({
                url: "/consistitues/find",
                type: "post",
                data: {'name': $(":input[name='active_constituent']").val(), '_token': $('input[name=_token]').val()},
                success: function (data) {
                    if (data.length > 0) {
                        var datalist = $("#active");
                        datalist.empty();
                        $.each(data, function (i, content) {
                            datalist.append("<option value='" + content.active_consistitue + "'>");
                        });
                    }
                    else {
                        $("#active").text("there is no data");
                    }

                },
            });
        }
    });
    $("input[name='active_constituent']").on("blur", function () {
        if ($(":input[name='type']").val() != -1) {
            $.ajax({
                url: "/medicines/find/?with=active&&has=id",
                type: "post",
                data: {
                    'name': $("input[name='active_constituent']").val(),
                    'id': $(":input[name='type']").val(),
                    '_token': $('input[name=_token]').val()
                },
                success: function (data) {

                    if (data.length > 0) {
                        var select = $("#medicines_name-field");
                        select.empty();
                        select.append("<option value='-1'>select name</option>")
                        $.each(data, function (i, content) {
                            select.append("<option value='" + content.id + "'>" + content.name + "</option>");
                        });
                    }
                    else {
                        $("#results").text("there is no data");
                    }
                },
            });
        } else {
            $.ajax({
                url: "/medicines/find/?with=active",
                type: "post",
                data: {
                    'name': $("input[name='active_constituent']").val(),
                    '_token': $('input[name=_token]').val()
                },
                success: function (data) {

                    if (data.length > 0) {
                        var select = $("#medicines_name-field");
                        select.empty();
                        select.append("<option value='-1'>select name</option>")
                        $.each(data, function (i, content) {
                            select.append("<option value='" + content.id + "'>" + content.name + "</option>");
                        });
                    }
                    else {
                        $("#results").text("there is no data");
                    }
                },
            });
        }
    })
    $("input[name='duration']").on("blur", function () {
        if (this.value.trim() > 0 && this.value.trim() < 10) {
            $("input[name='duration']").next().hide();

        } else {
            $("input[name='duration']").next().text("enter valid amount").show();

        }
    });
    $("input[name='quantity']").on("blur", function () {
        if (this.value.trim() > 0 && this.value.trim() < 10) {
            $("input[name='quantity']").next().hide();

        } else {
            $("input[name='quantity']").next().text("enter valid amount").show();

        }
    });
    $("input[name='no_times']").on("blur", function () {
        if (this.value.trim() > 0 && this.value.trim() < 10) {
            $("input[name='no_times']").next().hide();

        } else {
            $("input[name='no_times']").next().text("enter valid amount").show();

        }
    });

}