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

			var myDiv=document.getElementById('movePatients');
			var myDiv2=document.getElementById('moveSome');
			$.ajax
                ({
                    url: "/movePatients/"+fromtim+"/"+totim,
                    type: 'GET',
                    data: {},
                    success: function (data)
                    {
        				$('#movePatients').show();
                        result=JSON.parse(data);
                        var HTMLtxt='<table class="table table-responsive table-bordered ">';
            						HTMLtxt+='<thead><tr>';
            						HTMLtxt+='<th>no of patients</th>';
            						HTMLtxt+='<th>day date</th>';
            						HTMLtxt+='<th>Move All</th>';
            						HTMLtxt+='<th>Move Some</th>';
            						HTMLtxt+='</tr></thead>';
            						$.each(result.reserve_array,function(index, el) {
            							HTMLtxt+='<tr>';
            							HTMLtxt+='<td> '+ el+' </td>';
            							HTMLtxt+='<td> '+ result.date_array[index] +'</td>';
            							HTMLtxt+='<td><input type="button" id="allPat" data-rowdate="'+result.date_array[index]+'" class="btn btn-primary move2 "  value="Move All"/>';
            							HTMLtxt+='<td><a href="/moveSome_Patients/'+result.date_array[index]+' " id="somePat" class="btn btn-info "  value="'+result.date_array[index]+'">Move Some</a>';
            							HTMLtxt+='</td></tr>';
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


$('body').on('click', '.move2', function(event) 
{
		var newDiv=document.getElementById('moveAll');
		$("#moveAll").show();
		var old_date=$(this).data('rowdate');
		console.log('********************************');
		// $.ajax
  //           ({
  //               url: "/specificDate",
  //               type: 'GET',
  //               data: {},
  //               success: function (data)
  //               {
  //               	// console.log(data);
  //               	// preventDate(data);
  //               },
  //               error: function (data) {
  //                   console.log('Error:', data);
  //               }
  //           });

        $("#move").change(function (e) {
        	$('#movePatients').hide();
	        var moveTime = new Date($('#move').val());
	        moveTime.setDate(moveTime.getDate() + 1);
	        var new_date= moveTime.toISOString().substring(0, 10);
	        // console.log(old_date);
	        // console.log(new_date);   	
        $.ajax
            ({
                url: "/MoveAllPatients/"+old_date+"/"+new_date+"/",
                type: 'GET',
                data: {},
                success: function (data)
                {
                	console.log(data);
                	$("#moveAll").empty();
                	$("#moveAll").append(data);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
	});
});




	





}