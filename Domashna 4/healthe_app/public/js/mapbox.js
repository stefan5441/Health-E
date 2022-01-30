mapboxgl.accessToken = 'pk.eyJ1Ijoic3RlZmFuZGlhbnMiLCJhIjoiY2t4aHAwZWg2MnVjeTMwbzFtam54enpqYiJ9.B264t4XyHpD9f0t-sSooMQ';
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [21.4254, 41.9981],
    zoom: 12
});

function addMarker(lng, lat){
    const marker = new mapboxgl.Marker()
        .setLngLat([lng, lat])
        .addTo(map);
}

function myLocation(){
    navigator.geolocation.getCurrentPosition(successLocation, errorLocation, {enableHighAccuracy: true });
}

function successLocation(position){
    const myMarker = new mapboxgl.Marker({
        color: "#dd0000"
    }).setLngLat([position.coords.longitude, position.coords.latitude]).addTo(map);
}

function errorLocation(){
    alert("You must enable location for this option.")
}