let API = `https://api-adresse.data.gouv.fr/search/?q=`;
let long = "";
let lat = "";

window.addEventListener('DOMContentLoaded', (event) => {
    this.init();
});


init = () => {
    window.map = new L.Map('map').setView([48.833, 2.333], 7);
    this.setMap(); 
}

 setMap = () => {
    let osmLayer = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors',
        maxZoom: 19
    });
    map.addLayer(osmLayer);
}

getCoord = () => {
    let coord_from_input = document.getElementById("citycode").value;
    coord_from_input !== "" ? this.callApi(coord_from_input) : false;    
}

callApi = (clientCoord) => {
    let client = new HttpClient();
    client.get(`${API}${clientCoord}`, (response) => {
        // long !== "" ? map.removeLayer([long, lat]) : "";
        let res = JSON.parse(response);
        if(res.features.length !== 0){
            document.getElementById('err').innerHTML = "";
            lat = res.features[0].geometry.coordinates[0];
            long = res.features[0].geometry.coordinates[1];
            L.marker([long, lat]).addTo(map).bindTooltip(`${res.features[0].properties.city}`, {permanent: true, direction: 'top'});
        } else {
            document.getElementById('err').innerHTML = "Mauvais code";
        }
    });
}

let HttpClient = function(){
    this.get = (aUrl, aCallback) =>
     {
        let anHttpRequest = new XMLHttpRequest();
        anHttpRequest.onreadystatechange = function() { 
            if (anHttpRequest.readyState == 4 && anHttpRequest.status == 200)
                aCallback(anHttpRequest.responseText);
        }
        anHttpRequest.open( "GET", aUrl, true );            
        anHttpRequest.send( null );
    }
}