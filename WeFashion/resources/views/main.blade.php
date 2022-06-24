<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.png">

    <title>WeFashion</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


    <link rel="icon" href="{{asset('images/favicon.png')}}">
    <meta name="theme-color" content="#712cf9">
    <!-- Custom styles for this template -->
    <link href="css/album.css" rel="stylesheet">
    <link href="css/tshirt.css" rel="stylesheet">

    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

</head>

<body>

    <header>
        <div class="collapse bg-dark" id="navbarHeader">

        </div>
        <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
                <div class="d-flex ">
                    <a href="{{ route('products.index') }}"  class=" navbar-brand d-flex align-items-center" >Se connecter</a>
                    <a href="#" class="navbar-brand d-flex align-items-center">
                        <strong style="color: #66EB9A">WeFashion</strong>
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
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Soldes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hommes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Femmes</a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <main role="main">
        <section class="py-5 text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Commandez votre <br><span class="badge badge-light">nouveau</span> <br>Article <span class="btn btn-primary my-2">préféré </span>!</h1>


            </div>
        </section>

        @yield('content')

    </main>

    <footer class="text-muted py-5">

        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
            <p>Mon T-Shirt</p>
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-dark">About</h4>
                        <p class="text-dark">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-dark">Contact</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-dark">Follow on Twitter</a></li>
                            <li><a href="#" class="text-dark">Like on Facebook</a></li>
                            <li><a href="#" class="text-dark">Email me</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

  </body>
</html>
