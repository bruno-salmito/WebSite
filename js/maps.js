/**
 * Script para controlar as funções do google maps
 * Autor: Bruno Salmito
 * Versão: 0.0.2
 */

function initMap() {
    //Define a latitude e longitude do local onde o mapa ficará
    //Centralizado
    const cidade = {
        lat: -3.721039,
        lng: -40.991223
    }

    //Inicializa o mapa e centraliza nas coordenadas da cidade
    var map = new google.maps.Map(
        //Pega a id onde irá inicializar o mapa
        document.getElementById('map'), {
            zoom: 14,
            center: cidade,
            scrollwhell: false,
            styles: [{
                stylers: [{
                    //saturation: -100
                }]
            }] //fim do styles
        });

    //Adiciona marcador de localização na página
    function addMarker(lat, lng, titulo) {
        var myLatLng = {
            lat,
            lng
        };

        var info = '<p style="color:black;">' + titulo + '</p>';

        var infoWindow = new google.maps.InfoWindow({
            content: info
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            title: info,
            map: map
        });

        marker.addListener('click', function () {
            infoWindow.open(map, marker);
        });
    }
    addMarker(-3.721039, -40.991223, 'Bruno Salmito');

} //fim do init map

initMap();