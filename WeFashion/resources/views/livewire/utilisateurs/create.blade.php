
        <div class="row p-4 pt-5">
            <div class="col-md-6">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de création d'un utilisateur</h3>
                    </div>
                    
                    <form role="form">
                        <div class="card-body">
                            {{--<div class="d-flex">
                               
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" class="form-control flex-grow-1 mr-2" >
                                </div>
                            
                            
                                <div class="form-group">
                                    <label>Prenom</label>
                                    <input type="text" class="form-control flex-grow-1 " >
                                </div>
                                
                            </div>--}}
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input type="text" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Prenom</label>
                                        <input type="text" class="form-control" >
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Sexe</label>
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
                                        <label>Telephone 1</label>
                                        <input type="text" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Telephone 2</label>
                                        <input type="text" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Piece d'identité</label>
                                <select class="form-control ">
                                    <option value="">-----------</option>
                                    <option value="CNI">CNI</option>
                                    <option value="PASSPORT">PASSPORT</option>
                                    <option value="PERMIS DE CONDUIRE">PERMIS DE CONDUIRE</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Numero de piece d'identité</label>
                                <input type="text" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label>Mot de passe</label>
                                <input type="text" class="form-control" disabled  placeholder="Password">
                            </div>
                           
                        </div>
                        
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <button type="button" wire:click="goToListUser()" class="btn btn-danger">Retourner à la liste des utilisateurs</button>
                        </div>
                    </form>
                </div>     
                
        </div>