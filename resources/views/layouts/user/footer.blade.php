{{-- <footer class="footer mt-auto py-3 bg-light text-center" style="position: fixed;bottom: 0;"> --}}
<footer class="footer py-3 bg-light text-center mt-5">
    <div class="card card-fluid border-0">
        <div class="card-body" style="background-image: url({{ asset('/assets/images/footer-line.jpg') }});">
            <img src="{{ asset('/assets/images/polri-presisi.png') }}" alt="logo pusiknas" class="img-fluid" width="8%">
        </div>
        {{-- <hr class="my-4" style="background-color: #383a3c; height: 2px;"> --}}
    </div>
    <div class="container mt-2">
        <span class="text-muted">Copyright &#169; <?= date('Y') ?>. <a href="https://pusiknas.polri.go.id/peta_kriminalitas" class="text-decoration-none" target="_blank" rel="noopener noreferrer">{{ config('app.name', 'Laravel') }}</a> - Laravel v.{{ Illuminate\Foundation\Application::VERSION }} (PHP v.{{ PHP_VERSION }}) - By: {{ config('app.author') }} </span>
    </div>
</footer>
