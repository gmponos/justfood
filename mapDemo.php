<html>
    <head>
        <style type="text/css">
            div#map {
                position: relative;
            }

            div#crosshair {
                position: absolute;
                top: 192px;
                height: 19px;
                width: 19px;
                left: 50%;
                margin-left: -8px;
                display: block;
                background: url(crosshair.gif);
                background-position: center center;
                background-repeat: no-repeat;
            }
        </style>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript">
            var map;
            var geocoder;
            var centerChangedLast;
            var reverseGeocodedLast;
            var currentReverseGeocodeResponse;

            function initialize() {
                var latlng = new google.maps.LatLng(18.524220910029783,73.85761860000002);
                var myOptions = {
                    zoom: 10,
                    center: latlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                geocoder = new google.maps.Geocoder();

                var marker = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    title: "Hello World!"
                });

            }

        </script>
    </head>
    <body onload="initialize()">
        <div id="map" style="width:200px; height:200px">
            <div id="map_canvas" style="width:100%; height:200px"></div>
            <div id="crosshair"></div>
        </div>


    </body>
</html>
<?php 
//Three parts to the querystring: q is address, output is the format, key is the GAPI key
$key = "AIzaSyCH6WASz_uUC5cZ7yroF6MuHEvV4affsIU";
$address = urlencode("Arionos 10, Athens, Kentrikos Tomeas Athinon, Greece");
 
//If you want an extended data set, change the output to "xml" instead of csv
$url = "http://maps.google.com/maps/geo?q=".$address."&output=csv&key=".$key;
//Set up a CURL request, telling it not to spit back headers, and to throw out a user agent.
$ch = curl_init();
 
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER,0); //Change this to a 1 to return headers
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
$data = curl_exec($ch);
curl_close($ch);
 
echo "Data: ". $data;
?>