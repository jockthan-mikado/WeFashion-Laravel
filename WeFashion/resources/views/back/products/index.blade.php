
@extends("layouts.master")

@section('barmenu')
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#">Produit</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Categotie</a>
        </li>
    </ul>

@endsection

@section("contenu")
    {{--On affiche le message d'erreur grace à la session--}}
    @if(session('message'))

    {{session('message')}}

    @endif

    {{$products->links()}}{{--c'est le lien de la pagination--}}
           {{-- p-4   permet d'ajouter une marge et pt-5 permet d'ajouter une marge en haut--}}


        {{-- p-4   permet d'ajouter une marge et pt-5 permet d'ajouter une marge en haut--}}
    <div class="row p-4 pt-5">
        <div class="col-12">
            <div class="card">
                {{-- bg-primary permet de colorer la barre en bleu--}}
                <div class="card-header bg-primary d-flex align-items-center">
                    {{--"fas fa-users  permet d'ajouter une icon et fa-2x permet d'agrandir la taille de l'icon">--}}
                    {{--flex-grow-1" permet de pousser vers la droite l'élément--}}
                    <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i>Liste des Produits</h3>
                    {{--d-flex permet de mettre ça en flex et align-items-center permet de le centrer --}}
                    <div class="card-tools d-flex align-items-center">
                        {{--"fas fa-user-plus" permet d'ajouter l'icon plus et "btn btn-link text-white mr-4" permet  un bouton de couleur de texte blanche et wire:click permet de dire à laravel pour ce bouton nous avons attaché un événement click qui appelle la fonction goToAddUser() et prevent empeche le comportement hyppertext--}}
                        <a class="btn btn-link text-white mr-4 d-block"  href="{{ route('products.create') }}" ><i class="fas fa-user-plus"></i>Nouvel Article</a>
                        <div class="input-group input-group-md" style="width: 250px;">
                            {{--<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>--}}
                        </div>
                    </div>
                </div>
                {{--table-stripe permet de differencier les lignes en ajoutant une barre de ligne --}}
                <div class="card-body table-responsive p-0 table-stripeD" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                {{--style="width: %" en fait le total doit faire 100% --}}
                                <th style="width: 5%;">Nom</th>
                                <th style="width: 25%;">Categorie</th>
                                <th style="width: 20%;">Prix</th>
                                <th style="width: 20%;" class="text-center">Etat</th>
                                <th style="width: 30%;" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $products as $product )


                            <tr>
                                {{--class="text-center" permet de centrer le contenu--}}
                                <td>
                                    {{$product->name}}


                                </td>
                                <td>
                                    {{ $product->category->name }}
                                </td>

                                <td >
                                    {{ $product->price }}
                                </td>
                                {{--diffForHumans() permet de formater la date --}}
                                <td class="text-center"><span class="tag tag-success">{{  $product->status }}</span></td>
                                <td class="text-center align-items-center">

                                    {{--btn btn-link  permet de faire un bouton avec une couleur--}}
                                    {{--far fa-edit  permet de mettre un icon de modification et far fa-trash-alt un icon de suppresion--}}
                                    <div class="d-flex  justify-content-center">
                                        <button class="btn btn-link "><a href="{{ route('products.edit', $product->id)}}"><i class="far fa-edit"></i></a></button>
                                        <form action="{{route('products.destroy', $product->id)}}"method="post">
                                            @csrf
                                          @method('DELETE')

                                          <button  type="submit" class="btn btn-link "><i class="far fa-trash-alt"></i></button>

                                      </form>
                                    </div>

                                </td>

                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{--Nous avons ajouté le footer pour la mettre la pagination--}}
                <div class="card-footer">
                    {{--class="float-right" permet de mettre la pagination à droite du formulaire  --}}
                    <div class="float-right">
                        {{--Nous definissons la pagination dans nos données recuperées--}}

                    </div>
                </div>
            </div>

        </div>
    </div>
    {{$products->links()}}
@endsection
