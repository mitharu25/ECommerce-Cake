var map = L.map('map').setView([-7.027285848253015, 107.54339538019093], 13); // Ganti dengan koordinat rumah Anda

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
}).addTo(map);

var homeMarker = L.marker([-7.027285848253015, 107.54339538019093]).addTo(map); // Ganti dengan koordinat rumah Anda
var destinationMarker;
var geocoder = L.Control.Geocoder.nominatim();
var control = L.Control.geocoder({
    collapsed: false,
    geocoder: geocoder
}).addTo(map);

map.on('click', function(e) {
    var latlng = e.latlng;
    if (destinationMarker) {
        map.removeLayer(destinationMarker);
    }
    destinationMarker = L.marker(latlng).addTo(map);
    
    // Reverse Geocoding untuk mendapatkan alamat dari koordinat
    var reverseGeocodeUrl = 'https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=' + latlng.lat + '&lon=' + latlng.lng + '&accept-language=id';
    
    fetch(reverseGeocodeUrl)
        .then(response => response.json())
        .then(data => {
            if (data && data.address) {
                var address = data.display_name;
                document.getElementById('address').value = address;
                document.getElementById('result').innerText = 'Koordinat yang dipilih: ' + latlng.lat + ', ' + latlng.lng;
            } else {
                alert('Tidak dapat menemukan alamat untuk koordinat ini.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan. Silakan coba lagi.');
        });
});

function geocodeAddress() {
    var addressInput = document.getElementById('address').value;

    if (addressInput.trim() === "") {
        alert('Alamat tidak boleh kosong. Silakan masukkan alamat.');
        return;
    }

    geocoder.geocode(addressInput, function(results) {
        if (results.length > 0) {
            var result = results[0];
            var latlng = result.center;

            if (destinationMarker) {
                map.removeLayer(destinationMarker);
            }
            destinationMarker = L.marker(latlng).addTo(map);
            map.setView(latlng, 13);
            document.getElementById('result').innerText = 'Koordinat dari pencarian: ' + latlng.lat + ', ' + latlng.lng;
        } else {
            alert('Alamat tidak ditemukan. Silakan coba lagi.');
        }
    });
}

function calculateDistance() {
    if (!destinationMarker) {
        alert('Silakan pilih lokasi atau cari alamat terlebih dahulu.');
        return;
    }

    var destinationLatLng = destinationMarker.getLatLng();
    var distance = homeMarker.getLatLng().distanceTo(destinationLatLng) / 1000; // Konversi ke kilometer
    document.getElementById('result').innerText = 'Jarak: ' + distance.toFixed(2) + ' km';
}
