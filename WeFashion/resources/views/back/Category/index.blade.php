
@extends("layouts.master")

@section('barmenu')
    @include('partials.menuadmin')
@endsection

@section("content")

    @if(session('message'))

    {{session('message')}}

    @endif

    <div class="row p-4 pt-5">
        <div class="col-12">
            <div class="card">

                <div class="card-headerbtn btn-info d-flex align-items-center">

                    <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i>Liste des Categories</h3>

                    <div class="card-tools d-flex align-items-center">

                        <a class="btn btn-link text-white mr-4 d-block"  href="{{ route('categories.create') }}" ><i class="fas fa-user-plus"></i>Nouvelle catégorie</a>
                        <div class="input-group input-group-md" style="width: 250px;">

                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0 table-stripeD" style="height: 500px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>

                                <th style="width: 35%;">Id</th>
                                <th style="width: 35%;">Categorie</th>
                                <th style="width: 30%;" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $categories as $category )
                            <tr>
                                <td>
                                    {{$category->id}}
                                </td>
                                <td>
                                    {{ $category->name }}
                                </td>

                                <td class="text-center align-items-center">
                                    <div class="d-flex  justify-content-center">

                                        <button class="btn btn-outline-success"><a href="{{ route('categories.edit', $category->id)}}"><i class="far fa-edit"></i></a></button>
                                        <form action="{{route('categories.destroy', $category->id)}}"method="post">
                                            @csrf
                                          @method('DELETE')
                                          <button  type="submit" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></button>
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
    {{$categories->links()}}
@endsection
