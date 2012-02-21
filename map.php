<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        
        <style type="text/css">
            html { height: 100% }
            body { height: 100%; margin: 0; padding: 0 }
            #map_canvas { width:500px; height:300px; font-size:11px; }
            #loadme {width:50px;height:20px;background-color:red;}
        </style>
    
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"> </script>
        <script type="text/javascript">
            function initialize(latitude, longitude, info) {
                var myOptions = {
                    center: new google.maps.LatLng(latitude, longitude),
                    zoom: 14,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                
                var stepDisplay = new google.maps.InfoWindow();
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(latitude, longitude),
                    map: map
                });
                
                google.maps.event.addListener(marker, 'click', function() {
                    stepDisplay.setContent(info);
                    stepDisplay.open(map, marker);
                });
            }
            
            $(document).ready(function() {
                $('#loadme').click(function() {
                    var info = '62 Burns Bay Road Lane Cove NSW 2066<br />Phone: (02) 9420 4833<br />Fax: (02) 9428 2805<br /><br />Opening Hours:<br />Monday - Saturday: 07:00 AM - 08:30 PM<br />Sunday: 08:00 AM - 08:00 PM';
                    google.maps.event.addDomListener($('#map_canvas'), 'append', initialize(-33.8147348, 151.1672823, info));
                });
            });
        </script>
    </head>
    
    <body>
        <div id="map_canvas"></div>
        
        <div id="loadme"></div>
    </body>
</html>