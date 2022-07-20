         
         Number.prototype.toKmH = function() {
          return Math.round(this * 3600 / 10) / 100;
         };

         var hisinfowindow = null; 
         var hismap = null;
         var hiszoomlevel = 15;
         var hismarkersArray = [];
     
         function clearOverlays() {
           for (var i = 0; i < hismarkersArray.length; i++ ) {
            hismarkersArray[i].setMap(null);
           }
         }
         $("#track").on("submit", function(e){ 
         if($('#t_vechicle').val()=='') {
          return;
         }
          e.preventDefault();
          var hismyLatlng = new google.maps.LatLng(52.696361078274485,-111.4453125);
          var hisOptions = {
            zoom : hiszoomlevel,
            center : hismyLatlng,
            mapTypeId : google.maps.MapTypeId.ROADMAP,
            scrollwheel: true,
            gestureHandling: 'cooperative'
          }
          hismap = new google.maps.Map(document.getElementById("map_canvas"),hisOptions);
    
          hisinfowindow = new google.maps.InfoWindow;
          hiszoomlevel=hismap.getZoom();
          clearOverlays();
      
            var path = $('#base').val();
            $.ajax({
            type: "post",
            data: $("#track").serialize(),
            url: path+"/api/positions",
            dataType: 'json',
            success: function (result) {
              var locations = result;
              var flightPlanCoordinates = [];
              if(locations.data.length>=1) {
              var bounds = new google.maps.LatLngBounds();
              console.log(locations.data);
                  for (i = 0; i < locations.data.length; i++) {
                    marker = new google.maps.Marker({
                      position: new google.maps.LatLng(locations.data[i].latitude, locations.data[i].longitude),
                      map: hismap,
                    });
                    marker.setAnimation(null);

                     if (i == 0) { marker.setIcon('assets/marker/marker-green.png'); }
                      else if (i == (locations.data.length-1)) {marker.setIcon('assets/marker/marker-red.png'); }
                      else { marker.setIcon('assets/marker/marker-white.png');  }
                      
                    flightPlanCoordinates.push(marker.getPosition());
                    bounds.extend(marker.position);
                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                      var datetime=locations.data[i].time;
                      var speed=parseInt(locations.data[i].speed);
                      var comment=locations.data[i].comment;
                      return function () { 
                        hisinfowindow.setContent('<div><br><b>Speed :</b>'+ speed +' km/hr<br><b>Time:</b> '+datetime+'<br></div>');
                        hisinfowindow.open(hismap, marker);
                      }
                    })(marker, i));
                  }
              } else {
                alertmessage(' No data to show in map',2);
                return;
              }
              hismap.fitBounds(bounds);
              var flightPath = new google.maps.Polyline({
                map: hismap,
                path: flightPlanCoordinates,
                strokeColor: "#61EA1aD",
                strokeOpacity: 0.8,
                strokeWeight: 2
              });
            },
            error: function (jqXHR, textStatus, errorThrown) {
              console.log('Unexpected error.');
            }
          });
          });
         