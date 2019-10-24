<meta name="viewport" content="width=device-width,initial-scale=1">
<script src='https://api.mapbox.com/mapbox.js/v3.2.1/mapbox.js'></script>
<link href='https://api.mapbox.com/mapbox.js/v3.2.1/mapbox.css' rel='stylesheet' />



<div id="map" class="small-6 columns" align="center"></div>



<style>
    body {
        margin: 0;
    }
    #map {

        width: 100%;
        height: 60%;
        margin: 0;
    }
    
</style>

<script>
    navigator.geolocation.getCurrentPosition(showPosition);
    
    L.mapbox.accessToken = 'pk.eyJ1IjoidGhvbWFzbTIiLCJhIjoiY2pvZWZjY2ZwMDA0NjNwcGNpaDVmcnExeCJ9.VL9YSAf4gaGpAJ3-tPtJgg';

    var user_icon = L.icon({
        iconUrl: '/I-mSafe/public/marker.svg',
        iconSize: [40],
        iconAnchor: [20, 60]
    });

    var map = L.mapbox.map('map')
        .setView([47, 1], 6)
        .addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/streets-v11')
    );
    
    function showPosition(position) {
        L.marker([position.coords.latitude, position.coords.longitude], {icon: user_icon}).addTo(map).bindPopup("Ma position");
    }

    var xhr = new XMLHttpRequest();
    xhr.open('GET', "/I-mSafe/public/reception_structures.json", true);
    xhr.send();

    xhr.onreadystatechange = processRequest;
 
    function processRequest(e) {
        if (xhr.readyState == 4) {
            var response = JSON.parse(xhr.responseText);

            for (var i = 0; i < Object.keys(response.receptionStructures).length; i++){
                var structure = response.receptionStructures[i];
                L.marker([structure.coordinates.lat, structure.coordinates.lng]).addTo(map).bindPopup("<a href='geo:"+ structure.coordinates.lat + "," + structure.coordinates.lng + "?q=" + structure.name + "'>" + structure.name + "</a> <br> Capacité de " + structure.capacity + " personnes");
            }
        }
    }
</script>
