

function coletaLocalizacao(){  
    document.addEventListener("DOMContentLoaded", function() {
        var getLocationButton = document.getElementById("get-location");
        getLocationButton.addEventListener("click", function() {
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;
                    var inputLatitude = document.getElementById("input-latitude");
                    var inputLongitude = document.getElementById("input-longitude");

                    inputLatitude.value = latitude;
                    inputLongitude.value = longitude;

                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            var response = JSON.parse(xhr.responseText);
                            if (response.display_name) {
                                document.getElementById("latitude").textContent = latitude;
                                document.getElementById("longitude").textContent = longitude;
                                document.getElementById("address").textContent = response.display_name;
                                document.getElementById("input-address").value = response.display_name;
                            } else {
                                document.getElementById("address").textContent = "Endereço não encontrado.";
                            }
                        }
                    };
                    xhr.send();
                }, function(error) {
                    console.log("Erro ao obter localização:", error.message);
                });
            } else {
                console.log("Geolocalização não suportada no navegador.");
            }
        });
    });
}