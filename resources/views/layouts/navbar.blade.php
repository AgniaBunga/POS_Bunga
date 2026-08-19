<style>

.navbar-coffee{
    background: linear-gradient(
        135deg,
        #fff8f5,
        #fdf1ee
    );
    border-radius: 18px;
    margin: 15px;
    padding: 10px 20px;
    box-shadow:
        10px 10px 25px rgba(180,120,120,.12);
}

.navbar-brand{
    color:#7a4f44 !important;
    font-size:22px;
    font-weight:700;
}

.nav-link{
    color:#8d6e63 !important;
    font-weight:600;
    margin:0 5px;
    border-radius:12px;
    padding:8px 14px !important;
    transition:.3s;
}

.nav-link:hover{
    background:#f6e3de;
    color:#7a4f44 !important;
}

.nav-link.active{
    background:linear-gradient(
        135deg,
        #c79288,
        #e8beb8
    );
    color:white !important;
}

.btn-logout{
    background:linear-gradient(
        135deg,
        #d78686,
        #efb1b1
    );
    border:none;
    color:white;
    border-radius:12px;
    padding:8px 18px;
    font-weight:600;
}

.btn-logout:hover{
    color:white;
}

</style>

<nav class="navbar navbar-expand-lg navbar-coffee">

    <div class="container-fluid">

        <a class="navbar-brand" href="#">
            Coffee Bloom POS
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse"
             id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}"
                       href="{{ route('dashboard') }}">
                        Beranda
                    </a>
                </li>

                @if(auth()->check() && strtolower(auth()->user()->role->name) === 'admin')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}"
                       href="{{ route('admin.users') }}">
                        Pengguna
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('produk') || Request::is('produk/*') ? 'active' : '' }}"
                       href="{{ route('produk.index') }}">
                        Produk
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('penjualan') || Request::is('penjualan/*') ? 'active' : '' }}"
                       href="{{ route('penjualan.index') }}">
                        Penjualan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('tentang') ? 'active' : '' }}"
                       href="{{ route('tentang') }}">
                        Tentang Saya
                    </a>
                </li>

            </ul>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-logout">
                    Keluar
                </button>
            </form>

        </div>

    </div>

</nav>