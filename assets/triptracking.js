   var map = infoWindow = latitude = null;
    var markersArray = [];
    $(document).ready(function() {
      t_trip_status = $('#t_trip_status').val();
      if(t_trip_status!='ongoing') {
        if(t_trip_status=='yettostart') {
          $('#msg').html('Trip is yet to start, so tracking not available at this moment..');
        } else if(t_trip_status=='completed') {
          $('#msg').html('Trip completed, so live tracking not available..');
        } else  {
          $('#msg').html('Tracking not available at this moment..');
        }
        $('#myModal').modal('show');
      } else {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
            document.cookie = "maplatitude="+position.coords.latitude;
            document.cookie = "maplongitude="+position.coords.longitude;
         });
        }
          map = new google.maps.Map(document.getElementById("map_canvas"), {
              center : new google.maps.LatLng(52.696361078274485,-111.4453125),
              zoom : 3,
              mapTypeId : 'roadmap',
              gestureHandling: 'greedy'
          });
          console.log(("; "+document.cookie).split("; maplatitude=").pop().split(";").shift());
          infoWindow = new google.maps.InfoWindow;
          livetracking($('#v_id').val());
      }
    });

    function livetracking(id) {
     if(id!='') {
       var path = $('#base').val()+"/api/currentpositions?v_id="+id;
     } 
          $.ajax({
            type: "GET",
            url: path,
            dataType: 'json',
            cache: false,
            success: function (result) {
              if(result.status==1) {
                var j; 
                var markers = result.data;
                var bounds = new google.maps.LatLngBounds();
                resetMarkers(markersArray)
                  for (i = 0; i < markers.length; i++) {
                    var lastupdate = markers[i].time;
                

                    if(markers[i].v_type=='MOTORCYCLE') { 
                       var v_type = fontawesome.markers.MOTORCYCLE;
                    } else if(markers[i].v_type=='BICYCLE') {
                       var v_type = fontawesome.markers.BICYCLE;
                    } else if(markers[i].v_type=='CAR') {
                       var v_type = fontawesome.markers.CAR;
                    } else if(markers[i].v_type=='TRUCK') {
                       var v_type = fontawesome.markers.TRUCK;
                    } else if(markers[i].v_type=='BUS') {
                       var v_type = fontawesome.markers.BUS;
                    }else if(markers[i].v_type=='TAXI') {
                       var v_type = fontawesome.markers.TAXI;
                    }else {
                       var v_type = fontawesome.markers.TRUCK;
                    }
                    var point = new google.maps.LatLng(parseFloat(markers[i].latitude), parseFloat(markers[i].longitude));
                    var html = "<div class=' '><b>" + "Name: </b>" + markers[i].v_name + "<br>" +  "<b>Speed: </b>" + Math.round(markers[i].speed) + " Km/h<br>" + "<b>Updated On: </b>" + lastupdate + "<br></div>";
                    var marker = new google.maps.Marker({
                        map : map,
                        position : point,
                        icon: {
                            path: v_type,
                            scale: 0.4,
                            strokeWeight: 0.2,
                            strokeColor: 'black',
                            strokeOpacity: 2,
                            fillColor: markers[i].v_color,
                            fillOpacity: 1.5,
                        },
                        //BICYCLE,CAR,MOTORCYCLE,TRUCK
                        //shadow : icon
                    });
                    markersArray.push(marker);
                    bindInfoWindow(marker, map, infoWindow, html);
                }
              } else {
                alertmessage(result.message,2);
              }
            },
            error: function (jqXHR, textStatus, errorThrown) {
              alertmessage('Unexpected error.',2);
            }
          });
    }
    function resetMarkers(arr){
        for (var i=0;i<arr.length; i++){
            arr[i].setMap(null);
        }
        arr=[];
    }
    function bindInfoWindow(marker, map, infoWindow, html) {
        google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
        });

    }
  function alertmessage(msg,type) {
    if(type==1) {
        const Toast = Swal.mixin({toast: true,position: 'top',showConfirmButton: false,timer: 5000});
        Toast.fire({
          type: 'success',
          title: msg
        });
    }
    if(type==2) {
         const Toast = Swal.mixin({toast: true,position: 'top',showConfirmButton: false,timer: 5000});
        Toast.fire({
          type: 'error',
          title: msg
        });
    }
}
  

