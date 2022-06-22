<?php
use Illuminate\Support\Str;





//cette fonction recupère et retourne le nom et le prenom de l'utilisateur authentifié
function userFullName(){
    return auth()->user()->name ;
}
function setMenuClass($route, $classe){
    //cette ligne nous renvoie le nom de la route ou nous sommes
    $routeActuel = request()->route()->getName();
    //si le premier paramètre contient le second paramètres alors nous entrons la condition if
    //et nous retourne la variable $classe qui est le second paramètres de notre fonction
    //dans la vue plus précisement dans notre component/menu.blade.php lorsque nous utilisons cette fonction setMenuClass
    //le second paramètre est 'menu-open provenant de bootstrap qui met le titre en blue'
    if(contains($routeActuel, $route) ){
        return $classe;
    }
    return "";
}

function setMenuActive($route){
    //cette ligne nous renvoie le nom de la route ou nous sommes
    $routeActuel = request()->route()->getName();
    //ici on verifie si c'est égale après si true on met la classe active
    if($routeActuel === $route ){
        return "active";
    }
    return "";
}
//la fonction contains permet de verifier si le premier paramètres contient le second paramètres (un peu comme si on faisait l'égalité mais ce n'est pas ça)
function contains($container, $contenu){
    return Str::contains($container, $contenu);
}





