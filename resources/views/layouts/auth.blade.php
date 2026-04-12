@extends('layouts.main')
@section('body')
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-indigo-50 px-4 py-12">
        <div class="w-full max-w-sm">
            @yield('content')
        </div>
    </div>
@endsection