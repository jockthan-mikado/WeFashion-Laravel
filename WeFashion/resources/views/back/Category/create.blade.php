@extends("layouts.master")
@section("content")
@section('barmenu')
    @include('partials.menuadmin')
@endsection

<form action="{{ route('categories.store') }}" method='POST' enctype="multipart/form-data">
    @csrf
        <div class="row p-4 pt-5">

                <div >
                    <div class="col-md-10">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire  de la categorie</h3>
                            </div>

                                    <div class="card-body">

                                        <div class="form-group">
                                            <label>Nom</label>
                                            <input type="text" name="name" value="{{old('name')}}" class="form-control" >
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                            </div>
                        </div>
                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary">Ajouter la catégorie</button>
                        <button type="button" class="btn btn-outline-info"><a href="{{ route('categories.index') }}"  class=" navbar-brand d-flex align-items-center" >Retourner à la liste des categories</a></button>
                    </div>
                </div>

        </div>
    </form>
@endsection
