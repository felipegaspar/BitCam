<?php

require_once("load.php");

$cod = array(
	"latitude" => "-23.57418",
	"longitude" => "-46.623126"
);

$locais = $Instagram->getLocation($cod);


?>

<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>BitCam</title> 
  <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.1.min.js"></script>
</head> 
<body>
  <div id="map" style="width: 800px; height: 600px;"></div>

  <script type="text/javascript">
  
    var locations = [
      <?php
      for($k = 1; $k<count($locais); $k++) {
        $var = explode("|",$locais[$k]);
        echo '[\'<a href="local.php?code='.$var[3].'"  target="_blank"><h4>'.htmlspecialchars($var[0], ENT_QUOTES).'</h4></a>\','.$var[1].','.$var[2].', 1]';
        if($k != count($locais)-1)
          echo ",\n";
      }
      ?>
    ];
    
    var iconURLPrefix = 'http://maps.google.com/mapfiles/ms/icons/';
    
    var icons = [
      iconURLPrefix + 'red-dot.png',
      iconURLPrefix + 'green-dot.png',
      iconURLPrefix + 'blue-dot.png',
      iconURLPrefix + 'orange-dot.png',
      iconURLPrefix + 'purple-dot.png',
      iconURLPrefix + 'pink-dot.png',      
      iconURLPrefix + 'yellow-dot.png'
    ]
    var icons_length = icons.length;
    
    
    var shadow = {
      anchor: new google.maps.Point(15,33),
      url: iconURLPrefix + 'msmarker.shadow.png'
    };

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 23,
      center: new google.maps.LatLng(<?php echo $cod["latitude"]?>, <?php echo $cod["longitude"]?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      mapTypeControl: false,
      streetViewControl: false,
      panControl: false,
      zoomControlOptions: {
         position: google.maps.ControlPosition.LEFT_BOTTOM
      }
    });

    var infowindow = new google.maps.InfoWindow({
      maxWidth: 160
    });

    var marker;
    var markers = new Array();
    
    var iconCounter = 0;
    
  
    for (var i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        icon : icons[locations[i][3]],
        shadow: shadow
      });

      markers.push(marker);

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
      
      iconCounter++;
     
      if(iconCounter >= icons_length){
        iconCounter = 0;
      }
    }

    function AutoCenter() {
      
      var bounds = new google.maps.LatLngBounds();
     
      $.each(markers, function (index, marker) {
        bounds.extend(marker.position);
      });
     
      map.fitBounds(bounds);
    }
    AutoCenter();
  </script> 
</body>
</html>
