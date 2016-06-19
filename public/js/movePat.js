$(function () {

var i=0;
$('body').on('change', '.mveSme', function(event) {
		var newDate = new Date($(this).val());
        newDate.setDate(newDate.getDate() + 1);
        var new_Date= newDate.toISOString().substring(0, 10);
        var old_date=$(this).data('rowdate').split('+');
		var myDiv=document.getElementById('ajaxaData');
		arrLen=old_date[2];
		
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
							i++;
							console.log(i);
							if(i>=arrLen)
							{
								window.location.href = "/vacations/create";
							}
	                        
	                    },
	                    error: function (data) {
	                        console.log('Error:', data);
	                    }
	                });


});


             















});