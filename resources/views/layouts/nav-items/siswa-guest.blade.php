@guest('siswa')
    <li class="nav-item">
        <a href="{{ route('siswa.login') }}" class="nav-link">Login</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('siswa.register') }}" class="nav-link">Daftar?</a>
    </li>
@endguest