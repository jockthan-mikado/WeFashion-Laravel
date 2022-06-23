@extends("layouts.master")
@section("contenu")

        <div class="row p-4 pt-5">
            <form role="form">
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
                                            <input type="text" class="form-control" >
                                        </div>
                                           
                                      
                                        <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control" ></textarea>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                                <label>Prix</label>
                                                <input type="text" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label>Categorie</label>
                                            <select class="form-control" >
                                                <option value="">-----------</option>
                                                <option value="1">Homme</option>
                                                <option value="0">Femme</option>
                                            </select>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>Adresse e-mail</label>
                                            <input type="email" class="form-control" >
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Visibilité </label>
                                                    <select class="form-control" >
                                                        <option value="">-----------</option>
                                                        <option value="1">Homme</option>
                                                        <option value="0">Femme</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    Status :<br>
                                                    <label><input type="radio" name="status" value="Published" {{(old('status')=="Published")?'checked':''}}> Publier</label><br>
                                                    <label><input type="radio" name="status" value="Unpublished" {{(old('status')=="Unpublished")?'checked':''}}> Dépublier</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <br>
                                            Date de publication : <input type=date name="published_at" value="{{old('published_at')}}">
                                        </div>
                                        
                                    
                                    </div>

                                    
                                </div>
                                
                                <div class="card-footer  col-md-4" >
                                    Title de l'image : <input class="form-control" type="text" name="title_image" value=""><br>
                                    Ajouter l'image : <input class="form-control" type="file" name="picture">
                                    
                                     <img src="" width="200"/>  
                                    
                                </div>
                            
                            </div>
                        </div>
                    <div> 
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                        <button type="button" wire:click="goToListUser()" class="btn btn-danger"><a href="{{ route('products.create') }}"  class=" navbar-brand d-flex align-items-center" >Retourner à la liste des produits</a></button>
                    </div>
                </div>     
            </form>  
        </div>

@endsection