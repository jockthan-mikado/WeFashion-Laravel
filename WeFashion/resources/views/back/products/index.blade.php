
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
                            <td>{{ number_format ($product->price,2)}} €</td>
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

