@extends("layouts.admin")

@section("content")
<div class="row">
    @include('partials.menuadmin')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Editer la catégorie</h1>

                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <a href="{{ route('categories.index') }}"><button class="btn btn-sm btn-outline-secondary">Lister les catégories</button></a>
                    </div>
                </div>
            </div>
            <form action="{{ route('categories.update', $category->id) }}" method='POST' enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nom">Nom de la catégorie</label>
                        <input type="text" name="name" value="{{old('name', $category->name)}}" class="form-control" >
                        @error('name')
                            <span style="color:red">{{$message}}</span>
                        @enderror
                    </div>

                </div>

                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </main>
</div>
@endsection
