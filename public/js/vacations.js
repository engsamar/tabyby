$(document).ready()
{

	$("#from").change(function (e) {
        var fromTime = new Date($('#from').val());
        fromTime.setDate(fromTime.getDate() + 1);
        var fromtim= fromTime.toISOString().substring(0, 10);
        $("#to").change(function (e) {
        	var toTime = new Date($('#to').val());
        	toTime.setDate(toTime.getDate() + 1);
        	var totim= toTime.toISOString().substring(0, 10);

        	console.log(fromtim);
			console.log(totim);

			var myDiv=document.getElementById('movePatients');
			var myDiv1=document.getElementById('moveAll');
			var myDiv2=document.getElementById('moveSome');

			$.ajax
                ({
                    url: "/movePatients/"+fromtim+"/"+totim,
                    type: 'GET',
                    data: {},
                    success: function (data)
                    {
                        console.log(data);
                        result=JSON.parse(data);
                        console.log(result.reserve_array);
                        var HTMLtxt='<table class="table table-responsive table-bordered ">';
						HTMLtxt+='<thead><tr>';
						HTMLtxt+='<th>no of patients</th>';
						HTMLtxt+='<th>day date</th>';
						HTMLtxt+='<th>Move </th>';
						HTMLtxt+='</tr></thead>';
						$.each(result.reserve_array,function(index, el) {
							HTMLtxt+='<tr>';
							HTMLtxt+='<td> '+ el+' </td>';
							HTMLtxt+='<td> '+ result.date_array[index] +'</td>';
							HTMLtxt+='<td><button id="allPat" class="btn btn-primary">Move All</button>';
							HTMLtxt+='<button  id="somePat" class="btn btn-danger ">Move Some</button></td>';
							HTMLtxt+='</tr>';
						});

						HTMLtxt += '</table>';
		 				myDiv.innerHTML = HTMLtxt;

                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
		
	});
	});















}