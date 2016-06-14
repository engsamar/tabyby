$(function () {

    $("#name-field").keyup(function (e) {
        e.preventDefault();
    
        var serchKy = $('#name-field').val();
        console.log(serchKy);
        $.ajax
                ({
                    url: "/reservations/searchKey/" + serchKy,
                    type: 'GET',
                    data: {},
                    success: function (data)
                    {
                        console.log(data);
                        
                        var datalist = $("#searchResult");
                        datalist.empty();
                        $.each(data, function (i, content) {
                            datalist.append("<option data-value='"+content.id+"' value='"+content.username+"'>");
                        });
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });

    });







})