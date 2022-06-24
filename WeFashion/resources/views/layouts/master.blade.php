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

                    <a href="#" class="navbar-brand d-flex align-items-center">
                        <strong>WeFashion</strong>
                    </a>
                </div>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-primary btn-block" href="{{ route('logout') }}"
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
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-red">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Produit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categorie</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="content-wrapper">

        <div class="content">
            <div class="container-fluid">
                @yield("contenu")
            </div>
        </div>

    </div>

    <!-- Control Sidebar -->
    <!--On fait appelle au composant sidebar.php -->

    <!-- /.control-sidebar -->

    <footer class="main-footer">

        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>

        <strong>Copyright &copy; 2022 <a href="#">Mikado_Entreprise.com </a>.
        </strong> All rights reserved.
    </footer>
</div>

<script src="{{ mix('js/app.js') }}"></script>



</body>
</html>
