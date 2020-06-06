<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Info Window With maxWidth</title>
    <style>
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
        #map {
            height: 100%;
        }

        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div id="map"></div>
    <script>
        // This example displays a marker at the center of Australia.
      // When the user clicks the marker, an info window opens.
      // The maximum width of the info window is set to 200 pixels.
    // In the following example, markers appear when the user clicks on the map.
    // Each marker is labeled with a single alphabetical character.
    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var labelIndex = 0;

      function initMap() {
        var uluru = {lat: 10.0310, lng: 105.7689};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: uluru,
          
        });

        // var contentString = '<div id="content">'+
        //     '<div id="siteNotice">'+
        //     '</div>'+
        //     '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
        //     '<div id="bodyContent">'+
        //     'Heritage Site.</p>'+
        //     '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
        //     'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
        //     '(last visited June 22, 2009).</p>'+
        //     '</div>'+
        //     '</div>';

            // lat:10.6231551
            // lng: 105.215886
        addMarker({
        coords: {lat:10.6231016 ,lng:105.2158663},
        iconImage: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
        content: '<div id="content">'+
            '<div id="siteNotice">'+
                '</div>'+
            '<h1 id="firstHeading" class="firstHeading">My Hometown</h1>'+
            '<div id="bodyContent">'+
                '<p><b>Địa chỉ:</b>Khu II, đường 3/2, P. Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ.' +
                    '<p><b>Fax:</b>(84-292) 3838474' +
                        '<p><b>Hotline:</b>(84-292) 3832663' +
                            '</div>'

            });
        addMarker({
            coords: {lat:10.0310 ,lng:105.7689},
            iconImage: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
            content: '<div id="content">'+
                '<div id="siteNotice">'+
                    '</div>'+
                '<h1 id="firstHeading" class="firstHeading">Đại học Cần Thơ</h1>'+
                '<div id="bodyContent">'+
                    '<p><b>Địa chỉ:</b>Khu II, đường 3/2, P. Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ.' +
                    '<p><b>Fax:</b>(84-292) 3838474' +
                    '<p><b>Hotline:</b>(84-292) 3832663' +
                '</div>'
            
        });
        addMarker({
        coords: {lat:10.0341 ,lng:105.7860},
        iconImage: '',
        content: '<div id="content">'+
            '<div id="siteNotice">'+
                '</div>'+
            '<h1 id="firstHeading" class="firstHeading">CGV Sense City</h1>'+
            '<div id="bodyContent">'+
                '<p><b>Địa chỉ:</b>Tầng 7 | Hùng Vương Plaza 126 Hùng Vương Quận 5 Tp. Hồ Chí Minh' +
                    '<p><b>Fax:</b>+84 4 6 275 5240' +
                        '<p><b>Hotline:</b>1900 6017' +
                            '</div>'
        
            });
        addMarker({
        coords: {lat:10.0454 ,lng:105.7796},
        iconImage: '',
        content: '<div id="content">'+
            '<div id="siteNotice">'+
                '</div>'+
            '<h1 id="firstHeading" class="firstHeading">CGV Vincom Hùng Vương</h1>'+
            '<div id="bodyContent">'+
                '<p><b>Địa chỉ:</b>Tầng 7 | Hùng Vương Plaza 126 Hùng Vương Quận 5 Tp. Hồ Chí Minh' +
                    '<p><b>Fax:</b>+84 4 6 275 5240' +
                        '<p><b>Hotline:</b>1900 6017' +
                            '</div>'
        
            });

        addMarker({
        coords: {lat:10.3717 ,lng:105.4323},
        iconImage: '',
        content: '<div id="content">'+
            '<div id="siteNotice">'+
                '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Đại học An Giang</h1>'+
            '<div id="bodyContent">'+
                '<p><b>Địa chỉ:</b>Khu II, đường 3/2, P. Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ.' +
                    '<p><b>Fax:</b>(84-292) 3838474' +
                        '<p><b>Hotline:</b>(84-292) 3832663' +
                            '</div>'
        });
        addMarker({
        coords: {lat:10.7561 ,lng:106.6630},
        iconImage: '',
        content: '<div id="content">'+
            '<div id="siteNotice">'+
                '</div>'+
            '<h1 id="firstHeading" class="firstHeading">CGV Hùng Vương Plaza</h1>'+
            '<div id="bodyContent">'+
                '<p><b>Địa chỉ:</b>Tầng 7 | Hùng Vương Plaza 126 Hùng Vương Quận 5 Tp. Hồ Chí Minh' +
                    '<p><b>Fax:</b>+84 4 6 275 5240' +
                        '<p><b>Hotline:</b>1900 6017' +
                            '</div>'
        
        });
        addMarker({
        coords: {lat:10.7987 ,lng:106.6601},
        iconImage: '',
        content: '<div id="content">'+
            '<div id="siteNotice">'+
                '</div>'+
            '<h1 id="firstHeading" class="firstHeading">CGV Hoàn Văn Thụ</h1>'+
            '<div id="bodyContent">'+
                '<p><b>Địa chỉ:</b>Tầng 7 | Hùng Vương Plaza 126 Hùng Vương Quận 5 Tp. Hồ Chí Minh' +
                    '<p><b>Fax:</b>+84 4 6 275 5240' +
                        '<p><b>Hotline:</b>1900 6017' +
                            '</div>'
        
        });
        addMarker({
        coords: {lat:10.7705 ,lng:106.6698},
        iconImage: '',
        content: '<div id="content">'+
            '<div id="siteNotice">'+
                '</div>'+
            '<h1 id="firstHeading" class="firstHeading">CGV Sư Vạn Hạnh</h1>'+
            '<div id="bodyContent">'+
                '<p><b>Địa chỉ:</b>Tầng 7 | Hùng Vương Plaza 126 Hùng Vương Quận 5 Tp. Hồ Chí Minh' +
                    '<p><b>Fax:</b>+84 4 6 275 5240' +
                        '<p><b>Hotline:</b>1900 6017' +
                            '</div>'
        
        });
        addMarker({
        coords: {lat:10.7427 ,lng:106.6120},
        iconImage: '',
        content: '<div id="content">'+
            '<div id="siteNotice">'+
                '</div>'+
            '<h1 id="firstHeading" class="firstHeading">CGV Bình Tân</h1>'+
            '<div id="bodyContent">'+
                '<p><b>Địa chỉ:</b>Tầng 7 | Hùng Vương Plaza 126 Hùng Vương Quận 5 Tp. Hồ Chí Minh' +
                    '<p><b>Fax:</b>+84 4 6 275 5240' +
                        '<p><b>Hotline:</b>1900 6017' +
                            '</div>'
        
        });
        addMarker({
        coords: {lat:10.4562 ,lng:105.6338},
        iconImage: '',
        content: '<div id="content">'+
            '<div id="siteNotice">'+
                '</div>'+
            '<h1 id="firstHeading" class="firstHeading">CGV Vincom Cao Lãnh</h1>'+
            '<div id="bodyContent">'+
                '<p><b>Địa chỉ:</b>Tầng 7 | Hùng Vương Plaza 126 Hùng Vương Quận 5 Tp. Hồ Chí Minh' +
                    '<p><b>Fax:</b>+84 4 6 275 5240' +
                        '<p><b>Hotline:</b>1900 6017' +
                            '</div>'
        
            });
        addMarker({
        coords: {lat:10.0033 ,lng:105.0811},
        iconImage: '',
        content: '<div id="content">'+
            '<div id="siteNotice">'+
                '</div>'+
            '<h1 id="firstHeading" class="firstHeading">CGV Vincom Rạch Gía</h1>'+
            '<div id="bodyContent">'+
                '<p><b>Địa chỉ:</b>Tầng 7 | Hùng Vương Plaza 126 Hùng Vương Quận 5 Tp. Hồ Chí Minh' +
                    '<p><b>Fax:</b>+84 4 6 275 5240' +
                        '<p><b>Hotline:</b>1900 6017' +
                            '</div>'
        
            });
        function addMarker(props) {
            var marker = new google.maps.Marker({
                position: props.coords,
                draggable: true,
                animation: google.maps.Animation.DROP,
                map: map,
                title: 'Click to seen content',
                label: labels[labelIndex++ % labels.length],
            });

            // Check show iconImage of marker
            if(props.iconImage) {
                marker.setIcon(props.iconImage);
            }

            // Show content of marker
            if(props.content) {
                var infowindow = new google.maps.InfoWindow({
                    content: props.content,
                    maxWidth: 200
                });
                // Click to seen content
                    marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });
            }
           

            // Animation marker
            function toggleBounce() {
                if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
                } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
                }
            }
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXlfkgqUzOhWcGbhI8gQdhOWcT3vZ4YsQ&callback=initMap&language=vn&region=VN" async
        defer>
    </script>
</body>

</html>