$(function () {


$('body').on('change', '.mveSme', function(event) {
		var newDate = new Date($(this).val());
        newDate.setDate(newDate.getDate() + 1);
        var new_Date= newDate.toISOString().substring(0, 10);
        var old_date=$(this).data('rowdate').split('+');
		var myDiv=document.getElementById('ajaxaData');
       	 $.ajax
                ({
                    url: "/moveSome_store/"+new_Date+"/"+old_date[0]+"/"+old_date[1],
                    type: 'GET',
                    data: {},
                    success: function (data)
                    {
                        console.log(data);
						var HTMLtxt="<input  id='returnedData' value='"+data+"'/>";
						myDiv.innerHTML = HTMLtxt;
                		$('#string'+old_date[1]).prop("readonly", true);
						$('#string'+old_date[1]).val(data);
                		
                        // window.location.href = "/moveSome_Patients/"+old_date[0];
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });

});


             















});