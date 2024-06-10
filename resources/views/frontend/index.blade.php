@extends('layouts.user.base')

@section('css')
    <!-- Leaflet JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>

    <!-- Load Leaflet MarkerCluster and Esri Leaflet Cluster from CDN -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet.markercluster@1.5.0/dist/MarkerCluster.Default.css" integrity="sha512-6ZCLMiYwTeli2rVh3XAPxy3YoR5fVxGdH/pz+KMCzRY2M65Emgkw00Yqmhh8qLGeYQ3LbVZGdmOX9KUjSKr0TA==" crossorigin="">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet.markercluster@1.5.0/dist/MarkerCluster.css" integrity="sha512-mQ77VzAakzdpWdgfL/lM1ksNy89uFgibRQANsNneSTMD/bj0Y/8+94XMwYhnbzx8eki2hrbPpDm0vD0CiT2lcg==" crossorigin="">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />
    <style>
        #map { height: 500px; }
    </style>
@endsection

@section('content')

    <div class="text-center justify-content-center mb-2">
        <img src="{{ asset('/assets/images/logo_polri.png') }}" alt="logo polri" style="height:80px;">
    </div>

    <h2 class="text-center text-capitalize fw-bold mb-4">PETA KRIMINALITAS</h2>

    <div id="map" class="mt-5"></div>

    {{-- <div class="list-group list-group-horizontal-sm mt-5" style="overflow-x: auto; white-space: nowrap;">
        @foreach ([
            [
                'image' => 'banner_1.png',
                'url' => 'https://www.polri.go.id/',
            ],
            [
                'image' => 'banner_2.png',
                'url' => 'https://kejaksaan.go.id/',
            ],
            [
                'image' => 'banner_3.png',
                'url' => 'https://www.kemenkumham.go.id/',
            ],
            [
                'image' => 'banner_4.png',
                'url' => 'https://www.mahkamahagung.go.id/',
            ],
            [
                'image' => 'banner_5.png',
                'url' => 'https://www.bnn.go.id/',
            ],
        ] as $banner)
            <a href="{{ $banner['url'] }}" target="_blank" class="list-group-item list-group-item-action">
                <img src="{{ asset('assets/images/client/' . $banner['image']) }}" height="60" alt="client">
            </a>
        @endforeach
    </div> --}}

@endsection

@push('scripts')
    <!-- Ajax -->
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@3.0.12/dist/esri-leaflet.js"></script>
    <!-- Load Esri Leaflet Vector from CDN -->
    <script src="https://unpkg.com/esri-leaflet-vector@4.2.3/dist/esri-leaflet-vector.js" crossorigin=""></script>
    <!-- Load Leaflet MarkerCluster and Esri Leaflet Cluster from CDN -->
    <script src="https://unpkg.com/leaflet.markercluster@1.5.0/dist/leaflet.markercluster.js" integrity="sha512-pWPELjRaw2ZdoT0PDi7iRpRlk1XX3rtnfejJ/HwskyojpHei+9hKpwdphC4yssNt4FM0TjMQOmMrk6ZYSn274w==" crossorigin=""></script>
    <script src="https://unpkg.com/esri-leaflet-cluster@3.0.1/dist/esri-leaflet-cluster.js"></script>

    <script>
        const apiKey = "{{ env('API_KEY_ESRI') }}";
        const API_KEY_NGROK = "{{ env('API_KEY_NGROK') }}";
        const map = L.map('map').setView([{{ env('MAP_CENTER_LATITUDE') }}, {{ env('MAP_CENTER_LONGITUDE') }}], 13);

        // openstreetmap
        // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     maxZoom: 20,
        //     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        // }).addTo(map);

        // googleStreets
        // L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}',{
        //     maxZoom: 20,
        //     subdomains:['mt0','mt1','mt2','mt3']
        // }).addTo(map);

        // googleHybrid
        // L.tileLayer('http://{s}.google.com/vt?lyrs=s,h&x={x}&y={y}&z={z}',{
        //     maxZoom: 20,
        //     subdomains:['mt0','mt1','mt2','mt3']
        // }).addTo(map);

        // googleSatellite
        // L.tileLayer('http://{s}.google.com/vt?lyrs=s&x={x}&y={y}&z={z}',{
        //     maxZoom: 20,
        //     subdomains:['mt0','mt1','mt2','mt3']
        // }).addTo(map);

        // googleTerrain
        L.tileLayer('http://{s}.google.com/vt?lyrs=p&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        }).addTo(map);

        // const marker = L.marker([latitude, longitude]).addTo(map);
        var markers = L.markerClusterGroup();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('api.places') }}",
            // url: `https://api.ngrok.com/${API_KEY_NGROK}`,
            type: 'GET',
            dataType: 'json',
            xhrFields: {
                withCredentials: true
            },
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.setRequestHeader('Authorization', `Bearer ${API_KEY_NGROK}`);
                xhr.setRequestHeader('Ngrok-Version', '2');
            },
            success: function (data) {
                console.log('data',data);
                var marker = L.geoJSON(data, {
                    pointToLayer: function(geoJsonPoint, latlng) {
                        return L.marker(latlng, {icon: new L.Icon({
                            iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',

                            iconSize: [25, 41],
                            iconAnchor: [12, 41],
                            popupAnchor: [1, -34],
                            shadowSize: [41, 41]
                        })}).bindPopup(function (layer) {
                            return layer.feature.properties.place_name + '<br/>' +
                            'Pasal: ' + layer.feature.properties.pasal + '<br/>' +
                            'Waktu: ' + layer.feature.properties.waktu + '<br/>' +
                            'Latitude: ' + layer.feature.geometry.coordinates[1] + '<br/>' +
                            'Longitude: ' + layer.feature.geometry.coordinates[0] + '<br/>' +
                            'Alamat: ' + layer.feature.properties.address;
                        });
                    }
                });
                markers.addLayer(marker);
                map.addLayer(markers);
            },
            error: function(data) {
                console.log(data);
            }
        });

        // L.esri.Vector.vectorBasemapLayer("arcgis/community", {
        //     apikey: apiKey
        // }).addTo(map);

        // L.esri.Cluster.featureLayer({
        //     url: "https://sampleserver6.arcgisonline.com/arcgis/rest/services/Earthquakes_Since1970/MapServer/0"
        // }).addTo(map);
    </script>
@endpush
