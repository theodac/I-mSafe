<script src='https://api.mapbox.com/mapbox.js/v3.2.1/mapbox.js'></script>
<link href='https://api.mapbox.com/mapbox.js/v3.2.1/mapbox.css' rel='stylesheet' />

<div id="map"></div>

<style>
    body {
        margin: 0;
    }
    #map {
        width: 100vw;
        height: 100vh;
        margin: 0;
    }
    
</style>

<script>
    navigator.geolocation.getCurrentPosition(showPosition);
    
    L.mapbox.accessToken = 'pk.eyJ1IjoidGhvbWFzbTIiLCJhIjoiY2pvZWZjY2ZwMDA0NjNwcGNpaDVmcnExeCJ9.VL9YSAf4gaGpAJ3-tPtJgg';

    var user_icon = L.icon({
        iconUrl: '/public/marker.svg',
        iconSize: [40],
        iconAnchor: [20, 60]
    });

    var map = L.mapbox.map('map')
        .setView([47, 1], 6)
        .addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/streets-v11'));
        
    for (let i = 0; i < 10; i++) {
        L.marker([(Math.random() * 6 + 43), (Math.random() * 5 + 0.4)]).addTo(map).bindPopup("Mon point n°" + i);
    }

    function showPosition(position) {
        L.marker([position.coords.latitude, position.coords.longitude], {icon: user_icon}).addTo(map).bindPopup("Ma position");
    }

</script>
