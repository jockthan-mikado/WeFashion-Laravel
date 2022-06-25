@extends('layouts.master')
@section('barmenu')
    @include('partials.menu')
@endsection

@section('content')
    <<div class="container">
        <div class="row justify-content-between">
            <div class="col-6">
                <div class="card mb-4 box-shadow">
                    <img  src="{{asset('images/'.$product->picture->link)}}" alt="{{$product->picture->title}}">
                </div>
            </div>
            <div class="col-6">
                <h1 class="jumbotron-heading">{{$product->name}}</h1>
                <h5>  {{ number_format ($product->price,2)}} €</h5>
                <p class="lead text-muted">{{$product->description}}</p>
                <hr>
                <label for="size">Choisissez votre taille</label>

                <select class="custom-select my-4">
                    @foreach ($sizes as $size)
                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                    @endforeach
                </select>

                <p>
                    <a href="#" class="btn btn-cart my-2 btn-block"><i class="fas fa-shopping-cart"></i> Ajouter au Panier</a>
                </p>
            </div>
        </div>
    </div>
@endsection

