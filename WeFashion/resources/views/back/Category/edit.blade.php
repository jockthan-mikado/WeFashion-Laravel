@extends("layouts.master")
@section("content")

@section('barmenu')
    @include('partials.menuadmin')
@endsection

<form action="{{ route('categories.update', $category->id) }}" method='POST' enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="row p-4 pt-5">

                <div  class="d-flex">
                    <div class="col-md-10">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire  de modification de la categorie</h3>
                            </div>
                                <div class="d-flex">
                                    <div class="card-body">
                                        <div class="row">

                                        <div class="form-group">
                                            <label>Nom</label>
                                            <input type="text" name="name" value="{{old('name', $category->name)}}" class="form-control" >
                                            @error('name')
                                            <span style="color:red">{{$message}}</span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Modifier la categorie</button>
                        <button type="button"  class="btn btn-outline-info"><a href="{{ route('categories.index') }}"  class="btn btn-outline-info align-items-center" >Retourner à la liste des categories</a></button>
                    </div>
                </div>
        </div>
    </form>
@endsection
