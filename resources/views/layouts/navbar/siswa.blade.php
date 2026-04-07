<nav class="navbar navbar-expand-lg" data-bs-theme="light">
    <div class="container">
        <a href="{{ route('welcome') }}" class="navbar-brand">
            <i class="bi bi-speedometer2 me-2"></i>{{ config('app.name') }}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @include('layouts.nav-items.siswa-guest')
                @include('layouts.nav-items.siswa-auth')
            </ul>
        </div>
    </div>
</nav>