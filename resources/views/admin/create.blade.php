@extends('layouts.app')

@section('css')
    <!-- Leaflet JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <style>
        #map {
            height: 300px;
        }
    </style>
@endsection

@section('content')
    <div class="card mb-5">
        <div class="card-header d-flex">
            <h3 class="p-2 text-decoration-underline text-uppercase">{{ __('Data Kriminal') }}</h3>
            <div class="ms-auto p-2">
                <a href="{{ route('admin.list') }}" class="btn btn-sm btn-danger">Kembali</a>
            </div>
        </div>

        <div class="card-body">
            <div id="map" class="mb-5"></div>
            <form class="row g-3" action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <label for="Nama" class="form-label">Nama</label>
                    <input type="text" name="place_name" class="form-control" id="Nama" required>
                </div>
                <div class="col-md-6">
                    <label for="latitude" class="form-label">Latitude</label>
                    <input type="text" name="latitude" class="form-control" id="latitude" required>
                </div>
                <div class="col-md-6">
                    <label for="longitude" class="form-label">Longitude</label>
                    <input type="text" name="longitude" class="form-control" id="longitude" required>
                </div>
                <div class="col-md-6">
                    <label for="pasal" class="form-label">Pasal</label>
                    <input type="text" name="pasal" class="form-control" id="pasal" required>
                </div>
                <div class="col-md-6">
                    <label for="waktu" class="form-label">Waktu</label>
                    <input type="text" name="waktu" class="form-control" id="waktu" required>
                </div>
                <div class="col-md-12">
                    <label for="address" class="form-label">Alamat</label>
                    <input type="text" name="address" class="form-control" id="address" required>
                </div>
                <div class="col-md-12">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        const apiKey = "{{ env('API_KEY_ESRI') }}";
        const map = L.map('map').setView([{{ env('MAP_CENTER_LATITUDE') }}, {{ env('MAP_CENTER_LONGITUDE') }}], 13);

        var marker;
        var longitudeInput = document.getElementById('longitude');
        var latitudeInput = document.getElementById('latitude');

        L.tileLayer('http://{s}.google.com/vt?lyrs=p&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

            // Tambahkan event listener untuk klik pada peta
        map.on('click', function(e) {
            if (marker) {
                map.removeLayer(marker);
            }

            marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
            latitudeInput.value = e.latlng.lat;
            longitudeInput.value = e.latlng.lng;
        });
        console.log('Latitude: ' + e.latlng.lat + ', Longitude: ' + e.latlng.lng);
    </script>
@endpush
