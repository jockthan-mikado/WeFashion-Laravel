@extends("layouts.master")
@section("contenu")


<form action="{{ route('products.update', $product->id) }}" method='POST' enctype="multipart/form-data">
    @csrf
    @method('PUT')
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
                                            <input type="text" name="name" value="{{old('name', $product->name)}}" class="form-control" >
                                            @error('name')
                                            <span style="color:red">{{$message}}</span>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control" >{{ old('description', $product->description) }}</textarea>
                                                @error('description')
                                                <span style="color:red">{{$message}}</span>
                                                @enderror
                                        </div>


                                        <div class="form-group">
                                                <label>Prix</label>
                                                <input type="text" name="price"  value="{{ old('price', $product->price) }}" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label>Categorie</label>
                                            <select name="category_id" class="form-control" >
                                                <option value="">-----------</option>
                                                @foreach ($categoryProduct as $category)
                                                <option value="{{$category->id}}"  {{($category->id == old('category_id',$product->category_id))?'selected':''}}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    Etat :<br>

                                                    <label><input type="radio" name="status" value="Solde" {{(old('status',$product->status)=="Solde")?'checked':''}}> Solde</label><br>
                                                    <label><input type="radio" name="status" value="Standard" {{(old('status',$product->status)=="Standard")?'checked':''}}> Standard</label>
                                                    @error('status')
                                                    <span style="color:red">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    Visibilité :<br>
                                                    <label><input type="radio" name="visibility" value="Published" {{old("visibility", $product->visibility)=="Published" ?'checked':''}}> Publier</label><br>
                                                    <label><input type="radio" name="visibility" value="Unpublished" {{old("visibility" , $product->visibility)=="Unpublished" ?'checked':''}}> Non Publier</label>
                                                    @error('visibility')
                                                    <span style="color:red">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            Taille(s) :<br>
                                            {{--
                                            @foreach ($sizes as $id => $size)
                                            <label><input class="form-check-input" type="checkbox" id="size{{$id}}" value="{{ $id }}" @checked (in_array( $id, old('sizes', ($checkedSizes)?? []) )) name="sizes[]" >{{$size->name}}</label>
                                            <label><input type="checkbox" name="sizes[]" value="{{$size->id}}" {{in_array($size->id, old('sizes', $checkedSizes))? 'checked':'' }} >  {{$size->name}}</label>
                                            @endforeach--}}

                                            @foreach ($sizes as $size)
                                            {{-- @dump($size->id, $checkedSizes, old('sizes')) --}}
                                            <label><input type="checkbox" name="sizes[]" value="{{$size->id}}" {{in_array($size->id, old('sizes', $checkedSizes))? 'checked':'' }} >  {{$size->name}}</label>
                                            @endforeach


                                            @error('sizes')
                                            <span style="color:red">{{$message}}</span>
                                            @enderror
                                        </div>


                                    </div>


                                </div>

                                <div class="card-footer  col-md-4" >
                                    Title de l'image : <input class="form-control" type="text" name="title_image" value="{{old('title_image', ($product->picture->title)?? '')}}"><br>
                                    Remplacer l'image : <input class="form-control" type="file" name="picture">
                                    @error('picture')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                    {{-- @dump(public_path('images/'.$book->picture->link)) --}}
                                    @if (file_exists(public_path('images/'.$product->picture->link)))
                                    <img src="{{asset('images/'.($product->picture->link)?? '')}}" width="200">

                                    @endif




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
