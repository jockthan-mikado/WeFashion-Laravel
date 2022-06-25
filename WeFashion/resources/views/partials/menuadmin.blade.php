<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container d-flex justify-content-between">
        <div class="d-flex ">

            <a href="#" class="navbar-brand d-flex align-items-center">
                <strong>WeFashion</strong>
            </a>

        </div>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <div class="navbar-nav d-flex">
                <div class="nav-item">
                    <a class="nav-link text-white bg-dark " href="{{ route('products.index') }}">Produit</a>
                </div>
                <li class="nav-item">
                    <a class="nav-link text-white bg-dark " href="{{ route('categories.index') }}">Categorie</a>
                </div>

            </div >
        </div>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="text-white bg-dark " href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 Se déconnecter
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
            </li>
        </ul>
    </div>
</nav>
