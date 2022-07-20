   var map = infoWindow = latitude = null;
    var markersArray = [];
    window.onload = function() {

      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
          document.cookie = "latitude="+position.coords.latitude;
          document.cookie = "longitude="+position.coords.longitude;
       });
      }
        map = new google.maps.Map(document.getElementById("map_canvas"), {
            center : new google.maps.LatLng(52.696361078274485,-111.4453125),
            zoom : 3,
            mapTypeId : 'roadmap',
            gestureHandling: 'greedy'
        });
        infoWindow = new google.maps.InfoWindow;
        livetracking();
        window.setInterval(livetracking, 15000);
    };

    function livetracking() {
     if($("#group").attr("data-name")!=0) {
       var path = $('#base').val()+"/api/currentpositions?gr="+$("#group").attr("data-name");
     } else {
       var path = $('#base').val()+"/api/currentpositions";
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
              console.log('Unexpected error.');
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
                $.toast({
                    heading: 'Success',
                    text: msg,
                    icon: 'info',
                    loader: true, 
                    position: 'top-center',      
                    loaderBg: '#2196f3',
                    afterHidden: function () {
                            location.reload();
                    }, 
                });
                
            }
            if(type==2) {
                $.toast({
                    heading: 'Error',
                    text: msg,
                    icon: 'error',
                    loader: true, 
                    position: 'top-center',
                    loaderBg: '#f44336',      
                });
            }

        }
  

