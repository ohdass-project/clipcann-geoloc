window.addEventListener('DOMContentLoaded', (event) => {

    var map = L.map('map').setView([48.833, 2.333], 7); // LIGNE 14

    var osmLayer = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', { // LIGNE 16
        attribution: '© OpenStreetMap contributors',
        maxZoom: 19
    });

    map.addLayer(osmLayer);

    console.log('clipcann loaded');
});
