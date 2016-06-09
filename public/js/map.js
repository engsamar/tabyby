/**
 * Created by mostafa on 09/06/16.
 */
$(document).ready(function () {
    function initialize() {
        var map;
        var poly;
        var path;

        // Put all locations into array
        var locations = [
            [0, 1],
            [30, 20]
        ];
        for (i = 0; i < locations.length; i++) {
            if (i == 0) {
                // Initialise the map
                var map_options = {
                    center: new google.maps.LatLng(locations[0][0], locations[0][1]),
                    //position: new google.maps.LatLng(locations[i][0], locations[i][1]),
                    zoom: 10,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                map = new google.maps.Map($("#map"), map_options);
                poly = new google.maps.Polyline({
                    strokeColor: '#FFCCFF',
                    strokeOpacity: 2.0,
                    strokeWeight: 10,
                    map: map
                });
                path = poly.getPath();
            }

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][0], locations[i][1]),
                //center:location,
                map: map,
                icon: 'jeep.png'
                //animation:google.maps.Animation.BOUNCE
            });

            path.push(new google.maps.LatLng(locations[i][0], locations[i][1]));
        }

    }
});