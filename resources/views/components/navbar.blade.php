<nav class="navbar navbar-expand-md navbar-light bg-white">
    <a class="navbar-brand text-dark text-uppercase" href="#">
        <img loading="lazy" src="{{url('/images/jdih.png')}}" width="60" height="60" class="d-inline-block align-middle" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto text-dark text-uppercase">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('produk-hukum')}}">Produk Hukum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('berita')}}">Berita</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('galeri')}}">Galeri</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
    </div>

    <a class="navbar-brand text-dark d-none d-md-inline-block" href="#">
        <img loading="lazy" src="{{url('/images/tabalong.png')}}" width="50" height="60" class="d-inline-block align-middle" alt="">
    </a>
</nav>