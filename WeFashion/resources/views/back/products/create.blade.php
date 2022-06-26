@extends("layouts.admin")

@section('content')
<div class="container-fluid">
    <div class="row">

        @include('partials.menuadmin')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Ajouter un produit</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <a href="{{ route('products.index') }}"><button class="btn btn-sm btn-outline-secondary">Lister les produits</button></a>
                    </div>
                </div>
            </div>
            <form action="{{ route('products.store') }}" method='POST' enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nom">Nom du produit</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" >
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="prix_ht">Prix </label>
                        <input type="text" name="price"  value="{{old('price')}}" class="form-control" >
                        @error('price')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <textarea type="text" name="description" class="form-control" >{{old('description')}}</textarea>
                        @error('description')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="category_id">Catégorie</label>
                        <select class="form-control form-control-lg" id="category_id" name="category_id">
                            <option value="">-----------</option>
                                @foreach ($categoryProduct as $category)
                                    <option value="{{$category->id}}" {{(old('category_id')==$category->id)?'selected':''}}>{{$category->name}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="reference">Numero de réference du produit</label>
                        <input type="text" name="reference" value="{{old('reference')}}" class="form-control" >
                        @error('reference')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6  d-flex">
                        <div>
                            <label for="produits_recommandes">Visibilité</label><br>
                            <label style="font-size:12px"><input type="radio" name="visibility" value="Publié" {{(old('visibility')=="Publié")?'checked':''}}> Publier</label><br>
                            <label style="font-size:12px"><input type="radio" name="visibility" value="Non-Publié" {{(old('visibility')=="Non-Publié")?'checked':''}}> Non Publier</label>
                            @error('visibility')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div>

                        </div>
                        <div>
                            <label for="tags">Etat </label><br>
                            <label style="font-size:12px"><input type="radio" name="status" value="Solde" {{(old('status')=="Solde")?'checked':''}}> Solde</label><br>
                            <label style="font-size:12px"><input type="radio" name="status" value="Standard" {{(old('status')=="Standard")?'checked':''}}> Standard</label>
                            @error('status')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>


                    </div>
                    <div class="form-group col-md-6">
                         Title de l'image :
                         <input class="form-control" type="text" name="title_image" value="{{old('title_image')}}">


                     </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        Taille(s) :<br>
                        @foreach ($sizes as $size)
                            <label style="font-size:12px"><input type="checkbox" style="margin-left: 20px" name="sizes[]" value="{{$size->id}}" {{in_array($size->id, old('sizes', []))?'checked':''}}>  {{$size->name}}</label>
                        @endforeach
                        @error('sizes')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>
                    <div class="form-group col-md-6">
                        Ajouter l'image : <input class="form-control" type="file" name="picture">
                                    @error('picture')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary">Ajouter produit</button>
                    </div>

                </div>
            </form>
        </main>
    </div>
</div>
@endsection
