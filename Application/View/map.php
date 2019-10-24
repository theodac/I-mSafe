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
        iconUrl: '/ImSafe/public/marker.svg',
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

    place_reception_structures()
    place_pharmacies()

    // Reception structures markers placement
    function place_reception_structures() {
        var reception_structures = new XMLHttpRequest();
        reception_structures.open('GET', "/ImSafe/public/reception_structures.json", true);
        reception_structures.send();
        reception_structures.onreadystatechange = processRequest;
        function processRequest(e) {
            if (reception_structures.readyState == 4) {
                var response = JSON.parse(reception_structures.responseText);

                for (var i = 0; i < Object.keys(response.receptionStructures).length; i++){
                    var structure = response.receptionStructures[i];
                    var nbr = <?= $_SESSION['number']; ?> ;

                    L.marker([structure.coordinates.lat, structure.coordinates.lng]).addTo(map).bindPopup("<a href='geo:"+ structure.coordinates.lat + "," + structure.coordinates.lng + "?q=" + structure.name + "'>" + structure.name + "</a> <br> Capacité de " + structure.capacity + " personnes <a href=\"?person=" + nbr + "&phone=" + structure.phone+ " \" >Click here to text us!</a>");
                }
            }
        }
    }

    // Pharmacies markers placement
    function place_pharmacies() {
        var pharmacies = new XMLHttpRequest();
        pharmacies.open('GET', "/ImSafe/public/pharmacies.json", true);
        pharmacies.send();
        pharmacies.onreadystatechange = processRequest;
        function processRequest(e) {
            if (pharmacies.readyState == 4) {
                var response = JSON.parse(pharmacies.responseText);

                for (var i = 0; i < response.length; i++){
                    var pharmacy = response[i];
                    L.marker([pharmacy.fields.coordinates[1], pharmacy.fields.coordinates[0]]).addTo(map).bindPopup("<a href='geo:"+ pharmacy.fields.coordinates[1] + "," + pharmacy.fields.coordinates[0] + "?q=" + pharmacy.name + "'>" + pharmacy.name + "</a>  ");
                }
            }
        }
    }

</script>
