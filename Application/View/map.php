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
    navigator.geolocation.getCurrentPosition(placeMarkers);

    function placeMarkers(position) {
        L.marker([position.coords.latitude, position.coords.longitude], {icon: user_icon}).addTo(map).bindPopup("Ma position");
        
        place_reception_structures(position.coords)
        place_pharmacies(position.coords)
    }

    
    L.mapbox.accessToken = 'pk.eyJ1IjoidGhvbWFzbTIiLCJhIjoiY2pvZWZjY2ZwMDA0NjNwcGNpaDVmcnExeCJ9.VL9YSAf4gaGpAJ3-tPtJgg';

    var user_icon = L.icon({
        iconUrl: '/I-mSafe/public/marker.svg',
        iconSize: [40],
        iconAnchor: [20, 60]
    });

    var map = L.mapbox.map('map')
        .setView([49.435, 1.1], 13)
        .addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/streets-v11')
    );
    
    // placeMarkers()
    
    // Reception structures markers placement
    function place_reception_structures(coordinates) {
        var reception_structures = new XMLHttpRequest();
        reception_structures.open('GET', "/I-mSafe/public/reception_structures.json", true);
        reception_structures.send();
        reception_structures.onreadystatechange = processRequest;
        function processRequest(e) {
            if (reception_structures.readyState == 4) {
                var response = JSON.parse(reception_structures.responseText);

                for (var i = 0; i < Object.keys(response.receptionStructures).length; i++){
                    var structure = response.receptionStructures[i];
                    
                    let max_lat_distance = 0.00909090909090909
                    let max_lng_distance = 0.009009009009009009

                    let result = filter_distance(coordinates.latitude, coordinates.longitude, structure.coordinates.lat, structure.coordinates.lng, max_lng_distance, max_lat_distance)
                    if (result == false) { continue; }
                    L.marker([structure.coordinates.lat, structure.coordinates.lng]).addTo(map).bindPopup("<a href='geo:"+ structure.coordinates.lat + "," + structure.coordinates.lng + "?q=" + structure.name + "'>" + structure.name + "</a> <br> Capacité de " + structure.capacity + " personnes");
                }
            }
        }
    }
    
    // Pharmacies markers placement
    function place_pharmacies(coordinates) {
        var pharmacies = new XMLHttpRequest();
        pharmacies.open('GET', "/I-mSafe/public/pharmacies.json", true);
        pharmacies.send();
        pharmacies.onreadystatechange = processRequest;
        function processRequest(e) {
            if (pharmacies.readyState == 4) {
                var response = JSON.parse(pharmacies.responseText);
                
                for (var i = 0; i < response.length; i++){
                    var pharmacy = response[i];

                    let max_lat_distance = 0.00909090909090909
                    let max_lng_distance = 0.009009009009009009

                    let result = filter_distance(coordinates.latitude, coordinates.longitude, pharmacy.fields.coordinates[1], pharmacy.fields.coordinates[0], max_lng_distance, max_lat_distance)
                    if (result == false) { continue; }
                    
                    L.marker([pharmacy.fields.coordinates[1], pharmacy.fields.coordinates[0]]).addTo(map).bindPopup("<a href='geo:"+ pharmacy.fields.coordinates[1] + "," + pharmacy.fields.coordinates[0] + "?q=" + pharmacy.name + "'>" + pharmacy.name + "</a>");
                }
            }
        }
    }

    function filter_distance(place1_lat, place1_lng, place2_lat, place2_lng, max_lng_distance, max_lat_distance) {
        let ok = true
        console.log('LAT DIFF')
        console.log(Math.abs(place1_lat - place2_lat))

        console.log('LNG DIFF')
        console.log(Math.abs(place1_lng - place2_lng))
        if (Math.abs(place1_lat - place2_lat) > max_lat_distance) { 
            ok = false
        }
        if (Math.abs(place1_lng - place2_lng) > max_lng_distance) { 
            ok = false
        }
        return ok
    }
    
</script>
