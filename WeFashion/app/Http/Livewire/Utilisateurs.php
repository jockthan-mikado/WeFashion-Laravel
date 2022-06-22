<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class Utilisateurs extends Component
{
    //Nous importons la libraire de pagination
    use WithPagination;
    //nous disons à laravel que le thème de notre pagination est de bootstrap
    protected $paginationTheme = "bootstrap";
    //cette variable verifie l'état du bouton nouvel utilisateur si il est clické ou non
    public $isBtnAddClicked = false;

    public function render()
    {
        Carbon::setLocale("fr");

        return view('livewire.utilisateurs.index',[
            "products" => Product::paginate(10)
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    //cette fonction renvoie true et permet de renvoyer la page de creation d'un utilisateur lors de l'ecoute de l'evenement click
    
    public function goToAddProduct()
    {
        $this->isBtnAddClicked = true;
    }
    //cette fonction renvoie false et permet de renvoyer la page de la liste des utilisateurs lors de l'ecoute de l'evenemen click
    public function goToListProduct(){
        $this->isBtnAddClicked = false;
    }
}
