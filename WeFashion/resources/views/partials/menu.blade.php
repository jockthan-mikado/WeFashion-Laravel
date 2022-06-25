<header class=" text-center text-lg-start bg-dark text-muted">
    <div class="collapse bg-dark" id="navbarHeader">

    </div>
    <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
                <div class="d-flex ">
                    {{--<a href="{{ route('products.index') }}"  class=" navbar-brand d-flex align-items-center" >Se connecter</a>--}}
                    <a href="#" class="navbar-brand d-flex align-items-center">
                        <strong style="color: #66EB9A">WeFashion</strong>
                    </a>
                </div>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('products.index') }}"><i class="fa fa-user"></i> Connexion</a>
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
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('solde')}}">Solde</a>
                </li>
                @forelse($categories as $id => $name)
                <li class="nav-item">
                    <a class="nav-link" href="{{url('categorie', $id)}}">{{$name}}</a>
                </li>
                @empty
                    <li class="nav-item">Aucun genre pour l'instant</li>
                @endforelse

            </ul>
        </div>
    </nav>
</header>
