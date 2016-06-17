$(function () {


$('body').on('change', '.mveSme', function(event) {
		var newDate = new Date($(this).val());
        newDate.setDate(newDate.getDate() + 1);
        var new_Date= newDate.toISOString().substring(0, 10);
        // console.log(new_Date);
        var old_date=$('.oldDate').data('rowdate').split('+');
        // console.log(old_date[0]);
        // console.log(old_date[1]);
        // console.log("/moveSome_store/"+new_Date+"/"+old_date[0]+"/"+old_date[1]);
        $.ajax
                ({
                    url: "/moveSome_store/"+new_Date+"/"+old_date[0]+"/"+old_date[1],
                    type: 'GET',
                    data: {},
                    success: function (data)
                    {
                    	console.log(data);
                    	$("#gdeed").empty();
                		$("#gdeed").append(data);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });


});

















});