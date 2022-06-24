<header>
    <div class="collapse bg-dark" id="navbarHeader">

    </div>
    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
            <div class="d-flex ">
                <a href="{{ route('products.index') }}"  class=" navbar-brand d-flex align-items-center" >Se connecter</a>
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <strong>WeFashion</strong>
                </a>
            </div>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i> Panier</a>
                </li>
            </ul>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-red">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            @yield("contenu")
        </div>
    </nav>
</header>
