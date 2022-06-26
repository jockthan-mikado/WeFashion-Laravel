
@extends("layouts.admin")

@section("content")
    <div class="row">
        
        @include('partials.menuadmin')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show" id="notif-bar" style="margin-top:8px" role="alert">
                    {{session('message')}}
                    <button type="button" id="close_notif" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Gestion des produits</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a href="{{ route('products.create') }}">
                    <button class="btn btn-sm btn-outline-secondary">
                        <span data-feather="calendar"></span>
                        Nouveau Produit
                    </button></a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead class="table-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Categorie</th>
                        <th>Prix</th>
                        <th>Etat</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ( $products as $product )
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->status }}</td>
                            <td class="d-flex  justify-content-center">
                                        <a href="{{ route('products.show', $product->id) }}"><button class="btn btn-sm btn-primary">
                                        voir
                                        </button></a>
                                        <a href="{{ route('products.edit', $product->id)}}"><button class="btn btn-sm btn-info" style="margin-left:6px;">Edit</button></a>
                                        <form action="{{route('products.destroy', $product->id)}}"method="post">
                                            @csrf
                                          @method('DELETE')
                                          <button  type="submit" class="btn btn-sm btn-danger" style="margin-left:6px;" onclick="return confirm('Êtes-vous sûr de bien vouloir supprimer ce produit')">supprimer</button>
                                      </form>
                                </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-12">
                    @include('partials.pagination')
                </div>
            </div>
        </main>
    </div>
@endsection

{{--
@section("content")

    @if(session('message'))

    {{session('message')}}

    @endif

    <div class="row p-4 pt-5">
        <div class="col-12">
            <div class="card">

                <div class="card-headerbtn btn-info d-flex align-items-center">

                    <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i>Liste des Produits</h3>

                    <div class="card-tools d-flex align-items-center">

                        <a class="btn btn-link text-white mr-4 d-block"  href="{{ route('products.create') }}" ><i class="fas fa-user-plus"></i>Nouveau Produit</a>
                        <div class="input-group input-group-md" style="width: 250px;">

                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0 table-stripeD" style="height: 500px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>

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
                                <td>
                                    {{$product->name}}
                                </td>
                                <td>
                                    {{ $product->category->name }}
                                </td>
                                <td >
                                    {{ $product->price }}
                                </td>
                                <td class="text-center"><span class="tag tag-success">{{  $product->status }}</span></td>
                                <td class="text-center align-items-center">
                                    <div class="d-flex  justify-content-center">
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-info" class="btn btn-outline-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('products.edit', $product->id)}}"><i class="far fa-edit"></i></a></button>
                                        <form action="{{route('products.destroy', $product->id)}}"method="post">
                                            @csrf
                                          @method('DELETE')
                                          <button  type="submit" class="btn btn-o-danger">supprimer</button>
                                      </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
    {{$products->links()}}
@endsection
--}}