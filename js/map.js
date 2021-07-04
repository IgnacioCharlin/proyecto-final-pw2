var lat;
var lon;
(function solicitarPermisos(){
    var content = document.getElementById("geolocation-test");
    if (navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition(function(objPosition)
        {
            lon = objPosition.coords.longitude;
            lat = objPosition.coords.latitude;
            document.getElementById("coordenadas").value = lat + " " + lon;

        }, function(objPositionError)
        {
            switch (objPositionError.code)
            {
                case objPositionError.PERMISSION_DENIED:
                    content.innerHTML = "No se ha permitido el acceso a la posición del usuario.";
                    break;
                case objPositionError.POSITION_UNAVAILABLE:
                    content.innerHTML = "No se ha podido acceder a la información de su posición.";
                    break;
                case objPositionError.TIMEOUT:
                    content.innerHTML = "El servicio ha tardado demasiado tiempo en responder.";
                    break;
                default:
                    content.innerHTML = "Error desconocido.";
            }
        }, {
            maximumAge: 75000,
            timeout: 15000
        });
    }
    else
    {
        content.innerHTML = "Su navegador no soporta la API de geolocalización.";
    }
})();



function loadMap() {

    if (lat &lon){
        var mapOptions = {
            center:new google.maps.LatLng(lat,lon),
            zoom:12,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
    } else {
        var mapOptions = {
            center:new google.maps.LatLng(-34.6686986,-58.5614947),
            zoom:12,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
    }

    var map = new google.maps.Map(document.getElementById("mapa"),mapOptions);

    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(lat,lon),
        map: map
    });

    google.maps.event.addListener(map, "rightclick", function(event) {
        var lati = event.latLng.lat();
        var lng = event.latLng.lng();
        document.getElementById("coordenadas").value = lati + " " + lng;
        // alert("Lat=" + lat + "; Lon=" + lng);
    });

}