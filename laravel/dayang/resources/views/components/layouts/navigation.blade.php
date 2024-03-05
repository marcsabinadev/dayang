<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="{{ route('home') }}"><img class="col-3 offset-1" src="{{url('/img/goat_oro.png')}}" class="col-1"></a>
        <div class="collapse navbar-collapse offset-3" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link fs-6" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link mx-3 fs-6" href="{{ route('personajes') }}">Characters</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6" href="{{ route('desarrolladores') }}">Developers</a>
                </li>
            </ul>
        </div>
    </div>
</nav>