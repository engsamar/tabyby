/**
 * Created by mostafa on 19/06/16.
 */
$(document).ready(function () {
    if ($("#data").data!=0){
var locations=$("#data").text().split(",");
        var myCenter=new google.maps.LatLng(locations[0],locations[1]);
        var marker;
        function initialize()
        {
            var mapProp = {
                center:myCenter,
                zoom:20,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };

            var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
    var marker=new google.maps.Marker({
        position:myCenter,
        animation:google.maps.Animation.BOUNCE
    });
            marker.setMap(map);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    }
});
