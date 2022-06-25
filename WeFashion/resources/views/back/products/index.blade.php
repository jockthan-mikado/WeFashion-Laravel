
@extends("layouts.master")
@section('barmenu')
    @include('partials.menuadmin')
@endsection
@section("content")

    @if(session('message'))

    {{session('message')}}

    @endif
    {{$products->links()}}
    <div class="row p-4 pt-5">
        <div class="col-12">
            <div class="card">

                <div class="card-header bg-primary d-flex align-items-center">

                    <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i>Liste des Produits</h3>

                    <div class="card-tools d-flex align-items-center">

                        <a class="btn btn-link text-white mr-4 d-block"  href="{{ route('products.create') }}" ><i class="fas fa-user-plus"></i>Nouveau Produit</a>
                        <div class="input-group input-group-md" style="width: 250px;">

                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0 table-stripeD" style="height: 300px;">
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

            </div>

        </div>
    </div>
    {{$products->links()}}
@endsection
