@extends('layouts.main')
@section('body')
    @include('layouts.navbar.siswa')
    <main class="min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @yield('content')
        </div>
    </main>
@endsection