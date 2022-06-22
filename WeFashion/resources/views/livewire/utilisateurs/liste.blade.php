{{-- p-4   permet d'ajouter une marge et pt-5 permet d'ajouter une marge en haut--}}
<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card">
            {{-- bg-primary permet de colorer la barre en bleu--}}
            <div class="card-header bg-primary d-flex align-items-center">
                {{--"fas fa-users  permet d'ajouter une icon et fa-2x permet d'agrandir la taille de l'icon">--}}
                {{--flex-grow-1" permet de pousser vers la droite l'élément--}}
                <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i>Liste des Produits</h3>
                {{--d-flex permet de mettre ça en flex et align-items-center permet de le centrer --}}
                <div class="card-tools d-flex align-items-center">
                    {{--"fas fa-user-plus" permet d'ajouter l'icon plus et "btn btn-link text-white mr-4" permet  un bouton de couleur de texte blanche et wire:click permet de dire à laravel pour ce bouton nous avons attaché un événement click qui appelle la fonction goToAddUser() et prevent empeche le comportement hyppertext--}}
                    <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goToAddProduct()"><i class="fas fa-user-plus"></i>Nouvel Article</a>
                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {{--table-stripe permet de differencier les lignes en ajoutant une barre de ligne --}}
            <div class="card-body table-responsive p-0 table-stripeD" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            {{--style="width: %" en fait le total doit faire 100% --}}
                            <th style="width: 5%;"></th>
                            <th style="width: 25%;">Articles</th>
                            <th style="width: 20%;">Etat</th>
                            <th style="width: 20%;" class="text-center">Visibilités</th>
                            <th style="width: 30%;" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $products as $product )
                            
                       
                        <tr>
                            {{--class="text-center" permet de centrer le contenu--}}
                            <td>
                                {{$product->Name}}
                                    
                                
                            </td>
                            <td>{{ $product->name }}   </td>
                            {{-- Nous avons plusieurs façon d'afficher le role de l'utilisateur :
                             @foreach ($user->roles as $role )
                                    {{ $role->nom }}|
                                @endforeach
                                ou {{ $user->roles->implode("nom",'|')}} ou encore ce que nous avions mis dans le td--}}
                            <td > 
                                {{ $product->status }} 
                            </td>
                            {{--diffForHumans() permet de formater la date --}}
                            <td class="text-center"><span class="tag tag-success">{{  $product->visibility }}</span></td>
                            <td class="text-center">
                                
                                {{--btn btn-link  permet de faire un bouton avec une couleur--}}
                                {{--far fa-edit  permet de mettre un icon de modification et far fa-trash-alt un icon de suppresion--}}
                                <button class="btn btn-link "><i class="far fa-edit"></i></button>
                                <button class="btn btn-link "><i class="far fa-trash-alt"></i></button>
                            </td>
                        </tr>
                       
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{--Nous avons ajouté le footer pour la mettre la pagination--}}
            <div class="card-footer">
                {{--class="float-right" permet de mettre la pagination à droite du formulaire  --}}
                <div class="float-right">
                    {{--Nous definissons la pagination dans nos données recuperées--}}
                     {{$products->links()}}
                </div>
            </div>
        </div>
    
    </div>
</div>