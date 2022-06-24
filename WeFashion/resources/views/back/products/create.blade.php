@extends("layouts.master")
@section("contenu")


<form action="{{ route('products.store') }}" method='POST' enctype="multipart/form-data">
    @csrf
        <div class="row p-4 pt-5">

                <div  class="d-flex">
                    <div class="col-md-10">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire  d'un produit</h3>
                            </div>


                                <div class="d-flex">
                                    <div class="card-body">
                                        <div class="row">

                                        <div class="form-group">
                                            <label>Nom</label>
                                            <input type="text" name="name" value="{{old('name')}}" class="form-control" >
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control" >{{old('description')}}</textarea>
                                                @error('description')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>


                                        <div class="form-group">
                                                <label>Prix</label>
                                                <input type="text" name="price"  value="{{old('price')}}" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label>Categorie</label>
                                            <select name="category_id" class="form-control" >
                                                <option value="">-----------</option>
                                                @foreach ($categoryProduct as $category)
                                                <option value="{{$category->id}}" {{(old('category_id')==$category->id)?'selected':''}}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    Etat :<br>
                                                    <label><input type="radio" name="status" value="Solde" {{(old('status')=="Solde")?'checked':''}}> Solde</label><br>
                                                    <label><input type="radio" name="status" value="Standard" {{(old('status')=="Standard")?'checked':''}}> Standard</label>
                                                    @error('status')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    Visibilité :<br>
                                                    <label><input type="radio" name="visibility" value="Published" {{(old('visibility')=="Published")?'checked':''}}> Publier</label><br>
                                                    <label><input type="radio" name="visibility" value="Unpublished" {{(old('visibility')=="Unpublished")?'checked':''}}> Non Publier</label>
                                                    @error('visibility')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            Taille(s) :<br>
                                            {{-- @dump($book->authors->first()->id) --}}

                                            @foreach ($sizes as $size)
                                            <label><input type="checkbox" name="sizes[]" value="{{$size->id}}" {{in_array($size->id, old('sizes', []))?'checked':''}}>  {{$size->name}}</label><br>
                                            @endforeach
                                            @error('sizes')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>


                                    </div>


                                </div>

                                <div class="card-footer  col-md-4" >
                                    Title de l'image : <input class="form-control" type="text" name="title_image" value="{{old('title_image')}}"><br>
                                    Ajouter l'image : <input class="form-control" type="file" name="picture">
                                    @error('picture')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror




                                </div>


                            </div>
                        </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Ajouter le produit</button>
                        <button type="button" wire:click="goToListUser()" class="btn btn-danger"><a href="{{ route('products.index') }}"  class=" navbar-brand d-flex align-items-center" >Retourner à la liste des produits</a></button>
                    </div>
                </div>

        </div>
    </form>
@endsection
