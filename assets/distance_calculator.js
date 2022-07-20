(function($){ 
'use strict';
 google.maps.event.addDomListener(window, 'load', function () {
            var googleplaces = new google.maps.places.Autocomplete(document.getElementById('t_trip_fromlocation'));
            google.maps.event.addListener(googleplaces, 'place_changed', function () {
                var place = googleplaces.getPlace();
                var latitudes = place.geometry.location.lat();
                var longitudes = place.geometry.location.lng();
                document.getElementById("t_trip_fromlat").value = latitudes;
                document.getElementById("t_trip_fromlog").value = longitudes;
            });
            var places = new google.maps.places.Autocomplete(document.getElementById('t_trip_tolocation'));
            google.maps.event.addListener(places, 'place_changed', function () {
                var toplace = places.getPlace();
                var latitude = toplace.geometry.location.lat();
                var longitude = toplace.geometry.location.lng();
                document.getElementById("t_trip_tolat").value = latitude;
                document.getElementById("t_trip_tolog").value = longitude;
                distance(document.getElementById("t_trip_fromlat").value, document.getElementById("t_trip_fromlog").value, latitude, longitude, 'K');
            });
        });
        function distance(lat1, lon1, lat2, lon2, unit) {
        if ((lat1 == lat2) && (lon1 == lon2)) {
          return 0;
        }
        else {
          var radlat1 = Math.PI * lat1/180;
          var radlat2 = Math.PI * lat2/180;
          var theta = lon1-lon2;
          var radtheta = Math.PI * theta/180;
          var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
          if (dist > 1) {
            dist = 1;
          }
          dist = Math.acos(dist);
          dist = dist * 180/Math.PI;
          dist = dist * 60 * 1.1515;
          if (unit=="K") { dist = dist * 1.609344 }
          if (unit=="N") { dist = dist * 0.8684 }
           document.getElementById("t_totaldistance").value =  Math.round(dist);
        }
      }
})(jQuery);