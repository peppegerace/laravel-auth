<header class="bg-dark">

    <nav class="navbar navbarbg-body-tertiary">
        <div class="container-fluid">
          <a href="{{ route('home')}}" class="navbar-brand text-white">Vai al sito</a>
          <form action="{{ route('logout') }}" class="d.flex" method="POST" role="search">
            @csrf
            <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-right-from-bracket"></i></button>
          </form>
        </div>
      </nav>
</header>
